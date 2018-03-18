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

			table {
				font-size: 11px;
			}
		</style>
	</head>
	<body>
		<h4 style="margin: 0 0 20px">Sales Report</h4>
		<div class="row">
			<div class="col-xs-6">
				<table class="table">
					<tr>
						<td valign="top" style="width: 35%">Sort Date</td>
						<td>
							<table style="width: 100%">
								<tr>
									<?php 
									$sort_date_from = isset($from) ? indonesian_date($from) : ''; 
									$sort_date_to = isset($to) ? indonesian_date($to) : '';
									?>
									<td style="width: 30%">From</td>
									<td style="width: 70%"><?php echo isset($from) ? $sort_date_from['date'] : ''; ?></td>
								</tr>
								<tr>
									<td>To</td>
									<td><?php echo isset($to) ? $sort_date_to['date'] : ''; ?></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</div>
			<div class="col-xs-6">
				<table class="table" style="width: 70%">
					<tr>
						<td align="right">
							<?php 
							$today = indonesian_date(date('Y-m-d'));
							echo $today['date'];
							?>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th width="5%">No</th>
						<th>Date</th>
						<th>Customer</th>
						<th>Total</th>
						<th style="text-align:center;">Status</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; foreach ($transaction as $trans) : ?>
						<?php 
						$total[$no] = $trans->transaction_total;
						$date = indonesian_date($trans->transaction_date) 
						?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $date['date']; ?></td>
							<td><?php echo $trans->transaction_name; ?></td>
							<td align="right"><span style="text-align: left; float: left;">Rp</span><?php echo uang($trans->transaction_total); ?></td>
							<td align="center"><?php echo ($trans->trans_status_id == 3) ?  "On Delivery" : "Closed"; ?></td>
						</tr>
					<?php $no++; endforeach ?>
				</tbody>
				<thead>
					<tr>
						<th>No</th>
						<th>Date</th>
						<th>Customer</th>
						<th>Total</th>
						<th style="text-align:center;">Status</th>
					</tr>
				</thead>
			</table>
		</div>
		<table class="table table-striped" style="width: 50%; float: right">
			<tr>
				<td>Total</td>
				<td align="center"><strong><?php echo rupiah(array_sum($total)) ?></strong></td>
			</tr>
		</table>
		<script src="<?php echo base_url('dist/js/app.min.js');?>"></script>
	</body>
</html>