<style type="text/css">		
	#map_personal {
        height: 100%;
    }
	
	#map_personal{
        height: 450px;
        width: 100%;
    }
	
</style>

<div class="row" style="min-height:850px;">
	<div class="no-padding col-lg-12"  style="padding-left:50px; padding-right:50px;">
		<div class="form-horizontal panel-info col-md-8">
		
			<div id="map_personal"></div>
		</div>
		<br>
		<div class="form-horizontal panel-info col-md-4">
		
		<form class="form-lokasi" id="lokasiForm"  method="post" action="">	
			<input type="hidden" name="req"  value="simpan_data_corona"/>
			<div class="row">
				<div class="col-md-4">
					<label>Nama Lokasi</label>
				</div>
				<div class="col-md-8">
					<input type="text" class="nama_lokasi form-control input-sm" name="nama_lokasi" >
				</div>
			</div>
			<div class="row" style="margin-top:10px;">
				<div class="col-md-4">
					<label>KECAMATAN</label>
				</div>
				<div class="col-md-8">
					<input type="text" class="kecamatan form-control input-sm" name="kecamatan">
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
					<label>Radius</label>
				</div>
				<div class="col-md-8">
					<input type="text" id="rad" class="rad form-control input-sm" name="rad">
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
				<div class="col-md-12 save_button" style="margin-right:5px; text-align:right;" hidden>
					<button type="button"  class="btn btn-default btn-sm btn-cancel" data-dismiss="modal">Batal</button>&nbsp;
					<button type="submit" class="btn btn-primary btn-update btn-sm">Simpan Data</button>
				</div>
			</div>


		</form>	
		</div>
	</div>
</div>



<script type="text/javascript">
$(document).ready(function(){
	
	$(".nama_lokasi,.kecamatan,.notes,.rad").val("")

	$(".btn-cancel").click(function(){
		location.reload(); 
	});

	

	initialMap();
	//ADD MARKER PEGAWAI TO MAP
	function initialMap(){
		var map = L.map('map_personal').setView([-6.28841700 	,107.31922200 	], 14);
		L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
			attribution: 'rohada987_ZTTFiberOptic © 2020',
			//id: 'mapbox.streets',
			//id: 'mapbox.outdoors',
			id: 'mapbox.streets-satellite',
			accessToken: 'pk.eyJ1Ijoicm9oYWRhODciLCJhIjoiY2s4aXZtd3I4MDBqYjNrc205OGZqeWY4eSJ9.A2S8c3Uw4l4q-z4XN9LLIA'
		})
		.addTo(map);
		
		var greenIcon = L.icon({
							iconUrl: './images/corona_icon.png',
							iconSize:     [25, 38],
							iconAnchor:   [12, 36],
							popupAnchor:  [0, -37],
							
						});
		var marker = L.marker([-6.28841700 	,107.31922200], {icon: greenIcon ,draggable: true } ).addTo(map);
		marker.on('dragend', function (e) {
			//alert();
			document.getElementById('latitude').value = marker.getLatLng().lat;
			document.getElementById('longitude').value = marker.getLatLng().lng;
			$('.save_button').show();
		});
	}


//PROSES SIMPAN DATA PEGAWAI
	$( "#lokasiForm" ).validate({
				rules: {
					nama_lokasi: "required",
					kecataman: "required",
					latitude:"required",
					longitude:"required",
					rad:"required"
				},
				messages: {
					nama_lokasi: "Silakan isi nama Lokasi",
					dept: "Silakan isi nama Kecataman",
					latitude: "",
					latitude: "",
					rad:""
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
					window.location.assign("?page=corona_list");	
					},// handling the promise rejection
					function (dismiss) {
						if (dismiss === 'timer') {
							window.location.assign("?page=corona_list");	
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
