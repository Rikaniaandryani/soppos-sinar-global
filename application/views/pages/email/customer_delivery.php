<table style="background-color: #ffffff; width: 100%; margin: 0 auto;">
	<tbody>
		<tr>
			<td>
				<h3 style="color: #5d9ec3;">
					Pesanan dalam proses pengirirman
				</h3>
			</td>
		</tr>
		<tr>
			<td>
				Saat ini pesanan anda dalam proses pengiriman kurir.
			</td>
		</tr>
		<tr>
			<td>
				Detail pengiriman
			</td>
		</tr>
		<tr>
			<td>
				
				<table style="width: 50%; border: none; margin: 0 auto;">
					<thead>
						<tr>
							<td style="width: 50%;">Jasa Pengiriman</td>
							<td style="width: 50%;">
								<?php 
								$courier = explode(' | ', $transaction->transaction_shipping);
								echo $courier[0];
								?>
							</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Jenis Servis</td>
							<td><?php echo $courier[1]; ?></td>
						</tr>
						<tr>
							<td>No Resi</td>
							<td>
								<?php echo $transaction->transaction_shipping_no ?>
							</td>
						</tr>
						<tr>
							<td>Dikirim Tanggal</td>
							<td>
								<?php 
								$date = indonesian_date($transaction->transaction_shipping_date) ;
								echo $date['date'];
								?>
							</td>
						</tr>
					</tbody>
				</table>

			</td>
		</tr>
	</tbody>
</table>
