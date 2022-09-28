<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Classe Usuario
 */
class Usuario extends MY_Controller 
{

	/**
	 * construct usuário
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
		try 
		{
			$this->load->view('usuario/cadastrar',array('error'=>$error));
		}catch (Exception $e) 
		{
			$dados['erro'] = "";
		}
	}

	/**
	 * @param $error
	 * @return void
	 */
	public function cadastrar($error = false)
	{
		try 
		{
			$this->load->view('usuario/cadastrar',array('error'=>$error));
		}catch (Exception $e) 
		{
			$dados['erro'] = "";
		}
	}

	/**
	 * @return void
	 */
	public function perfil()
	{
		try 
		{
			$this->verificarLogin();
			$usuario = $this->MUsuario->geByCpf($this->session->userdata('idUsuario'));
			$this->load->view('usuario/perfil',array("validada" => $this->session->flashdata('validada'),
				"naovalidada" => $this->session->flashdata('naovalidada'),'usuario'=>$usuario));
		}catch (Exception $e) 
		{
			$dados['erro'] = "";
		}
	}

	/**
	 * @return void
	 */
	public function novo()
	{
		try
		{
			$this->form_validation->set_rules('cpf', 'Cpf', 'required|is_unique[usuario.cpf]');
			$this->form_validation->set_rules('email', 'Email', 'required|is_unique[usuario.email]');
			$validation = $this->validationForm();
			if($validation == FALSE)
			{
				$this->cadastrar(validation_errors());
			}else
			{
				$usuario = $this->setArray();
				$this->MUsuario->salvar($usuario);
				redirect(base_url('Login'));
			}
		}catch (Exception $e) 
		{
			$dados['erro'] = "";
		}
	}

	/**
	 * @return void
	 */
	public function editar()
	{
		try 
		{
			if($this->input->post('email') == $this->session->userdata('email'))
			{
				$this->form_validation->set_rules('email', 'Email', 'required');
			}else
			{
				$this->form_validation->set_rules('email', 'Email', 'required|is_unique[usuario.email]');
			}
			$validation = $this->validationForm();
			if($validation == FALSE)
			{
				$this->setMsgFlash(validation_errors(),'naovalidada');
				redirect(base_url('Usuario/perfil/'));
			}else
			{
				$usuario = $this->setArray();
				$this->MUsuario->editar($usuario);
				$this->verificarLogin();
				$usuario = $this->MUsuario->geByCpf($usuario['cpf']);
				$this->setUsuarioSession($usuario);
				redirect(base_url('Usuario/perfil'));
			}
		}catch (Exception $e) 
		{
			$dados['erro'] = "";
		}
	}

	/**
	 * @return void
	 */
	protected function validationForm()
	{
		/**
		 *por outras validações como se senhas confere
		 */
		try 
		{
			$this->form_validation->set_rules('nome', 'Nome', 'required');
			$this->form_validation->set_rules('nome_usuario', 'Nome de Usuário', 'required');
			$this->form_validation->set_rules('senha', 'Senha', 'required');
			$this->form_validation->set_rules('senha_confirmar', 'Senha de Confirmação', 'required|matches[senha]');
			return $this->form_validation->run();
		}catch (Exception $e) 
		{
			$dados['erro'] = "";
		}
	}

	/**
	 * @return array
	 */
	protected function setArray()
	{
		try 
		{
			$cpf = $this->input->post('cpf') ? $this->input->post('cpf'): $this->session->userdata('idUsuario');
			return array(
				'cpf' => $cpf,
				'nome' => $this->input->post('nome'),
				'nome_usuario' => $this->input->post('nome_usuario'),
				'email' => $this->input->post('email'),
				'senha' => $this->input->post('senha')
			);
		}catch (Exception $e) 
		{
			$dados['erro'] = "";
		}
	}

	/**
	 * @return void
	 */
	public function deletar()
	{
		$this->MUsuario->excluir();
		$this->clearSession();
	}
}
