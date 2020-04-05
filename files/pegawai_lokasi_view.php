<style type="text/css">		
	#map_personal {
        height: 100%;
    }
	
	#map_personal{
        height: 450px;
        width: 100%;
    }
	
</style>


<?php
	$pegawai_id = isset($_GET['id']) ? $_GET['id'] : '';
?>
<input type="hidden" value="<?php echo $pegawai_id ?>" id="pegawai_id" name="pegawai_id" data-id="<?php echo $pegawai_id ?>"> 
<div class="row" style="min-height:850px;">
	<div class="no-padding col-lg-12"  style="padding-left:50px; padding-right:50px;">
		<div class="form-horizontal panel-info col-md-8">
		
			<div id="map_personal"></div>
		</div>
		<br>
		<div class="form-horizontal panel-info col-md-4">
		
		<form class="form-lokasi" id="lokasiForm"  method="post" action="">	
			<input type="hidden" name="req"  value="update_data_pegawai"/>
			<input type="hidden" name="pegawai_id"  value="<?php echo $pegawai_id ?>"/>
			<div class="row">
				<div class="col-md-4">
					<label>Nama Pegawai</label>
				</div>
				<div class="col-md-8">
					<input type="text" class="nama_pegawai form-control input-sm" name="nama_pegawai" >
				</div>
			</div>
			<div class="row" style="margin-top:10px;">
				<div class="col-md-4">
					<label>NIK</label>
				</div>
				<div class="col-md-8">
					<input type="text" class="nik form-control input-sm" name="nik">
				</div>
			</div>
			<div class="row" style="margin-top:10px;">
				<div class="col-md-4">
					<label>Departement</label>
				</div>
				<div class="col-md-8">
					<input type="text" class="dept form-control input-sm" name="dept" autocomplete="off" onkeypress='return readonly(event)'>
				</div>
			</div>
			<div class="row" style="margin-top:10px;">
				<div class="col-md-4">
					<label>Latitude</label>
				</div>
				<div class="col-md-8">
					<input type="text" id="latitude" class="latitude form-control input-sm" name="latitude" onkeypress='return readonly(event)'>
				</div>
			</div>
			<div class="row" style="margin-top:10px;">
				<div class="col-md-4">
					<label>Longitude</label>
				</div>
				<div class="col-md-8">
					<input type="text" id="longitude" class="longitude form-control input-sm" name="longitude" onkeypress='return readonly(event)'>
				</div>
			</div>
			
			<div class="row" style="margin-top:10px;">
				<div class="col-md-4">
					<label>Keterangan</label>
				</div>
				<div class="col-md-8">
					<input type="text" class="notes form-control input-sm" name="notes" placeholder="optional">
				</div>
			</div>


			<div class="row" style="margin-top:10px;">
				<div class="col-md-12">
					<font style="color:#c1c1c3; font-size:12px;">** Geser marker pada peta untuk merubah koordinat</font>
				</div>
			</div>
			
			<div class="row" style="margin-top:30px;">
				<div class="col-md-3">
					
				</div>
				<div class="col-md-12 update_button" style="margin-right:5px; text-align:right;" hidden>
					<button type="button"  class="btn btn-default btn-sm btn-cancel" data-dismiss="modal">Batal</button>&nbsp;
					<button type="submit" class="btn btn-primary btn-update btn-sm">Update Data</button>
				</div>
			</div>


		</form>	
		</div>
	</div>
</div>



<script type="text/javascript">
$(document).ready(function(){
	


	pegawai_id = $("#pegawai_id").val();

	/** ===================== ---------------- ==================== **/	
	/** =================       DRTAIL LOKASI   ==================== **/
	/** ===================== ---------------- ==================== **/
	$.ajax({
			url		:"./kelas/detail.php",
			type    : "GET",
			dataType: "json",
			data	:{op:'detail_lokasi_pegawai',pegawai_id:pegawai_id},
			cache	:false,
				
			success:function(data){
				
				$('.nama_pegawai').val(data['nama_pegawai']);
				$('.nik').val(data['nik']);
				$('.dept').val(data['dept']);
				$('.latitude').val(data['latitude']);
				$('.longitude').val(data['longitude']);
				$('.notes').val(data['notes']);
				changeMarkerPosition(data['latitude'],data['longitude'],data['dept'],data['nama_pegawai']);
			},
			error: function(data) {
				
				
			}
	}); 


	$(".btn-cancel").click(function(){
		location.reload(); 
	});

	$(".nama_pegawai,.nik,.notes").keypress(function(){
		$('.update_button').show();
	}); 


	//ADD MARKER PEGAWAI TO MAP
	function changeMarkerPosition(lat,lon,dept,nama){
		var map = L.map('map_personal').setView([lat,lon], 14);
			L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
				attribution: 'rohada987_ZTTFiberOptic © 2020',
				id: 'mapbox.streets-satellite',
				accessToken: 'pk.eyJ1Ijoicm9oYWRhODciLCJhIjoiY2s4aXZtd3I4MDBqYjNrc205OGZqeWY4eSJ9.A2S8c3Uw4l4q-z4XN9LLIA'
			})
		.addTo(map);

		

		var greenIcon = L.icon({
							iconUrl: './images/'+dept+'.png',
							iconSize:     [25, 38],
							iconAnchor:   [12, 36],
							popupAnchor:  [0, -37],
							
						});
		var marker = L.marker([lat,lon], {icon: greenIcon ,draggable: true } ).bindPopup(nama).addTo(map);
		marker.on('dragend', function (e) {
			//alert();
			document.getElementById('latitude').value = marker.getLatLng().lat;
			document.getElementById('longitude').value = marker.getLatLng().lng;
			$('.update_button').show();
		});
		//CORONA MARKER				
			$.ajax({
				url: "./kelas/table.php",
				type    : "GET",
				dataType: "json",
				data:{tb:'lokasi_list_corona'},
				success: function(data) {
						for (var i = 0; i < data['list_lokasi'].length; i++) {
							circle = new L.circle([data['list_lokasi'][i]['lat'],data['list_lokasi'][i]['lon']], {
									color: 'red',
									fillColor: '#f03',
									fillOpacity: 0.2,
									stroke:false,
									radius: data['list_lokasi'][i]['rad']
								}).addTo(map);
						}
				},
				error: function(data){
				}
			});
		
	}


//PROSES UPDATE DATA PEGAWAI
	$( "#lokasiForm" ).validate({
				rules: {
					nama_pegawai: "required",
					dept: "required",
					latitude:"required",
					longitude:"required"
				},
				messages: {
					nama_pegawai: "Silakan isi nama Pegawai",
					dept: "Silakan isi nama Departement",
					latitude: "",
					latitude: ""
				},
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					//error.addClass( "help-block" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "label" ) );
					} else {
						error.insertAfter( element );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".col-md-8" ).addClass( "has-error" ).removeClass( "has-success" );
				},
				unhighlight: function (element, errorClass, validClass) {
					$( element ).parents( ".col-md-8" ).addClass( "has-success" ).removeClass( "has-error" );
				},
				
				submitHandler: function(form) {
					//ini ajax function nya
					update_data();
			  
				}
				
				
	});


	function update_data(){
		var data = $('#lokasiForm').serialize();
		$.ajax({		
			type: 'POST',
			url:"./kelas/proses.php",
			data: data,
			success: function(e) {
				
				swal({
					title: "",
			        text: "Sukses",
			        type: "success",
					width: "200px",
					showConfirmButton: false,
					allowOutsideClick : false,
					timer: 1200
				}).then (function(){
					location.reload(); 
					},// handling the promise rejection
					function (dismiss) {
						if (dismiss === 'timer') {
							location.reload(); 
						}
					}
				)
				 
					
				 
			},
			error: function(e) {
				swal({
					title: "Gagal",
					text: "",
					type: "warning"
				}).then (function(){
					//$('.form_kreativitas').modal('hide');
				});
			}			
		});  
		
	}

	
		
	

});
</script>
