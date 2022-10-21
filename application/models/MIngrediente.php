<?php
class MIngrediente extends CI_Model {

	public $table;
	public function __construct()
	{
		parent::__construct();
		$this->table = 'ingrediente';
	}

	public function getAll(){
		return $this->db->get($this->table)->result_object();
	}

	public function salvar($ingrediente)
	{
		$this->db->insert($this->table,$ingrediente);
	}

	public function editar($ingrediente,$id)
	{
		$this->db->where('idingrediente',$id);
		$this->db->update($this->table, $ingrediente);
	}

	public function excluir($id)
	{
		$this->db->where('idingrediente',$id);
		$this->db->delete($this->table);
	}
}

