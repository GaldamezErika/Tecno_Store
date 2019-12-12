<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home_model extends CI_Model {


	public function get_productos(){

		$this->db->select('p.id_producto, p.descripcion, p.precio_venta, p.stock, p.imagen, c.nombre_categoria, m.nombre_marca');
		$this->db->from('producto p');
		$this->db->join('categoria c','c.id_categoria = p.id_categoria');
		$this->db->join('marca m','m.id_marca = p.id_marca');
		$exe = $this->db->get();

		return $exe->result();
	}


	public function get_datos($id){


		$this->db->select('p.id_producto, p.descripcion, p.especificacion, p.precio_venta, p.stock, p.imagen, c.nombre_categoria, c.id_categoria, m.nombre_marca');
		$this->db->from('producto p');
		$this->db->join('categoria c','c.id_categoria = p.id_categoria');
		$this->db->join('marca m','m.id_marca = p.id_marca');
		$this->db->where('id_producto',$id);
		$exe = $this->db->get();

		return $exe->result();
	}


	public function get_monitores(){


		$this->db->select('p.id_producto, p.descripcion, p.precio_venta, p.stock, p.imagen, c.nombre_categoria, m.nombre_marca');
		$this->db->from('producto p');
		$this->db->join('categoria c','c.id_categoria = p.id_categoria');
		$this->db->join('marca m','m.id_marca = p.id_marca');
		$this->db->where('c.id_categoria',6);
		$exe = $this->db->get();

		return $exe->result();
	}


	public function get_teclados(){


		$this->db->select('p.id_producto, p.descripcion, p.precio_venta, p.stock, p.imagen, c.nombre_categoria, m.nombre_marca');
		$this->db->from('producto p');
		$this->db->join('categoria c','c.id_categoria = p.id_categoria');
		$this->db->join('marca m','m.id_marca = p.id_marca');
		$this->db->where('c.id_categoria',7);
		$exe = $this->db->get();

		return $exe->result();
	}


	public function get_mouses(){


		$this->db->select('p.id_producto, p.descripcion, p.precio_venta, p.stock, p.imagen, c.nombre_categoria, m.nombre_marca');
		$this->db->from('producto p');
		$this->db->join('categoria c','c.id_categoria = p.id_categoria');
		$this->db->join('marca m','m.id_marca = p.id_marca');
		$this->db->where('c.id_categoria',8);
		$exe = $this->db->get();

		return $exe->result();
	}

	public function get_cpu(){


		$this->db->select('p.id_producto, p.descripcion, p.precio_venta, p.stock, p.imagen, c.nombre_categoria, m.nombre_marca');
		$this->db->from('producto p');
		$this->db->join('categoria c','c.id_categoria = p.id_categoria');
		$this->db->join('marca m','m.id_marca = p.id_marca');
		$this->db->where('c.id_categoria',9);
		$exe = $this->db->get();

		return $exe->result();
	}

	public function get_ups(){


		$this->db->select('p.id_producto, p.descripcion, p.precio_venta, p.stock, p.imagen, c.nombre_categoria, m.nombre_marca');
		$this->db->from('producto p');
		$this->db->join('categoria c','c.id_categoria = p.id_categoria');
		$this->db->join('marca m','m.id_marca = p.id_marca');
		$this->db->where('c.id_categoria',10);
		$exe = $this->db->get();

		return $exe->result();
	}

	public function get_impresoras(){


		$this->db->select('p.id_producto, p.descripcion, p.precio_venta, p.stock, p.imagen, c.nombre_categoria, m.nombre_marca');
		$this->db->from('producto p');
		$this->db->join('categoria c','c.id_categoria = p.id_categoria');
		$this->db->join('marca m','m.id_marca = p.id_marca');
		$this->db->where('c.id_categoria',11);
		$exe = $this->db->get();

		return $exe->result();
	}

	public function mPago(){

		$exe = $this->db->get('tipo_pago');
		return $exe->result();
	}

    // Ingresamos los datos a la tabla venta
	public function set_venta($datos){

		$cliente = $this->session->userdata('id');
		$factura = rand(1000,9999);
		$fecha = date("y-m-d");


		$this->db->set('n_factura',$factura);
		$this->db->set('fecha',$fecha);
		$this->db->set('id_estado',1);
		$this->db->set('id_cliente',$cliente);
		$this->db->set('id_tipo_pago',$datos);
		$this->db->insert('venta');
		$last_id = $this->db->insert_id();

		foreach($this->cart->contents() AS $key =>  $v){

			$total = $v["price"] * $v["qty"];
		
			$this->db->set('id_venta',$last_id);
			$this->db->set('id_producto',$v["id"]);
			$this->db->set('cantidad',$v["qty"]);
			$this->db->set('sub_total',$total);
			$this->db->insert('detalle_venta');

			$id_produc = $v['id'];
			$this->db->where('id_producto', $id_produc);
			$this->db->select('stock');
			$stock = $this->db->get('producto');

			$resta = $stock - $v['qty'];

			$this->db->set('stock',$resta);
			$this->db->where('id_producto', $id_produc);
			$this->db->update('producto');
		}

		$this->cart->destroy();

	}



}
