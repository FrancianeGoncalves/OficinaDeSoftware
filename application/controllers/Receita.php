<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Receita extends MY_Controller
{
	/**
	 *
	 */
	public function __construct()
	{
		parent::__construct();
		$this->verificarLogin();
		$this->load->model('MReceita');
	}

	/**
	 * @param $error
	 * @return void
	 */
	public function index()
	{

		$receitas = $this->MReceita->getAll();
		$dados = array(
			'receitas'=>$receitas
		);
		$this->load->view('receitas',$dados);
	}

	/**
	 * @param $error
	 * @return void
	 */
	public function receita($uid)
	{

		$receita = $this->MReceita->get($uid);
		$dados = array(
			'receita'=>$receita
		);
		$this->load->view('receita',$dados);
	}

}
