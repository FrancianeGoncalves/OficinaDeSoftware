<?php

/**
 *
 */
class MVinculoIngrediente extends CI_Model {
	/**
	 * @var string
	 */
	public $table;

	/**
	 *
	 */
	public function __construct()
	{
		parent::__construct();
		$this->table = 'ingrediente_receita';
	}

	/**
	 * @return mixed
	 */
	public function getAllReceita($receita){
		$this->db->select('ingrediente.nome, ingrediente.observacao, ingrediente.idingrediente,
		ingrediente_receita.quantidade');
		$this->db->join('ingrediente', 'ingrediente.idingrediente = ingrediente_receita.idingrediente');
		$this->db->where('idreceita',$receita);
		return $this->db->get($this->table)->result_object();
	}

	/**
	 * @param $ingrediente
	 * @return void
	 */
	public function store($vinculo,$idIngrediente,$idReceita)
	{
		$this->db->where('idingrediente',$idIngrediente);
		$this->db->where('idreceita',$idReceita);
		$exist = $this->db->get($this->table)->row_object();
		if($exist!=null){
			$this->editar($vinculo,$idIngrediente,$idReceita);
			return true;
		}else{
			$this->salvar($vinculo);
			return false;
		}
	}

	/**
	 * @param $vinculo
	 * @return void
	 */
	public function salvar($vinculo)
	{
		$this->db->insert($this->table,$vinculo);
	}

	/**
	 * @param $ingrediente
	 * @param $id
	 * @return void
	 */
	public function editar($vinculo,$idIngrediente,$idReceita)
	{
		$this->db->where('idingrediente',$idIngrediente);
		$this->db->where('idreceita',$idReceita);
		$this->db->update($this->table, $vinculo);
	}

	/**
	 * @param $idIngrediente
	 * @param $idReceita
	 * @return void
	 */
	public function excluir($idIngrediente,$idReceita)
	{
		$this->db->where('idingrediente',$idIngrediente);
		$this->db->where('idreceita',$idReceita);
		$this->db->delete($this->table);
	}
}

