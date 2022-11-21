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

	/**
	 * @return void
	 */
	public function salvar(){
		try
		{
			$this->form_validation->set_rules('nome', 'Nome', 'required');
			$validation = $this->form_validation->run();
			if($validation == FALSE)
			{
				echo json_encode(array("error"=>validation_errors()));
			}else
			{
				$uid = guid();
				$receita = array(
					'nome' => $this->input->post('nome'),
					'uid' => $uid,
					'usuario_cpf' => $this->session->userdata('idUsuario')
				);
				$this->MReceita->salvar($receita);
				echo json_encode(array("error"=>false,"success"=>$uid));
			}
		}catch (Exception $e)
		{
			echo json_encode("Erro ao cadastrar utensilio");
		}
	}

	/**
	 * @return void
	 */
	public function editar(){
		try
		{
			$this->form_validation->set_rules('nome', 'Nome', 'required');
			$this->form_validation->set_rules('rendimento', 'Rendimento', 'required|integer');
			$this->form_validation->set_rules('tempo', 'Tempo', 'required|integer');
			$this->form_validation->set_rules('modo_preparo', 'Modo de Preparo', 'required');
			$validation = $this->form_validation->run();
			if($validation == FALSE)
			{
				echo json_encode(array("error"=>validation_errors()));
			}else
			{
				$receita = array(
					'nome' => $this->input->post('nome'),
					'rendimento' => $this->input->post('rendimento'),
					'tempo' => $this->input->post('tempo'),
					'modo_preparo' => $this->input->post('modo_preparo')
				);
				$this->MReceita->editar($receita,$this->input->post('uid'));
				echo json_encode(array("error"=>false));
			}
		}catch (Exception $e)
		{
			echo json_encode("Erro ao editar receita");
		}
	}

	/**
	 * @return void
	 */
	public function deletar()
	{
		$this->MReceita->excluir($this->input->post('uid'));
	}
}
