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
							Perfil
						</button>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<li><a href="<?=base_url('Usuario/perfil')?>" class="dropdown-item" href="#">Perfil</a></li>
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
						<img class="avatar avatar-xxl shadow-xl position-relative z-index-2" src="<?=base_url('assets/img/59fba610c9a40c61c9f26f0a1e5db912.jpg')?>" alt="bruce" loading="lazy">
					</div>
					<div class="row py-5">
						<div class="col-lg-7 col-md-7 z-index-2 position-relative px-md-2 px-sm-5 mx-auto">
							<div class="d-flex justify-content-between align-items-center mb-2">
								<h3 class="mb-0">Michael Roven</h3>
								<div class="d-block">
									<button type="button" class="btn btn-sm btn-outline-info text-nowrap mb-0">Follow</button>
								</div>
							</div>
							<div class="row mb-4">
								<div class="col-auto">
									<span class="h6">323</span>
									<span>Posts</span>
								</div>
								<div class="col-auto">
									<span class="h6">3.5k</span>
									<span>Followers</span>
								</div>
								<div class="col-auto">
									<span class="h6">260</span>
									<span>Following</span>
								</div>
							</div>
							<p class="text-lg mb-0">
								Decisions: If you can’t decide, the answer is no.
								If two equally difficult paths, choose the one more
								painful in the short term (pain avoidance is creating
								an illusion of equality). Choose the path that leaves
								you more equanimous. <br><a href="javascript:;" class="text-info icon-move-right">More about me
									<i class="fas fa-arrow-right text-sm ms-1"></i>
								</a>
							</p>
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
					<h3 class="mb-5">Check my latest blogposts</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-3 col-sm-6">
					<div class="card card-plain">
						<div class="card-header p-0 position-relative">
							<a class="d-block blur-shadow-image">
								<img src="../assets/img/examples/testimonial-6-2.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg" loading="lazy">
							</a>
						</div>
						<div class="card-body px-0">
							<h5>
								<a href="javascript:;" class="text-dark font-weight-bold">Rover raised $65 million</a>
							</h5>
							<p>
								Finding temporary housing for your dog should be as easy as
								renting an Airbnb. That’s the idea behind Rover ...
							</p>
							<a href="javascript:;" class="text-info text-sm icon-move-right">Read More
								<i class="fas fa-arrow-right text-xs ms-1"></i>
							</a>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="card card-plain">
						<div class="card-header p-0 position-relative">
							<a class="d-block blur-shadow-image">
								<img src="../assets/img/examples/testimonial-6-3.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg" loading="lazy">
							</a>
						</div>
						<div class="card-body px-0">
							<h5>
								<a href="javascript:;" class="text-dark font-weight-bold">MateLabs machine learning</a>
							</h5>
							<p>
								If you’ve ever wanted to train a machine learning model
								and integrate it with IFTTT, you now can with ...
							</p>
							<a href="javascript:;" class="text-info text-sm icon-move-right">Read More
								<i class="fas fa-arrow-right text-xs ms-1"></i>
							</a>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="card card-plain">
						<div class="card-header p-0 position-relative">
							<a class="d-block blur-shadow-image">
								<img src="../assets/img/examples/blog-9-4.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg" loading="lazy">
							</a>
						</div>
						<div class="card-body px-0">
							<h5>
								<a href="javascript:;" class="text-dark font-weight-bold">MateLabs machine learning</a>
							</h5>
							<p>
								If you’ve ever wanted to train a machine learning model
								and integrate it with IFTTT, you now can with ...
							</p>
							<a href="javascript:;" class="text-info text-sm icon-move-right">Read More
								<i class="fas fa-arrow-right text-xs ms-1"></i>
							</a>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-12 col-12">
					<div class="card card-blog card-background cursor-pointer">
						<div class="full-background" style="background-image: url('../assets/img/examples/blog2.jpg')" loading="lazy"></div>
						<div class="card-body">
							<div class="content-left text-start my-auto py-4">
								<h2 class="card-title text-white">Flexible work hours</h2>
								<p class="card-description text-white">Rather than worrying about switching offices every couple years, you stay in the same place.</p>
								<a href="javascript:;" class="text-white text-sm icon-move-right">Read More
									<i class="fas fa-arrow-right text-xs ms-1"></i>
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
				<h6 class="text-dark font-weight-bolder text-uppercase mb-lg-4 mb-3">Material Design</h6>
				<ul class="nav flex-row ms-n3 justify-content-lg-start justify-content-center mb-4 mt-sm-0">
					<li class="nav-item">
						<a class="nav-link text-dark opacity-8" href="https://www.creative-tim.com" target="_blank">
							Home
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-dark opacity-8" href="https://www.creative-tim.com/presentation" target="_blank">
							About
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-dark opacity-8" href="https://www.creative-tim.com/blog" target="_blank">
							Blog
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-dark opacity-8" href="https://www.creative-tim.com" target="_blank">
							Services
						</a>
					</li>
				</ul>
				<p class="text-sm text-dark opacity-8 mb-0">
					Copyright © <script>
						document.write(new Date().getFullYear())
					</script> Material Design by Creative Tim.
				</p>
			</div>
			<div class="col-lg-6 ms-auto text-lg-end text-center">
				<p class="mb-5 text-lg text-dark font-weight-bold">
					The reward for getting on the stage is fame. The price of fame is you can’t get off the stage.
				</p>
				<a href="javascript:;" target="_blank" class="text-dark me-xl-4 me-4 opacity-5">
					<span class="fab fa-dribbble"></span>
				</a>
				<a href="javascript:;" target="_blank" class="text-dark me-xl-4 me-4 opacity-5">
					<span class="fab fa-twitter"></span>
				</a>
				<a href="javascript:;" target="_blank" class="text-dark me-xl-4 me-4 opacity-5">
					<span class="fab fa-pinterest"></span>
				</a>
				<a href="javascript:;" target="_blank" class="text-dark opacity-5">
					<span class="fab fa-github"></span>
				</a>
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
<script src="<?=base_url('assets/material-kit/assets/js/material-kit.min.js?v=3.0.4')?>" type="text/javascript"></script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
<script src="<?=base_url('assets/js/cpf.js')?>" type="text/javascript"></script>
<script src="<?=base_url('assets/js/perfil.js')?>" type="text/javascript"></script></body>
</html>
