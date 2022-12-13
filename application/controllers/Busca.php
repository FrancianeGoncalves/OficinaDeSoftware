<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Busca extends CI_Controller {
	/**
	 *
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('MUtensilio');
		$this->load->model('MIngrediente');
		$this->load->model('MReceita');
		$this->load->model('MVinculoIngrediente');
		$this->load->model('MVinculoUtensilio');
	}
	public function index()
	{
		$ingredientes = $this->MIngrediente->getAll();
		$utensilios = $this->MUtensilio->getAll();
		$receitas = $this->MReceita->getAll(9,'testar');
		$dados = array(
			'receitas'=> $receitas,
			'ingredientes' => $ingredientes,
			'utensilios'=> $utensilios
		);
		$this->load->view('busca',$dados);
	}

	public function buscar(){
		try {
			$ingredientes =  $this->input->post('ingredientes');
			$utensilios =  $this->input->post('utensilios');
			$receitas = $this->MReceita->busca($ingredientes,$utensilios);
			if(!$receitas)
			{
				echo json_encode(array("error"=>"Nenhuma receita encontrada"));
			}else
			{
				$receitas = $this->getDadosReceitas($receitas,$ingredientes,$utensilios);
				$this->session->set_userdata("receitas",  json_encode($receitas));
				echo json_encode(array("error"=>false));
			}
		}catch (Exception $e)
		{
			echo json_encode("Erro ao buscar receitas");
		}

	}

	protected function getDadosReceitas($receitas,$ingredientes,$utensilios){
		$dados = array();
		foreach ($receitas as $receita){
			$resultado = $this->MReceita->getReceitaDados($receita->idreceita,$ingredientes,$utensilios);
			$compatibilidadeIngrediente = 0;
			$compatibilidadeUtensilio = 0;
			if($resultado->numero_ingredientes_select && $resultado->numero_ingredientes){
				$compatibilidadeIngrediente = (floatval($resultado->numero_ingredientes_select)/floatval($resultado->numero_ingredientes))*100;
			}
			if($resultado->numero_utensilios_select && $resultado->numero_utensilios){
				$compatibilidadeUtensilio +=(floatval($resultado->numero_utensilios_select)/floatval($resultado->numero_utensilios))*100;
			}
			$dados[] = array(
				"receita" => $resultado,
				"compatibilidadeIngrediente" =>$compatibilidadeIngrediente,
				"compatibilidadeUtensilio" => $compatibilidadeUtensilio
			);
		}
		$compatibilidades  = array_column($dados, 'compatibilidadeIngrediente');
		array_multisort($compatibilidades,SORT_DESC,$dados);
		return $dados;
	}

	public function listResultado(){
		try
		{
			if(!array_key_exists('receitas', $_SESSION)){
				redirect(base_url());
			}
			$receitas = json_decode($_SESSION['receitas']);
			$dados = array(
				'receitas' => $receitas
			);
			$this->load->view('listar',$dados);
		}catch (Exception $e)
		{
			echo json_encode("Erro ao buscar receitas");
		}
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
			'ingredientes_vincular'=>null,
			'utensilios_vincular'=>null,
			'update'=> 0
		);
		$this->load->view('receita',$dados);
	}
}
