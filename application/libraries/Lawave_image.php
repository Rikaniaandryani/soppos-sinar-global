<?php

/**
* Library Lawave_image diciptakan untuk mengolah data gambar/image (Upload, Delete dan membuat Thumbnail).
* 
*/
class Lawave_image
{
	private $image_path;
	private $path = '../uploads/img/';
	const DS = DIRECTORY_SEPARATOR;

	/*
	| DIRECTORY_SEPARATOR digunakan untuk memisahkan directory sesuai sistem operasi yang digunakan 
	*/

	/*
	* upload_image digunakan untuk mengupload 1 file gambar,
	* parameter yang dibutuhkan, yaitu : 
		1. $img_path 		-> lokasi tujuan file yang diupload
		2. $field_name 	-> nilai dari attribut "name" pada tag input bertipe file
		3. $alt 				-> merupakan alt untuk gambar yang juga digunakan untuk mengganti nama gambar yang diupload
	*/
	function upload_image($img_path, $field_name, $alt = NULL)
	{
		$_this =& get_instance();
		$_this->load->library('upload');

		/*
		| get_instace, mendefinisikan "$_this" sebagai pengganti "$this" agar bisa menggunakan fasilitas dari CI
		| me-load library yang akan digunakan
		*/

		$this->image_path = realpath(APPPATH . $this->path.$img_path);
		$files 						= $_FILES[$field_name];
		$rand 						= rand(11, 10000);

		/*
		| deklarasi lokasi file (path) ke dalam "$this->image_path"
		| deklarasi Predefined Variables ke dalam variable "$files"
		| $rand -> nilai random yang digunakan sebagai nama file yang diupload
		*/

		$config['upload_path']		= $this->image_path;
		$config['allowed_types']	= 'jpg|jpeg|png';
		$ext											= explode('.', $files['name']);

		/*
		| konfigurasi lokasi upload
		| konfigurasi tipe gambar (ekstensi) yang diizinkan
		| mendapatkan array nama dan ekstensi file
		*/
		
		$_FILES[$field_name]['name'] = $alt.'-'.$rand.'.'.$ext[1];

		/*
		| perubahan nama file
		*/

		$_this->upload->initialize($config);
		$_this->upload->do_upload($field_name);
		
		/*
		| upload file
		*/

		$image = $_this->upload->data();

		/*
		| memasukan data file yang diupload kedalam "$image"
		*/
		
		$data['image'] 			= $image;
		$data['image_path'] = $this->image_path;

		return $data;

		/*
		| menampung nilai yang akan dikembalikan (return) kedalam "$data"
		| data dari "$image" yang bisa dikembalikan dapat dilihat di https://www.codeigniter.com/userguide3/libraries/file_uploading.html#class-reference
		| "image_path" mengembalikan nilai berupa lokasi file yang baru diupload
		*/
	}

	/*
	* upload_images digunakan untuk mengupload lebih dari 1 file gambar,
	* parameter yang dibutuhkan, yaitu : 
		1. $img_path 		-> lokasi tujuan file yang diupload
		2. $field_name 	-> nilai dari attribut "name" pada tag input bertipe file
		3. $alt 				-> merupakan alt untuk gambar yang juga digunakan untuk mengganti nama gambar yang diupload
		4. $thumb_pre		-> prefix yang digunakan untuk nama thumbnail
		5. $wt 					-> (width thumbnail) nilai lebar untuk thumbnail
		6. $ht 					-> (height thumbnail) nilai tinggi untuk thumbnail
	*/
	public function upload_images($img_path, $field_name, $alt, $thumb_pre, $wt, $ht)
	{
		$_this =& get_instance();
		$_this->load->library('upload','image_moo');

		$this->image_path = realpath(APPPATH . $this->path.$img_path);

		$files 				= $_FILES[$field_name];
		$num_rand			= rand(11, 10000);
		$count_files	= count($files) + 1;

		/*
		| "$count_files" menghitung jumlah $_FILES yang digunakan
		*/

		$config['upload_path']		= $this->image_path;
		$config['allowed_types']	= 'jpg|jpeg|png';

		for ($i=0; $i < $count_files; $i++) {

			if (!empty($files['name'][$i])) {
				$unique_rand = $num_rand + $i; 
				$ext															= explode('.', $files['name'][$i]);
				$_FILES[$field_name]['name'] 			= $alt.'-'.$unique_rand.'.'.$ext[1];
				$_FILES[$field_name]['type'] 			= $files['type'][$i];
				$_FILES[$field_name]['tmp_name'] 	= $files['tmp_name'][$i];
				$_FILES[$field_name]['error'] 		= $files['error'][$i];
				$_FILES[$field_name]['size'] 			= $files['size'][$i];

				/*
				| perulangan dilakukan sebanyak filed input file yang digunakan
				| data akan diproses hanya jika nilai "$files" tidak kosong (empty)
				| data gambar diganti namanya dengan ketentuan "alt-nilai_unik.ekstensi"
				*/

				$_this->upload->initialize($config);
				$_this->upload->do_upload($field_name);

				$image = $_this->upload->data();

				$_this->image_moo
					->load($this->image_path.self::DS.$image['file_name'])
					->resize($wt,$ht)
					->save_pa($thumb_pre,'');

				/*
				| pembuatan thumbnail menggunakan library image-moo
				| untuk seluruh fungsi image-moo dapat dilihat di http://www.matmoo.com/digital-dribble/codeigniter/image_moo/
				| jika nilai $wt dan $ht == 0, maka thumbnail tidak akan diganti ukurannya
				*/

				$new_name[] = $image['file_name'];
			}

			else {
				$new_name[] = '';
			}

			/*
			| seluruh data nama file (baik yang terisi ataupun tidak) akan ditampung dalam "$new_name" 
			*/
		}

		return $new_name;
	}

	/*
	* delete_image digunakan untuk menghapus 1 file gambar,
	* parameter yang dibutuhkan, yaitu : 
		1. $img_path 		-> lokasi tujuan file yang diupload
		2. $image_name 	-> nilai (berupa nama) dari file yang akan dihapus
		3. $thumb 			-> bernilai prefix dari thumbnail gambar yang akan dihapus
	*/
	public function delete_image($img_path, $image_name, $thumb = NULL)
	{
		$_this =& get_instance();

		$this->image_path = realpath(APPPATH . $this->path.$img_path);

		if (!empty($image_name)) {
			unlink($this->image_path.self::DS.$image_name);

			/*
			| gambar dihapus jika parameter pertama tidak kosong (empty)
			*/
			
			if ($thumb){
				unlink($this->image_path.self::DS.$thumb.$image_name);

				/*
				| thumbnail gambar akan dihapus jika parameter terakhir sesuai dengan perifix thumbnail
				*/

			}
		}
	}
}