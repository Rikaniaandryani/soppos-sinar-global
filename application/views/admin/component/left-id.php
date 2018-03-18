			<?php
			$uri1 = $this->uri->segment(1);
			$uri2 = $this->uri->segment(2);
			?>
			<!-- Left side column. contains the sidebar -->
			<aside class="main-sidebar">
				<!-- sidebar: style can be found in sidebar.less -->
				<section class="sidebar">
					<!-- Sidebar user panel -->
					<!-- <div class="user-panel">
						<div class="pull-left image">
							<img src="<?php echo base_url('dist/img/user2-160x160.jpg');?>" class="img-circle" alt="User Image">
						</div> 
						<div class="pull-left info">
							<p>Alexander Pierce</p>
							<i class="fa fa-circle text-success"></i> Online
						</div>
					</div> -->
					<!-- sidebar menu: : style can be found in sidebar.less -->
					<ul class="sidebar-menu">
						<li class="header">MAIN NAVIGATION</li>
						<li class="treeview <?php if ($uri2 == NULL || $uri2 == 'dashboard'): ?> active <?php endif ?>">
							<a href="<?php echo site_url('admin');?>">
								<i class="fa fa-dashboard"></i> <span>Dashboard</span>
							</a>
						</li>
						<li class="treeview <?php if ($uri2 == 'user'): ?> active <?php endif ?>">
							<a href="<?php echo site_url('admin/user');?>">
								<i class="fa fa-user-secret"></i> <span>Administrator</span>
							</a>
						</li>
						<li class="treeview <?php if ($uri2 == 'about' || $uri2 == 'service' || $uri2 == 'contact' || $uri2 == 'sk' || $uri2 == 'faq' || $uri2 == 'bank' || $uri2 == 'shipment'): ?> active <?php endif ?>">
							<a href="#">
								<i class="fa fa-table"></i> <span>Content</span>
								<i class="fa fa-angle-left pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li <?php if ($uri2 == 'about' || $uri2 == 'service' || $uri2 == 'contact' || $uri2 == 'sk' || $uri2 == 'faq'): ?> class="active" <?php endif ?>>
									<a href="#"><i class="fa fa-circle-o"></i> Profil Information <i class="fa fa-angle-left pull-right"></i></a>
									<ul class="treeview-menu">
										<li <?php if ($uri2 == 'about'):?> class="active" <?php endif?>>
											<a href="<?php echo site_url('admin/about');?>">
												<i class="fa fa-circle-o"></i> Tentang Kami 
											</a>
										</li>
										<li <?php if ($uri2 == 'service'):?> class="active" <?php endif?>>
											<a href="<?php echo site_url('admin/service');?>">
												<i class="fa fa-circle-o"></i> Layanan 
											</a>
										</li>
										<li <?php if ($uri2 == 'contact'):?> class="active" <?php endif?>>
											<a href="<?php echo site_url('admin/contact');?>">
												<i class="fa fa-circle-o"></i> Kontak 
											</a>
										</li>
										<li <?php if ($uri2 == 'sk'):?> class="active" <?php endif?>>
											<a href="<?php echo site_url('admin/sk');?>">
												<i class="fa fa-circle-o"></i> Syarat dan Ketentuan 
											</a>
										</li>
										<li <?php if ($uri2 == 'faq'):?> class="active" <?php endif?>>
											<a href="<?php echo site_url('admin/faq');?>">
												<i class="fa fa-circle-o"></i> F A Q 
											</a>
										</li>
									</ul>
								</li>
								<li <?php if ($uri2 == 'bank'):?> class="active" <?php endif?>>
									<a href="<?php echo site_url('admin/bank');?>">
										<i class="fa fa-circle-o"></i> Bank 
									</a>
								</li>
							</ul>
						</li>
						<li class="treeview <?php if ($uri2 == 'category'): ?> active <?php endif ?>">
							<a href="#">
								<i class="fa fa-futbol-o"></i> <span>Produk </span>
								<i class="fa fa-angle-left pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li <?php if ($uri2 == 'category'): ?> class="active" <?php endif ?>>
									<a href="<?php echo site_url('admin/category');?>">
										<i class="fa fa-circle-o"></i> Kategori 
									</a>
								</li>
								<li><a href="#"><i class="fa fa-circle-o"></i> Sub-kategori </a></li>
								<li><a href="#"><i class="fa fa-circle-o"></i> Brand </a></li>
								<li><a href="#"><i class="fa fa-circle-o"></i> Group </a></li>
								<li><a href="#"><i class="fa fa-circle-o"></i> Produk </a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-flag-o"></i> <span> Transaksi</span>
								<i class="fa fa-angle-left pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li><a href="#"><i class="fa fa-circle-o"></i> Order Baru </a></li>
								<li><a href="#"><i class="fa fa-circle-o"></i> Dikonfirmasi </a></li>
								<li><a href="#"><i class="fa fa-circle-o"></i> Pengiriman </a></li>
								<li><a href="#"><i class="fa fa-circle-o"></i> Diterima </a></li>
								<li><a href="#"><i class="fa fa-circle-o"></i> Selesai </a></li>
								<li><a href="#"><i class="fa fa-circle-o"></i> Dibatalkan </a></li>
								<li><a href="#"><i class="fa fa-circle-o"></i> Laporan </a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-users"></i> <span> Member</span>
								<i class="fa fa-angle-left pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li><a href="#"><i class="fa fa-circle-o"></i> Member Baru </a></li>
								<li><a href="#"><i class="fa fa-circle-o"></i> Semua Member </a></li>
								<li><a href="#"><i class="fa fa-circle-o"></i> Blacklist </a></li>
								<li><a href="#"><i class="fa fa-circle-o"></i> Non Active </a></li>
								<li><a href="#"><i class="fa fa-circle-o"></i> Laporan </a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
								<i class="fa fa-image"></i> <span> Misscellaneous</span>
								<i class="fa fa-angle-left pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li><a href="#"><i class="fa fa-circle-o"></i> Slide </a></li>
								<li><a href="#"><i class="fa fa-circle-o"></i> Banner </a></li>
								<li><a href="#"><i class="fa fa-circle-o"></i> Video </a></li>
							</ul>
						</li>
						<li><a href="#"><i class="fa fa-search"></i> <span>S E O</span></a></li>
						<li class="header">TOOLS</li>
						<li><a href="#"><i class="fa fa fa-book text-red"></i> <span>Manual Guide</span></a></li>
						<li><a href="#"><i class="fa fa-area-chart text-green"></i> <span>Web Statistics</span></a></li>
						<li><a href="#"><i class="fa fa-envelope text-aqua"></i> <span>Web Mail</span></a></li>
					</ul>
				</section>
				<!-- /.sidebar -->
			</aside>

			<!-- =============================================== -->
