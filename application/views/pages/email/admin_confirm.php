<table style="background-color: #ffffff; width: 100%; margin: 0 auto;">
	<tbody>
		<tr>
			<td>
				<h3 style="color: #5d9ec3;">
					Konfirmasi Pembayaran
				</h3>
			</td>
		</tr>
		<tr>
			<td>
				Konfirmasi pembayaran dengan Nomor Order : <strong><?php echo $transaction->order_no ?></strong>
			</td>
		</tr>
		<tr>
			<td>
				Detail pembayaran
			</td>
		</tr>
		<tr>
			<td>
				
				<table style="width: 50%; border: none; margin: 0 auto;">
					<thead>
						<td>
							<th style="width: 40%;">Nama Customer</th>
							<td><?php echo $transaction->transaction_name ?></td>
						</td>
					</thead>
					<tbody>
						<tr>
							<td>Total Biaya</td>
							<td><?php echo $transaction->transaction_total ?></td>
						</tr>
						<tr>
							<td>Total Dibayar</td>
							<td>
								<?php echo $payment->payment_total ?>
								<?php if ($payment->payment_total < $transaction->transaction_total): ?>
									Pembayaran tidak sesuai.
								<?php endif ?>
							</td>
						</tr>
						<tr>
							<td>Bank</td>
							<td><?php echo $payment->payment_bank ?></td>
						</tr>
						<tr>
							<td>No Rek</td>
							<td><?php echo $payment->payment_no ?></td>
						</tr>
						<tr>
							<td>Atas Nama</td>
							<td><?php echo $payment->payment_account ?></td>
						</tr>
						<tr>
							<td>Bank Tujuan</td>
							<td><?php echo $payment->bank_name." - ".$payment->bank_no ?></td>
						</tr>
					</tbody>
				</table>

			</td>
		</tr>
	</tbody>
</table>
