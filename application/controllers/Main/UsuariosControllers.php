<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuariosControllers extends CI_Controller {

	function __construct(){
		parent::__construct();
        $this->load->model('UsuariosModel');
	}

    public function usuarios()
	{
        try {
            if ($this->session->userdata('id_usuario') && $this->session->userdata('id_rol') == 1) {
                    $rsp['listaUsuarios'] = $this->UsuariosModel->listaUsuarios();
                    $rsp['listaRoles'] = $this->UsuariosModel->listaRoles();
                    $this->load->view('main/components/header');
                    $this->load->view('main/pages/Administrador/usuarios',$rsp);
                    $this->load->view('main/components/footer');
                
            }else{
                redirect(base_url().'logout');
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
	}

    public function usuarioNormal(){
        try {
            if ($this->session->userdata('id_usuario') && $this->session->userdata('id_rol') == 2) {
                    $this->load->view('main/components/header');
                    $this->load->view('main/pages/Usuario/welcomeUsuario');
                    $this->load->view('main/components/footer');
            }else{
                redirect(base_url().'logout');
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function getUsuarios(){
        try {
            $response = $this->UsuariosModel->listaUsuarios();

            echo json_encode($response);
            exit();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function eliminarUsuario(){
        try {
            if ($this->UsuariosModel->borrarUsuario($_POST['id_usuario'])) {
                echo true;
            }else{
                echo false;
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function nuevoUsuario(){
        try {
            $data = array(
                'nombres' => $_POST['nombres'],
                'apellidos' => $_POST['apellidos'],
                'email' => $_POST['email'],
                'estado' => $_POST['estado'],
                'rol' => $_POST['rol'],
                'pwd' => $_POST['pwd']
            );
            if ($this->UsuariosModel->nuevoUsuario($data)) {
                echo true;
            }else{
                echo false;
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function editarUsuario(){
        try {
            $data = array(
                'idusuario'=> $_POST['idUsuario'],
                'nombres' => $_POST['nombres'],
                'apellidos' => $_POST['apellidos'],
                'email' => $_POST['email'],
                'estado' => $_POST['estado'],
                'rol' => $_POST['rol']
            );
            if ($this->UsuariosModel->editarUsuario($data)) {
                echo true;
            }else{
                echo false;
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}