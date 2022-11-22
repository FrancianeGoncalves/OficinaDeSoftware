<?php

/**
 *
 */
class MIngrediente extends CI_Model {
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
		$this->table = 'ingrediente';
	}

	/**
	 * @return mixed
	 */
	public function getAll(){
		return $this->db->get($this->table)->result_object();
	}

	/**
	 * @param $ingrediente
	 * @return void
	 */
	public function salvar($ingrediente)
	{
		$this->db->insert($this->table,$ingrediente);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}

	/**
	 * @param $ingrediente
	 * @param $id
	 * @return void
	 */
	public function editar($ingrediente,$id)
	{
		$this->db->where('idingrediente',$id);
		$this->db->update($this->table, $ingrediente);

	}

	/**
	 * @param $id
	 * @return void
	 */
	public function excluir($id)
	{
		$this->db->where('idingrediente',$id);
		$this->db->delete($this->table);
	}
}

