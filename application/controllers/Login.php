<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MUsuario');
		$this->load->library('encryption');
	}

	public function index($error = false)
	{
		$this->load->view('login',array("error"=>$error));
	}

	public function loginUsuario()
	{
		try {
			$email = $this->input->post("email");
			$senha = $this->input->post("senha");
			$usuario = $this->MUsuario->get($email,$senha);
			if($usuario != null){
				$this->setUsuarioSession($usuario);
				redirect(base_url());
			}else{
				redirect(base_url('Login/index/true'));
			}
		}catch (Exception $e) {
			$dados['erro'] = "Erro no login";
		}
	}

	public function logout(){
		try {
			$this->load->database();
			$this->session->unset_userdata("login");
			$this->session->sess_destroy();// acaba a sessão
			redirect(base_url());
		}catch (Exception $e) {
			$dados['erro'] = "Erro no logout";
		}
	}
}
