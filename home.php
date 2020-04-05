<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ZTT Fiber Optic</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="icon" type="image/png" href="favicon_png.png" />
    <!-- site css -->
	
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/site.min.css">  
    <link rel="stylesheet" href="./css/style.css">  
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin=""/>
    <link rel="stylesheet" href="./css/font-awesome.css"/>
    <link rel="stylesheet" href="./css/sweetalert2.css">
    <link rel="stylesheet" href="./css/bootstrap-table.css">
    
    
    <script src="./js/jquery-1.11.1.min.js" type="text/javascript"></script>
    <script src="./js/bootstrap.min.js" type="text/javascript"></script>
    <script src="./js/amcharts.js" type="text/javascript"></script>
    <script src="./js/serial.js" type="text/javascript"></script>
    <script src="./js/sweetalert2.js" type="text/javascript"></script>
    <script src="./js/bootstrap-table.js" type="text/javascript"></script>
    <script src="./js/jquery.validate.js" type="text/javascript"></script>
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
	
    
  
  <style>
    .ml2 {
      font-weight: 100;
      font-size: 1.5em;
      color: #f7f6f9;
      text-shadow: -1px -1px 1px rgba(255,255,255,.1), 1px 1px 1px rgba(0,0,0,.5);
    }
    .ml2 .letter {
      display: inline-block;
      line-height: 1em;
    }


  </style>

  </head>
  <body>
    <!--header-->
    <div class="container-fluid">
    <!--documents-->
        <div class="row">
          <div class="col-xs-12 col-sm-12 content">
            <div class="panel panel-default">
              <div class="panel-heading text-center">
              <h3 class="panel-title">
                <a href="#" class="navbar-brand">
                  <img src='./images/ztt_icon.png' height='34px' style='cursor:pointer; margin-top:-20px;'>
                </a>
                <span class="ml2">ZTT INDONESIA - FIBER OPTIC DEPT</span>

                <?php
                  if(isset($_SESSION['access_login'])){
                    echo "<span style='float: right;'>Administrator <img src='./images/logout_icon.png' class='logout_btn' width='25px' style='cursor:pointer; margin-top:-2px;'></span>";
                  }else{
                    echo "<span class='login_btn'  style='float: right;'><img src='./images/login_icon.png' width='30px' style='cursor:pointer; margin-top:-2px;'></span>";
                  }
                ?>
              
              </h3>
              </div>
              <div class="float-container">
                <a href="./home.php"><img src="./images/map_icon.png" width="32px"> &nbsp;&nbsp;&nbsp; LIHAT MAP</a>
                <a href="./home.php?page=chart"><img src="./images/chart.png" width="35px"> &nbsp;&nbsp;&nbsp; DATA CHART</a>
                <a href="./home.php?page=pegawai_list"><img src="./images/lihat_data_pegawai.png" width="35px"> &nbsp;&nbsp;&nbsp; DATA PEGAWAI</a>
                <a href="./home.php?page=corona_list"><img src="./images/lihat_data_corona.png" width="35px"> &nbsp;&nbsp;&nbsp; DATA CORONA</a>
              </div>
         <div class="panel-body" style="min-height:440px;">
						<?php 
              include "konten.php"; 
              include "files/login_modal.php"; 
						?>
              </div><!-- panel body -->
            </div>
        </div><!-- content -->
      </div>
    </div>

   
   
	<script type="text/javascript">
		$(document).ready(function(){


      // Wrap every letter in a span
      var textWrapper = document.querySelector('.ml2');
      textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

      anime.timeline({loop: true})
        .add({
          targets: '.ml2 .letter',
          scale: [3,1],
          opacity: [0,1],
          translateZ: 0,
          easing: "easeOutExpo",
          duration: 950,
          delay: (el, i) => 70*i
        }).add({
          targets: '.ml2',
          opacity: 0,
          duration: 1000,
          easing: "easeOutExpo",
          delay: 6000
        });

			$(".login_btn").click(function () {
        $(".login_modal").modal("show");
      });


      $(".logout_btn").click(function () {
        swal({
			  text: "",
			  type: 'question',
			  showCancelButton: false,
			  confirmButtonText: 'Logout',
			}).then(function () {
			 	$.ajax({		
					type: 'POST',
					url:"./kelas/login_handler.php",
					data   : {logout : '1'},
					success: function(e) {
            location.reload(); 
						},
						error: function(e) {
							swal({
								title: "Gagal",
								text: "",
								type: "warning"
							}).then (function(){
								location.reload(); 
							});
						}			
					}); 
			 
			})
      });
			
		});
	</script>
  </body>
</html>
