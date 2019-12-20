<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pedidos_controller extends CI_Controller {

	public function __construct(){

		parent:: __construct();
		$this->load->model('pedidos_model');
	}

	
	public function index(){
		if($this->session->userdata('logueado')==true){
			if($this->session->userdata('rol')== 1){
				$data = array(
					'title'      => 'Tecno Store', 
					'ventas'  => $this->pedidos_model->get_ventas(),
					'estado'  => $this->pedidos_model->estado());


				$this->load->view('template/header',$data);
				$this->load->view('pedidos_view');
				$this->load->view('template/footer');
			}else{ 
				redirect('home_controller/index','refresh');
			}
		}else{
			redirect('home_controller/index','refresh');
		}
		
	}

	public function venta($id){

		$data = array(
			'title'   => 'Tecno Store', 
			'id_venta'  => $id,
			'detalle'  => $this->pedidos_model->get_detalle_venta($id));

		$this->load->view('template/header',$data);
		$this->load->view('pedidos_view');
		$this->load->view('template/footer');

	}

	public function modificar($venta,$estado){


		$data = array(
			'title'   => 'Tecno Store', 
			'estados'  => $this->pedidos_model->modificar($venta,$estado));

		$this->load->view('template/header',$data);
		$this->load->view('pedidos_view');
		$this->load->view('template/footer');

		redirect('pedidos_controller/index','refresh');


	}


}
