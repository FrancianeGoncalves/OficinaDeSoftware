<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Login extends MY_Controller 
{
	/**
	 * 
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('MUsuario');
		$this->load->library('encryption');
	}

	/**
	 * @param $error
	 * @return void
	 */
	public function index($error = false)
	{
		$this->load->view('login',array("error"=>$error));
	}

	/**
	 * @return void
	 */
	public function loginUsuario()
	{
		try 
		{
			$email = $this->input->post("email");
			$senha = $this->input->post("senha");
			$usuario = $this->MUsuario->get($email,$senha);
			if($usuario != null)
			{
				$this->setUsuarioSession($usuario);
				redirect(base_url());
			}else
			{
				redirect(base_url('Login/index/true'));
			}
		}catch (Exception $e) 
		{
			$dados['erro'] = "Erro no login";
		}
	}

	/**
	 * @return void
	 */
	public function logout()
	{
		try 
		{
			$this->clearSession();
			redirect(base_url());
		}catch (Exception $e) 
		{
			$dados['erro'] = "Erro no logout";
		}
	}
}
