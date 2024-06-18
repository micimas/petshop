<?php
headerAdmin($data);
navAdmin($data);
?>

<main id="main" class="main">
  <div class="card">
    <div class="card-body">

      <div class="app-title card-title">
        <div class="d-flex justify-content-between">
          <h1>
            <i class="bi bi-person-circle"></i> <?= $data["page_title"]; ?>
          </h1>
          <li class=" "><a href="<?= base_url(); ?>pedidos">Return</a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <?php
            if (empty($data['arrPedido'])) {
              ?>
              <p>Datos no encontrados</p>
            <?php } else {
              $cliente = $data['arrPedido']['cliente'];
              $orden = $data['arrPedido']['orden'];
              $detalle = $data['arrPedido']['detalle'];
              $transaccion = $orden['idtransaccionpaypal'] != "" ?
                $orden['idtransaccionpaypal'] :
                $orden['referenciacobro'];
              ?>
              <section id="sPedido" class="invoice">
                <div class="row mb-4">
                  <div class="col-6">
                    <h2 class="page-header"><img src="<?= media(); ?>/tienda/images/logo.png"></h2>
                  </div>
                  <div class="col-6">
                    <h5 class="text-end">Fecha: <?= $orden['fecha'] ?></h5>
                  </div>
                </div>
                <div class="row invoice-info">
                  <div class="col-4">
                    <address><strong><?= NOMBRE_EMPESA; ?></strong><br>
                      <?= DIRECCION ?><br>
                      <?= TELEMPRESA ?><br>
                      <?= EMAIL_EMPRESA ?><br>
                      <?= WEB_EMPRESA ?>
                    </address>
                  </div>
                  <div class="col-4">
                    <address><strong><?= $cliente['nombres'] . ' ' . $cliente['apellidos'] ?></strong><br>
                      Envío: <?= $orden['direccion_envio']; ?><br>
                      Tel: <?= $cliente['telefono'] ?><br>
                      Email: <?= $cliente['email_user'] ?>
                    </address>
                  </div>
                  <div class="col-4"><b>Orden #<?= $orden['idpedido'] ?></b><br>
                    <b>Pago: </b><?= $orden['tipopago'] ?><br>
                    <b>Transacción:</b> <?= $transaccion ?> <br>
                    <b>Estado:</b> <?= $orden['status'] ?> <br>
                    <b>Monto:</b> <?= SMONEY . ' ' . formatMoney($orden['monto']) ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Descripción</th>
                          <th class="text-end">Precio</th>
                          <th class="text-center">Cantidad</th>
                          <th class="text-end">Importe</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $subtotal = 0;
                        if (count($detalle) > 0) {
                          foreach ($detalle as $producto) {
                            $subtotal += $producto['cantidad'] * $producto['precio'];
                            ?>
                            <tr>
                              <td><?= $producto['producto'] ?></td>
                              <td class="text-end"><?= SMONEY . ' ' . formatMoney($producto['precio']) ?></td>
                              <td class="text-center"><?= $producto['cantidad'] ?></td>
                              <td class="text-end">
                                <?= SMONEY . ' ' . formatMoney($producto['cantidad'] * $producto['precio']) ?>
                              </td>
                            </tr>
                            <?php
                          }
                        }
                        ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th colspan="3" class="text-end">Sub-Total:</th>
                          <td class="text-end"><?= SMONEY . ' ' . formatMoney($subtotal) ?></td>
                        </tr>
                        <tr>
                          <th colspan="3" class="text-end">Envío:</th>
                          <td class="text-end"><?= SMONEY . ' ' . formatMoney($orden['costo_envio']) ?></td>
                        </tr>
                        <tr>
                          <th colspan="3" class="text-end">Total:</th>
                          <td class="text-end"><?= SMONEY . ' ' . formatMoney($orden['monto']) ?></td>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
                <div class="row d-print-none mt-2">
                  <div class="col-12 text-end"><a class="btn btn-primary" href="javascript:window.print('#sPedido');"><i
                        class="fa fa-print"></i> Imprimir</a></div>
                </div>
              </section>
            <?php } ?>
          </div>
        </div>
      </div>
</main>
<?php footerAdmin($data); ?>