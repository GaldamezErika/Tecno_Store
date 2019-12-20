<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ped_cliente_controller extends CI_Controller {

	public function __construct(){

		parent:: __construct();
		$this->load->model('ped_cliente_model');
	}

	public function index(){

		$data = array(
			'title'      => 'Tecno Store', 
			'ventas'  => $this->ped_cliente_model->get_ventas());


		$this->load->view('template/header',$data);
		$this->load->view('ped_cliente_view');
		$this->load->view('template/footer');
	}

	public function venta($id){



		$data = array(
			'title'   => 'Tecno Store', 
			'id_venta'  => $id,
			'detalle'  => $this->ped_cliente_model->get_detalle_venta($id));

		$this->load->view('template/header',$data);
		$this->load->view('ped_cliente_view');
		$this->load->view('template/footer');

	}

	public function eliminar($id){

		$result = $this->ped_cliente_model->eliminar($id);

		if ($result == "success") {
			$data = array(
				'title'     => 'Tecno Store', 
				'ventas'  => $this->ped_cliente_model->get_ventas(),
				'msj'       => "Elim");

		}

		$this->load->view('template/header',$data);
		$this->load->view('ped_cliente_view');
		$this->load->view('template/footer');
	}
}