<?php 

/**
* Library ini menggunakan API rajaongkir
*/
class Lawave_shipment
{
	/**
		API KEY, yang di dapatkan dari raja ongkir
	**/
	private $api_key = '40058ece81b6af28e24f20de2ec33df4';

	/*menghasilkan semua subdistrict berdasarkan @city_id yang dikirim*/
	function subdistrict($city_id = NULL)
	{
		$curl = curl_init();
		curl_setopt_array(
			$curl, 
			array(
				CURLOPT_URL => "http://pro.rajaongkir.com/api/subdistrict?city=".$city_id,
				CURLOPT_RETURNTRANSFER => TRUE,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "GET",
				CURLOPT_HTTPHEADER => array(
					"key: ".$this->api_key
				),
			)
		);

		$response = curl_exec($curl);

		$json_decode = json_decode($response, TRUE);
		return $json_decode;
	}

	/**
		menampilkan hasil dari cost raja ongkir
		@origin, id dari lokasi awal pengiriman. dapat berupa city_id, atau subdistrict_id, tergantung pada nilai @otype.
		@otype, origin type, jenis wilayah awal pengiriman, bernilai city atau subdistrict
		@dest, id dari lokasi tujuan pengiriman. dapat berupa city_id, atau subdistrict_id, tergantung pada nilai @dtype.
		@otype, destination type, jenis wilayah tujuan pengiriman, bernilai city atau subdistrict
		@weight, bera dari item yang dikirim, satuan gram
		@courier, kurir yang digunakan, spt jne, tiki, pos dll
	**/
	function cost($origin, $otype = 'city', $dest, $dtype = 'subdistrict', $weight, $courier)
	{
		$curl = curl_init();
		curl_setopt_array(
			$curl, 
			array(
				CURLOPT_URL => "http://pro.rajaongkir.com/api/cost",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS => "origin=".$origin."&originType=".$otype."&destination=".$dest."&destinationType=".$dtype."&weight=".$weight."&courier=".$courier,
				CURLOPT_HTTPHEADER => array(
					"key: ".$this->api_key
				),
			)
		);

		$response = curl_exec($curl);

		$json_decode = json_decode($response, TRUE);
		return $json_decode;
	}

	function district($data, $district_id)
	{
		foreach ($data['rajaongkir']['results'] as $district) {
			if ($district_id == $district['subdistrict_id']) {
				return $district['subdistrict_name'];
			}
		}
	}
}