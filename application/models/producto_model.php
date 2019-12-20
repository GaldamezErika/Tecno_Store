<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class producto_model extends CI_Model {

	public function get_producto(){

		$this->db->select('p.id_producto, p.descripcion, p.especificacion, p.precio_venta, p.precio_compra, p.stock, p.imagen, c.nombre_categoria, m.nombre_marca, pr.nombre');
		$this->db->from('producto p');
		$this->db->join('categoria c','c.id_categoria = p.id_categoria');
		$this->db->join('marca m','m.id_marca = p.id_marca');
		$this->db->join('proveedor pr','pr.id_proveedor = p.id_proveedor');

		$exe=$this->db->get();
		return $exe->result();
	}

	public function get_imagen($id){

		$this->db->where('id_producto',$id);
		$exe= $this->db->get('producto');
		return $exe->result();
	}

	public function eliminar($id){

		$this->db->where('id_producto',$id);
		$this->db->delete('producto');

		if ($this->db->affected_rows() > 0 ) {
			return true;
		}else{
			return false;
		}
	}

	public function get_categoria(){
		$exe=$this->db->get('categoria');
		return $exe->result();
	}

	public function get_marca(){
		$exe=$this->db->get('marca');
		return $exe->result();
	}

	public function get_proveedor(){
		$exe=$this->db->get('proveedor');
		return $exe->result();
	}

	public function set_producto($datos){
		
		$this->db->set('descripcion', $datos['descripcion']);
		$this->db->set('especificacion', $datos['especificación']);
		$this->db->set('precio_venta', $datos['p_venta']);
		$this->db->set('precio_compra', $datos['p_compra']);
		$this->db->set('stock', $datos['cantidad']);
		$this->db->set('imagen', $datos['imagen']);
		$this->db->set('id_categoria', $datos['categoria']);
		$this->db->set('id_marca', $datos['marca']);
		$this->db->set('id_proveedor', $datos['proveedor']);
		$this->db->insert('producto');

		if($this->db->affected_rows()>0){
			return "add";
		}
	}

	public function get_datos($id){
		$this->db->where('id_producto',$id);
		$exe = $this->db->get('producto');

		if($exe->num_rows()>0){
			return $exe->row();
		}else{
			return false;
		}
	}


	public function actualizar($datos){
		if ($datos["imagen"]=='') {
			$this->db->set('descripcion',$datos['descripcion']);
			$this->db->set('especificacion',$datos['especificación']);
			$this->db->set('precio_venta',$datos['p_venta']);
			$this->db->set('precio_compra',$datos['p_compra']);
			$this->db->set('stock',$datos['cantidad']);
			$this->db->set('id_categoria',$datos['categoria']);
			$this->db->set('id_marca',$datos['marca']);
			$this->db->set('id_proveedor',$datos['proveedor']);
			$this->db->where('id_producto',$datos['id_producto']);
			$this->db->update('producto');

			if($this->db->affected_rows()>0){
				return "edi";
			}
		}else{
			$this->db->set('descripcion',$datos['descripcion']);
			$this->db->set('especificacion',$datos['especificación']);
			$this->db->set('precio_venta',$datos['p_venta']);
			$this->db->set('precio_compra',$datos['p_compra']);
			$this->db->set('stock',$datos['cantidad']);
			$this->db->set('imagen', $datos['imagen']);
			$this->db->set('id_categoria',$datos['categoria']);
			$this->db->set('id_marca',$datos['marca']);
			$this->db->set('id_proveedor',$datos['proveedor']);
			$this->db->where('id_producto',$datos['id_producto']);
			$this->db->update('producto');

			if($this->db->affected_rows()>0){
				return "edi";
			}
		}
		
	}	

	
}
