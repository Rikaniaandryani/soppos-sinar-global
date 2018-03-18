<table style="background-color: #ffffff; width: 100%; margin: 0 auto;">
	<tbody>
		<tr>
			<td>
				<h3 style="color: #5d9ec3;">
					Hi, <?php echo $member->member_name ?>!
				</h3>
			</td>
		</tr>
		<tr>
			<td>
				Berikut ini link untuk mengganti password anda. Link ini hanya bisa digunakan sekali saja. Setelah anda berhasil mengganti password, maka link ini tidak akan aktif lagi.
			</td>
		</tr>
		<tr>
			<td style="text-align: center;">
				<a href="<?php echo $link ?>" title="Ganti password" style="margin: 15px auto; padding: 5px 10px; background: #5d9ec3; color: #ffffff; text-decoration: none;">
					Ganti Password
				</a>
			</td>
		</tr>
	</tbody>
</table>
