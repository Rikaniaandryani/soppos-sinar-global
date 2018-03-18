<?php 

/*tanggal indonesia*/
function indonesian_date($date, $day_format = TRUE, $month_format = TRUE){
	/*
		parameter $date adalah waktu yang akan dikonfersi
		$date hanya berbetuk datetime atau date
		2017-02-23 10:06:29 datetime
		2017-02-23					date
	*/
	/*
		$day_format hanya bernilai 'TRUE' atau 'FALSE'.
		Nilai 'TRUE' akan menampilkan nama hari secara lengkap. ex: Senin
		Nilai 'FALSE' akan menampilkan nama hari yang disingkat. ex: Kam untuk Kamis 
	*/
	/*
		$month_format hanya bernilai 'TRUE' atau 'FALSE'.
		Nilai 'TRUE' akan menampilkan nama bulan secara lengkap. ex: Januari
		Nilai 'FALSE' akan menampilkan nama bulan yang disingkat. ex: Okt untuk Oktober 
	*/

	/*Waktu GMT+7*/
	$timestamp	= time()+60*60*7;
	$gmt 				= gmdate($date, $timestamp);
	$time 			= '';

	/*jika berbentuk datetime*/
	if (strpos($date, " ")) {
		/*memisahkan date dan time*/
		$exp_datetime	= explode(" ", $gmt);
		/*memisahkan date*/
		$exp_gmt 			= explode("-",$exp_datetime[0]);
		$time 				= $exp_datetime[1]; 				
		$data['time']	= $time; 
		$day 					= indonesian_day($day_format, strtotime($exp_datetime[0]));
	}

	else {
		$exp_gmt 			= explode("-",$gmt);
		$day 					= indonesian_day($day_format, strtotime($date));
	}

	$dateday 	 	= $exp_gmt[2];
	$month 			= indonesian_month($exp_gmt[1], $month_format);
	$year 			= $exp_gmt[0];

	$data['dateday']	= $dateday;
	$data['month']		= $month;
	$data['year']			= $year;
	$data['day']			= $day;
	$data['datetime']	= $day.', '.$dateday.' '.$month.' '.$year.' - '.$time;
	$data['date'] 		= $dateday.' '.$month.' '.$year;

	return $data;
}

function indonesian_month($month, $month_format){
	$month_type = ($month_format == TRUE) ? 'F' : 'M';
	switch ($month)
	{
		case 1:
			$month = ($month_type == 'F') ? 'Januari' : 'Jan';
			return $month;
			break;
		case 2:
			$month = ($month_type == 'F') ? 'Februari' : 'Feb';
			return $month;
			break;
		case 3:
			$month = ($month_type == 'F') ? 'Maret' : 'Mar';
			return $month;
			break;
		case 4:
			$month = ($month_type == 'F') ? 'April' : 'Apr';
			return $month;
			break;
		case 5:
			$month = ($month_type == 'F') ? 'Mei' : 'Mei';
			return $month;
			break;
		case 6:
			$month = ($month_type == 'F') ? 'Juni' : 'Jun';
			return $month;
			break;
		case 7:
			$month = ($month_type == 'F') ? 'Juli' : 'Jul';
			return $month;
			break;
		case 8:
			$month = ($month_type == 'F') ? 'Agustus' : 'Agu';
			return $month;
			break;
		case 9:
			$month = ($month_type == 'F') ? 'September' : 'Sep';
			return $month;
			break;
		case 10:
			$month = ($month_type == 'F') ? 'Oktober' : 'Okt';
			return $month;
			break;
		case 11:
			$month = ($month_type == 'F') ? 'November' : 'Nov';
			return $month;
			break;
		case 12:
			$month = ($month_type == 'F') ? 'Desember' : 'Des';
			return $month;
			break;
	}
}

function indonesian_day($day_format, $date)
{
	$day_type = ($day_format == TRUE) ? 'l' : 'D';
	$dayList	= array(
		'Sun' => 'Min',
		'Mon' => 'Sen',
		'Tue' => 'Sel',
		'Wed' => 'Rab',
		'Thu' => 'Kam',
		'Fri' => 'Jum',
		'Sat' => 'Sab',
		'Sunday' 		=> 'Minggu',
		'Monday' 		=> 'Senin',
		'Tuesday' 	=> 'Selasa',
		'Wednesday' => 'Rabu',
		'Thursday' 	=> 'Kamis',
		'Friday' 		=> 'Jumat',
		'Saturday' 	=> 'Sabtu'
	);

	$day = date($day_type, $date);
	$day = $dayList[$day];

	return $day;
}
