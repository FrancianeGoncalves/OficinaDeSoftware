<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MUsuario');
		$this->load->library('encryption');
	}

	public function index($error = false)
	{
		$this->load->view('usuario/editar',array('error'=>$error));
	}

}
