<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Transaction Detail
			<small>#<?php echo $transaction->order_no ?></small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<li><a href="<?php echo site_url('admin/transaction') ?>">Transaction</a></li>
			<li class="active">Detail</li>
		</ol>
	</section>

	<!-- Main content -->
		<section class="invoice">
			<!-- title row -->
			<div class="row">
				<div class="col-xs-12">
					<h2 class="page-header">
						<i class="fa fa-globe"></i> LaWaveShop
						<small class="pull-right">Date: <?php echo date('d/m/Y') ?></small>
					</h2>
				</div><!-- /.col -->
			</div>
			<!-- info row -->
			<div class="row invoice-info">

			<!-- Data Customer -->
				<div class="col-sm-4 invoice-col">
					Customer
					<address>
						<strong><?php echo $transaction->transaction_name ?></strong><br>
						<?php echo $transaction->transaction_address ?><br>Kec. <?php echo $district ?><br>
						<?php echo $transaction->city_name.', '.$transaction->province_name ?><br>
						Phone: <?php echo $transaction->transaction_phone ?><br>
						Email: <?php echo $transaction->transaction_email ?>
					</address>
				</div><!-- /.col -->

				<!-- Data Konfirmasi -->
				<div class="col-sm-4 invoice-col">
					<!-- JIKA STATUS SELAIN NEW ORDER -->
					<?php if ($transaction->trans_status_id > 1): ?>
						<?php $date = indonesian_date($payment->payment_date); ?>
						Confirmed
						<table>
							<tr>
								<th width="25%"><b>Date Paid</b> </th>
								<th width="5%"><b>:</b> </th>
								<td><?php echo $date['date']; ?></td>
							</tr>
							<tr>
								<td><b>Account</b> </td>
								<td> <b>:</b> </td>
								<td><?php echo $payment->payment_account ?></td>
							</tr>
							<tr>
								<td><b>Bank</b> </td>
								<td> <b>:</b> </td>
								<td><?php echo $payment->payment_bank ?></td>
							</tr>
							<tr>
								<td><b>No</b> </td>
								<td> <b>:</b> </td>
								<td><?php echo $payment->payment_no ?></td>
							</tr>
							<tr>
								<td><b>Total</b> </td>
								<td> <b>:</b> </td>
								<td>
									<?php echo rupiah($payment->payment_total) ?>
									<?php if ($payment->payment_total >= $transaction->transaction_total): ?>
										<i class="fa fa-check text-success"></i>
									<?php else: ?>
										<i class="fa fa-close text-danger"></i>
									<?php endif ?>
								</td>
							</tr>
						</table>	
						<br>		
					<?php endif ?>
				</div><!-- /.col -->

				<!-- Data Detail -->
				<div class="col-sm-4 invoice-col">
					Detail
					<table>
						<tr>
							<th width="25%"><b>Invoice</b> </th>
							<th width="5%"><b>:</b> </th>
							<th><?php echo $transaction->transaction_no ?></th>
						</tr>
						<tr>
							<td><b>Order ID</b> </td>
							<td> <b>:</b> </td>
							<td><?php echo $transaction->order_no ?></td>
						</tr>
						<tr>
							<td><b>Status</b> </td>
							<td> <b>:</b> </td>
							<td>
								<?php if ($transaction->trans_status_id < 3): ?>
									<span class="label label-warning"><?php echo $transaction->trans_status_name ?></span>
								<?php else: ?>
									<span class="label label-success"><?php echo $transaction->trans_status_name ?></span>
								<?php endif ?>

								<?php if ($transaction->transaction_cancel == 99): ?>
									<span class="label label-danger">Canceled</span>
								<?php endif ?>
							</td>
						</tr>
						<tr>
							<td><b>Account</b> </td>
							<td> <b>:</b> </td>
							<td>

								<?php if ($transaction->member_id != 0): ?>
									<a href="<?php echo site_url('admin/member/detail/'.$transaction->member_id); ?>" title="">
										<?php echo $transaction->member_id; ?>
									</a>
								<?php else: ?>
									<?php echo $transaction->member_id; ?>
								<?php endif ?>
							</td>
						</tr>
						<tr>
							<td valign="top"><b>Shipment</b> </td>
							<td valign="top"> <b>:</b> </td>
							<td><?php echo $transaction->transaction_shipping ?></td>
						</tr>
						<?php if (!empty($transaction->transaction_shipping_no)): ?>
							<tr>
								<td valign="top"><b>Receipt No</b> </td>
								<td valign="top"> <b>:</b> </td>
								<td><?php echo $transaction->transaction_shipping_no ?></td>
							</tr>
						<?php endif ?>
					</table>			
					<br>
				</div><!-- /.col -->
			</div><!-- /.row -->

			<!-- Table row -->
			<div class="row">
				<div class="col-xs-12 table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Qty</th>
								<th>Product</th>
								<th>Price</th>
								<th>Subtotal</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($item as $item): ?>
								<tr>
									<td><?php echo $item->transaction_item_qty ?></td>
									<td><?php echo $item->product_name ?></td>
									<td><?php echo rupiah($item->transaction_item_price) ?></td>
									<td align="right">
										<span class="left-acc">Rp</span><?php echo uang($item->transaction_item_subtotal) ?>
									</td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div><!-- /.col -->
			</div><!-- /.row -->

			<div class="row">
				<!-- accepted payments column -->
				<div class="col-xs-6">
					<p class="lead">Note:</p>
					<p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
						<?php echo $transaction->transaction_note ?>
					</p>
					<?php if (!empty($transaction->transaction_receive_note)): ?>
						<p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
							<b>Receive Note :</b>
							<?php echo $transaction->transaction_receive_note ?>
						</p>
					<?php endif ?>
				</div><!-- /.col -->
				<div class="col-xs-6">
					<div class="table-responsive">
						<table class="table">
							<tr>
								<th style="width:50%">Subtotal</th>
								<td align="right">
									<span class="left-acc">Rp</span><?php echo uang($transaction->transaction_cost) ?>
								</td>
							</tr>
							<tr>
								<th>Shipping</th>
								<td align="right">
									<span class="left-acc">Rp</span><?php echo uang($transaction->transaction_shipping_cost) ?>
								</td>
							</tr>
							<tr>
								<th>Total</th>
								<td align="right">
									<span class="left-acc">Rp</span><?php echo uang($transaction->transaction_total) ?>
								</td>
							</tr>
						</table>
					</div>
				</div><!-- /.col -->
			</div><!-- /.row -->

			<!-- this row will not appear when printing -->
			<div class="row no-print">
				<div class="col-xs-12">
					<a href="<?php echo site_url('admin/transaction/invoice-print/'.$transaction->order_no.'/'.hash_link_encode($this->encrypt->encode($transaction->trans_status_id))) ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print PDF</a>
					<!-- <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button> -->
					<?php if ($transaction->trans_status_id == 2): ?>
						<button class="btn btn-primary pull-right" style="margin-right: 5px;" onclick="window.location.href='<?php echo site_url('admin/transaction/approve/'.$transaction->order_no.'/'.hash_link_encode($this->encrypt->encode($transaction->trans_status_id))) ?>'"><i class="fa fa-check"></i> Approve Confirmation</button>
					<?php endif ?>
				</div>
			</div>
		</section><!-- /.content -->
		<div class="clearfix"></div>
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
					<input id="shipping_no" type="text" name="shipping_no" class="form-control" placeholder="shipment shipping_no">
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
