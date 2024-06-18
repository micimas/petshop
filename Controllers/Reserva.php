<?php 

	class Reserva extends Controllers{
		public function __construct()
		{
			parent::__construct();
			session_start();
			if(empty($_SESSION['login']))
			{
				header('Location: '.base_url().'login');
				die();
			}
			getPermisos(MCITAS);
		}

		public function Reserva()
		{
			if(empty($_SESSION['permisosMod']['r'])){
				header("Location:".base_url().'dashboard');
			}
			$data['page_tag'] = "reserva";
			$data['page_title'] = "reserva";
			$data['page_name'] = "reserva";
			$data['page_functions_js'] = "functions_reserva.js";
			$this->views->getView($this,"reserva",$data,"admin");
		}

		public function getReservaAll(){
			if($_SESSION['permisosMod']['r']){
				$arrData = $this->model->selectReserva();
				for ($i=0; $i < count($arrData) ; $i++) { 
					$btnView = '';
					if($_SESSION['permisosMod']['r']){
						$btnView = '<button class="btn btn-info btn-sm" onClick="fntViewInfo('.$arrData[$i]['idreserva'].')" title="Ver mensaje"><i class="far fa-eye"></i></button>';
					}
					$arrData[$i]['options'] = '<div class="text-center">'.$btnView.'</div>';
				}
				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function getReserva($idreserva){
			if($_SESSION['permisosMod']['r']){
				$idreserva = intval($idreserva);
				if($idreserva > 0){
					$arrData = $this->model->selectReservaDetalles($idreserva);
					if(empty($arrData)){
						$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
					}else{
						$arrResponse = array('status' => true, 'data' => $arrData);
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}

	}
?>