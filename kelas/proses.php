<?php
session_start();
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'../config/conn.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'../kelas/pustaka.php';
$d 	= New FormatTanggal();
date_default_timezone_set('Asia/Jakarta');
$waktu = date('Y'."-".'m'."-".'d'." ".'H'.":".'i'.":".'s');

$request=isset($_POST['req'])?$_POST['req']:null;

	
switch($request){
/** =================================================== **/
/** --------------- SIMPAN DATA PEGAWAI  -------------- **/
/** =================================================== **/	
case "simpan_data_pegawai":

	Connect::getConnection();
	$nama_pegawai 	= $_POST['nama_pegawai'];	
	$nik 			= $_POST['nik'];
	$dept 			= $_POST['dept'];
	$latitude 		= $_POST['latitude'];
	$longitude 		= $_POST['longitude'];
	$notes 			= $_POST['notes'];
	
	$query = @mysql_query("INSERT INTO pegawai VALUES(
										'',
										'$nama_pegawai',
										'$nik',
										'$dept',
										'$latitude',
										'$longitude',
										'$notes',
										'$waktu'
										)");
	
	
	
	if ( mysql_errno() == 0){
			header('HTTP/1.1 200 Sukses'); //if sukses
	}else{
			header('HTTP/1.1 500 Internal Server Error'); //if error
			echo mysql_error();
	}	


break;
/** =================================================== **/
/** ----------   HAPUS LOKASI PEGAWAI ----------------- **/
/** =================================================== **/	
case "hapus_lokasi_pegawai":

	if(isset($_SESSION['access_login'])){

		Connect::getConnection();
		$pegawai_id 	= $_POST['pegawai_id'];	
		
		
		$delete = @mysql_query("DELETE FROM pegawai WHERE id	= '$pegawai_id' ");
			
			
		
		if ( mysql_errno() == 0){
				header('HTTP/1.1 200 Sukses'); //if sukses
		}else{
				header('HTTP/1.1 500 Internal Server Error'); //if error
				echo mysql_error();
		}	
	}else{
		header('HTTP/1.1 403 Harus Login'); //if error
		echo "Silakan Login";
	}	


break;
/** =================================================== **/
/** ---------- UPDATE DATA PEGAWAI ----------------- **/
/** =================================================== **/	
case "update_data_pegawai":
	Connect::getConnection();
	$id 				= $_POST['pegawai_id'];
	$nama_pegawai 		= $_POST['nama_pegawai'];	
	$nik 				= $_POST['nik'];
	$dept 				= $_POST['dept'];
	$latitude 			= $_POST['latitude'];
	$longitude 			= $_POST['longitude'];
	$notes 				= $_POST['notes'];


	$update = @mysql_query("UPDATE pegawai SET 
													nama_pegawai		= '$nama_pegawai',
													nik					= '$nik',
													dept				= '$dept',
													lat					= '$latitude',
													lon					= '$longitude',
													notes				= '$notes'
													
													WHERE id		= '$id' ");

	if ( mysql_errno() == 0){
		header('HTTP/1.1 200 Sukses'); //if sukses
	}else{
		header('HTTP/1.1 500 Internal Server Error'); //if error
		echo mysql_error();
	}	
break;
/** =================================================== **/
/** --------------- SIMPAN DATA CORONA  -------------- **/
/** =================================================== **/	
case "simpan_data_corona":

	if(isset($_SESSION['access_login'])){

		Connect::getConnection();
		$nama_lokasi 		= $_POST['nama_lokasi'];	
		$kecamatan 			= $_POST['kecamatan'];
		$latitude 			= $_POST['latitude'];
		$longitude 			= $_POST['longitude'];
		$notes 				= $_POST['notes'];
		$rad 				= $_POST['rad'];
		
		$query = @mysql_query("INSERT INTO corona VALUES(
											'',
											'$nama_lokasi',
											'$kecamatan',
											'$latitude',
											'$longitude',
											'$rad',
											'$notes',
											'$waktu'
											)");
		
		
		
		if ( mysql_errno() == 0){
				header('HTTP/1.1 200 Sukses'); //if sukses
		}else{
				header('HTTP/1.1 500 Internal Server Error'); //if error
				echo mysql_error();
		}	
	}else{
		header('HTTP/1.1 403 Harus Login'); //if error
		echo "Silakan Login";
	}


break;
/** =================================================== **/
/** ---------- UPDATE DATA CORONA ----------------- **/
/** =================================================== **/	
case "update_data_corona":

	if(isset($_SESSION['access_login'])){

		Connect::getConnection();
		$id 				= $_POST['corona_id'];
		$nama_lokasi 		= $_POST['nama_lokasi'];	
		$kecamatan 			= $_POST['kecamatan'];
		$latitude 			= $_POST['latitude'];
		$longitude 			= $_POST['longitude'];
		$notes 				= $_POST['notes'];
		$rad 				= $_POST['rad'];


		$update = @mysql_query("UPDATE corona SET 
														nama_lokasi		= '$nama_lokasi',
														kecamatan		= '$kecamatan',
														lat				= '$latitude',
														lon				= '$longitude',
														rad				= '$rad',
														notes			= '$notes'
														
														
														WHERE id		= '$id' ");

		if ( mysql_errno() == 0){
			header('HTTP/1.1 200 Sukses'); //if sukses
		}else{
			header('HTTP/1.1 500 Internal Server Error'); //if error
			echo mysql_error();
		}	
	}else{
		header('HTTP/1.1 403 Harus Login'); //if error
		echo "Silakan Login";
	}

break;
/** =================================================== **/
/** ----------   HAPUS LOKASI COORNA ----------------- **/
/** =================================================== **/	
case "hapus_lokasi_corona":

	if(isset($_SESSION['access_login'])){

		Connect::getConnection();
		$corona_id 	= $_POST['corona_id'];	
		
		
		$delete = @mysql_query("DELETE FROM corona WHERE id	= '$corona_id' ");
			
			
		
		if ( mysql_errno() == 0){
				header('HTTP/1.1 200 Sukses'); //if sukses
		}else{
				header('HTTP/1.1 500 Internal Server Error'); //if error
				echo mysql_error();
		}	

	}else{
		header('HTTP/1.1 403 Harus Login'); //if error
		echo "Silakan Login";
	}
break;
default;
header('HTTP/1.1 400 request error');
break;
}

?>