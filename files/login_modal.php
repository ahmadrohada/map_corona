<div class="modal login_modal modal-md fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">LOGIN</h5>
      </div>
      <div class="modal-body">
        <form class="form-login" id="loginForm"  method="post" action="">	
        <input type="hidden" name="login"  value="1"/>
        <div class="form-group login-label">
          <label>Password</label>
          <input type="password"  id="password" class="form-control input-sm password" name="password" placeholder="Enter password"> 
        </div>
      </div>
      <div class="modal-footer text-center">
        <button type="submit" class="btn btn-block btn-sm btn-primary">SUBMIT</button>
      </div>
    </form>
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function(){ 

	
	$( "#loginForm" ).validate( {
				rules: {
					password: "required",
				},
				messages: {
					password: "Isi Password",
				},
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "label" ) );
					} else {
						error.insertAfter( element );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".login-label" ).addClass( "has-error" ).removeClass( "has-success" );
				},
				unhighlight: function (element, errorClass, validClass) {
					$( element ).parents( ".login-label" ).addClass( "has-success" ).removeClass( "has-error" );
				},
				
				submitHandler: function(form) {
					login_proccess();
			  
				}
				
				
	} );
	
	
	
	
	function login_proccess(){
		var data = $('#loginForm').serialize();
		$.ajax({		
			type: 'POST',
			url:"./kelas/login_handler.php",
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
					},
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
				});
			}			
		});  
		
	}
	
});
</script>