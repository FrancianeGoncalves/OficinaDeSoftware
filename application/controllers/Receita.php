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
		$this->load->model('MUtensilio');
		$this->load->model('MIngrediente');
		$this->load->model('MVinculoIngrediente');
		$this->load->model('MVinculoUtensilio');
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
			'receita'=>$receita,
			'ingredientes'=>$this->MVinculoIngrediente->getAllReceita($receita->idreceita),
			'utensilios'=>$this->MVinculoUtensilio->getAllReceita($receita->idreceita),
			'ingredientes_vincular'=>$this->MIngrediente->getAll(),
			'utensilios_vincular'=>$this->MUtensilio->getAll($receita->idreceita),
			'update'=> 1
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
					'usuario_cpf' => $this->session->userdata('idUsuario'),
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

	/**
	 * Ingredientes da Receita:
	 */

	/**
	 * @return void
	 */
	public function vincularIngrediente(){
		try
		{
			$this->form_validation->set_rules('ingrediente', 'Ingrediente', 'required');
			$this->form_validation->set_rules('medida', 'Medida', 'required');
			$validation = $this->form_validation->run();
			if($validation == FALSE)
			{
				echo json_encode(array("error"=>validation_errors()));
			}else
			{
				$vinculo = array(
					'idingrediente' => $this->input->post('ingrediente'),
					'idreceita' => $this->input->post('receita'),
					'quantidade' => $this->input->post('medida'),
				);
				$update = $this->MVinculoIngrediente->store($vinculo,$this->input->post('ingrediente'),
					$this->input->post('receita'));
				echo json_encode(array("error"=>false,"update"=>$update));
			}
		}catch (Exception $e)
		{
			echo json_encode("Erro ao cadastrar utensilio");
		}
	}

	/**
	 * @return void
	 */
	public function deletarVinculoIngrediente(){
		try
		{
			$this->MVinculoIngrediente->excluir($this->input->post('idingrediente'),$this->input->post('idreceita'));
			echo json_encode(array("error"=>false));
		}catch (Exception $e)
		{
			echo json_encode("Erro ao cadastrar utensilio");
		}
	}

	/**
	 * Utensilios da Receita:
	 */

	/**
	 * @return void
	 */
	public function vincularUtensilio(){
		try
		{
			$this->form_validation->set_rules('utensilio', 'Utensilio', 'required');
			$validation = $this->form_validation->run();
			if($validation == FALSE)
			{
				echo json_encode(array("error"=>validation_errors()));
			}else
			{
				$vinculo = array(
					'idutensilio' => $this->input->post('utensilio'),
					'idreceita' => $this->input->post('receita'),
				);
				$update = $this->MVinculoUtensilio->store($vinculo,$this->input->post('utensilio'),
					$this->input->post('receita'));
				echo json_encode(array("error"=>false,"update"=>$update));
			}
		}catch (Exception $e)
		{
			echo json_encode("Erro ao cadastrar utensilio");
		}
	}

	/**
	 * @return void
	 */
	public function deletarVinculoUtensilio(){
		try
		{
			$this->MVinculoUtensilio->excluir($this->input->post('idutensilio'),$this->input->post('idreceita'));
			echo json_encode(array("error"=>false));
		}catch (Exception $e)
		{
			echo json_encode("Erro ao cadastrar utensilio");
		}
	}

	/**
	 *
	 */
	public function uploadImg()
	{
		try {
			$path = "./uploads";

			if ( ! is_dir($path)) {
				mkdir($path, 0777, $recursive = true);
			}
			$uid = guid();
			$configUpload['upload_path'] = $path;
			$configUpload['file_name'] = $_FILES['arquivo']['name'];;
			$configUpload['allowed_types'] = 'pdf|PDF|png|jpeg|jpg';

			$this->load->library('upload', $configUpload);

			if (!$this->upload->do_upload('arquivo')) {
				echo json_encode(array("error"=>"Erro no upload do arquivo, verifique a extenção da imagem!"));
			} else {
				$data = $this->upload->data();
				$receita = array(
					'imagem' => $data['file_name']
				);
				$this->MReceita->editar($receita,$this->input->post('uid'));
				echo json_encode(array("error"=>false));
			}

		}catch (\Exception $e){
			echo json_encode(array("error"=>"Erro no upload do Arquivo!"));
		}
	}
}
