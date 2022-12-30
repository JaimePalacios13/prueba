<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginControllers extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('LoginModel');
	}

	public function index()
	{
        $this->load->view('login/components/header');
		$this->load->view('login/pages/login');
        $this->load->view('login/components/footer');
	}

	public function validarUsuario(){
		try {
			$datos = array(
                'email'    => $_POST['correo'],
                'password' => $_POST['pwd']
            );

			$rsp = $this->LoginModel->verificarUsuario($datos);

			//Arreglo con los return data del modelo para crear las sesiones
			$sessiones = array(
				'id_usuario' => $rsp[0]['id_usuario'],
				'nombres' => $rsp[0]['nombres'],
				'apellidos' => $rsp[0]['apellidos'],
				'estado' => $rsp[0]['estado'],
				'id_rol' => $rsp[0]['id_rol'],
				'email' => $rsp[0]['email'],
				'rol' => $rsp[0]['rol'],
			);
			//var_dump($sessiones);
			setcookie("id_usuario", $rsp[0]['id_usuario'], time() + 172800, "/");
			setcookie("tipo_rol", $rsp[0]['id_rol'],time() + 172800, "/");

			$this->session->set_userdata($sessiones);
			
			echo json_encode($rsp);
		} catch (\Throwable $th) {
			echo $th;
		}
	}

	public function logout(){
		try {
			setcookie("id_usuario", $this->session->userdata('id_usuario'), time() - 172800, "/");
			setcookie("tipo_rol", $this->session->userdata('id_rol'),time() - 172800, "/");
			$this->session->sess_destroy();
			redirect(base_url());
		} catch (\Throwable $th) {
			//throw $th;
		}
	}
}
