<?php
class MUsuario extends CI_Model {

	public $nome_table;
	public function __construct()
	{
		parent::__construct();
		$this->name_table = 'usuario';
	}

	public function salvar($usuario){
		$this->db->insert($this->name_table,$usuario);
	}
}

