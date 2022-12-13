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
	public function getAll($limit = null,$testeUser = null)
	{
		if(intval($this->session->userdata('tipo')) != 1 && $testeUser == null){
			$this->db->where('usuario_cpf',$this->session->userdata('idUsuario'));
		}
		if ($limit!=null){
			$this->db->order_by('rand()');
			$this->db->limit($limit);
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

	/**
	 * @param $ingredientes
	 * @param $utensilios
	 * @return mixed
	 */
	public function busca($ingredientes,$utensilios)
	{
		$query = "SELECT  r.idreceita  FROM receita as r
			left join ingrediente_receita as ir on ir.idreceita = r.idreceita
			left join utensilio_receita as ur on ur.idreceita = r.idreceita
		where ir.idingrediente in (".$ingredientes.") or ur.idutensilio in (".$utensilios.")
		group by r.idreceita;";
		return $this->db->query($query)->result_object();
	}

	public function getReceitaDados($id,$ingredientes,$utensilios){
		$query = "
		select receita.*,
			 (
			SELECT count(*) FROM receita as r
						left join ingrediente_receita as ir on ir.idreceita = r.idreceita
			where r.idreceita = ".$id."
			) as numero_ingredientes,
			(
			SELECT count(*) FROM receita as r
						left join ingrediente_receita as ir on ir.idreceita = r.idreceita
			where r.idreceita =  ".$id." and  ir.idingrediente in ( ".$ingredientes.") 
			) as numero_ingredientes_select,
			(
			SELECT count(*) FROM receita as r
						left join utensilio_receita as ur on ur.idreceita = r.idreceita
			where r.idreceita =  ".$id."
			) as numero_utensilios,
			(
			SELECT count(*) FROM receita as r
						left join utensilio_receita as ur on ur.idreceita = r.idreceita
			where r.idreceita =  ".$id." and  ur.idutensilio in ( ".$utensilios.")
			) as numero_utensilios_select
				from receita where receita.idreceita =  ".$id.";
		";
		return $this->db->query($query)->row_object();
	}


}

