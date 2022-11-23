<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Utensilio extends MY_Controller
{
	/**
	 *
	 */
	public function __construct()
	{
		parent::__construct();
		$this->verificarLogin();
		$this->load->model('MUtensilio');
	}

	/**
	 * @param $error
	 * @return void
	 */
	public function index()
	{
		$this->verificarLoginAdm();
		$utensilios = $this->MUtensilio->getAll();
		$this->load->view('utensilios',array("utensilios"=>$utensilios));
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
				$utensilio = array(
					'nome' => $this->input->post('nome'),
					'observacao' => $this->input->post('observacao')
				);
				$id=$this->MUtensilio->salvar($utensilio);
				echo json_encode(array("error"=>false,"id"=>$id));
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
			$validation = $this->form_validation->run();
			if($validation == FALSE)
			{
				echo json_encode(array("error"=>validation_errors()));
			}else
			{
				$utensilio = array(
					'nome' => $this->input->post('nome'),
					'observacao' => $this->input->post('observacao')
				);
				$this->MUtensilio->editar($utensilio,$this->input->post('id'));
				echo json_encode(array("error"=>false));
			}
		}catch (Exception $e)
		{
			echo json_encode("Erro ao editar utensilio");
		}
	}

	/**
	 * @return void
	 */
	public function deletar(){
		try
		{
			$this->MUtensilio->excluir($this->input->post('id'));
			echo json_encode(array("error"=>false));
		}catch (Exception $e)
		{
			echo json_encode("Erro ao editar utensilio");
		}
	}
}
