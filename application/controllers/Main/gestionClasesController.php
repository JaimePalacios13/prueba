<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GestionClasesController extends CI_Controller {

	function __construct(){
		parent::__construct();
        $this->load->model('TipoClaseModel');
        $this->load->model('UsuariosModel');
	}
    
    function index(){
        if ($this->session->userdata('id_usuario') && $this->session->userdata('id_rol') == 1) {
            $rsp['listaClases'] = $this->TipoClaseModel->listaClases();
            $rsp['tiposClase'] = $this->TipoClaseModel->tiposClases();
            $rsp['listaUsuarios'] = $this->UsuariosModel->listaUsuarios();
            $this->load->view('main/components/header');
            $this->load->view('main/pages/Administrador/gestionClases',$rsp);
            $this->load->view('main/components/footer');
        
        }else{
            redirect(base_url().'logout');
        }
    }

    function nuevaClase(){
        try {
            $data = array(
                "tipoclase" => $_POST['tipoclase'],
                "cantidad" => $_POST['cantidad'],
                "montoapagar" => $_POST['montoapagar'],
                "fechapagar" => $_POST['fechapagar'],
                "comentario" => $_POST['comentario'],
                "aignadoA" => $_POST['aignadoA'],
                "estadoPago" => $_POST['estadoPago'],
            );

            if ($this->TipoClaseModel->nuevaClase($data)) {
                echo true;
            }else{
                echo false;
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    function editarClase(){
        try {
            $data = array(
                "idClase" => $_POST['idClase'],
                "tipoclase" => $_POST['tipoclase'],
                "cantidad" => $_POST['cantidad'],
                "montoapagar" => $_POST['montoapagar'],
                "fechapagar" => $_POST['fechapagar'],
                "comentario" => $_POST['comentario'],
                "aignadoA" => $_POST['aignadoA'],
                "estadoPago" => $_POST['estadoPago'],
            );

            if ($this->TipoClaseModel->editarClase($data)) {
                echo true;
            }else{
                echo false;
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function eliminarClase(){
        try {
            if ($this->TipoClaseModel->borrarClase($_POST['idClase'])) {
                echo true;
            }else{
                echo false;
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

}