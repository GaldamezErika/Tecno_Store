<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class registrar_controller extends CI_Controller {

	public function __construct(){

		parent:: __construct();
		$this->load->model('registrar_model');
	}

	public function index(){

		$data = array(
			'title'    => 'Tecno Store',
			'sexo'     => $this->registrar_model->get_sexo(),
			'departamento'     => $this->registrar_model->get_departamento());


		$this->load->view('template/header',$data);
		$this->load->view('registrar_view');
		$this->load->view('template/footer');
	}

	public function ingresar(){

		$datos["nombre"]    = $_POST["nombre"];
		$datos["apellido"]  = $_POST["apellido"];
		$datos["sexo"]      = $_POST["sexo"];
		$datos["direccion"] = $_POST["direccion"];
		$datos["departamento"]      = $_POST["departamento"];
		$datos["telefono"]  = $_POST["telefono"];
		$datos["correo"]    = $_POST["correo"];
		$datos["usuario"]   = $_POST["usuario"];
		$datos["clave10"]   = md5($_POST["clave10"]);

		$result = $this->registrar_model->set_cliente($datos);
		if ($result == "success") {
			$data = array(
				'title'             => 'Tecno Store', 
				'sexo'              => $this->registrar_model->get_sexo(),
				'departamento'      => $this->registrar_model->get_departamento(),
				'msj'               => "success");

			$this->load->view('template/header');
			$this->load->view('registrar_view',$data);
			$this->load->view('template/footer');

		}
	}


	public function validarUsuario(){

		$res = $this->registrar_model->validarUsuario();
		echo json_encode($res);
	}


	public function validarCorreo(){

		$res = $this->registrar_model->validarCorreo();
		echo json_encode($res);
	}
}
