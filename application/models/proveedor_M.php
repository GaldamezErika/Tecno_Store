<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class proveedor_M extends CI_Model {

	public function get_proveedor(){
		$this->db->select('p.id_proveedor,p.nombre,p.apellido,p.telefono');
		$this->db->from('proveedor p');

		$exe=$this->db->get();
		return $exe->result(); 
	} 

	public function eliminar($id){
		$this->db->where('id_proveedor',$id);
		$this->db->delete('proveedor');

		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function set_proveedor($datos){
		$this->db->set('nombre',$datos['nombre']);
		$this->db->set('apellido',$datos['apellido']);
		$this->db->set('telefono',$datos['telefono']);
		$this->db->insert('proveedor');

		if($this->db->affected_rows()>0){
			return"add";
		}

	}

	public function get_datos($id){
		$this->db->where('id_proveedor',$id);
		$exe=$this->db->get('proveedor');

		if($this->db->affected_rows()>0){
			return $exe->row();
		}else{
			false;
		}
	}

	public function actualizar($datos){
		$this->db->set('nombre',$datos['nombre']);
		$this->db->set('apellido',$datos['apellido']);
		$this->db->set('telefono',$datos['telefono']);
		$this->db->where('id_proveedor',$datos['id_proveedor']);
		$this->db->update('proveedor');

		if($this->db->affected_rows()>0){
			return "edi";
		}
	}
}