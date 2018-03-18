<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Transaction
			<small>
				<?php if ($uri_3 == 'order'): ?>
					new order
				<?php elseif ($uri_3 == 'confirm'): ?>
					confirmed
				<?php elseif ($uri_3 == 'delivery'): ?>
					delivery
				<?php elseif ($uri_3 == 'close'): ?>
					close
				<?php else: ?>
					canceled
				<?php endif ?>
			</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('admin');?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<li class="active">
				<?php if ($uri_3 == 'order'): ?>
					New Order
				<?php elseif ($uri_3 == 'confirm'): ?>
					Confirmed
				<?php elseif ($uri_3 == 'delivery'): ?>
					Delivery
				<?php elseif ($uri_3 == 'close'): ?>
					Close
				<?php else: ?>
					Canceled
				<?php endif ?>
			</li>
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
				<div class="form-group text-right">
				</div>
				<table id="datatable1" class="table table-striped">
					<thead>
						<tr>
							<th width="5%">#</th>
							<th width="15%">Order No</th>
							<th>Member</th>
							<th>Name</th>
							<th width="15%">Total</th>
							<th width="15%">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; foreach ($transaction as $trans): ?>
							<tr <?php echo $trans->transaction_cancel == 99 && $uri_3 != 'canceled' ? "class='cancel-row'" : ''; ?>>
								<td><?php echo $no ?></td>
								<td><?php echo $trans->order_no ?></td>
								<td>
									<?php if ($trans->member_id != 0): ?>
										<a href="<?php echo site_url('admin/member/detail/'.$trans->member_id) ?>" title="">
											<?php echo $trans->member_name ?>
										</a>
									<?php else: ?>
										<?php echo $trans->member_name ?>
									<?php endif ?>
								</td>
								<td><?php echo $trans->transaction_name ?></td>
								<td><?php echo rupiah($trans->transaction_total) ?></td>
								<td>
									<!-- VIEW DETAIL -->
									<a class="btn btn-sm btn-flat btn-default" href="<?php echo site_url('admin/transaction/transaction-detail/'.$trans->order_no.'/'.hash_link_encode($this->encrypt->encode($trans->trans_status_id))) ?>" title="Detail <?php echo $trans->order_no ?>">
										<i class="fa fa-search"></i>
									</a>

									<!-- KONFIRMASI PEMBAYARAN hanya jika status bernilai 2-->
									<?php if ($trans->trans_status_id == 2): ?>
										<a href="<?php echo site_url('admin/transaction/approve/'.$trans->order_no.'/'.hash_link_encode($this->encrypt->encode($trans->trans_status_id))) ?>" class="btn btn-sm btn-flat btn-success" title="Approve <?php echo $trans->order_no ?>">
											<i class="fa fa-check"></i>
										</a>
									<?php endif ?>

									<!-- INPUT NO RESI hanya jika status bernilai 3-->
									<?php if ($trans->trans_status_id == 3): ?>
										<a class="btn btn-flat btn-sm btn-default btn-edit-shipment-number" data-id="<?php echo $trans->transaction_id;?>" title="Input Shipment Number">
										<i class="fa fa-edit"></i>
									</a>
									<?php endif ?>
								</td>
							</tr>
						<?php $no++; endforeach ?>
					</tbody>
					<thead>
						<tr>
							<th>#</th>
							<th>Order No</th>
							<th>Member</th>
							<th>Name</th>
							<th>Total</th>
							<th>Action</th>
						</tr>
					</thead>
				</table>
			</div><!-- /.box-body -->
		</div><!-- /.box -->

	</section><!-- /.content -->
</div><!-- /.content-wrapper -->

<div id="update" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Shipment Number</h4>
			</div>
			<?php echo form_open_multipart('admin/transaction/update');?>
			<div class="modal-body">
				<div class="form-group">
					<label for="shipment">Order No</label>
					<input id="id" type="hidden" name="id">
					<input id="order_no" type="text" name="order_no" class="form-control" placeholder="order no">
				</div>
				<div class="form-group">
					<label for="shipment">Shipmern Number</label>
					<input id="shipping_no" type="text" name="shipping_no" class="form-control" placeholder="shipment number">
				</div>
				<div class="form-group">
					<label for="shipment">Date</label>
					<input id="datepicker" type="date" name="date" class="form-control">
				</div>
			</div>
			<div class="modal-footer">
				<button type="reset" class="btn btn-default btn-flat"><i class="fa fa-refresh"></i> Reset</button>
				<button type="submit" name="update-shipping-number" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Save</button>
			</div>
			<?php echo form_close();?>
		</div>

	</div>
</div>
