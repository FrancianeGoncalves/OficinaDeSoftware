<?php
class MUsuario extends CI_Model {

	public $table;
	public function __construct()
	{
		parent::__construct();
		$this->table = 'usuario';
	}

	public function salvar($usuario)
	{
		$this->db->insert($this->table,$usuario);
	}

	public function get($email,$senha)
	{
		$this->db->where('email',$email);
		$this->db->where('senha',$senha);
		return $this->db->get($this->table)->row_object();
	}

	public function geByCpf($cpf)
	{
		$this->db->where('cpf',$cpf);
		return $this->db->get($this->table)->row_object();
	}

	public function editar($usuario,$cpf = null)
	{
		if($cpf == null){
			$cpf = $this->session->userdata('idUsuario');
		}
		$this->db->where('cpf',$cpf);
		$this->db->update($this->table, $usuario);
	}

	public function excluir($cpf = null)
	{
		if($cpf == null)
		{
			$cpf = $this->session->userdata('idUsuario');
		}
		$this->db->where('cpf',$cpf);
		$this->db->delete($this->table);
	}
}

