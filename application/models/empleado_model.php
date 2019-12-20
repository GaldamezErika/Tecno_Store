<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class empleado_model extends CI_Model {

	PUBLIC function  get_empleado(){
		$this->db->select('e.id_cliente, e.nombre, e.apellido, e.correo,s.nombre_sexo, e.telefono, e.usuario, e.clave, r.nombre_rol');
		$this->db->from('usuario e');
		$this->db->join('sexo s', 's.id_sexo= e.id_sexo');
		$this->db->join('rol r', 'r.id_rol = e.id_rol');
		$this->db->where('r.id_rol != 3');
		$exe=$this->db->get();
		return $exe->result();

	}

	public function eliminar($id){

		$this->db->where('id_cliente',$id);
		$this->db->delete('usuario');

		if($this->db->affected_rows() > 0){

			return true;
		}else{
			return false;
		}
	}

	public function get_sexo(){
		$exe=$this->db->get('sexo');
		return $exe->result();
	}
	public function get_rol(){
		$this->db->where('id_rol != 3');
		$exe=$this->db->get('rol');
		return $exe->result();
	}
	public function set_empleado($datos){
		$this->db->set('nombre', $datos["nombre"]);
		$this->db->set('apellido', $datos["apellido"]);
		$this->db->set('telefono', $datos["telefono"]);
		$this->db->set('correo', $datos["correo"]);

		$this->db->set('id_sexo', $datos["sexo"]);
		$this->db->set('usuario', $datos["usuario"]);
		$this->db->set('clave', $datos["clave"]);
		$this->db->set('id_rol', $datos["rol"]);

		$this->db->insert('usuario');

		if($this->db->affected_rows()>0){
			return "add";
		}

	}
	public function get_datos($id){
		$this->db->where('id_cliente', $id);
		$exe=$this->db->get('usuario');

		if($this->db->affected_rows()>0){
			return $exe->row();
		}else{ 
			return false;


		}

	}
	public function actualizar($datos){
		$this->db->set('nombre',$datos['nombre']);
		$this->db->set('apellido',$datos['apellido']);
		$this->db->set('telefono',$datos['telefono']);
		$this->db->set('correo',$datos['correo']);
		$this->db->set('id_sexo',$datos['sexo']);
		$this->db->set('usuario', $datos["usuario"]);
		$this->db->set('id_rol', $datos["rol"]);
		$this->db->where('id_cliente',$datos['id_cliente']);
		$this->db->update('usuario');

		if($this->db->affected_rows()>0){
			return "edi";
		}
	}


	public function validarCorreo($correo){
		 
		$this->db->where('correo',$correo);
		$this->db->get('usuario');

		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	public function validarusuario($usuario){
		
		$this->db->where('usuario',$usuario);
		$this->db->get('usuario');

		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

}

?>