<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class producto_controller extends CI_Controller {

	public function __construct(){

		parent:: __construct();
		$this->load->model('producto_model');
	}


	public function index(){

		if($this->session->userdata('logueado')==true){
			if($this->session->userdata('rol')== 1){

				$data= array ('title' =>'Tecno Store');
				$this->load->view('template/header', $data);
				$this->load->view('producto_view');
				$this->load->view('template/footer');

			}elseif($this->session->userdata('rol')== 2){

				$data= array ('title' =>'Tecno Store');
				$this->load->view('template/header', $data);
				$this->load->view('producto_view');
				$this->load->view('template/footer');

			}else{ 
				redirect('home_controller/index','refresh');
			}
		}else{
			redirect('home_controller/index','refresh');
		}
	}


	public function get_producto(){
		$respuesta= $this->producto_model->get_producto();
		echo json_encode($respuesta);
	}

	public function get_imagen(){

		$id = $this->input->post('id');
		$respuesta= $this->producto_model->get_imagen($id);
		echo json_encode($respuesta);
	}


	public function eliminar(){

		$id= $this->input->post('id');
		$rutaN= $this->input->post('rutaN');
		unlink($rutaN);
		$respuesta= $this->producto_model->eliminar($id);
		echo json_encode($respuesta);
	}

	public function get_categoria(){
		$respuesta = $this->producto_model->get_categoria();
		echo json_encode($respuesta);
	}

	public function get_marca(){
		$respuesta = $this->producto_model->get_marca();
		echo json_encode($respuesta);
	}


	public function get_proveedor(){
		$respuesta = $this->producto_model->get_proveedor();
		echo json_encode($respuesta);
	}

	public function ingresar(){

		if (isset($_FILES["file"]["name"])) {
			$config['upload_path'] = "props/img/";
			$config['allowed_types'] = "png|jpg|jpeg";
			$this->load->library('upload',$config);

			if (!$this->upload->do_upload('file')) {
				echo $this->upload->display_errors();
			}else{
				$data = $this->upload->data();
				$datos['descripcion'] = $this->input->post('descripcion');
				$datos['especificación'] = $this->input->post('especificación');
				$datos['p_venta'] = $this->input->post('p_venta');
				$datos['p_compra'] = $this->input->post('p_compra');
				$datos['cantidad'] = $this->input->post('cantidad');
				$datos['imagen']="props/img/".$data["file_name"];
				$datos['categoria'] = $this->input->post('categoria');
				$datos['marca'] = $this->input->post('marca');
				$datos['proveedor'] = $this->input->post('proveedor');
				$datas = $this->producto_model->set_producto($datos);
				echo json_encode($datas);
			}
		}
	}

	public function get_datos(){
		$id = $this->input->post('id');
		$respuesta = $this->producto_model->get_datos($id);
		echo json_encode($respuesta);
	}

	public function actualizar(){
		if ($_FILES["file"]["name"]!='') {

			$config['upload_path'] = "props/img/";
			$config['allowed_types'] = "png|jpg|jpeg";
			$this->load->library('upload',$config);

			if (!$this->upload->do_upload('file')) {
				echo $this->upload->display_errors();
			}else{
				$data = $this->upload->data();
				$datos['id_producto'] = $this->input->post('id_producto');
				$datos['descripcion'] = $this->input->post('descripcion');
				$datos['especificación'] = $this->input->post('especificación');
				$datos['p_venta'] = $this->input->post('p_venta');
				$datos['p_compra'] = $this->input->post('p_compra');
				$datos['cantidad'] = $this->input->post('cantidad');
				$datos['imagen']="props/img/".$data["file_name"];
				$datos['categoria'] = $this->input->post('categoria');
				$datos['marca'] = $this->input->post('marca');
				$datos['proveedor'] = $this->input->post('proveedor');
				/*$id=$this->input->post('id_producto');
				$palabra='rutaN'.$id;
				$rutaN= $this->input->post($palabra);
				unlink($rutaN);*/
				$datas = $this->producto_model->actualizar($datos);
				echo json_encode($datas);
			}
		}else{
			$datos['id_producto'] = $this->input->post('id_producto');
				$datos['descripcion'] = $this->input->post('descripcion');
				$datos['especificación'] = $this->input->post('especificación');
				$datos['p_venta'] = $this->input->post('p_venta');
				$datos['p_compra'] = $this->input->post('p_compra');
				$datos['cantidad'] = $this->input->post('cantidad');
				$datos['imagen']='';
				$datos['categoria'] = $this->input->post('categoria');
				$datos['marca'] = $this->input->post('marca');
				$datos['proveedor'] = $this->input->post('proveedor');
			$datos['portada']='';
			$datas = $this->producto_model->actualizar($datos);
			echo json_encode($datas);
		}
	}	
}
