<?php
class MReceita extends CI_Model {

	public $table;
	public function __construct()
	{
		parent::__construct();
		$this->table = 'receita';
	}

	/**
	 * @param $receita
	 * @return void
	 */
	public function salvar($receita)
	{
		$this->db->insert($this->table,$receita);
	}

	/**
	 * @return mixed
	 */
	public function getAll()
	{
		if(intval($this->session->userdata('tipo')) != 1){
			$this->db->where('usuario_cpf',$this->session->userdata('idUsuario'));
		}
		return $this->db->get($this->table)->result_object();
	}

	/**
	 * @param $uid
	 * @return mixed
	 */
	public function get($uid)
	{
		$this->db->where('uid',$uid);
		return $this->db->get($this->table)->row_object();
	}

	/**
	 * @param $receita
	 * @param $id
	 * @return void
	 */
	public function editar($receita,$id)
	{
		$this->db->where('uid',$id);
		$this->db->update($this->table, $receita);
	}

	/**
	 * @param $id
	 * @return void
	 */
	public function excluir($id)
	{
		$this->db->where('uid',$id);
		$this->db->delete($this->table);
	}
}

