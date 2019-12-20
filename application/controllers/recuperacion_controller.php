<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class recuperacion_controller extends CI_Controller {


	public function index()
	{
		$data= array ('title' =>'Tecno Store');
		$this->load->view('template/header', $data);
		$this->load->view('recuperacion_view');
		$this->load->view('template/footer');
	}
}
