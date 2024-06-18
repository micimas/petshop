<?php

class ReservaModel extends Mysql
{

    public function selectReserva()
    {
        $sql = "SELECT
                    r.idreserva,
                    p.nombres,
                    p.apellidos,
                    tr.tipo_reserva AS tipo,
                    DATE_FORMAT(r.fecha_reserva, '%d/%m/%Y') AS fecha,
                    r.status
                FROM reserva r
                JOIN persona p ON
                    r.idpersona = p.idpersona
                JOIN tipo_reserva tr ON
                    r.idtipo_reserva = tr.idtipo_reserva;
                ";
        $request = $this->select_all($sql);
        return $request;
    }

    public function selectReservaDetalles(int $idreserva)
    {
        $sql = "SELECT
                    r.idreserva,
                    p.nombres,
                    p.apellidos,
                    p.telefono,
                    p.email_user,
                    tr.tipo_reserva AS tipo,
                    r.motivo,
                    DATE_FORMAT(r.fecha_reserva, '%d/%m/%Y') AS fecha,
                    r.hora_reserva,
                    r.datecreated,
                    r.status
                FROM
                    reserva r
                JOIN persona p ON
                    r.idpersona = p.idpersona
                JOIN tipo_reserva tr ON
                    r.idtipo_reserva = tr.idtipo_reserva
                WHERE r.idreserva = {$idreserva};";
        $request = $this->select($sql);
        return $request;
    }

}
?>