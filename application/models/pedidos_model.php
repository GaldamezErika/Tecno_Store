<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pedidos_model extends CI_Model {

	public function get_ventas(){

		$this->db->select('v.id_venta, v.n_factura, v.fecha, u.nombre, u.apellido, t.nombre_tipo_pago, e.nombre_estado, v.id_estado');
		$this->db->from('venta v');
		$this->db->join('usuario u','u.id_cliente = v.id_cliente');
		$this->db->join('tipo_pago t','t.id_tipo_pago = v.id_tipo_pago');
		$this->db->join('estado e','e.id_estado = v.id_estado');
		$this->db->order_by('v.fecha','DESC');
		$exe = $this->db->get();

		return $exe->result();

	}

	public function get_detalle_venta($id){

		$this->db->select('dv.id_venta, p.descripcion, p.especificacion, p.precio_venta, dv.cantidad, dv.sub_total');
		$this->db->from('detalle_venta dv');
		$this->db->join('producto p','p.id_producto = dv.id_producto');
		$this->db->where('dv.id_venta',$id);

		$exe = $this->db->get();

		return $exe->result();
	}


	public function estado(){

		$this->db->where('id_estado != 1');
		$exe = $this->db->get('estado');

		return $exe->result();
	}


	public function modificar($venta,$estado){

		if ($estado == 3) {

			$this->db->where('id_venta',$venta);
			$this->db->set('id_estado',$estado);
			$this->db->update('venta');

			if ($this->db->affected_rows() > 0) {
				return 'success';
			}
		}else{


			$this->db->select('cantidad, id_producto');
			$this->db->where('id_venta', $venta);
			$datos = $this->db->get('detalle_venta');
			$dv = $datos->result();

			foreach($dv as $d){


				$this->db->select('stock');
				$this->db->where('id_producto', $d->id_producto);
				$producto = $this->db->get('producto');
				$pr = $producto->row();

				$this->db->where('id_producto',$d->id_producto);
				$this->db->set('stock',$d->cantidad + $pr->stock);
				$this->db->update('producto');

				$this->db->where('id_venta',$venta);
				$this->db->delete('venta');


				if ($this->db->affected_rows() > 0) {
					return 'success';
				}
			}
		}
	}
}
