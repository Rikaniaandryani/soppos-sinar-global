<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>AdminLTE 2 | Invoice</title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Bootstrap 3.3.5 -->
		<link rel="stylesheet" href="<?php echo base_url('plugins/bootstrap/css/bootstrap.min.css');?>">
		<!-- Theme style -->
		<link rel="stylesheet" href="<?php echo base_url('dist/css/AdminLTE.min.css');?>">
		<style type="text/css">
			.table > tbody > tr > td, 
			.table > tbody > tr > th, 
			.table > tfoot > tr > td, 
			.table > tfoot > tr > th, 
			.table > thead > tr > td, 
			.table > thead > tr > th {
				padding: 4px;
			}
		</style>
	</head>
	<body style="font-size: 11px;">
		<div class="wrapper">
			<!-- Main content -->
			<section class="invoice" style="margin: 0px; padding: 2px; border: 0px;">
				<!-- title row -->
				<div class="row">
					<div class="col-xs-12">
						<h2 class="page-header">
							LaWaveShop
							<small class="pull-right" style="padding-right: 15px;"><?php $invoice_date = indonesian_date(date('Y-m-d')); echo $invoice_date['date'] ?></small>
						</h2>
					</div><!-- /.col -->
				</div>
				<!-- info row -->
				<div class="row invoice-info">
					<div class="col-sm-4 invoice-col" style="width: 40%; float: left;">
						Customer
						<address>
							<strong><?php echo $transaction->transaction_name ?></strong><br>
							<?php echo $transaction->transaction_address ?><br>Kec. <?php echo $district ?><br>
							<?php echo $transaction->city_name.', '.$transaction->province_name ?><br>
							Phone: <?php echo $transaction->transaction_phone ?><br>
							Email: <?php echo $transaction->transaction_email ?>
						</address>
					</div><!-- /.col -->
					<div class="col-sm-4 invoice-col" style="width: 60%; float: left;">
						Detail
						<table>
							<tr>
								<th width="25%"><b>Invoice</b> </th>
								<th width="5%"><b>:</b> </th>
								<th><?php echo $transaction->transaction_no ?></th>
							</tr>

							<?php if ($transaction->trans_status_id > 1): ?>
								<?php $date = indonesian_date($payment->payment_date); ?>
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
							<?php endif ?>
							
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
						<table class="table table-bordered">
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
										<td><?php echo rupiah($item->transaction_item_subtotal) ?></td>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div><!-- /.col -->
				</div><!-- /.row -->

				<div class="row">
					<!-- accepted payments column -->
					<div class="col-xs-6">
						<p class="lead" style="margin-bottom: 0">Note:</p>
						<p style="margin-top: 5px;">
							<?php echo $transaction->transaction_note ?>
						</p>
					</div><!-- /.col -->
					<div class="col-xs-6">
						<div class="table-responsive">
							<table class="table">
								<tr>
									<th style="width:40%">Subtotal</th>
									<td><?php echo rupiah($transaction->transaction_cost) ?></td>
								</tr>
								<tr>
									<th>Shipping</th>
									<td><?php echo rupiah($transaction->transaction_shipping_cost) ?></td>
								</tr>
								<tr>
									<th>Total</th>
									<td><strong><?php echo rupiah($transaction->transaction_total) ?></strong></td>
								</tr>
							</table>
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->

				<!-- this row will not appear when printing -->
			</section><!-- /.content -->
		</div><!-- ./wrapper -->

		<!-- AdminLTE App -->
		<script src="<?php echo base_url('dist/js/app.min.js');?>"></script>
	</body>
</html>
	