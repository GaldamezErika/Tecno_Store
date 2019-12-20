<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class proveedor_C extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('proveedor_M');

	}

	public function index(){
		if($this->session->userdata('logueado')==true){
			if($this->session->userdata('rol')== 1){

				$data= array('title' => 'Tecno Store');
				$this->load->view('template/header',$data);
				$this->load->view('proveedor_V');
				$this->load->view('template/footer');

			}elseif($this->session->userdata('rol')== 2){

				$data= array('title' => 'Tecno Store');
				$this->load->view('template/header',$data);
				$this->load->view('proveedor_V');
				$this->load->view('template/footer');

			}else{ 
				redirect('home_controller/index','refresh');
			}
		}else{
			redirect('home_controller/index','refresh');
		}
	}

	public function get_proveedor(){
		$R = $this->proveedor_M->get_proveedor();//R=respuesta
		echo json_encode($R);
	}

	public function eliminar(){
		$id=$this->input->post('id');
		$R=$this->proveedor_M->eliminar($id);
		echo json_encode($R);
	}

	public function ingresar(){
		$datos['nombre']=$this->input->post('nombre');
		$datos['apellido']=$this->input->post('apellido');
		$datos['telefono']=$this->input->post('telefono');

		$R=$this->proveedor_M->set_proveedor($datos);
		echo json_encode($R);
	}

	public function get_datos(){
		$id=$this->input->post('id');
		$R=$this->proveedor_M->get_datos($id);
		echo json_encode($R);
	}

	public function actualizar(){
		$datos['id_proveedor']=$this->input->post('id_proveedor');
		$datos['nombre']=$this->input->post('nombre');
		$datos['apellido']=$this->input->post('apellido');
		$datos['telefono']=$this->input->post('telefono');

		$R=$this->proveedor_M->actualizar($datos);
		echo json_encode($R);
	}
}
