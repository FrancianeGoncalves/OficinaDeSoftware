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
</head>

<body class="sign-in-basic">
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
<div class="page-header align-items-start min-vh-100 " style="background-image: url('<?=base_url('assets/img/fundo2.png')?>');" loading="lazy">
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
											<select class="form-control " id="exampleFormControlSelect1">
												<option disabled selected value> Selecione</option>
											</select>
										</div>
										<div class="input-group input-group-static mb-4">
											<label for="exampleFormControlSelect1" class="
											text-white ms-0 h5">Utensílios</label>
											<select class="form-control" id="exampleFormControlSelect1">
												<option disabled selected value> Selecione</option>
											</select>
										</div>
<!--										#E8910F-->
										<div class="row d-flex justify-content-end mb-3">
											<div class="text-center col-lg-6">
												<button type="button" style="background-color: #FF480C;color: #FFF"
														class="btn w-100 my-4 mb-2">Pesquisar</button>
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
	<section class="pt-5 pb-5">
		<div class="container">
			<div class="row">
				<div class="col-6">
					<h3 class="mb-3">Receitas </h3>
				</div>
				<div class="col-6 text-right">
					<a class="btn btn-primary mb-3 mr-1" href="#carouselExampleIndicators2" role="button" data-slide="prev">
						<i class="fa fa-arrow-left"></i>
					</a>
					<a class="btn btn-primary mb-3 " href="#carouselExampleIndicators2" role="button" data-slide="next">
						<i class="fa fa-arrow-right"></i>
					</a>
				</div>
				<div class="col-12">
					<div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">

						<div class="carousel-inner">
							<div class="carousel-item active">
								<div class="row">

									<div class="col-md-4 mb-3">
										<div class="card">
											<img class="img-fluid" alt="100%x280" src="https://p2.trrsf.com/image/fget/cf/648/0/images.terra.com/2022/07/15/1018774879-receitasparacriancas-paodequeijo.jpg">
											<div class="card-body">
												<h4 class="card-title">Pão de Queijo</h4>
												<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

											</div>

										</div>
									</div>
									<div class="col-md-4 mb-3">
										<div class="card">
											<img class="img-fluid" alt="100%x280" src="https://p2.trrsf.com/image/fget/cf/648/0/images.terra.com/2022/07/15/1992932943-receitasparacriancas-cachorroquente.jpg">
											<div class="card-body">
												<h4 class="card-title">Special title treatment</h4>
												<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

											</div>
										</div>
									</div>
									<div class="col-md-4 mb-3">
										<div class="card">
											<img class="img-fluid" alt="100%x280" src="https://p2.trrsf.com/image/fget/cf/648/0/images.terra.com/2022/07/15/456309814-receitasparacriancas-batata.jpg">
											<div class="card-body">
												<h4 class="card-title">Special title treatment</h4>
												<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

											</div>
										</div>
									</div>

								</div>
							</div>
							<div class="carousel-item">
								<div class="row">

									<div class="col-md-4 mb-3">
										<div class="card">
											<img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532771098148-525cefe10c23?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=3f317c1f7a16116dec454fbc267dd8e4">
											<div class="card-body">
												<h4 class="card-title">Special title treatment</h4>
												<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

											</div>

										</div>
									</div>
									<div class="col-md-4 mb-3">
										<div class="card">
											<img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532715088550-62f09305f765?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=ebadb044b374504ef8e81bdec4d0e840">
											<div class="card-body">
												<h4 class="card-title">Special title treatment</h4>
												<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

											</div>
										</div>
									</div>
									<div class="col-md-4 mb-3">
										<div class="card">
											<img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1506197603052-3cc9c3a201bd?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=0754ab085804ae8a3b562548e6b4aa2e">
											<div class="card-body">
												<h4 class="card-title">Special title treatment</h4>
												<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

											</div>
										</div>
									</div>

								</div>
							</div>
							<div class="carousel-item">
								<div class="row">

									<div class="col-md-4 mb-3">
										<div class="card">
											<img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=ee8417f0ea2a50d53a12665820b54e23">
											<div class="card-body">
												<h4 class="card-title">Special title treatment</h4>
												<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

											</div>

										</div>
									</div>
									<div class="col-md-4 mb-3">
										<div class="card">
											<img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532777946373-b6783242f211?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=8ac55cf3a68785643998730839663129">
											<div class="card-body">
												<h4 class="card-title">Special title treatment</h4>
												<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

											</div>
										</div>
									</div>
									<div class="col-md-4 mb-3">
										<div class="card">
											<img class="img-fluid" alt="100%x280" src="https://images.unsplash.com/photo-1532763303805-529d595877c5?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=5ee4fd5d19b40f93eadb21871757eda6">
											<div class="card-body">
												<h4 class="card-title">Special title treatment</h4>
												<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	</div>
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
</div>
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
</body>

</html>
