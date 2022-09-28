<?php

class MY_Controller extends CI_Controller 
{

	protected $tipo;

	public function __construct()
	{
		parent::__construct();
		$this->CI = get_instance();
		$this->load->library("session");
	}

	public function verificarLogin(){
		if(intval($this->session->userdata('login')) != 1)
		{
			redirect(base_url());
		}
	}
	
	public function setUsuarioSession($usuario)
	{
		$this->session->set_userdata("login", 1);
		$this->session->set_userdata("nome", $usuario->nome);
		$this->session->set_userdata("nome_usuario", $usuario->nome_usuario);
		$this->session->set_userdata("email", $usuario->email);
		//$this->session->set_userdata("tipo", $usuario->tipo);
		$this->session->set_userdata("idUsuario", $usuario->cpf);
	}

	public function setMsgFlash($msg,$type = 'validada'){
		$msg = array($msg);
		$this->CI->session->set_flashdata($type, $msg);
	}
	
	public function clearSession()
	{
		$this->load->database();
		$this->session->unset_userdata("login");
		$this->session->sess_destroy();// acaba a sessão
	}

}
