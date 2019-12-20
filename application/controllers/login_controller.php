<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login_controller extends CI_Controller{

	public function __construct(){
		parent:: __construct();
		$this->load->model('login_model');
		$this->load->model('home_model');
	}


	public function iniciar(){
		$datos['usuario'] = $_POST['usuario'];
		$datos['clave'] = md5($_POST['clave']);
		$data = $this->login_model->validar($datos);
		if($data){
			//variables de sesion
			$datos_usuario = array('id' => $data->id_cliente, 'nombre'=> $data->nombre, 'apellido'=> $data->apellido, 'rol'=> $data->id_rol, 'logueado' => TRUE);
			$this->session->set_userdata($datos_usuario);
			redirect('home_controller/','refresh');
		}else{
			//$data['msj'] = "Error";
			//$this->load->view('home_view',$data);
			//redirect('home_controller/','refresh',$data);

			$data = array(
				'productos'  => $this->home_model->get_productos(),
				'msj'        => 'Error');

			$titulo = array(
				'title'      => 'Tecno Store');


			$this->load->view('template/header',$titulo);
			$this->load->view('home_view',$data);
			$this->load->view('template/footer');

		}
	}

//Metodo para cerrar sesion y destruir la variable de sesion
	public function cerrar(){
		$user_data = array('Logueado' => FALSE);
		$this->session->set_userdata($user_data);
		$this->session->sess_destroy();
		redirect('home_controller/','refresh');
	}



//Metodo que recibe el mensaje si el correo no existe, se pudo enviar o NO se pudo enviar
	public function correo($msj){
		
		if ($msj == "errorCorreo") {
			$data['msj'] = "errorCorreo";
		}elseif ($msj == "okCorreo") {
			$data['msj'] = "okCorreo";
		}else{
			$data['msj'] = "errorEnviar";
		}

		$dato = array(
			'title'      => 'Tecno Store', 
			'productos'  => $this->home_model->get_productos(),
			'tipo_pago' => $this->home_model->mPago());

		$this->load->view('template/header',$dato);
		$this->load->view('home_view',$data);
		$this->load->view('template/footer');

	}

}