<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){

		parent:: __construct();
		$this->load->model('login_model');
		$this->load->model('home_model');
	}
	
	public function index(){
		$data= array ('title' =>'Tecno Store');
		$this->load->view('template/header',$data);
		$this->load->view('home_view');
		$this->load->view('template/footer');
	}

	public function cambiarcontra(){

		$datos['usuario'] = $_POST['usuario'];
		$datos['oldClave'] = md5($_POST['oldClave']);
		$datos['newClave'] = md5($_POST['newClave']);
		$result = $this->login_model->cambiarcontra($datos);
		if ($result == "success"){
			$data = array(
				'title'           => 'Tecno Store', 
				'productos'  => $this->home_model->get_productos(),
				'tipo_pago' => $this->home_model->mPago(),
				'msj'             => "change");

		}if ($result == "Error"){

			$data = array(
				'title'           => 'Tecno Store', 
				'productos'  => $this->home_model->get_productos(),
				'tipo_pago' =>  $this->home_model->mPago(),
				'msj'             => "ErrorClave");	
		}	

		$this->load->view('template/header',$data);
		$this->load->view('home_view');
		$this->load->view('template/footer');

		/*redirect('home_controller/index','refresh');*/

	}





}
