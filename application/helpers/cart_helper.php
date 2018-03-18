<?php 

/**
	@total_sub
	menghitung total sub dari setiap row data (berat, harga dan kuantitas)
	membutuhkan 2 parameter,
	@data, parameter pertama merupakan data dari database berbentuk array, contohnya hasil dari model->get/ model->get_by
	@suffix, merupakan suffix atau nama depan dari field dalam tabel, misalnya order -> order_qty
**/
function total_sub($data, $suffix)
{
	$i = 1;
	$weight_field = $suffix.'_weight';
	$price_field = $suffix.'_price';
	$qty_field = $suffix.'_qty';

	foreach ($data as $value) {
		$sub_weight[$i] = $value->$weight_field *  $value->$qty_field;
		$sub_price[$i] = $value->$price_field *  $value->$qty_field;
		$sub_qty[$i] = $value->$qty_field;
		$i++;
	}

	$result['total_weight'] = array_sum($sub_weight);
	$result['total_price'] = array_sum($sub_price);
	$result['total_qty'] = array_sum($sub_qty);

	return $result;
}

/*format nominal uang (rupiah) dengan awalan Rp*/
function rupiah($data)
{
	$num_format = number_format($data, 0,'','.');
	return 'Rp '.$num_format;
}

/*format uang*/
function uang($data)
{
	$num_format = number_format($data, 0,'','.');
	return $num_format;
}

/**
	@id, string gabungan dari id produk / product_id
	@src, id produk yang akan dicari dari @id
	fungsi ini digunakan untuk mencari id_produk dalam table order, dan mengembalikan nilai TRUE apabila id ditemukan.
	contoh penggunaan terdapat pada view produk, yang digunakan untuk membedakan item yang telah masuk ke keranjang dan yang belum.
**/
function in_cart($id, $src)
{
	$array_data = explode(',', $src); 

	if (array_search($id, $array_data)) {
		return TRUE;
	}
}
