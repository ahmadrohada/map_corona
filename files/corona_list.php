	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default" style="padding-left:50px; padding-right:50px;">
			
				<div id="toolbar">
					<button class="btn btn-success create_lokasi btn-sm" style="margin-top:-5px;">
						<span class="glyphicon glyphicon-plus"></span>
						<span class="hidden-xs"> Add Kordinat</span>
					</button>	
				</div>
					
					<table
						id="table"
                        class="table-striped table-condensed " 
						data-pagination="true"
						data-search="true"
						data-toolbar="#toolbar"
						data-show-pagination-switch="true"
						>
					</table>
			</div>
		</div>
	</div><!--/.row-->
<!-- load googlemaps api dulu -->
<script type="text/javascript">
$(document).ready(function(){



/** ===================== ---------------- ==================== **/	
/** =================    LOAD TABLE DATA   ==================== **/
/** ===================== ---------------- ==================== **/
	$('#table').bootstrapTable({
		columns:[	{
					field: 'no',
					title: 'NO',
					halign:'center',
					align:'center'
					},
					{
					field: 'nama_lokasi',
					title: 'NAMA LOKASI',
					halign:'center',
					align:'left'
					},
					{
					field: 'kecamatan',
					title: 'KECAMATAN',
					halign:'center',
					align:'center'
					},
					{
					field: 'lat',
					title: 'LATITUDE',
					halign:'center',
					align:'center'
					}, 
					{
					field: 'lon',
					title: 'LONGITUDE',
					halign:'center',
					align:'center'
					}, 
					{
					field: 'rad',
					title: 'RADIUS',
					halign:'center',
					align:'center'
					}, 
					{
					field: 'id',
					title: 'OPTION',
					halign:'center',
					align:'center',
					formatter: function (value, row) {
							return 	[  	'<button  class="btn btn-info btn-xs koordinat"  value="'+row.id+'"  ><i class="glyphicon glyphicon-eye-open"></i></button> ' +
										'<button  class="btn btn-danger btn-xs hapus"  value="'+row.id+'"  ><i class="fa fa-close"></i></button>'
									];
							
						}
					}
				]
	});
	
	
	
	load_data_corona();
	function load_data_corona(){
		$.ajax({
			url: "./kelas/table.php",
			type    : "GET",
			dataType: "json",
			data:{tb:'corona_list'},
			success: function(data) {
				$('.fixed-table-loading').show();
				setTimeout(function() {
					$('.fixed-table-loading').fadeOut(100);
					$('#table').bootstrapTable('load',{data: data['corona_list'] });
					$('[data-toggle="tooltip"]').tooltip();
				}, 500);
			},
			error: function(data){
				$('.fixed-table-loading').show();
				
				setTimeout(function() {
					$('.fixed-table-loading').fadeOut(100);
					$('#table').bootstrapTable('removeAll');
				}, 500);
			}
			
		});
	}
	
	$(document).on('click', '.koordinat', function(){
		corona_id = $(this).attr('value');
		window.location.assign("?page=corona_lokasi_view&id="+corona_id);
    });
	
	$(document).on('click','.create_lokasi',function(e){
        e.preventDefault();
		window.location.assign("?page=corona_lokasi_add");
	}); 
	

	$(document).on('click', '.hapus', function(){
		corona_id = $(this).attr('value');

		swal({
			  title: 'Anda yakin ?',
			  text: "Hapus data lokasi corona",
			  type: 'warning',
			  showCancelButton: true,
			  confirmButtonText: 'Ya, Hapus',
			  cancelButtonText: 'Batal'
			}).then(function () {
			 	$.ajax({		
					type: 'POST',
					url:"./kelas/proses.php",
					data   : {req : 'hapus_lokasi_corona',corona_id:corona_id},
					success: function(e) {
					load_data_corona();
							swal({
								title: "",
								text: "Sukses",
								type: "success",
								width: "200px",
								showConfirmButton: false,
								allowOutsideClick : false,
								timer: 1200
							}).then (function(){
								//window.location.assign("?page=lokasi_list");
								},// handling the promise rejection
								function (dismiss) {
									if (dismiss === 'timer') {
										//window.location.assign("?page=lokasi_list");
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
								
							});
						}			
					}); 
			 
			})
		
    });
	
});
</script>