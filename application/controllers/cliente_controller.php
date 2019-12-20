<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cliente_controller extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model("cliente_model");
	}

	
	public function index(){

		if($this->session->userdata('logueado')==true){
			if($this->session->userdata('rol')== 1){

				$data= array ('title' =>'Tecno Store');
				$this->load->view('template/header', $data);
				$this->load->view('cliente_view');
				$this->load->view('template/footer');

			}elseif($this->session->userdata('rol')== 2){

				$data= array ('title' =>'Tecno Store');
				$this->load->view('template/header', $data);
				$this->load->view('cliente_view');
				$this->load->view('template/footer');

			}else{ 
				redirect('home_controller/index','refresh');
			}
		}else{
			redirect('home_controller/index','refresh');
		}
	}

	public function get_cliente(){
		$respuesta= $this->cliente_model->get_cliente();
		echo json_encode($respuesta);
	}
	public function eliminar(){

		$id = $this->input->post('id');
		$respuesta = $this->cliente_model->eliminar($id);
		echo json_encode($respuesta);
	}

	public function get_sexo(){
		$respuesta = $this->cliente_model->get_sexo();
		echo json_encode($respuesta);
	}
	public function get_rol(){
		$respuesta = $this->cliente_model->get_rol();
		echo json_encode($respuesta);
	}

	public function get_departamento(){
		$respuesta = $this->cliente_model->get_departamento();
		echo json_encode($respuesta);
	}

	public function ingresar(){
		$datos['nombre']=$this->input->post('nombre');
		$datos['apellido']=$this->input->post('apellido');
		$datos['telefono']=$this->input->post('telefono');
		$datos['direccion']=$this->input->post('direccion');
		$datos['departamento']=$this->input->post('departamento');
		$datos['correo']=$this->input->post('correo');
		$datos['sexo']=$this->input->post('sexo');
		$datos['usuario']=$this->input->post('usuario');
		$datos['clave']= md5($this->input->post('clave'));
		$datos['rol']=$this->input->post('rol');

		$respuesta = $this->cliente_model->set_cliente($datos);
		echo json_encode($respuesta);

	}
	public function get_datos(){
		$id = $this->input->post('id');
		$respuesta = $this->cliente_model->get_datos($id);
		echo json_encode($respuesta);
	}
	public function actualizar(){
		$datos['id_cliente'] = $this->input->post('id_cliente');
		$datos['nombre']    = $this->input->post('nombre');
		$datos['apellido']  = $this->input->post('apellido');
		$datos['telefono']  = $this->input->post('telefono');
		$datos['direccion']=$this->input->post('direccion');
		$datos['departamento']=$this->input->post('departamento');
		$datos['correo']    = $this->input->post('correo');
		$datos['sexo']     = $this->input->post('sexo');
		$datos['usuario']     =$this->input->post('usuario');
		$datos['rol']       =$this->input->post('rol');

		$respuesta = $this->cliente_model->actualizar($datos);
		

		echo json_encode($respuesta);
	}
	public function validarCorreo(){
		$correo = $this->input->post('correo');
		$res = $this->cliente_model->validarCorreo($correo);
		echo json_encode($res);
	}
	public function validarusuario(){
		$usuario = $this->input->post('usuario');
		$res = $this->cliente_model->validarusuario($usuario);
		echo json_encode($res);
	}


}

?>