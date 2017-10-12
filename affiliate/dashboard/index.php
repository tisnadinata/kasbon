<?php	
	include 'connectDB.php';
$stmt = $mysqli->query("select * from tbl_affiliate WHERE kode_referal='".$_SESSION['kode_referal']."'"); 
$data = $stmt->fetch_object();
$stmt = $mysqli->query("select * from tbl_bank WHERE id_customer='".$_SESSION['kode_referal']."'"); 
$data_bank = $stmt->fetch_object();
?>
<html class=" desktop landscape" dir="ltr" prefix="og: http://ogp.me/ns#" lang="id-ID">
<?php
	include 'header.php';
?>

<br>
<br>
<!-- #header end -->
<!-- Document Wrapper
    ============================================= -->
<div class="clearfix">
	<!-- Page Title
    ============================================= -->
	<section id="page-title" class="page-title">
	<div class="container clearfix">
		<h2 class="heading_title martop_1"><span>Beranda</span></h2>
		<ol class="breadcrumb">
			<li>
				<a href="index">Beranda</a>
			</li>
		</ol>
	</div>
	</section>
	<!-- #page-title end -->
	<!-- Content
    ============================================= -->
	<section id="content">
	<div class="content-wrap">
		<div class="container">
			<div class="row">
				<div class="alert alert-success" role="alert">
					 Link affiliate anda : <b> http://kasbon.id/?aff=<?php echo $_SESSION['kode_referal']; ?> </b>
					| Komisi yang belum dibayarkan : <b>Rp<?php echo setHarga($data->saldo); ?>,- </b>
						<?php
							if($data->saldo >= 200000){
								echo"<a href='withdraw.php'><button class='btn btn-primary'>Withdraw</button></a>";
							}
						?>
				</div>
				<div class="col-sm-14">
					<div class="panel panel-default">
						<!-- Default panel contents -->
						<div class="panel-heading">
							<h4 class="nomargin">Kasbon Affiliate Program</h4>
						</div>
						<div class="panel-body">
							<div class="ui-tabs ui-widget ui-widget-content ui-corner-all" id="side-navigation">
								<div class="col_one_third nobottommargin">
									<div class="list-group">
										<a href="index.php" class="list-group-item active"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Beranda</a>
										<a href="panduan.php" class="list-group-item "><i class="fa fa-book"></i> Panduan </a>
										<a href="media-promo.php" class="list-group-item "><i class="fa fa-tag"></i> Media Promo </a>
										<a href="laporan.php" class="list-group-item "><i class="fa fa-file"></i> Laporan</a>
										<a href="konfigurasi.php" class="list-group-item "><i class="fa fa-gears"></i> Konfigurasi</a>
										<a href="kontak.php" class="list-group-item "><i class="fa fa-phone"></i> Kontak Kami</a>
										<a href="profile.php" class="list-group-item "><i class="fa fa-desktop"></i> Profil</a>
									</div>
								</div>
								<div class="col_two_third col_last nobottommargin">
									<div class="panel panel-default">
										<!-- Default panel contents -->
										<div class="panel-heading">
											<h4 class="nomargin">Beranda</h4>
										</div>
										<div class="panel-body">
											<div class="well">
												<h5>Berita</h5>
												<h4>&nbsp;</h4>
												<div class="gwt-Label">Saatnya mendapatkan komisi lebih banyak!</div>
												<br>
												<div class="gwt-HTML">
													Selamat datang di<span style="font-size: 13px; line-height: 20.8px;">&nbsp;Kasbon</span> Affiliate Program,<br>
													 Anda bisa mendapatkan komisi lebih banyak lagi dari program-program yang ada di kasbon.id!&nbsp;
													<div>
														<br></div>
													<div>
														Kunjungi segera laman Media Promo, lalu bagikan banner serta link promo yang ada, dan bersiaplah mendapatkan komisi yang lebih banyak dari Kasbon Affiliate Program.<br>
														 &nbsp;<br>&nbsp;</div>
												</div>
												<h5>&nbsp;</h5>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- side-navigation --></div>
					<!-- panel-body --></div>
				<!-- panel --></div>
			<!-- col-sm-14 --></div>
		<!-- row --></div>
	<!-- container --></section>
</div>
<!-- content-wrap -->
<!-- #wrapper end -->
<!-- Footer -->
<?php
	include 'footer.php';
?>
<!--  .offcanvas-wrapper -->
<!-- Go To Top
    ============================================= -->
<!-- Footer Scripts
    ============================================= -->
<script type="text/javascript">
            var base_url = "https:\/\/kasbon.id";
            var path = {"css":"https:\/\/kasbon.id\/assets/\/frontend\/statics\/v2\/css\/","js":"https:\/\/kasbon.id\/assets/\/frontend\/statics\/v2\/js\/","images":"https:\/\/kasbon.id\/assets/\/frontend\/statics\/v2\/images\/","icon":"https:\/\/kasbon.id\/assets/\/frontend\/statics\/v2\/images\/icons\/","web":"https:\/\/kasbon.id\/assets/\/frontend\/statics\/v2\/images\/web\/","font":"https:\/\/kasbon.id\/assets/\/frontend\/statics\/v2\/font\/","vendor":"https:\/\/kasbon.id\/assets/\/frontend\/statics\/v2\/vendor\/","twiml":"https:\/\/kasbon.id\/assets/\/frontend\/statics\/v2\/twiml\/","assets/":"https:\/\/kasbon.id\/assets/\/","temp_path":"https:\/\/kasbon.id\/assets/\/temp_files\/"};
            var jvalidation = {"required":"This field is required.","remote":"Please fix this field.","email":"Please enter a valid email address.","url":"Please enter a valid URL.","date":"Please enter a valid date.","dateISO":"Please enter a valid date (ISO).","number":"Please enter a valid number.","digits":"Please enter only digits.","creditcard":"Please enter a valid credit card number.","equalTo":"Please enter the same value again.","accept":"Please enter a value with a valid extension.","maxlength":"Please enter no more than {0} karakter.","minlength":"Please enter at least {0} karakter.","rangelength":"Please enter a value between {0} and {1} karakter long.","range":"Please enter a value between {0} and {1}.","max":"Please enter a value less than or equal to {0}.","min":"Please enter a value greater than or equal to {0}."};
            var conf = {"time_info":5000};
        </script>
<script type="text/javascript" src="assets/functions.js"></script>
<script type="text/javascript" src="assets/main_dashboard.js"></script>
<script type="text/javascript">
    $(function(){
        // Check Cookies
        if(navigator.cookieEnabled == false) window.location = "http://www.wikihow.com/Enable-Cookies-in-Your-Internet-Web-Browser";
        //$validator = $("#top-login").validate('.json_encode($log_validate).');
        $validator = $(".edit-personal-user").validate('.json_encode($log_validate).');
        $validator = $(".edit-bank-user").validate('.json_encode($log_validate).');
        $validator = $(".edit-pas-user").validate('.json_encode($log_validate).');
    })
    </script>
<!-- Syntax Javascript -->
<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(
          [["Hari","Pencairan","Pelunasan","Komisi Awal"],["25 Jul 16",0,0,50000]]
        );
        var data2 = google.visualization.arrayToDataTable(
          [["Hari","Pengecekan","Proses","Sukses","Gagal"],["Jan 16",0,0,0,0],["Feb 16",0,0,0,0],["Mar 16",0,0,0,0],["Apr 16",0,0,0,0],["May 16",0,0,0,0],["Jun 16",0,0,0,0]]
        );
        var options = {
          title: 'Commissions',
          hAxis: {title: 'Day',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0},
          // selectionMode: 'multiple',
          // Trigger tooltips
          // on selections.
          tooltip: {trigger: 'selection'},
          // Group selections
          // by x-value.
          aggregationTarget: 'category',
           chartArea: {
                left: "10%",
                top: "10%",
                height: "50%",
                width: "70%"
            }
        };
        var options2 = {
          title: 'Withdrawals',
          hAxis: {title: 'Month',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0},
          // selectionMode: 'multiple',
          // Trigger tooltips
          // on selections.
          tooltip: {trigger: 'selection'},
          // Group selections
          // by x-value.
          aggregationTarget: 'category',
           chartArea: {
                left: "10%",
                top: "10%",
                height: "50%",
                width: "70%"
            }
        };
        var chart = new google.visualization.AreaChart(document.getElementById('comission_chart'));
        chart.draw(data, options);
        var chart2 = new google.visualization.AreaChart(document.getElementById('withdrawals_chart'));
        chart2.draw(data2, options2);
      }
      $(window).on("resize", function (event) {
        drawChart();
    });
    </script>
<script src="assets/a" type="text/javascript"></script>
<link href="assets/uien.css" type="text/css" rel="stylesheet">
<script src="assets/formatendefaultenuiencorecharten.js" type="text/javascript"></script>
<script>
  $(function() { 
    $( "#side-navigation" ).tabs({ show: { effect: "fade", duration: 400 } });
  });
  </script>
</body>
</html>