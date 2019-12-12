<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home_controller extends CI_Controller {

	public function __construct(){

		parent:: __construct();
		$this->load->model('home_model');
		$this->load->library('cart');
	}


	public function index(){

		$data = array(
			'title'      => 'Tecno Store', 
			'productos'  => $this->home_model->get_productos(),
			'tipo_pago' => $this->home_model->mPago());


		$this->load->view('template/header',$data);
		$this->load->view('home_view');
		$this->load->view('template/footer');
	}

	public function monitores(){

		$data = array(
			'title'      => 'Tecno Store', 
			'monitores'  => $this->home_model->get_monitores());


		$this->load->view('template/header',$data);
		$this->load->view('cat_monitor_view');
		$this->load->view('template/footer');
	}

	public function teclados(){

		$data = array(
			'title'      => 'Tecno Store', 
			'teclados'  => $this->home_model->get_teclados());


		$this->load->view('template/header',$data);
		$this->load->view('cat_teclado_view');
		$this->load->view('template/footer');
	}

	public function mouses(){

		$data = array(
			'title'      => 'Tecno Store', 
			'mouses'  => $this->home_model->get_mouses());


		$this->load->view('template/header',$data);
		$this->load->view('cat_mouses_view');
		$this->load->view('template/footer');
	}

	public function cpu(){

		$data = array(
			'title'      => 'Tecno Store', 
			'cpu'  => $this->home_model->get_cpu());


		$this->load->view('template/header',$data);
		$this->load->view('cat_cpu_view');
		$this->load->view('template/footer');
	}

	public function ups(){

		$data = array(
			'title'      => 'Tecno Store', 
			'ups'  => $this->home_model->get_ups());


		$this->load->view('template/header',$data);
		$this->load->view('cat_ups_view');
		$this->load->view('template/footer');
	}

	public function impresoras(){

		$data = array(
			'title'      => 'Tecno Store', 
			'impresoras'  => $this->home_model->get_impresoras());


		$this->load->view('template/header',$data);
		$this->load->view('cat_impresora_view');
		$this->load->view('template/footer');
	}


	public function get_datos($id){

		$data = array(
			'title'   => 'Tecno Store', 
			'productos'  => $this->home_model->get_datos($id));

		$this->load->view('template/header',$data);
		$this->load->view('detalle_prod_view');
		$this->load->view('template/footer');
	}

    // Agregamos al carrito los productos con la libreria cart
	public function carrito(){

		$data  =array(
			'id' => $this->input->post("id"),
			'qty' => $this->input->post("cantidad"),
			'price' => $this->input->post("precio"),
			'name' => $this->input->post("descripcion")
		);
		$this->cart->insert($data);

		redirect('home_controller','refresh');
	}

    // Ingresamos los datos a la tabla venta
	public function comprar(){


		$this->home_model->set_venta($_POST['tipo_pago']);

		redirect('home_controller','refresh');
	}



}
