CMS ver 1.2

Controller:
- penggabungan fungsi insert, update, delete, publish dll kedalam satu fungsi dengan nama action dengan 1 (satu) parameter "action($param){}".


Helper
- hash_helper.php
  - penggunaan fungsi hash_link_encode() dan hash_link_decode() tidak lagi memerlukan fungsi dari library encode. Karena fungsi library tersebut telah ditambahkan dalam helper ini.
    ex : 	{encode lama} hash_link_encode($this->encrypt->encode($nilai));
	 				{encode baru} hash_link_encode($nilai);
	 				{decode lama} $this->encrypt->decode(hash_link_encode($nilai));
	 				{decode baru} hash_link_decode($nilai);

- date_helper.php
	- parameter dalam fungsi indonesian_date($par1, $par2, $par3), yaitu:
		1. parameter 1, bernilai date atau date time
		2. parameter 2, bernilai TRUE atau FALSE. Nilai TRUE akan menampilkan nama hari secara lengkap. ex: Senin.
			 Nilai 'FALSE' akan menampilkan nama hari yang disingkat. ex: Kam untuk Kamis 		
		3. parameter 3, bernilai TRUE atau FALSE. Nilai TRUE akan menampilkan nama bulan secara lengkap. ex: Oktober.
			 Nilai 'FALSE' akan menampilkan nama hari yang disingkat. ex: Okt untuk Oktober 