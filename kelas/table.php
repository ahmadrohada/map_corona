<?php
	header("Content-Type:application/json");
	session_start();
	include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'../config/conn.php';
	include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'../kelas/pustaka.php';
	$d 	= New FormatTanggal();
	$n 	= New Nilai();
	$u 	= New UkurJarak();
		
	$tb				= isset($_GET['tb'])?$_GET['tb']:null;
		
	
switch($tb){
case "pegawai_list":
		
		Connect::getConnection();
		$response = array();
		$response["pegawai_list"] = array();
		$query = @mysql_query("SELECT a.* FROM pegawai a ORDER BY a.id ASC ");
										
			$no = 0;
			while($dt=mysql_fetch_array($query)){
				$no++;
				$h['no']			= $no;
				$h['id']			= $dt['id'];
				$h['nama_pegawai']	= $dt['nama_pegawai'];
				$h['nik']			= $dt['nik'];
				$h['dept']			= $dt['dept'];
				$h['lat']			= $dt['lat'];
				$h['lon']			= $dt['lon'];
				$h['koordinat']		= $dt['lat'].",".$dt['lon'];
				


				//MEncara jarak terdekat dengan corona
				$q_corona = @mysql_query("SELECT id,lat,lon,rad,nama_lokasi FROM corona ORDER BY id ASC ");
				$temp_jarak = 5000 ;
				$corona_id = null ;
				$nama_lokasi = null ;
				while($x=mysql_fetch_array($q_corona)){
					//Ukur jarak 
					$jarak = $u->jarak($dt['lat'],$dt['lon'],$x['lat'],$x['lon'],'m');
					//jika hasil kurang dari sama dengan radius
					if ( $jarak <= $x['rad'] ){
						//jika jarak baru lebih kecil dari jarak sebeblumnya
						if ( $jarak < $temp_jarak ){
							$temp_jarak 	= $jarak ;
							$corona_id  	= $x['id'];
							$nama_lokasi  	= $x['nama_lokasi'];


						}else{
							$temp_jarak = $temp_jarak;
						}
					}
				}
						


				if ( $temp_jarak < 5000 ){
					$h['jarak']				= $temp_jarak;
					$h['nama_lokasi']		= $nama_lokasi." [ ". number_format( ($temp_jarak/1000),1) ." Km ]" ;
				}else{
					$h['jarak']				= "";
					$h['nama_lokasi']		= "";
				}
				

				array_push($response["pegawai_list"], $h);
					
			} //end while perulangan aaray
			echo json_encode($response);
break;
case "corona_list":
		
	Connect::getConnection();
	$response = array();
	$response["corona_list"] = array();
	$query = @mysql_query("SELECT a.* FROM corona a ORDER BY a.id ASC ");
									
										
	if (mysql_num_rows($query) > 0) {
			$no = 0;
			while($dt=mysql_fetch_array($query)){
			$no++;
			$h['no']			= $no;
			$h['id']			= $dt['id'];
			$h['nama_lokasi']	= $dt['nama_lokasi'];
			$h['kecamatan']		= $dt['kecamatan'];
			$h['lat']			= $dt['lat'];
			$h['lon']			= $dt['lon'];
			$h['rad']			= $dt['rad'] . " m";
			$h['koordinat']		= $dt['lat'].",".$dt['lon'];
			array_push($response["corona_list"], $h);
				
		} //end while perulangan aaray
	} //end if array absens lebih dati nol
		echo json_encode($response);
break;
case "lokasi_list_pegawai":
		
	Connect::getConnection();
	$response = array();
	$response["list_lokasi"] = array();
	$query = @mysql_query("SELECT a.* FROM pegawai a ");
												
	if (mysql_num_rows($query) > 0) {
			$no = 0;
			while($dt=mysql_fetch_array($query)){
				
			
			$h['nama_pegawai']	= $dt['nama_pegawai'];
			$h['dept']			= $dt['dept'];
			$h['lat']			= $dt['lat'];
			$h['lon']			= $dt['lon'];
			array_push($response["list_lokasi"], $h);
				
		}
		
	}
		$response["hasil"] = "sukses";
		echo json_encode($response);
break;
case "lokasi_list_corona":
		
	Connect::getConnection();
	$response = array();
	$response["list_lokasi"] = array();
	$query = @mysql_query("SELECT a.* FROM corona a ");
												
	if (mysql_num_rows($query) > 0) {
			$no = 0;
			while($dt=mysql_fetch_array($query)){
				
			
			$h['nama_lokasi']	= $dt['nama_lokasi'];
			$h['kecamatan']		= $dt['kecamatan'];
			$h['lat']			= $dt['lat'];
			$h['lon']			= $dt['lon'];
			$h['rad']			= $dt['rad'];
			array_push($response["list_lokasi"], $h);
				
		}
		
	}
		$response["hasil"] = "sukses";
		echo json_encode($response);
break;
case "chart":
		
	Connect::getConnection();
	$response = array();
	$response["chart"] = array();


	//CARI LIST DEPT
	$dt_dept = @mysql_query("SELECT dept FROM pegawai GROUP BY dept ");
	//$departement = array('FO','FOC','CONDUCTOR','OFFICE');
	

	while($a=mysql_fetch_array($dt_dept)){
		$inner = 0 ;
		$outer = 0 ;
		$query = @mysql_query("SELECT * FROM pegawai  WHERE dept = '$a[dept]' ");						
		$no = 0;
		while($dt=mysql_fetch_array($query)){
			//MEncara jarak terdekat dengan corona
			$q_corona = @mysql_query("SELECT id,lat,lon,rad,nama_lokasi FROM corona ORDER BY id ASC ");
			$temp_jarak = 5000 ;
			while($x=mysql_fetch_array($q_corona)){
				//Ukur jarak 
				$jarak = $u->jarak($dt['lat'],$dt['lon'],$x['lat'],$x['lon'],'m');
				//jika hasil kurang dari sama dengan radius
				if ( $jarak <= $x['rad'] ){
					//jika jarak baru lebih kecil dari jarak sebeblumnya
					if ( $jarak < $temp_jarak ){
						$temp_jarak 	= $jarak ;
					}else{
						$temp_jarak = $temp_jarak;
					}
				}
			}
			if ( $temp_jarak < 5000 ){
				$inner = $inner+1;
			}else{
				$outer = $outer+1;
			}	

			$dept = $dt['dept'];
		}


		$h['dept']  	= $dept;
		$h['inner']  	= $inner;
		$h['outer']  	= $outer;

		array_push($response["chart"], $h);	
	}

	echo json_encode($response);

break;
default;
header('HTTP/1.1 400 request error');
break;
}
?>