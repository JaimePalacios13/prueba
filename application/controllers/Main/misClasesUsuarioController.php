<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MisClasesUsuarioController extends CI_Controller {

	function __construct(){
		parent::__construct();
        $this->load->model('MisClasesModel');
	}

    function index(){
        try {
            if ($this->session->userdata('id_usuario') && $this->session->userdata('id_rol') == 2) {
                $rsp['misClases'] = $this->MisClasesModel->misClasesList($this->session->userdata('id_usuario'));
                $rsp['totalSinPagar'] = $this->MisClasesModel->totalSinPagar($this->session->userdata('id_usuario'));
                $rsp['montoSinPagar'] = $this->MisClasesModel->montoSinPagar($this->session->userdata('id_usuario'));
                $rsp['totalPagado'] = $this->MisClasesModel->totalPagado($this->session->userdata('id_usuario'));
                $rsp['montoPagado'] = $this->MisClasesModel->montoPagado($this->session->userdata('id_usuario'));
                $rsp['totalPresencial'] = $this->MisClasesModel->totalClasesPresencial($this->session->userdata('id_usuario'));
                $rsp['totalOnline'] = $this->MisClasesModel->totalClasesOnline($this->session->userdata('id_usuario'));
                $this->load->view('main/components/header');
                $this->load->view('main/pages/Usuario/misClases',$rsp);
                $this->load->view('main/components/footer');
            }else{
                redirect(base_url().'logout');
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}