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
		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<!-- Ionicons -->
		<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="<?php echo base_url('dist/css/AdminLTE.min.css');?>">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
				<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
				<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body onload="window.print();">
		<div class="wrapper">
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
									</td>
								</tr>
							</table>	
							<br>		
						<?php endif ?>
					</div><!-- /.col -->
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
									<?php echo $transaction->member_id; ?>
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
						<p class="lead">Note:</p>
						<p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
							<?php echo $transaction->transaction_note ?>
						</p>
					</div><!-- /.col -->
					<div class="col-xs-6">
						<div class="table-responsive">
							<table class="table">
								<tr>
									<th style="width:50%">Subtotal</th>
									<td><?php echo rupiah($transaction->transaction_cost) ?></td>
								</tr>
								<tr>
									<th>Shipping</th>
									<td><?php echo rupiah($transaction->transaction_shipping_cost) ?></td>
								</tr>
								<tr>
									<th>Total</th>
									<td><?php echo rupiah($transaction->transaction_total) ?></td>
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
	