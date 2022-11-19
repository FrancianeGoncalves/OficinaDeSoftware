<?php
class MReceita extends CI_Model {

	public $table;
	public function __construct()
	{
		parent::__construct();
		$this->table = 'receita';
	}

	public function salvar($receita)
	{
		$this->db->insert($this->table,$receita);
	}

	public function getAll()
	{
		if(intval($this->session->userdata('tipo')) != 1){
			$this->db->where('usuario_cpf',$this->session->userdata('idUsuario'));
		}
		return $this->db->get($this->table)->result_object();
	}

	public function get($uid)
	{
		$this->db->where('uid',$uid);
		return $this->db->get($this->table)->row_object();
	}
}

