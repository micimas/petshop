<?php

class Usuarios extends Controllers
{
	public function __construct()
	{
		parent::__construct();
		session_start();
		if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/login');
			die();
		}
		getPermisos(MUSUARIOS);
	}

	public function Usuarios()
	{
		if (empty($_SESSION['permisosMod']['r'])) {
			header("Location:" . base_url() . '/dashboard');
		}
		$data['page_tag'] = "Usuarios";
		$data['page_title'] = "USUARIOS";
		$data['page_name'] = "usuarios";
		$data['page_functions_js'] = "functions_usuarios.js";
		$this->views->getView($this, "usuarios", $data, "admin");
	}

	public function setUsuario()
	{
		if ($_POST) {
			if (empty($_POST['txtIdentificacion']) || empty($_POST['txtNombre']) || empty($_POST['txtApellido']) || empty($_POST['txtTelefono']) || empty($_POST['txtEmail']) || empty($_POST['listRolid']) || empty($_POST['listStatus'])) {
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
			} else {
				$idUsuario = intval($_POST['idUsuario']);
				$strIdentificacion = strClean($_POST['txtIdentificacion']);
				$strNombre = ucwords(strClean($_POST['txtNombre']));
				$strApellido = ucwords(strClean($_POST['txtApellido']));
				$intTelefono = intval(strClean($_POST['txtTelefono']));
				$strEmail = strtolower(strClean($_POST['txtEmail']));
				$intTipoId = intval(strClean($_POST['listRolid']));
				$intStatus = intval(strClean($_POST['listStatus']));
				$request_user = "";
				if ($idUsuario == 0) {
					$option = 1;
					$strPassword = empty($_POST['txtPassword']) ? hash("SHA256", passGenerator()) : hash("SHA256", $_POST['txtPassword']);

					if ($_SESSION['permisosMod']['w']) {
						$request_user = $this->model->insertUsuario(
							$strIdentificacion,
							$strNombre,
							$strApellido,
							$intTelefono,
							$strEmail,
							$strPassword,
							$intTipoId,
							$intStatus
						);
					}
				} else {
					$option = 2;
					$strPassword = empty($_POST['txtPassword']) ? "" : hash("SHA256", $_POST['txtPassword']);
					if ($_SESSION['permisosMod']['u']) {
						$request_user = $this->model->updateUsuario(
							$idUsuario,
							$strIdentificacion,
							$strNombre,
							$strApellido,
							$intTelefono,
							$strEmail,
							$strPassword,
							$intTipoId,
							$intStatus
						);
					}

				}

				if ($request_user > 0) {
					if ($option == 1) {
						$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
					} else {
						$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
					}
				} else if ($request_user == 'exist') {
					$arrResponse = array('status' => false, 'msg' => '¡Atención! el email o la identificación ya existe, ingrese otro.');
				} else {
					$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
				}
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function getUsuarios()
	{
		if ($_SESSION['permisosMod']['r']) {
			$arrData = $this->model->selectUsuarios();
			for ($i = 0; $i < count($arrData); $i++) {
				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';

				if ($arrData[$i]['status'] == 1) {
					$arrData[$i]['status'] = '<span class="badge text-bg-success">Activo</span>';
				} else {
					$arrData[$i]['status'] = '<span class="badge text-bg-danger">Inactivo</span>';
				}

				if ($_SESSION['permisosMod']['r']) {
					$btnView = '<button class="btn btn-info btn-sm btnViewUsuario" onClick="fntViewUsuario(' . $arrData[$i]['idpersona'] . ')" title="Ver usuario"><i class="far fa-eye"></i></button>';
				}
				if ($_SESSION['permisosMod']['u']) {
					if (
						($_SESSION['idUser'] == 1 and $_SESSION['userData']['idrol'] == 1) ||
						($_SESSION['userData']['idrol'] == 1 and $arrData[$i]['idrol'] != 1)
					) {
						$btnEdit = '<button class="btn btn-primary  btn-sm btnEditUsuario" onClick="fntEditUsuario(this,' . $arrData[$i]['idpersona'] . ')" title="Editar usuario"><i class="fas fa-pencil-alt"></i></button>';
					} else {
						$btnEdit = '<button class="btn btn-secondary btn-sm" disabled ><i class="fas fa-pencil-alt"></i></button>';
					}
				}
				if ($_SESSION['permisosMod']['d']) {
					if (
						($_SESSION['idUser'] == 1 and $_SESSION['userData']['idrol'] == 1) ||
						($_SESSION['userData']['idrol'] == 1 and $arrData[$i]['idrol'] != 1) and
						($_SESSION['userData']['idpersona'] != $arrData[$i]['idpersona'])
					) {
						$btnDelete = '<button class="btn btn-danger btn-sm btnDelUsuario" onClick="fntDelUsuario(' . $arrData[$i]['idpersona'] . ')" title="Eliminar usuario"><i class="far fa-trash-alt"></i></button>';
					} else {
						$btnDelete = '<button class="btn btn-secondary btn-sm" disabled ><i class="far fa-trash-alt"></i></button>';
					}
				}
				$arrData[$i]['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDelete . '</div>';
			}
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function getUsuario($idpersona)
	{
		if ($_SESSION['permisosMod']['r']) {
			$idusuario = intval($idpersona);
			if ($idusuario > 0) {
				$arrData = $this->model->selectUsuario($idusuario);
				if (empty($arrData)) {
					$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
				} else {
					$arrResponse = array('status' => true, 'data' => $arrData);
				}
				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
			}
		}
		die();
	}

	public function delUsuario()
	{
		if ($_POST) {
			if ($_SESSION['permisosMod']['d']) {
				$intIdpersona = intval($_POST['idUsuario']);
				$requestDelete = $this->model->deleteUsuario($intIdpersona);
				if ($requestDelete) {
					$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el usuario');
				} else {
					$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el usuario.');
				}
				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
			}
		}
		die();
	}

	public function perfil()
	{
		$data['page_tag'] = "Perfil";
		$data['page_title'] = "Perfil de usuario";
		$data['page_name'] = "perfil";
		$data['page_functions_js'] = "functions_usuarios.js";
		$this->views->getView($this, "perfil", $data, "admin");
	}

	public function putPerfil()
	{
		if ($_POST) {
			if (empty($_POST['txtIdentificacion']) || empty($_POST['txtNombre']) || empty($_POST['txtApellido']) || empty($_POST['txtDescripcion']) || empty($_POST['txtTelefono']) || empty($_POST['txtEmail']) || empty($_POST['txtNit']) || empty($_POST['txtNombreFiscal']) || empty($_POST['txtDirFiscal'])) {
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
			} else {
				$idUsuario = $_SESSION['idUser'];
				// $strIdentificacion = strClean($_POST['txtIdentificacion']);
				// $strNombre = strClean($_POST['txtNombre']);
				// $strApellido = strClean($_POST['txtApellido']);
				// $intTelefono = intval(strClean($_POST['txtTelefono']));
				$strPassword = "";

				$strIdentificacion = strClean($_POST['txtIdentificacion']);
				$strNombre = strClean($_POST['txtNombre']);
				$strApellido = strClean($_POST['txtApellido']);
				$intTelefono = intval($_POST['txtTelefono']);

				// $strPais = strClean($_POST['txtPais']);
				// $strTwitter = strClean($_POST['twitter']);
				// $strFacebook = strClean($_POST['facebook']);
				// $strInstagram = strClean($_POST['instagram']);
				// $strLinkedin = strClean($_POST['linkedin']);
				$strDescripcion = strClean($_POST['txtDescripcion']);
				$strEmail = strClean($_POST['txtEmail']);
				$strNit = strClean($_POST['txtNit']);
				$strNombreFiscal = strClean($_POST['txtNombreFiscal']);
				$strDirFiscal = strClean($_POST['txtDirFiscal']);

				if (!empty($_POST['txtPassword'])) {
					$strPassword = hash("SHA256", $_POST['txtPassword']);
				}
				$request_user = $this->model->updatePerfil(
					$idUsuario,
					$strIdentificacion,
					$strNombre,
					$strApellido,
					$strDescripcion,
					$intTelefono,
					$strEmail,
					$strPassword,
					$strNit,
					$strNombreFiscal,
					$strDirFiscal
				);
				if ($request_user) {
					sessionUser($_SESSION['idUser']);
					$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
				} else {
					$arrResponse = array("status" => false, "msg" => 'No es posible actualizar los datos.');
				}
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function putContraseña()
	{
		if ($_POST) {
			// Verificar que todos los campos estén presentes
			if (empty($_POST['actualContraseña']) || empty($_POST['nuevaContraseña']) || empty($_POST['re_nueva_contraseña'])) {
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
			} else {
				$idUsuario = $_SESSION['idUser'];
				$actualContraseña = strClean($_POST['actualContraseña']);
				$nuevaContraseña = strClean($_POST['nuevaContraseña']);
				$reNuevaContraseña = strClean($_POST['re_nueva_contraseña']);

				// Verificar que las nuevas contraseñas coincidan
				if ($nuevaContraseña !== $reNuevaContraseña) {
					$arrResponse = array("status" => false, "msg" => 'Las contraseñas no coinciden.');
				} else {
					$strPassword = $this->model->getPassword($idUsuario);
					// Encriptar la contraseña actual proporcionada por el usuario
					$encriptedActualPassword = hash("SHA256", $actualContraseña);
					// $dato=$strPassword['password'];
					// echo "console.log(.$dato .' espacio ' .$encriptedActualPassword)";
					// Comparar la contraseña actual encriptada con la contraseña almacenada en la base de datos
					if ($encriptedActualPassword !== $strPassword['password']) {
						$arrResponse = array('status' => false, 'msg' => 'La contraseña actual no coincide.');
					} else {
						// Encriptar la nueva contraseña
						$newPasswordHash = hash("SHA256", $nuevaContraseña);
						// Actualizar la contraseña en la base de datos
						$request_pass = $this->model->updatePassword($idUsuario, $newPasswordHash);
						if ($request_pass) {
							$arrResponse = array('status' => true, 'msg' => 'Contraseña actualizada correctamente.');
						} else {
							$arrResponse = array("status" => false, "msg" => 'No es posible actualizar la contraseña.');
						}
					}
				}
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}



}
?>