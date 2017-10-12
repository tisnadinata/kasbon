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
										<a href="index.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Beranda</a>
										<a href="panduan.php" class="list-group-item "><i class="fa fa-book"></i> Panduan </a>
										<a href="media-promo.php" class="list-group-item "><i class="fa fa-tag"></i> Media Promo </a>
										<a href="laporan.php" class="list-group-item "><i class="fa fa-file"></i> Laporan</a>
										<a href="konfigurasi.php" class="list-group-item "><i class="fa fa-gears"></i> Konfigurasi</a>
										<a href="kontak.php" class="list-group-item "><i class="fa fa-phone"></i> Kontak Kami</a>
										<a href="profile.php" class="list-group-item "><i class="fa fa-desktop"></i> Profil</a>
									</div>
								</div>
								<div class="col_two_third col_last nobottommargin">
									<?php
										if(isset($_POST['btnWithdraw'])){
											$now = date('d');
											if($now >= 10 AND $now <= 15 AND $data->saldo >= 200000){
												$stmt = $mysqli->query("insert into tbl_withdraw(id_affiliate) values('$_SESSION[kode_referal]')");
												if($stmt){
													$stmt = $mysqli->query("UPDATE tbl_affiliate set saldo=0 where kode_referal='$_SESSION[kode_referal]'");												
													echo'
														<div class="alert alert-success" role="alert">
															Permintaan withdraw berhasil dilakukan, silahkan tunggu konfirmasi pencairan saldo.
														</div>
													';
												}else{
													echo'
														<div class="alert alert-danger" role="alert">
															Permintaan withdraw gagal dilakukan, coba lagi nanti.
														</div>
													';												
												}
											}else{
												echo'
													<div class="alert alert-danger" role="alert">
														Permintaan withdraw gagal dilakukan, coba lagi nanti.
													</div>
												';												
											}
										}
									?>
									<div class="panel panel-default">
										<!-- Default panel contents -->
										<div class="panel-heading">
											<h4 class="nomargin">Withdraw</h4>
										</div>
										<div class="panel-body">
                                                <form action="" method="post" role="form">                                                  
                                                 <br>
                                                  <div class="col_full">
														<label for="login-form-password">Saldo Anda Saat Ini:</label> Rp <?php echo setHarga($data->saldo);?>
                                                  </div>
                                                  <div class="col_full">
                                                      <input type="submit" class="btn-loading btn-primary btn-sm" id="login-form-submit" name="btnWithdraw" value="Cairkan Saldo"> </input>
                                                  </div>
                                              </form>
											<div class="panel panel-default">
												<div class="panel-heading">
													<h4 class="nomargin">Riwayat Withdraw</h4>
												</div>
												<div class="table-responsive">
													<table class="table table-bordered table-responsive">
													<thead>
													<tr>
														<th class="center">#</th>
														<th class="center">Waktu Withdraw</th>
														<th class="center">Tanggal Pencairan</th>
														<th class="center">Jumlah Saldo</th>
														<th class="center">Status</th>
													</tr>
													</thead>
													<tbody>
													<tr>
													<?php 
														$stmt = $mysqli->query("select * from tbl_withdraw where id_affiliate='$_SESSION[kode_referal]' ORDER BY id_withdraw DESC");
														$i=1;
														while($withdraw = $stmt->fetch_object()){
															echo "
																<td class='center'>$i</td>
																<td>".$withdraw->waktu."</td>
																<td>".$withdraw->waktu_pencairan."</td>
																<td>Rp ".setHarga($withdraw->saldo)."</td>
																<td>".$withdraw->status."</td>
															";
															$i++;
														}
													?>
													</tr>
													</tbody>
													</table>
												</div>
											</div>
												<div class="martop_1">
													<p align="justify">
														<i>
														<i style="box-sizing: border-box; color: rgb(85, 85, 85); font-family: 'Open Sans', sans-serif; font-size: 14px; line-height: 28px;">*) Jadwal pembayaran komisi adalah 1 (satu) kali per bulan, yaitu tanggal 10-15 di bulan berikutnya. Jika tanggal pembayaran komisi Anda jatuh pada hari Sabtu atau Minggu dan atau hari libur nasional lainnya atau pada hari dimana bank tidak beroperasi, maka pembayaran komisi &nbsp; &nbsp; &nbsp; akan dilakukan pada 1 (satu) hari kerja berikutnya *) Komisi bisa dicairkan bila sudah mencapai minimum&nbsp;<b style="box-sizing: border-box;">Rp200.000,-&nbsp;</b><br style="box-sizing: border-box;">
														 *) Status :&nbsp;</i>
														</i>
													</p>
													<ul style="padding:20px;margin-top:-40px;">
														<i>
														<li>
															<i style="box-sizing: border-box; color: rgb(85, 85, 85); font-family: 'Open Sans', sans-serif; font-size: 14px; line-height: 28px;">&nbsp;&nbsp; <b style="box-sizing: border-box;">Pengecekan</b>: Dana komisi Anda dalam proses pengecekan&nbsp;</i>
														</li>
														<li>
															<i style="box-sizing: border-box; color: rgb(85, 85, 85); font-family: 'Open Sans', sans-serif; font-size: 14px; line-height: 28px;">&nbsp; &nbsp;<b style="box-sizing: border-box;">Proses</b>: Dana komisi Anda dalam proses transfer&nbsp;</i>
														</li>
														<li>
															<i style="box-sizing: border-box; color: rgb(85, 85, 85); font-family: 'Open Sans', sans-serif; font-size: 14px; line-height: 28px;">&nbsp; &nbsp;<b style="box-sizing: border-box;">Sukses</b>: Dana komisi Anda berhasil ditransfer&nbsp;</i>
														</li>
														<li>
															<i style="box-sizing: border-box; color: rgb(85, 85, 85); font-family: 'Open Sans', sans-serif; font-size: 14px; line-height: 28px;">&nbsp;&nbsp; ​<b style="box-sizing: border-box;">Gagal</b>: Dana komisi Anda belum berhasil ditransfer&nbsp;</i>
														</li>
														</i>
													</ul>
													<i></i>
													<p></p>
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