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
		$this->verificarLogin();
		$this->load->model('MIngrediente');
	}

	/**
	 * @param $error
	 * @return void
	 */
	public function index()
	{
		$this->verificarLoginAdm();
		$ingredientes = $this->MIngrediente->getAll();
		$this->load->view('ingredientes',array("ingredientes"=>$ingredientes));
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
				$ingrediente = array(
					'nome' => $this->input->post('nome'),
					'observacao' => $this->input->post('observacao')
				);
				$this->MIngrediente->salvar($ingrediente);
				echo json_encode(array("error"=>false));
			}
		}catch (Exception $e)
		{
			echo json_encode("Erro ao cadastrar ingrediente");
		}
	}

	/**
	 * @return void
	 */
	public function editar(){
		try
		{
			$this->form_validation->set_rules('nome', 'Nome', 'required');
			$validation = $this->form_validation->run();
			if($validation == FALSE)
			{
				echo json_encode(array("error"=>validation_errors()));
			}else
			{
				$ingrediente = array(
					'nome' => $this->input->post('nome'),
					'observacao' => $this->input->post('observacao')
				);
				$this->MIngrediente->editar($ingrediente,$this->input->post('id'));
				echo json_encode(array("error"=>false));
			}
		}catch (Exception $e)
		{
			echo json_encode("Erro ao editar ingrediente");
		}
	}

	/**
	 * @return void
	 */
	public function deletar(){
		try
		{
			$this->MIngrediente->excluir($this->input->post('id'));
			echo json_encode(array("error"=>false));
		}catch (Exception $e)
		{
			echo json_encode("Erro ao editar ingrediente");
		}
	}

}
