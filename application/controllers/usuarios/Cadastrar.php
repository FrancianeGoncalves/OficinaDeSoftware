<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastrar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MUsuario');
		$this->load->library('encryption');
	}

	public function index($error = false)
	{
		$this->load->view('usuario/cadastrar',array('error'=>$error));
	}

	public function novo(){
		$this->form_validation->set_rules('cpf', 'Cpf', 'required');
		$this->form_validation->set_rules('nome', 'Nome', 'required');
		$this->form_validation->set_rules('nome_usuario', 'Nome de Usuário', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('senha', 'Senha', 'required');
		$this->form_validation->set_rules('senha_confirmar', 'Senha de Confirmação', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->index(validation_errors());
		}
		else
		{
			$usuario = array(
				'cpf' => str_replace('-','',str_replace('.','',$this->input->post('cpf'))),
				'nome' => $this->input->post('nome'),
				'nome_usuario' => $this->input->post('nome_usuario'),
				'email' => $this->input->post('email'),
				'senha' => md5($this->input->post('senha'))
			);
			$this->MUsuario->salvar($usuario);
			redirect(base_url('Login'));
		}
	}
}
