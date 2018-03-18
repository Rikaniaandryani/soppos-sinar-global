<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Transaction
			<small>sales report</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('admin');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<li class="active">Sales Report</li>
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

		<div class="box">
			<div class="box-body">
				<div class="row">
					<div class="col-md-6 col-lg-6">
						
					</div>
					<div class="col-md-6 col-lg-6">
						<?php echo form_open('admin/transaction/report', array('method' => 'GET')) ?>
							<div class="row">
								<div class=" col-md-5 col-lg-5">
									<div class="form-group input-group">
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										<input class="form-control input-sm datepicker" name="from" placeholder="From" type="text" required>
									</div>
								</div>
								<div class=" col-md-5 col-lg-5">
									<div class="form-group input-group">
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										<input class="form-control input-sm datepicker" name="to" placeholder="To" type="text">
									</div>
								</div>
								<div class=" col-md-2 col-lg-2">
									<div>
										<button type="submit" class="btn btn-block btn-sm btn-flat btn-success">Sort</button>
									</div>
								</div>
							</div>
						<?php echo form_close() ?>
					</div>
				</div>
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th width="5%">#</th>
								<th width="15%">Order No</th>
								<th>Order Date</th>
								<th>Name</th>
								<th width="15%">Total</th>
								<th>Status</th>
								<th width="15%">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1; foreach ($transaction as $trans): ?>
								<tr>
									<?php 
									$total[$no] = $trans->transaction_total;
									$trans_date = indonesian_date($trans->transaction_date);
									?>
									<td><?php echo $no ?></td>
									<td><?php echo $trans->order_no ?></td>
									<td><?php echo $trans_date['date'] ?></td>
									<td><?php echo $trans->transaction_name ?></td>
									<td><?php echo rupiah($trans->transaction_total) ?></td>
									<td><?php echo $status_trans = ($trans->trans_status_id == 4) ? 'Closed' : 'Delivery'; ?></td>
									<td>
										<!-- VIEW DETAIL -->
										<a class="btn btn-sm btn-flat btn-default" href="<?php echo site_url('admin/transaction/transaction-detail/'.$trans->order_no.'/'.hash_link_encode($this->encrypt->encode($trans->trans_status_id))) ?>" title="Detail <?php echo $trans->order_no ?>">
											<i class="fa fa-search"></i>
										</a>
									</td>
								</tr>
							<?php $no++; endforeach ?>
						</tbody>
						<thead>
							<tr>
								<th>#</th>
								<th>Order No</th>
								<th>Order Date</th>
								<th>Name</th>
								<th>Total</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
					</table>
				</div>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<button type="button" class="btn btn-default" onclick="window.location.href='<?php echo site_url('admin/transaction/printpdf'.$from.$to); ?>'">
							<i class="fa fa-print"></i> Print PDF
						</button>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<table class="table table-striped">
							<tr>
								<td>
									<strong>Total</strong>
								</td>
								<td align="center"> 
									<?php 
									if ($no > 1) {
										echo rupiah(array_sum($total));
									} 

									else {
										'';
									}
										?>
								</td>
							</tr>
						</table>
					</div>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<div class="text-right">
							<?php echo $pagination ?>
						</div>
					</div>
				</div>
			</div><!-- /.box-body -->
		</div><!-- /.box -->

	</section><!-- /.content -->
</div><!-- /.content-wrapper -->
