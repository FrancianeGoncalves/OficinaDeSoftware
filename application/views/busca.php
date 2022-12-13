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
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/select2/dist/css/select2.min.css')?>"/>
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

<body class="sign-in-basic">
<input type="hidden" value="<?=base_url()?>" id="base_url">
<!-- Navbar -->
<div class="container position-sticky z-index-sticky top-0"><div class="row"><div class="col-12">
			<nav class="navbar navbar-expand-lg  blur border-radius-xl top-0 z-index-fixed shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
				<div class="container-fluid">
					<a  href="<?=base_url()?>" class="navbar-brand font-weight-bolder ms-sm-3"  href="#">
						O que tem pra hoje?
					</a>
					<button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon mt-2">
				<span class="navbar-toggler-bar bar1"></span>
				<span class="navbar-toggler-bar bar2"></span>
				<span class="navbar-toggler-bar bar3"></span>
				</span>
					</button>
					<div class="collapse navbar-collapse pt-3 pb-2 py-lg-0" id="navigation">
						<ul class="navbar-nav navbar-nav-hover ms-lg-12 ps-lg-0 w-100 ">
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
							<?php else:
								if(intval($this->session->userdata('tipo')) == 1):?>
									<a class="nav-link nav-link-icon me-2" href="<?=base_url('Ingrediente')?>">
										<p class="d-inline text-sm z-index-1 font-weight-bold" data-bs-toggle="tooltip"
										   data-bs-placement="bottom"
										>Gerenciar Ingredientes</p>
									</a>
									<a class="nav-link nav-link-icon me-2" href="<?=base_url('Utensilio')?>">
										<p class="d-inline text-sm z-index-1 font-weight-bold" data-bs-toggle="tooltip"
										   data-bs-placement="bottom"
										>Gerenciar Utensílios</p>
									</a>
								<?php endif;?>
								<a class="nav-link nav-link-icon me-2" href="<?=base_url('Receita')?>">
									<p class="d-inline text-sm z-index-1 font-weight-bold" data-bs-toggle="tooltip"
									   data-bs-placement="bottom"
									>Gerenciar Receitas</p>
								</a>
								<a class="nav-link nav-link-icon me-2" href="<?=base_url('Usuario/perfil')?>">
									<p class="d-inline text-sm z-index-1 font-weight-bold" data-bs-toggle="tooltip"
									   data-bs-placement="bottom"
									>Gerenciar Perfil</p>
								</a>

								<li class="nav-item my-auto ms-lg-auto">
									<a href="<?=base_url('Login/logout')?>" class="btn btn-sm  bg-gradient-warning  mb-0 me-1 mt-2 mt-md-0">Sair</a>
								</li>
							<?php endif;?>
						</ul>
					</div>

				</div>
			</nav>
		</div></div></div>
<!-- End Navbar -->
<div class="page-header align-items-start min-vh-100 " background_attachment ="scroll" style="background-image: url('<?=base_url('assets/img/fundo2.png')?>');" loading="lazy">
	<span class="mask bg-gradient-dark opacity-6"></span>
	<div class="container my-auto">
		<div class="row mt-8 mb-10">
			<div class="col-lg-6 col-md-8 col-12 mx-auto ">
				<div class="card z-index-0 fadeIn3 fadeInBottom">
					<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
						<div class="bg-gradient-warning shadow-primary border-radius-lg py-3 pe-1">
							<div class="row h-100 d-flex align-items-center justify-content-center">
								<div class="row col-sm col-sm col-lg-6">
									<a class="text-white " href="<?=base_url()?>" rel="tooltip" title="O que tem pra hoje?" data-placement="bottom">
										<img src="<?=base_url('assets/img/now-logo.png')?>" class="img-fluid border-radius-lg" alt="Responsive image">
									</a>
								</div>
							</div>
							<div class="row h-100 d-flex align-items-center justify-content-center">
								<div class="col-sm col-sm col-lg-8">
									<form role="form" class="text-start">
										<div class="input-group input-group-static mb-4">
											<label for="exampleFormControlSelect1" class="ms-0
												text-white h5">Ingredientes</label>
											<div class="input-group input-group-static my-3" id="divUtensilio">
												<select class="form-control select_ingredientes" id="select_ingredientes"
														data-placeholder="Selecione" name="ingredientes[]" multiple="multiple">
													<!--													<option disabled selected value> Selecione os ingredientes</option>-->
													<?php foreach ($ingredientes as $ingrediente): ?>
														<option value="<?php
														echo($ingrediente->idingrediente); ?>"
														><?= $ingrediente->nome ?> <?=$ingrediente->observacao?
																	"(".$ingrediente->observacao.")":""?></option>
													<?php endforeach; ?>
												</select>
											</div>
										</div>
										<?php if(intval($this->session->userdata('login')) == 1):?>
											<div class="input-group input-group-static mb-4">
												<label for="exampleFormControlSelect1" class="
											text-white ms-0 h5">Utensílios</label>
												<select class="form-control select_utensilios" id="select_utensilios"
														data-placeholder="Selecione"  name="utensilios[]" multiple="multiple">
													<!--												<option disabled selected value> Selecione os utensílios</option>-->
													<?php foreach ($utensilios as $utensilio): ?>
														<option value="<?php
														echo($utensilio->idutensilio); ?>"
														><?= $utensilio->nome ?> <?=$utensilio->observacao?
																	"(".$utensilio->observacao.")":""?></option>
													<?php endforeach; ?>
												</select>
											</div>
										<?php endif;?>
										<!--										#E8910F-->
										<div class="row d-flex justify-content-end mb-3">
											<div class="text-center col-lg-6">
												<button type="button" style="background-color: #FF480C;color: #FFF"
														class="btn w-100 my-4 mb-2" id="pesquisarReceitas">Pesquisar</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
<!-- receitas-->
<section class="pt-5 pb-5 ">

	<div class="container" >
		<div class="row">
			<div class="col-6">
				<h3 class="mb-3">Receitas mais vistas </h3>
			</div>
			<div class="col-12">
				<div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">

					<div class="carousel-inner">
						<div class="carousel-item active">
							<div class="row">
								<?php foreach ($receitas as $receita):?>
									<div class="col-md-4 mb-3">
										<div class="card">
											<a class="d-block blur-shadow-image" style="text-align: center">
												<?php
												if(isset($receita->imagem)):?>
													<img src="<?=base_url('uploads/'.$receita->imagem)?>" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg" loading="lazy"
														 style="height: 200px;">
												<?php else:?>
													<img src="<?=base_url('assets/img/59fba610c9a40c61c9f26f0a1e5db912.jpg')?>" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg"
														 style="height: 200px;" loading="lazy">
												<?php endif;?>
											</a>
											<div class="card-body">
												<h4 class="card-title d-flex justify-content-center"><?=$receita->nome?></h4>
												<div class="row  justify-content-center">
													<h5 class="card-text fa fa-clock opacity-6 col-4"> <?=$receita->tempo?> m</h5>
													<h5 class="card-text fa fa-users opacity-6 col-3"> <?=$receita->rendimento?></h5>
													<a 	href="<?=base_url('Busca/receita/'.$receita->uid)?>"
														  class="text-warning text-sm icon-move-right">Leia Mais
														<i class="fas fa-arrow-right text-xs ms-1"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
</div>

</div>
<!--
<footer class=" mt-4 footer position-absolute bottom-2 py-2 w-100">
	<div class="container">
		<div class="row align-items-center justify-content-lg-between">
			<div class="col-12 col-md-6 my-auto">
				<div class="copyright text-center text-sm text-white text-lg-start">
					© <script>
						document.write(new Date().getFullYear())
					</script>,
					made with <i class="fa fa-heart" aria-hidden="true"></i> by
					<a href="https://www.creative-tim.com" class="font-weight-bold text-white" target="_blank">Creative Tim</a>
					for a better web.
				</div>
			</div>
		</div>
	</div>
</footer>
-->


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
<script src="<?=base_url('assets/material-kit/assets/js/material-kit.min.js?v=3.0.4')?>"
		type="text/javascript"></script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
<script src="<?=base_url('assets/js/cpf.js')?>" type="text/javascript"></script>
<script src="<?=base_url('assets/DataTables/datatables.min.js')?>" type="text/javascript"></script>
<script src="<?=base_url('assets/select2/dist/js/select2.js')?>" type="text/javascript"></script>
<script src="<?=base_url('assets/js/busca.js')?>" type="text/javascript"></script>
</body>

</html>
