			<footer>
				<div class="container-fluid">
					<div class="row">
						<div class="bag-subs">
				      <div class="title-subs">
				        <b>Subscribe our newsletter</b>
								<?php foreach ($contact as $contact): ?>
									<p>If you have any question and need more info, please send us an email to <?=$contact->contact_email?></p>

				      </div>
							<div class="form-subs pull-center">
								<form  action="#" method="post">
									<div class="input-group subs">
										<input type="text" class="form-control" placeholder="enter your email">
										<span class="input-group-btn">
											<button class="btn btn-default btn-srch" type="submit">SUBSCRIBE</button>
										</span>
									</div><!-- /input-group -->
								</form>
							</div>
				    </div>
						<div class="bag-footer">
							<div class="container">
								<div class="row">
									<div class="dalam-footer">
										<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pertama">
											<b>PRODUCT</b><br><br>

												<?php foreach ($category as $cat): ?>
													<a style="color:black;" href="#"><?=$cat->category_name?></a><br><br>
												<?php endforeach; ?>

											<div class="kredivo">
												Provide By: <br>
												<img src="<?=base_url('dist/img/kredivo.png')?>" alt="Kredivo" class="img-responsive">
											</div>

										</div>
										<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 kedua">
											<b>ACCOUNT</b><br><br>
											<a href="#">Login</a><br><br>
											<a href="#">Akun saya</a><br><br>
											<a href="#">Konfirmasi Pembayaran</a><br><br>
											<a href="#">Track Order</a>
											<div class="kredivo2">
												Follow us: <br><br>
												<div class="icon1">
													<a href="#"><img src="<?=base_url('dist/img/sosmed/fb.png')?>" alt="fb" class="img-responsive"></a>&nbsp;
													<a href="#"><img src="<?=base_url('dist/img/sosmed/twt.png')?>" alt="twt" class="img-responsive"></a>&nbsp;
													<a href="#"><img src="<?=base_url('dist/img/sosmed/gg.png')?>" alt="g+" class="img-responsive"></a>&nbsp;
													<a href="#"><img src="<?=base_url('dist/img/sosmed/ptr.png')?>" alt="pinterest" class="img-responsive"></a>&nbsp;
													<a href="#"><img src="<?=base_url('dist/img/sosmed/shr.png')?>" alt="share" class="img-responsive"></a>&nbsp;
												</div>
											</div>

										</div>
										<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 ketiga">
											<b>INFORMATION</b><br><br>
											<a href="#">Cara Belanja</a><br><br>
											<a href="#">Syarat & Ketentuan</a><br><br>
											<a href="#">Hubungi Kami</a><br><br>
											<div class="kredivo">
												Customer Service: <br><br>
												<div class="bawah-kontak">
													<img src="<?=base_url('dist/img/sosmed/cs.png')?>" alt="CS" class="img-responsive" style="margin:5px auto;">

												<div class="kontak">
														<b><?=$contact->contact_phone?></b><br>
														Email : <?=$contact->contact_email?><br>
														Senin-Jumat 09:00 - 18:00

												</div>
											</div>
										</div>
										</div>
										<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
											<b>CONTACT US</b><br><br>
											<p><?=$contact->contact_address?></p>
											Phone : <?=$contact->contact_phone?><br>
											Fax : <?=$contact->contact_fax?>

											<?php endforeach; ?>
										</div>
									</div>

								</div>
							</div>

						</div>
					</div>
				</div>
				<!-- <div class="pull-right hidden-xs">
					<b>Version</b> 0.9.1
				</div>
				<strong>Copyright &copy; 2017 <a href="http://almsaeedstudio.com">LaWaveDesign.com</a>.</strong> All rights reserved. -->
			</footer>

		</div><!-- ./wrapper -->
