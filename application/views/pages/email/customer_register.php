<table style="background-color: #ffffff; width: 100%; margin: 0 auto;">
	<tbody>
		<tr>
			<td>
				<h3 style="color: #5d9ec3;">
					Hi, <?php echo $member->member_name ?>! Terima Kasih telah bergabung di Erakomp.com
				</h3>
			</td>
		</tr>
		<tr>
			<td>
				Saat ini akun anda belum aktif. Untuk dapat login ke halaman member, silahkan klik link dibawah untuk verifikasi akun anda.
			</td>
		</tr>
		<tr>
			<td style="text-align: center;">
				<a href="<?php echo $activation_link ?>" title="Verifikasi akun" style="margin: 15px auto; padding: 5px 10px; background: #5d9ec3; color: #ffffff; text-decoration: none;">
					Verifikasi Akun
				</a>
			</td>
		</tr>
	</tbody>
</table>
