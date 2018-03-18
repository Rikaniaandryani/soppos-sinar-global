<table style="background-color: #ffffff; width: 100%; margin: 0 auto;">
	<tbody>
		<tr>
			<td>
				<h3 style="color: #5d9ec3;">
					Pesanan Baru
				</h3>
			</td>
		</tr>
		<tr>
			<td>
				Pesanan baru dengan Nomor Order : <strong><?php echo $transaction->order_no ?></strong>
			</td>
		</tr>
		<tr>
			<td>
				Detail pesanan
			</td>
		</tr>
		<tr>
			<td>
				
				<table style="width: 50%; border: none; margin: 0 auto;">
					<thead>
						<tr>
							<th style="width: 40%;">Nama Customer</th>
							<td><?php echo $transaction->transaction_name ?></td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>ID Member</td>
							<td><?php echo $transaction->member_id ?></td>
						</tr>
						<tr>
							<td>Total Biaya</td>
							<td><?php echo rupiah($transaction->transaction_total) ?></td>
						</tr>
					</tbody>
				</table>

			</td>
		</tr>
	</tbody>
</table>
