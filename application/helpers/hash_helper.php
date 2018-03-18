<?php 

/*hash string*/
function hash_string($string = '')
{
	return hash('sha1', $string . config_item('encryption_key'));
}

/**
	fungsi ini digunakan untuk mengganti nilai yang dihasilkan dari fungsi encode CI yang digunakan untuk url.
	karena nilai yang dihasilkan dari fungsi encode CI mengandung karakter yang berpengaruh di url. seperti + / dan =
**/
function hash_link_encode($value){
	$_this =& get_instance();
	$encode = $_this->encrypt->encode($value);
	$result = str_replace(array('+','/','='), array('-','_','~'), $encode);
	
	return $result;
}

function hash_link_decode($value){
	$_this =& get_instance();
	$decode = str_replace(array('-','_','~'), array('+','/','='), $value);
	$result =  $_this->encrypt->decode($decode);
	
	return $result;
}