
<style>
      
       #map_canvas {
            height: 870px;
            width: 102%;
       }

</style>

	<div class="row col-md-12 ">
		<div class="float-container hidden-xs" style="top: 9%; margin-right:20px;">
			<div class="legend" style="width:120px; height:170px; border-radius:5px; padding:15px 0 5px 4px; margin-bottom:20px; border:1px solid #c2becb; background:#f5f5f5; ">
				<img src="./images/FO.png" width="23px" class="fo_marker">  FO  <br>
				<img src="./images/FOC.png" width="23px">  FOC  <br>
				<img src="./images/CONDUCTOR.png" width="23px">  CONDUCTOR  <br>
				<img src="./images/OFFICE.png" width="23px">  OFFICE  <br>
			</div>
		</div>
			  
		<div id="map_canvas"></div>
	</div>	
  
<script type="text/javascript">
$(document).ready(function(){



var map = L.map('map_canvas').setView([-6.28841700 	,107.31922200 	], 11);
L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
    attribution: 'rohada987_ZTTFiberOptic © 2020',
    //id: 'mapbox.streets',
	id: 'mapbox.outdoors',
    accessToken: 'pk.eyJ1Ijoicm9oYWRhODciLCJhIjoiY2s4aXZtd3I4MDBqYjNrc205OGZqeWY4eSJ9.A2S8c3Uw4l4q-z4XN9LLIA'
})
.addTo(map);


    lokasi_pegawai();
	function lokasi_pegawai(){
		$.ajax({
			url: "./kelas/table.php",
			type    : "GET",
			dataType: "json",
			data:{tb:'lokasi_list_pegawai'},
			success: function(data) {

            		for (var i = 0; i < data['list_lokasi'].length; i++) {
                     	var greenIcon = L.icon({
							iconUrl: './images/'+data['list_lokasi'][i].dept+'.png',
							iconSize:     [25, 38],
							iconAnchor:   [12, 36],
							popupAnchor:  [0, -37],
						});
						var marker = L.marker([data['list_lokasi'][i].lat,data['list_lokasi'][i].lon], {icon: greenIcon}).bindPopup(data['list_lokasi'][i].nama_pegawai).addTo(map); 
					
				    }
					
			},
			error: function(data){
				
			}
			
		});
	}

	
	$(document).on('click', '.fo_marker', function(){
		//alert();
		//$(".leaflet-marker-icon").remove(); 
		//$(".leaflet-popup").remove();
		map.removeLayer(marker);
    });
	



    lokasi_covid();
	function lokasi_covid(){
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
                            }).bindTooltip(data['list_lokasi'][i]['nama_lokasi']).openTooltip().addTo(map);

                       
                    }
			},
			error: function(data){
				
			}
			
		});
	}
	
	
	
	var greenIcon = L.icon({
		iconUrl: './images/icon.png',
		iconSize:     [38, 38], // size of the iconshadowSize:   [50, 64], // size of the shadow
		iconAnchor:   [19, 19], // point of the icon which will correspond to marker's location
		
	});
	L.marker([-6.417521, 107.356763], {icon: greenIcon}).addTo(map);
	circle = new L.circle([-6.417521, 107.356763], {
                                color: 'red',
                                fillColor: 'blue',
                                fillOpacity: 0.3,
                                stroke:false,
                                radius: 3500
                            }).addTo(map);
						
	


	






				


});
</script>
