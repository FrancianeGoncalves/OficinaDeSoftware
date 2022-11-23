<?php

/**
 *
 */
class MVinculoUtensilio extends CI_Model {
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
		$this->table = 'utensilio_receita';
	}

	/**
	 * @return mixed
	 */
	public function getAllReceita($receita){
		$this->db->select('utensilio.nome, utensilio.observacao, utensilio.idutensilio');
		$this->db->join('utensilio', 'utensilio.idutensilio = utensilio_receita.idutensilio');
		$this->db->where('idreceita',$receita);
		return $this->db->get($this->table)->result_object();
	}

	/**
	 * @param $utensilio
	 * @return void
	 */
	public function store($vinculo,$idutensilio,$idReceita)
	{
		$this->db->where('idutensilio',$idutensilio);
		$this->db->where('idreceita',$idReceita);
		$exist = $this->db->get($this->table)->row_object();
		if($exist!=null){
			$this->editar($vinculo,$idutensilio,$idReceita);
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
	 * @param $utensilio
	 * @param $id
	 * @return void
	 */
	public function editar($vinculo,$idutensilio,$idReceita)
	{
		$this->db->where('idutensilio',$idutensilio);
		$this->db->where('idreceita',$idReceita);
		$this->db->update($this->table, $vinculo);
	}

	/**
	 * @param $idutensilio
	 * @param $idReceita
	 * @return void
	 */
	public function excluir($idutensilio,$idReceita)
	{
		$this->db->where('idutensilio',$idutensilio);
		$this->db->where('idreceita',$idReceita);
		$this->db->delete($this->table);
	}
}

