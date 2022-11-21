<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="pt-br" itemscope itemtype="http://schema.org/WebPage">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="<?= base_url('assets/material-kit/assets/img/apple-icon.png') ?>" rel="apple-touch-icon"
		  sizes="76x76"/>
	<link rel="icon" type="image/png" href="<?= base_url('assets/img/faviconTeste.png') ?>">
	<title>
		O que tem pra hoje?
	</title>
	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css"
		  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
	<!-- Nucleo Icons -->
	<link href="<?= base_url('assets/material-kit/assets/css/nucleo-icons.css') ?>" rel="stylesheet" />
	<link href="<?= base_url('assets/material-kit/assets/css/nucleo-svg.css') ?>" rel="stylesheet" />
	<!-- Font Awesome Icons -->
	<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
	<!-- Material Icons -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
	<!-- CSS Files -->
	<link id="pagestyle" href="<?=base_url('assets/material-kit/assets/css/material-kit.css?v=3.0.4')?>"
		  rel="stylesheet" />
	<script src="<?=base_url('assets/sweetalert2/dist/sweetalert2.all.js')?>"></script>
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/DataTables/datatables.min.css')?>"/>
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
		.paginate_button{
			border-radius: 20px !important;
		}
		.paginate_button current{
			background-color: #f96332 !important;
			border-color: #f96332 !important;
		}
		.tableCenter td, .tableCenter th {
			vertical-align: middle !important;
			margin: auto !important;
			text-align: center !important;
		}
		.requiredInput:after {
			content:" *" !important;
			color: #F44335 !important;
		}
		.btnWarning{
			background-color: #f96332 !important;
			border-color: #f96332 !important;
			color: white !important;
			border-radius: 20% !important;
		}
	</style>
	<script src="https://code.jquery.com/jquery-2.2.4.js"
			integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
</head>

<body class="blog-author bg-gray-200">
<input type="hidden" value="<?=base_url()?>" id="base_url">
<!-- Navbar Transparent -->
<nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3  navbar-transparent ">
	<div class="container">
		<a class="navbar-brand  text-white " href="https://demos.creative-tim.com/material-kit/presentation"
		   rel="tooltip" title="Designed and Coded by Creative Tim" data-placement="bottom" target="_blank">
			<i class="fa-solid fa-pot-food"></i>
		</a>
		<button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
				data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
				aria-label="Toggle navigation">
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
						<a href="<?=base_url('Login')?>" class="btn btn-sm  bg-gradient-warning
						mb-0 me-1 mt-2 mt-md-0">Login</a>
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
						<button class="btn bg-gradient-warning dropdown-toggle "
								type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
							HOME
						</button>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<li><a href="<?=base_url()?>" class="dropdown-item" href="#">Home</a></li>
							<li><a href="<?=base_url('Usuario/perfil')?>" class="dropdown-item"
								   href="#">Perfil</a></li>
							<?php if(intval($this->session->userdata('tipo')) == 1):?>
								<li><a href="<?=base_url('Utensilio')?>" class="dropdown-item" href="#">Gerenciar Utensílios</a></li>
							<?php endif;?>
							<li><a href="<?=base_url('Login/logout')?>" class="dropdown-item"
								   href="#">Sair</a></li>
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
	<section class="py-sm-7 py-2 position-relative">
		<div class="container">
			<div class="row">
				<div class="col-12 mx-auto">
					<div class="mt-n8 mt-md-n9 text-center">
						<img class="avatar avatar-xxl shadow-xl position-relative z-index-2"
							 src="<?=base_url('assets/img/cook-book-icon.jpg')?>" alt="bruce" loading="lazy">
					</div>
				</div>
			</div>
		</div>
		<div class=" container py-3">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<h3 class="mb-5">Receita:   <?=$receita->nome?></h3>
					</div>
				</div>
				<div class="row">
					<input type="hidden" id="uidReceita" value="<?=$receita->uid?>">
				</div>
				<div class="row">
					<div class="col-lg-8 col-sm-6">
						<div class="input-group input-group-static mb-4">
							<label>Nome</label>
							<input class="form-control nome" placeholder="Digite o Nome" type="text"
								   name="nome" id="nome" readonly
								   value="<?=$receita->nome?>">
						</div>
					</div>
					<div class="col-lg-2 col-sm-6">
						<div class="input-group input-group-static mb-4">
							<label>Rendimento</label>
							<input class="form-control rendimento" placeholder="Digite o número de porções" type="number"
								   name="rendimento" id="rendimento" required min="0" step="1"
								   value="<?=$receita->rendimento?>">
						</div>
					</div>
					<div class="col-lg-2 col-sm-6">
						<div class="input-group input-group-static mb-4">
							<label>Tempo (Minutos)</label>
							<input class="form-control tempo" placeholder="Digite o tempo para preparo"
								   type="number" min="0" step="1"
								   name="tempo" id="tempo"
								   value="<?=$receita->tempo?>" required>
						</div>
					</div>
					<div class="row">
						<div class="input-group mb-4 input-group-static">
							<label>Modo de Preparo</label>
							<textarea class="form-control"
									  style="width: 100% !important;min-height: 200px" id="modo_preparo"
							><?=$receita->modo_preparo?></textarea>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-3 col-sm-6" id="divAvatar">
							<div class="card card-blog card-background cursor-pointer">
								<div class="full-background" style="background-image: url('<?=base_url('assets/img/59fba610c9a40c61c9f26f0a1e5db912.jpg')?>')" loading="lazy"></div>
								<div class="card-body">
									<div class="content-left text-start my-auto py-4">
										<h2 class="card-title text-white">Adicione uma Imagem de sua receita</h2>
<!--										<p class="card-description text-white">Adicione uma Imagem de sua receita</p>-->
<!--										<a href="javascript:;" class="text-white text-sm icon-move-right">Leia Mais-->
<!--											<i class="fas fa-arrow-right text-xs ms-1"></i>-->
<!--										</a>-->
									</div>
								</div>
							</div>
							<button type="submit" class="btn bg-gradient-info w-100 my-4 mb-2"
									id="editarAvatar">
								<i class="fa fa-camera"></i>
								Editar Imagem</button>
						</div>
						<div class="col-lg-7 col-sm-6">

						</div>
						<div class="col-lg-2 col-sm-6">
							<div class="text-center" id="editarReceitaDiv">
								<button type="submit" class="btn bg-gradient-warning w-100 my-4 mb-2"
										id="editarReceita">Salvar</button>
								<a class="nav-link nav-link-icon me-2" id="deletar_receita">
									<i class="fa fa-trash"></i>
									<p class="d-inline text-sm z-index-1 font-weight-bold" data-bs-toggle="tooltip"
									   data-bs-placement="bottom"
									>Deletar Receita</p>
								</a>
							</div>
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
<script src="<?=base_url('assets/material-kit/assets/js/material-kit.min.js?v=3.0.4')?>"
		type="text/javascript"></script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
<script src="<?=base_url('assets/js/cpf.js')?>" type="text/javascript"></script>
<script src="<?=base_url('assets/DataTables/datatables.min.js')?>" type="text/javascript"></script>
<script src="<?=base_url('assets/js/receitas.js')?>" type="text/javascript"></script>
</body>
</html>