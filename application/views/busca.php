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

<!-- Navbar -->
<div class="container position-sticky z-index-sticky top-0"><div class="row"><div class="col-12">
			<nav class="navbar navbar-expand-lg  blur border-radius-xl top-0 z-index-fixed shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
				<div class="container-fluid">
					<a class="navbar-brand font-weight-bolder ms-sm-3" href="https://demos.creative-tim.com/material-kit/presentation" rel="tooltip" title="Designed and Coded by Creative Tim" data-placement="bottom" target="_blank">
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
						<ul class="navbar-nav navbar-nav-hover ms-lg-12 ps-lg-5 w-100">
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
								<li class="nav-item dropdown dropdown-hover mx-2">
									<a href="<?=base_url('Ingrediente')?>"class="nav-link ps-2 d-flex cursor-pointer align-items-center" id="dropdownMenuPages" data-bs-toggle="dropdown" aria-expanded="false">
									Gerenciar Ingredientes
									</a>
								</li>

								<li class="nav-item dropdown dropdown-hover mx-2">
									<a href="<?=base_url('Utensilio')?>" class="nav-link ps-2 d-flex cursor-pointer align-items-center" id="dropdownMenuBlocks" data-bs-toggle="dropdown" aria-expanded="false">
									Gerenciar Utensílios
									</a>
								</li>
								<li class="nav-item ms-lg-auto">
									<a href="<?=base_url('Usuario/perfil')?>" class="btn btn-sm  bg-gradient-warning  mb-0 me-1 mt-2 mt-md-0">Acessar Perfil</a>
								</li>
								<li class="nav-item my-auto ms-3 ms-lg-0">
									<a href="<?=base_url('Login/logout')?>" class="btn btn-sm  bg-gradient-warning  mb-0 me-1 mt-2 mt-md-0">Sair</a>
								</li>
							<?php endif;?>				
						</ul>
					</div>

				</div>
			</nav>
		<!-- End Navbar -->
		</div></div></div>
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
	<section class="pt-5 pb-5 ">
					
		<div class="container" >
			<div class="row">
				<div class="col-6">
					<h3 class="mb-3">Receitas mais vistas </h3>
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
												<h4 class="card-title d-flex justify-content-center">Pão de Queijo</h4>
												<center>
												<h5 class="card-text fa fa-users opacity-6 col-3"> 5</h5>
												<h5 class="card-text fa fa-clock opacity-6 col-3"> 30m</h5>
												<h5 class="card-text fa fa-star opacity-6 col-3"> 5.0</h5>
												</center>
												<p class="card-text">Pão de queijo ou pão de queijo brasileiro é um pequeno pão de queijo assado, geralmente consumido como lanche e café da manhã com café, é um prato muito popular no Brasil, originário do estado de Minas Gerais. O pão de queijo teve origem no Brasil.</p>
												<br>
											</div>

										</div>
									</div>
									<div class="col-md-4 mb-3">
										<div class="card">
											<img class="img-fluid" alt="100%x280" src="https://p2.trrsf.com/image/fget/cf/648/0/images.terra.com/2022/07/15/1992932943-receitasparacriancas-cachorroquente.jpg">
											<div class="card-body">
												<h4 class="card-title d-flex justify-content-center">Cachorro quente no espeto</h4>
												<center>
												<h5 class="card-text fa fa-users opacity-6 col-3"> 3</h5>
												<h5 class="card-text fa fa-clock opacity-6 col-3"> 15m</h5>
												<h5 class="card-text fa fa-star opacity-6 col-3"> 4.3</h5>
												</center>
												<p class="card-text">O cachorro-quente, também chamado de completo, pancho, jocho, shuco ou pão com cachorro, é um alimento em forma de sanduíche que é gerado pela combinação de uma salsicha do tipo Frankfurt...</p>
												<br>	
												<br>
											</div>
										</div>
									</div>
									<div class="col-md-4 mb-3">
										<div class="card">
											<img class="img-fluid" alt="100%x280" src="https://p2.trrsf.com/image/fget/cf/648/0/images.terra.com/2022/07/15/456309814-receitasparacriancas-batata.jpg">
											<div class="card-body">
												<h4 class="card-title d-flex justify-content-center">Batata Frita</h4>
												<center>
												<h5 class="card-text fa fa-users opacity-6 col-3"> 2</h5>
												<h5 class="card-text fa fa-clock opacity-6 col-3"> 17m</h5>
												<h5 class="card-text fa fa-star opacity-6 col-3"> 4.9</h5>
												</center>
												<p class="card-text">Batatas fritas ou batatas fritas, também conhecidas como batatas fritas belgas, batatas fritas belgas ou batatas fritas, são batatas que são feitas cortando-as em forma de palito e fritando-as em óleo quente até dourar, crocantes e depois removendo-as do óleo. depois tempere-os com sal.</p>
												<br>
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
<!--   Core JS Files   -->
<script src="<?=base_url('assets/material-kit/assets/js/core/popper.min.js" type="text/javascript')?>"></script>
<script src="<?=base_url('assets/material-kit/assets/js/core/bootstrap.min.js" type="text/javascript')?>"></script>
<script src="<?=base_url('assets/material-kit/assets/js/plugins/perfect-scrollbar.min.js')?>"></script>
<!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
<script src="<?=base_url('assets/material-kit/assets/js/plugins/parallax.min.js')?>"></script>
<!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
<script src="<?=base_url('assets/material-kit/assets/js/material-kit.min.js?v=3.0.4')?>" type="text/javascript">

</script>
</body>

</html>
