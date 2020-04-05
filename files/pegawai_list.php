	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default" style="padding-left:50px; padding-right:50px;">
			
				<div id="toolbar">
					<button class="btn btn-success create_lokasi btn-sm" style="margin-top:-5px;">
						<span class="glyphicon glyphicon-plus"></span>
						<span class="hidden-xs"> Add Pegawai</span>
					</button>	
				</div>
					
					<table
						id="table"
                        class="table-striped table-condensed" 
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
		pageLength: 50,
		columns:[	{
					field: 'no',
					title: 'NO',
					halign:'center',
					align:'center'
					},
					{
					field: 'nama_pegawai',
					title: 'NAMA KARYAWAN',
					halign:'center',
					align:'left'
					},
					{
					field: 'nik',
					title: 'NIK',
					halign:'center',
					align:'center'
					},
					{
					field: 'dept',
					title: 'DEPARTEMEN',
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
					field: 'nama_lokasi',
					title: 'TITIK POSITIF TERDEKAT',
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
	
	
	
	load_data_pegawai();
	function load_data_pegawai(){
		$.ajax({
			url: "./kelas/table.php",
			type    : "GET",
			dataType: "json",
			data:{tb:'pegawai_list'},
			success: function(data) {
				$('.fixed-table-loading').show();
				setTimeout(function() {
					$('.fixed-table-loading').fadeOut(100);
					$('#table').bootstrapTable('load',{data: data['pegawai_list'] });
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
		pegawai_id = $(this).attr('value');
		window.location.assign("?page=pegawai_lokasi_view&id="+pegawai_id);
    });
	
	$(document).on('click','.create_lokasi',function(e){
        e.preventDefault();
		window.location.assign("?page=pegawai_lokasi_add");
	}); 
	

	$(document).on('click', '.hapus', function(){
		pegawai_id = $(this).attr('value');

		swal({
			  title: 'Anda yakin ?',
			  text: "Hapus data lokasi pegawai",
			  type: 'warning',
			  showCancelButton: true,
			  confirmButtonText: 'Ya, Hapus',
			  cancelButtonText: 'Batal'
			}).then(function () {
			 	$.ajax({		
					type: 'POST',
					url:"./kelas/proses.php",
					data   : {req : 'hapus_lokasi_pegawai',pegawai_id:pegawai_id},
					success: function(e) {
					load_data_pegawai();
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