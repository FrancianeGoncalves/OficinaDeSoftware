<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Ingrediente extends MY_Controller
{
	/**
	 *
	 */
	public function __construct()
	{
		parent::__construct();

	}

	/**
	 * @param $error
	 * @return void
	 */
	public function index($error = false)
	{
		$this->load->view('ingredientes',array("error"=>$error));
	}

}
