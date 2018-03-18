<body>
	<section>
		<header>

			<div class="container-fluid">
				<div class="row">
					<div class="menu-top">
						<div class="col-lg-6 col-md-6 col-sm-2 col-xs-2 left-cont">
							<div class="visible-lg visible-md text-center">
								<a href="#">Home</a>
								<a href="#">Tentang Kami</a>
								<a href="#">Cara Belanja</a>
								<a href="#">Syarat & Ketentuan</a>
								<a href="#">Hubungi Kami</a>
							</div>
							<span class="visible-sm visible-xs icon-menu" onclick="openNav()"><b>&#9776;</b></span>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-10 col-xs-10 right-cont">
							<?php foreach ($contact as $c): ?>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<i class="fa fa-phone"></i>&nbsp;<span class="icon"><?=$c->contact_phone?></span>
								</div>
								<div class="col-lg-2 col-md-2 col-sm-2 visible-lg visible-sm visible-md">
									<span class="garis">
									</span>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<i class="fa fa-envelope"></i>&nbsp;<span class="icon"><?=$c->contact_email?></span>
								</div>

							<?php endforeach; ?>
						</div>
					</div>

				</div>
			</div>
			<!-- sidenav -->
			<div id="mySidenav" class="sidenav">
				<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
				<a href="#">Home</a>
				<a href="#">Tentang Kami</a>
				<a href="#">Cara Belanja</a>
				<a href="#">Syarat & Ketentuan</a>
				<a href="#">Hubungi Kami</a>
			</div>
			<!-- end sidenav -->

			<div class="container">
				<div class="row">
					<div class="menu-top2">
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-3">
							<img src="<?=base_url('dist/img/logo.png')?>" class="img-responsive logo-img" alt="MatrasMart">
						</div>
						<div class="col-lg-5 col-md-4 search-form visible-lg visible-md">
							<form  action="#" method="post">
								<div class="input-group pencarian">
									<input type="text" class="form-control" placeholder="Masukkan kata kunci anda disini...">
									<span class="input-group-btn">
										<button class="btn btn-default btn-srch" type="submit"><i class="fa fa-search"></i></button>
									</span>
								</div><!-- /input-group -->
							</form>
						</div>
						<div class="col-lg-4 col-md-5 col-sm-6 col-xs-9 test2 text-center">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-4 test">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="user">
										<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" style="padding:0px !important">
											<span class="fa fa-user user"></span>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 login">
											<a href="#">Login</a>
										</div>
									</div>
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="daftar">
										<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" style="padding:0px !important">
											<span class="fa fa-edit edit"></span>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 daftar">
											<a href="#">Daftar</a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-9 col-md-9 col-sm-9 col-xs-8">
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 cart1">
									<a href="#"><img src="<?=base_url('dist/img/cart.png')?>" class="img-responsive cart" alt="Cart"></a>
									<span class="balon_chart">1</span>
								</div>
								<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
									<div class="belanja">
										<b>Keranjang Belanja</b>
									</div>
									<div class="total-belanja">
										Rp. 700.000
									</div>

								</div>
							</div>
					</div>

					</div>
					<div class="col-sm-10 col-xs-10 col-sm-offset-1 col-xs-offset-1 search-form visible-sm visible-xs">
						<form  action="#" method="post">
							<div class="input-group pencarian penc">
								<input type="text" class="form-control" placeholder="Masukkan kata kunci anda disini...">
								<span class="input-group-btn">
									<button class="btn btn-default btn-srch" type="submit"><i class="fa fa-search"></i></button>
								</span>
							</div><!-- /input-group -->
						</form>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<hr align="center" style="border: 1px solid #2ea7ec;width:100%;">
					</div>
				</div>
			</div>
			<nav class="navbar navbar-default menu-kat">
				<div class="container">
					<div class="row">
			 		<div class="navbar-header">
						<div class="col-sm-4 col-xs-4">
							<div class="pull-left">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					 				<span class="sr-only">Toggle navigation</span>
					 				<span class="icon-bar"></span>
					 				<span class="icon-bar"></span>
					 				<span class="icon-bar"></span>
					 			</button>
							</div>

						</div>
						<div class="col-xs-8 visible-xs">
							<div class="delivery pull-right ">
								<ul class="nav navbar-nav">
									<li><a href="#"><i class="fa fa-truck"></i>&nbsp; Track Your Order</a></li>
								</ul>
							</div>
						</div>

		 		</div>
	 		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<div class="col-lg-3 col-md-3 col-sm-6 menu-tes">
					<ul  class="nav navbar-nav">
						<li class="dropdown dr">
						<a class="dropdown-toggle tgl" data-toggle="dropdown" href="#"><b><span class="cl">&#9776;</span> &nbsp;Semua Kategori</b>
							</a>
							<ul class="dropdown-menu dr-menu">
								<?php foreach ($category as $cat): ?>
									<li><a href="#"><?=$cat->category_name?></a></li>

								<?php endforeach; ?>

							</ul>
						</li>
					</ul>
				</div>
				<div class="delivery pull-right visible-sm">
					<ul class="nav navbar-nav">
						<li><a href="#"><i class="fa fa-truck"></i>&nbsp; Track Your Order</a></li>
					</ul>
				</div>

				<div class="menu-tgh pull-center">
					<ul class="nav navbar-nav kat-menu-item">
						<?php foreach ($brand as $br): ?>
							<li><a href="#" style="color:black;"><b><?=$br->brand_name?></b></a></li>

						<?php endforeach; ?>
		 			</ul>
				</div>
				<div class="delivery pull-right visible-lg visible-md">
					<ul class="nav navbar-nav">
						<li><a href="#"><i class="fa fa-truck"></i>&nbsp; Track Your Order</a></li>
					</ul>
				</div>
	 		</div><!-- /.navbar-collapse -->

		</div>
		</div>
	 </nav>

		</header>
	</section>
