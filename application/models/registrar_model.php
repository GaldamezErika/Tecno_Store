<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class registrar_model extends CI_Model {

	public function get_sexo(){

		$exe = $this->db->get('sexo');
		return $exe->result();
	}

	public function get_departamento(){

		$exe = $this->db->get('departamento');
		return $exe->result();
	}


	public function set_cliente($datos){

		$this->db->set('nombre',$datos["nombre"]);
		$this->db->set('apellido',$datos["apellido"]);
		$this->db->set('correo',$datos["correo"]);
		$this->db->set('telefono',$datos["telefono"]);
		$this->db->set('direccion',$datos["direccion"]);
		$this->db->set('usuario',$datos["usuario"]);
		$this->db->set('clave',$datos["clave10"]);
		$this->db->set('id_sexo',$datos["sexo"]);
		$this->db->set('id_departamento ',$datos["departamento"]);
		$this->db->set('id_rol',3);
		$this->db->insert('usuario');

		if ($this->db->affected_rows() > 0) {
			return 'success';
		}

	}

	public function validarUsuario(){

		$usuario = $this->input->post('usuario3');
		$this->db->where('usuario',$usuario);
		$this->db->get('usuario');

		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}


	public function validarCorreo(){

		$correo = $this->input->post('correo2');
		$this->db->where('correo',$correo);
		$this->db->get('usuario');

		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	
}
