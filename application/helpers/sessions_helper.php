<?php

function verificarLogin(){
	if(intval($this->session->userdata('login')) != 1){
		redirect(base_url());
	}
}

function setUsuarioSession($usuario){
	$this->session->set_userdata("login", 1);
	$this->session->set_userdata("nome", $usuario->nome);
	$this->session->set_userdata("nome_usuario", $usuario->nome_usuario);
	$this->session->set_userdata("email", $usuario->email);
	//$this->session->set_userdata("tipo", $usuario->tipo);
	$this->session->set_userdata("idUsuario", $usuario->cpf);
}

?>
