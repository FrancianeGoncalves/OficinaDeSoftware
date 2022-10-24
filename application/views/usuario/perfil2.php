<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="pt-br" itemscope itemtype="http://schema.org/WebPage">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="<?= base_url('assets/material-kit/assets/img/apple-icon.png') ?>" rel="apple-touch-icon" sizes="76x76"/>
	<link rel="icon" type="image/png" href="<?= base_url('assets/img/faviconTeste.png') ?>">
	<title>
		O que tem pra hoje?
	</title>
	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
	<!-- Nucleo Icons -->
	<link href="<?= base_url('assets/material-kit/assets/css/nucleo-icons.css') ?>" rel="stylesheet" />
	<link href="<?= base_url('assets/material-kit/assets/css/nucleo-svg.css') ?>" rel="stylesheet" />
	<!-- Font Awesome Icons -->
	<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
	<!-- Material Icons -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
	<!-- CSS Files -->
	<link id="pagestyle" href="<?=base_url('assets/material-kit/assets/css/material-kit.css?v=3.0.4')?>" rel="stylesheet" />
	<script src="<?=base_url('assets/sweetalert2/dist/sweetalert2.all.js')?>"></script>
	<link href="<?= base_url('assets/croppie/croppie.min.css?v=2') ?>" rel="stylesheet"/>
	<style>
		a:hover{
			color: #FF480C !important;

		}
		#msg_error{
			color: #000000 !important;
		}
		a{
			cursor: pointer !important;
		}
	</style>
	<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
</head>

<body class="blog-author bg-gray-200">
<input type="hidden" id="urlBase" value="<?=base_url()?>">
<!-- Navbar Transparent -->
<nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3  navbar-transparent ">
	<div class="container">
		<a class="navbar-brand  text-white " href="https://demos.creative-tim.com/material-kit/presentation" rel="tooltip" title="Designed and Coded by Creative Tim" data-placement="bottom" target="_blank">
			<i class="fa-solid fa-pot-food"></i>
		</a>
		<button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon mt-2">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </span>
		</button>
		<div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0 ms-lg-12 ps-lg-5" id="navigation">
			<ul class="navbar-nav navbar-nav-hover ms-auto">
				<?php if(intval($this->session->userdata('login')) != 1):?>
					<li class="nav-item ms-lg-auto">
						<a class="nav-link nav-link-icon me-2" href="<?=base_url('Usuario/cadastrar')?>">
							<i class="fa fa-user-plus me-1"></i>
							<p class="d-inline text-sm z-index-1 font-weight-bold" data-bs-toggle="tooltip"
							   data-bs-placement="bottom"
							>Cadastre-se</p>
						</a>
					</li>
					<li class="nav-item my-auto ms-3 ms-lg-0">
						<a href="<?=base_url('Login')?>" class="btn btn-sm  bg-gradient-warning  mb-0 me-1 mt-2 mt-md-0">Login</a>
					</li>
				<?php else:?>
					<!--<li class="nav-item my-auto ms-3 ms-lg-0">
						<a href="<?=base_url('Usuario/perfil')?>" class="btn btn-sm  bg-gradient-warning  mb-0 me-1 mt-2 mt-md-0">
							<i class="fa fa-user me-1"></i>
							Perfil</a>
					</li>
					<li class="nav-item my-auto ms-3 ms-lg-0">
						<a href="<?=base_url('Login/logout')?>" class="btn btn-sm  bg-gradient-warning  mb-0 me-1 mt-2 mt-md-0">
							<i class="fa fa-trash me-1"></i>
							Sair</a>
					</li>-->
					<div class="dropdown">
						<button class="btn bg-gradient-warning dropdown-toggle " type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
						HOME
						</button>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<li><a href="<?=base_url()?>" class="dropdown-item" href="#">Home</a></li>
							<li><a href="<?=base_url('Ingrediente')?>" class="dropdown-item" href="#">Gerenciar Ingredientes</a></li>
							<li><a href="<?=base_url('Utensilio')?>" class="dropdown-item" href="#">Gerenciar Utensílios</a></li>
							<!--<li><a class="dropdown-item" href="#">Configurações</a></li>-->
							<li><a href="<?=base_url('Login/logout')?>" class="dropdown-item" href="#">Sair</a></li>
						</ul>
					</div>
				<?php endif;?>
			</ul>
		</div>
	</div>
</nav>
<!-- End Navbar -->
<!-- -------- START HEADER 4 w/ search book a ticket form ------- -->
<header>
	<div class="page-header min-height-400" style="background-image: url(<?=base_url('assets/img/fundo2.png')?>);" loading="lazy">
		<span class="mask bg-gradient-dark opacity-8"></span>
	</div>
</header>
<!-- -------- END HEADER 4 w/ search book a ticket form ------- -->
<div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n6 mb-4">
	<!-- START Testimonials w/ user image & text & info -->
	<section class="py-sm-7 py-5 position-relative">
		<div class="container">
			<div class="row">
				<div class="col-12 mx-auto">
					<div class="mt-n8 mt-md-n9 text-center">
						<?php
						if(isset($usuario->avatar)):?>
						<img class="avatar avatar-xxl shadow-xl position-relative z-index-2" src="<?=$usuario->avatar?>" alt="bruce" loading="lazy">
						<?php else:?>
						<img class="avatar avatar-xxl shadow-xl position-relative z-index-2" src="<?=base_url('assets/img/59fba610c9a40c61c9f26f0a1e5db912.jpg')?>" alt="bruce" loading="lazy">
						<?php endif;?>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<h3 class="mb-5"><?=$usuario->nome_usuario?></h3>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4 col-sm-6">
							<div class="input-group input-group-static mb-4">
								<label>CPF</label>
								<input class="form-control cpf" placeholder="Digite o cpf" type="text"
									   name="cpf" id="cpf" readonly
									   value="<?=$usuario->cpf?>">
							</div>
						</div>
						<div class="col-lg-4 col-sm-6">
							<div class="input-group input-group-static mb-4">
								<label>Nome</label>
								<input class="form-control nome" placeholder="Digite o nome" type="text"
									   name="nome" id="nome" required
									   value="<?=$usuario->nome?>">
							</div>
						</div>
						<div class="col-lg-4 col-sm-6">
							<div class="input-group input-group-static mb-4">
								<label>Nome de Usuário</label>
								<input class="form-control nome_usuario" placeholder="Digite um nome de usuário"
									   type="text"
									   name="nome_usuario" id="nome_usuario"
									   value="<?=$usuario->nome_usuario?>" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4 col-sm-6">
							<div class="input-group input-group-static mb-4">
								<label>E-mail</label>
								<input class="form-control email" placeholder="Digite o email" type="email"
									   name="email" id="email" required
									   value="<?=$usuario->email?>" >
							</div>
						</div>
						<div class="col-lg-4 col-sm-6">
							<div class="input-group input-group-static mb-4">
								<label>Senha</label>
								<input type="password" class="form-control" name="senha" id="senha"
									   value="<?=$usuario->senha?>" required placeholder="Digite a senha">
							</div>
						</div>
						<div class="col-lg-4 col-sm-6">
							<div class="input-group input-group-static mb-4">
								<label>Confirme a Senha</label>
								<input type="password" class="form-control" name="senha_confirmar"
									   id="senha_confirmar" required placeholder="Digite a senha novamente">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-2 col-sm-6" id="divAvatar">
							<button type="submit" class="btn bg-gradient-info w-100 my-4 mb-2"
									id="editarAvatar">
								<i class="fa fa-camera"></i>
								Editar Imagem</button>
						</div>
						<div class="col-lg-8 col-sm-6">

						</div>
						<div class="col-lg-2 col-sm-6">
							<div class="text-center" id="editarUsuarioDiv">
								<button type="submit" class="btn bg-gradient-warning w-100 my-4 mb-2"
										id="editarUsuario">Salvar</button>
								<a class="nav-link nav-link-icon me-2" id="deletar_usuario">
									<i class="fa fa-trash"></i>
									<p class="d-inline text-sm z-index-1 font-weight-bold" data-bs-toggle="tooltip"
									   data-bs-placement="bottom"
									>Deletar conta</p>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- END Testimonials w/ user image & text & info -->
	<!-- START Blogs w/ 4 cards w/ image & text & link -->
	<section class="py-3">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<h3 class="mb-5">Receitas:</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-3 col-md-12 col-12">
					<div class="card card-blog card-background cursor-pointer">
						<div class="full-background" style="background-image: url('<?=base_url('assets/img/59fba610c9a40c61c9f26f0a1e5db912.jpg')?>')" loading="lazy"></div>
						<div class="card-body">
							<div class="content-left text-start my-auto py-4">
								<h2 class="card-title text-white">Cadastre Novas Receitas</h2>
								<p class="card-description text-white">Colabore para que todos os usuários encontre receitas
									com os ingredientes que possuem.</p>
								<a href="javascript:;" class="text-white text-sm icon-move-right">Leia Mais
									<i class="fas fa-arrow-right text-xs ms-1"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="card card-plain">
						<div class="card-header p-0 position-relative">
							<a class="d-block blur-shadow-image">
								<img src="https://p2.trrsf.com/image/fget/cf/648/0/images.terra.com/2022/07/15/1018774879-receitasparacriancas-paodequeijo.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg" loading="lazy">
							</a>
						</div>
						<div class="card-body px-0">
							<h5>
								<a href="javascript:;" class="text-dark font-weight-bold">Pão de Queijo</a>
							</h5>
							<p>
								500 g de polvilho doce<br>
								1 ou 2 ovos<br>
								250 ml de leite integral<br>
								1/2 copo de óleo<br>
								1 colher/sopa rasa de sal...<br>
							</p>
							<a href="javascript:;" class="text-info text-sm icon-move-right">Ler Mais
								<i class="fas fa-arrow-right text-xs ms-1"></i>
							</a>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="card card-plain">
						<div class="card-header p-0 position-relative">
							<a class="d-block blur-shadow-image">
								<img src="https://p2.trrsf.com/image/fget/cf/648/0/images.terra.com/2022/07/15/1992932943-receitasparacriancas-cachorroquente.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg" loading="lazy">
							</a>
						</div>
						<div class="card-body px-0">
							<h5>
								<a href="javascript:;" class="text-dark font-weight-bold">Cachorro quente no espeto</a>
							</h5>
							<p>
								25 salsichas<br>
								25 palitos de churrasco<br>
								1 rolo de massa de pastel (500g)<br>
								1 clara para pincelar<br>
								Óleo para fritar...<br>
							</p>
							<a href="javascript:;" class="text-info text-sm icon-move-right">Ler Mais
								<i class="fas fa-arrow-right text-xs ms-1"></i>
							</a>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="card card-plain">
						<div class="card-header p-0 position-relative">
							<a class="d-block blur-shadow-image">
								<img src="https://p2.trrsf.com/image/fget/cf/648/0/images.terra.com/2022/07/15/456309814-receitasparacriancas-batata.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg" loading="lazy">
							</a>
						</div>
						<div class="card-body px-0">
							<h5>
								<a href="javascript:;" class="text-dark font-weight-bold">Batata Frita</a>
							</h5>
							<p>
								Batatas (quantidade a gosto) cortadas em palitos<br>
								1 frigideira com óleo o sufisciente para cobrir as batatas<br>
								1/2 colher (sopa) de amido de milho...<br>
							</p>
							<a href="javascript:;" class="text-info text-sm icon-move-right">Ler Mais
								<i class="fas fa-arrow-right text-xs ms-1"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- END Blogs w/ 4 cards w/ image & text & link -->
</div>
<!-- -------- START FOOTER 5 w/ DARK BACKGROUND ------- -->
<footer class="footer py-5">
	<div class="container z-index-1 position-relative">
		<div class="row">
			<div class="col-lg-4 me-auto mb-lg-0 mb-4 text-lg-start text-center">
			</div>
			<div class="col-lg-6 ms-auto text-lg-end text-center">
				<p class="text-sm text-dark opacity-8 mb-0">
					FFHL © <script>
						document.write(new Date().getFullYear())
					</script> Desenolvido por Franciane, Francisco, Hugo e Luan.
				</p>
			</div>
		</div>
	</div>
</footer>
<!-- Modal -->
<div class="modal fade" id="modalAvatar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Avatar</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="hidden" id="cpf" name="cpf" value="<?=$usuario->cpf?>">
				<div class="row">
					<div class="col-md-12">
						<div id="uploadCroppieUser"></div>
					</div>
				</div>
				<div class="row">
					<form method="POST" id="formImgHeader"  enctype="multipart/form-data">
						<div class="input-group">
							<input type="file" class="form-control imagePerfilUser" id="inputGroupFile04"
								   aria-describedby="inputGroupFileAddon04" aria-label="Upload"
								   name="arquivoImg" required="Campo Obrigatorio">
						</div>
						<small>Arquivos aceitos: png ou jpeg</small>
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<?php if($usuario->avatar):?>
					<button type="button" class="btn bg-gradient-warning apagarAvatar" id="apagarAvatar">
						Apagar Avatar Atual</button>
				<?php endif;?>
				<button type="button" class="btn bg-gradient-success saveAvatar" id="saveAvatar">
					Salvar</button>
				<button type="button" class="btn bg-gradient-danger" data-bs-dismiss="modal">Fechar</button>
			</div>
		</div>
	</div>
</div>
<!-- -------- END FOOTER 5 w/ DARK BACKGROUND ------- -->
<!--   Core JS Files   -->
<script src="<?=base_url('assets/material-kit/assets/js/core/popper.min.js" type="text/javascript')?>"></script>
<script src="<?=base_url('assets/material-kit/assets/js/core/bootstrap.min.js" type="text/javascript')?>"></script>
<script src="<?=base_url('assets/material-kit/assets/js/plugins/perfect-scrollbar.min.js')?>"></script>
<!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
<script src="<?=base_url('assets/material-kit/assets/js/plugins/parallax.min.js')?>"></script>
<!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
<script src="<?=base_url('assets/material-kit/assets/js/material-kit.min.js?v=3.0.4')?>" type="text/javascript"></script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
<script src="<?=base_url('assets/js/cpf.js')?>" type="text/javascript"></script>
<script src="<?=base_url('assets/js/perfil.js')?>" type="text/javascript"></script>
<script src="<?= base_url('assets/croppie/croppie.js?v=3') ?>"></script>
<script src="<?=base_url('assets/js/croppie.js')?>" type="text/javascript"></script></body>
</html>
