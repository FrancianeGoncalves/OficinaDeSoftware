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
								>Gerenciar Utens??lios</p>
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
						<img class="avatar avatar-xxl shadow-xl position-relative z-index-2" src="<?=base_url('assets/img/59fba610c9a40c61c9f26f0a1e5db912.jpg')?>" alt="bruce" loading="lazy">
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
				<?php foreach ($receitas as $receita):?>
				<div class="col-lg-3 col-sm-6">
					<div class="card card-plain">
						<div class="card-header p-0 position-relative">
							<a class="d-block blur-shadow-image"  style="text-align: center !important;">
								<?php
								if(isset($receita->receita->imagem)):?>
									<img src="<?=base_url('uploads/'.$receita->receita->imagem)?>" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg" loading="lazy"
									style="max-height: 200px;">
								<?php else:?>
									<img src="<?=base_url('assets/img/59fba610c9a40c61c9f26f0a1e5db912.jpg')?>" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg" loading="lazy">
								<?php endif;?>
							</a>
						</div>
						<div class="card-body px-0">
							<h5>
								<a href="javascript:;" class="text-dark font-weight-bold"
								><?=$receita->receita->nome?></a>
							</h5>
							<p>
							<h6 class=" fa fa-users"></h6>	Rendimento: <?=$receita->receita->rendimento?> por????es<br>
							<h6 class=" fa fa-clock"></h6>	Tempo (Minutos): <?=$receita->receita->tempo?><br>
							<h6 class=" fa fa-check"></h6>	<?php echo "Voc?? possui ".$receita->receita->numero_ingredientes_select." de ".$receita->receita->numero_ingredientes." ingredientes presentes nessa receita";?><br>
							<?php if (intval($this->session->userdata('login')) == 1):
								 echo "<h6 class='fa fa-spoon'></h6> Voc?? possui ".$receita->receita->numero_utensilios_select." de ".$receita->receita->numero_utensilios." utens??lios presentes nessa receita<br>";
							 endif;?>
							</p>
							<a  class="text-info text-sm icon-move-right bntLerReceita"
								href="<?=base_url('Busca/receita/'.$receita->receita->uid)?>"
							>Ler Mais
								<i class="fas fa-arrow-right text-xs ms-1"></i>
							</a>
						</div>
					</div>
				</div>
				<?php endforeach;?>
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
					FFHL ?? <script>
						document.write(new Date().getFullYear())
					</script> Desenolvido por Franciane, Francisco, Hugo e Luan.
				</p>
			</div>
		</div>
	</div>
</footer>
<!-- Modal -->
<div class="modal fade" id="modalReceita" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">

					</div>
				</div>
			</div>
			<div class="modal-footer">
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
<script src="<?=base_url('assets/js/busca.js')?>" type="text/javascript"></script>
</html>
