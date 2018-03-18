<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Member Detail
			<small></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('admin');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<li><a href="<?php echo site_url('admin/member/all');?>"> Member</a></li>
			<li class="active">Detail</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<!-- Alert -->
		<div class="row form-group">
			<!-- Menampilkan hasil kesalahan validasi dalam proses input dan update data -->
			<?php if ($this->session->flashdata('error')):?>
				<div class="col-md-12 wow fadeInDown"> 
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h4><i class="icon fa fa-close"></i> Error!</h4>
						<ul>
							<?php echo $this->session->flashdata('error'); ?>
						</ul>
					</div><!-- /alert -->
				</div><!-- /col-12 -->
			<?php endif;?>

			<!-- Menampilkan hasil sukses dari proses input dan update data -->
			<?php if ($this->session->flashdata('success')): ?>
				<div class="col-md-12 wow fadeInDown"> 
					<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-check"></i> Success!</h4>
						<?php echo $this->session->flashdata('success')?>
					</div><!-- /alert -->
				</div><!-- /col-12 -->
			<?php endif; ?>

			<!-- Menampilkan hasil kesalahan dari proses input dan update data -->
			<?php if ($this->session->flashdata('failed')): ?>
				<div class="col-md-12 wow fadeInDown"> 
					<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-close"></i> Failed!</h4>
						<?php echo $this->session->flashdata('failed')?>
					</div><!-- /alert -->
				</div><!-- /col-12 -->
			<?php endif; ?>
		</div><!-- /row -->
		<!-- Default box -->
		<div class="row">
			<div class="col-md-3 col-lg-3">
				<!-- Profile Image -->
				<div class="box">
					<div class="box-header box-profile">
						<img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('dist/img/user4-128x128.jpg');?>" alt="User profile picture">
						<h3 class="profile-username text-center"><?php echo ucwords($member->member_name); ?></h3>
						<!-- <p class="text-muted text-center">example@mail.com</p> -->
					</div><!-- /.box-body -->
					<div class="box-body">
						<strong>Contact</strong>
						<p class="text-muted">
							<a href="mailto:<?php echo $member->member_email; ?>">
								<?php echo $member->member_email; ?>
							</a>
							<br>
							<?php echo $member->member_phone; ?>
							<br>
						</p>
						<hr>

						<strong>Location</strong>
						<p class="text-muted">
							<?php echo $member->member_address; ?><br>
							<?php if ($member->city_id != 0 || $member->province_id != 0): ?>
								Kec <?php echo $district ?> <br>
								<?php echo $city->city_name.' - '.$province->province_name ?> <br>
								<?php echo $member->member_postcode ?>
							<?php endif ?>
						</p>

						<hr>

						<strong>Status</strong>
						<p>
							<?php if ($member->member_block == 'active'): ?>
								<span class="label label-success">Active</span>
							<?php else: ?>
								<span class="label label-danger">Block</span>
							<?php endif ?>
							<?php if ($member->member_status == 'veryfied'): ?>
								<span class="label label-success">Verified</span>
							<?php else: ?>
								<span class="label label-danger">Unferified</span>
							<?php endif ?>
						</p>
					</div><!-- /.box-body -->
				</div><!-- /.box -->
			</div>
			<div class="col-md-9 col-lg-9">
				<div class="box">
					<div class="box-body">
						<div class="table-responsive">
							<table id="datatable1" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th width="5%">#</th>
										<th width="20%">Trans. No</th>
										<th width="20%">Total</th>
										<th>Status</th>
										<th width="15%">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1; foreach ($transaction as $trans): ?>
										<tr>
											<td><?php echo $no; ?></td>
											<td><?php echo $trans->order_no ?></td>
											<td><?php echo rupiah($trans->transaction_total) ?></td>
											<td>
												<?php if ($trans->trans_status_id == 1 && $trans->transaction_cancel == 88): ?>
													<span class="label label-warning"><?php echo $trans->trans_status_name ?></span>
												<?php elseif($trans->trans_status_id == 2): ?>
													<span class="label label-info"><?php echo $trans->trans_status_name ?></span>
												<?php elseif($trans->trans_status_id == 3 || $trans->trans_status_id == 4): ?>
													<span class="label label-success"><?php echo $trans->trans_status_name ?></span>
												<?php elseif($trans->trans_status_id == 1 && $trans->transaction_cancel == 99): ?>
													<span class="label label-danger">Canceled</span>
												<?php endif ?>
											</td>
											<td>
												<a class="btn btn-flat btn-sm btn-default" href="<?php echo site_url('admin/transaction/transaction-detail/'.$trans->order_no.'/'.hash_link_encode($this->encrypt->encode($trans->trans_status_id))) ?>" title="Detail <?php echo $trans->order_no ?>">
													<i class="fa fa-search"></i>
												</a>

												<!-- KONFIRMASI PEMBAYARAN hanya jika status bernilai 2-->
												<?php if ($trans->trans_status_id == 2): ?>
													<a href="<?php echo site_url('admin/transaction/approve/'.$trans->order_no.'/'.hash_link_encode($this->encrypt->encode($trans->trans_status_id))) ?>" class="btn btn-flat btn-sm btn-success" title="Approve <?php echo $trans->order_no ?>">
														<i class="fa fa-check"></i>
													</a>
												<?php endif ?>
											</td>
										</tr>
									<?php $no++; endforeach ?>
								</tbody>
								<thead>
									<tr>
										<th>#</th>
										<th>Trans. No</th>
										<th>Total</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
							</table>
						</div>
					</div><!-- /.box-body -->
				</div><!-- /.box -->
			</div>
		</div>

	</section><!-- /.content -->
</div><!-- /.content-wrapper -->