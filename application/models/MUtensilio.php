<?php
/**
 *
 */
class MUtensilio extends CI_Model {

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
		$this->table = 'utensilio';
	}

	/**
	 * @return mixed
	 */
	public function getAll($vincular = null){
		if($vincular == null){
			$this->db->order_by('nome','ASC');
			return $this->db->get($this->table)->result_object();
		}else{
			$query = " select * from utensilio where idutensilio not in 
                               (select idutensilio from utensilio_receita where idreceita = ".$vincular.")";
			return $this->db->query($query)->result_object();
		}

	}

	/**
	 * @param $utensilio
	 * @return void
	 */
	public function salvar($utensilio)
	{
		$this->db->insert($this->table,$utensilio);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}

	/**
	 * @param $utensilio
	 * @param $id
	 * @return void
	 */
	public function editar($utensilio,$id)
	{
		$this->db->where('idutensilio',$id);
		$this->db->update($this->table, $utensilio);
	}

	/**
	 * @param $id
	 * @return void
	 */
	public function excluir($id)
	{
		$this->db->where('idutensilio',$id);
		$this->db->delete($this->table);
	}
}

