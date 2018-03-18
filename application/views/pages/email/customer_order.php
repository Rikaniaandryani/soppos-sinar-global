<table style="background-color: #ffffff; width: 100%; margin: 0 auto;">
	<tbody>
		<tr>
			<td>
				<h3 style="color: #5d9ec3;">
					Terima kasih
				</h3>
			</td>
		</tr>
		<tr>
			<td>
				Terima kasih telah malakukan pemesanan di <a href="http//:erakomp.com" title="Erakomp">Erakom.com</a></strong>.
				Segera lakukan pembayaran dan konfirmasi pembayaran untuk proses transaksi selanjutnya.
			</td>
		</tr>
		<tr>
			<td>
				<h4>Status pesanan anda saat ini</h4>
				<span>Menunggu Pembayaran</span>
			</td>
		</tr>
		<tr>
			<td>
				<h4>Catatan</h4>
				1. Pastikan Anda sudah melakukan pembayaran ke salah satu rekening Erakomp yang tercantum pada tabel rekening dibawah. 
				<br>
				2. Batas waktu konfirmasi pembayaran adalah 1 x 24 jam sejak pemesanan dilakuka. Apabila melebihi batas tersebut, pesanan anda secara otomatis akan dibatalkan. 
			</td>
		</tr>
		<tr>
			<td>
				<!-- TABEL LIST BANK TUJUAN -->
				<h4>Rekening Erakomp</h4>
				<table style="width: 100%;">
					<thead>
						<tr style="border-bottom: 2px solid #999999;">
							<th width="5%">#</th>
							<th width="25%">Bank</th>
							<th>Nomor Rekening</th>
							<th>Atas Nama</th>
						</tr>
					</thead>
					<tbody>
					<?php $no = 1; foreach ($bank as $bank): ?>
						<tr style="border-bottom: 1px solid #ccc">
							<td><?php echo $no ?></td>
							<td><?php echo $bank->bank_name ?></td>
							<td><?php echo $bank->bank_no ?></td>
							<td><?php echo $bank->bank_account ?></td>
						</tr>
					<?php $no++; endforeach ?>
					</tbody>
				</table>

			</td>
		</tr>
		<tr>
			<td>
				<!-- TABEL DATAIL PESANAN -->
				<h4>Detail Pemesanan</h4>
				<strong>No Order : <?php echo $transaction->order_no ?></strong> 
				<table style="width: 100%;">
					<thead>
						<tr style="border-bottom: 2px solid #999999;">
							<th width="5%" align="center">Qty</th>
							<th>Produk</th>
							<th width="25%">Harga</th>
							<th width="25%">Total</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($item as $item): ?>
							<tr style="border-bottom: 2px solid #cccccc;">
								<td><?php echo $item->transaction_item_qty ?></td>
								<td><?php echo $item->product_name ?></td>
								<td><?php echo rupiah($item->transaction_item_price) ?></td>
								<td><?php echo rupiah($item->transaction_item_subtotal) ?></td>
							</tr>
						<?php endforeach ?>
						<tr>
							<td colspan="2" rowspan="3">
								
							</td>
							<td><strong>Jumlah Pesanan</strong></td>
							<td><?php echo rupiah($transaction->transaction_cost) ?></td>
						</tr>
						<tr>
							<td><strong>Biaya Pengiriman</strong></td>
							<td><?php echo rupiah($transaction->transaction_shipping_cost) ?></td>
						</tr>
						<tr>
							<td><strong>Total Biaya</strong></td>
							<td><?php echo rupiah($transaction->transaction_total) ?></td>
						</tr>
					</tbody>
				</table>	
				<a href="<?php echo $base_url.'konfirmasi-pembayaran?order='.$transaction->order_no ?>" title="konfirmasi Pembayaran">
					Konfirmasi Pembayaran
				</a>

			</td>
		</tr>
	</tbody>
</table>
