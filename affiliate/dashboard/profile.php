<?php	
	include 'connectDB.php';
$stmt = $mysqli->query("select * from tbl_affiliate WHERE kode_referal='".$_SESSION['kode_referal']."'"); 
$data = $stmt->fetch_object();
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
	<section id="page-title">
	<div class="container clearfix">
		<!--  <div id="kontak-top-content"> -->
		<h2 class="heading_title martop_1"><span>Profil</span></h2>
		<!-- </div> -->
		<ol class="breadcrumb">
			<li>
				<a href="index">Beranda</a>
			</li>
			<li>
				<a href="profile.php">Profil</a>
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
				<div class="col-sm-14">
					<div class="alert alert-success" role="alert">
						 Link affiliate anda : <b> http://kasbon.id/?aff=<?php echo $_SESSION['kode_referal']; ?> </b>
						| Komisi yang belum dibayarkan : <b>Rp<?php echo setHarga($data->saldo); ?>,- </b>
						<?php
							if($data->saldo >= 200000){
								echo"<a href='withdraw.php'><button class='btn btn-primary'>Withdraw</button></a>";
							}
						?>
					</div>
					<div class="panel panel-default">
						<!-- Default panel contents -->
						<div class="panel-heading">
							<h4 class="nomargin">kasbon Affiliate Program</h4>
						</div>
						<div class="panel-body">
							<div class="ui-tabs ui-widget ui-widget-content ui-corner-all" id="side-navigation">
								<div class="col_one_third nobottommargin">
									<div class="list-group">
										<a href="index.php" class="list-group-item"><i class="fa fa-user"></i> Beranda</a>
										<a href="panduan.php" class="list-group-item "><i class="fa fa-book"></i> Panduan </a>
										<a href="media-promo.php" class="list-group-item "><i class="fa fa-tag"></i> Media Promo </a>
										<a href="laporan.php" class="list-group-item "><i class="fa fa-file"></i> Laporan</a>
										<a href="konfigurasi.php" class="list-group-item "><i class="fa fa-gears"></i> Konfigurasi</a>
										<a href="kontak.php" class="list-group-item "><i class="fa fa-phone"></i> Kontak Kami</a>
										<a href="profile.php" class="list-group-item active"><i class="fa fa-desktop"></i> Profil</a>
									</div>
								</div>
								<div class="col_two_third col_last nobottommargin">
									<div id="snav-content2">
										<div class="panel panel-default">
											<!-- Default panel contents -->
											<div class="panel-heading">
												<h4 class="nomargin">Profil</h4>
											</div>
											<div class="panel-body">
												<div class="col-xs-12">
													<table class="table">
													<tbody>
													<?php
														$stmt = $mysqli->query("select * from tbl_affiliate WHERE kode_referal='".$_SESSION['kode_referal']."'");
														$data = $stmt->fetch_object();
														echo "
															<tr>
																<td>Email</td>
																<td>: ".$data->email."</td>
															</tr>
															<tr>
																<td>Kata Sandi</td>
																<td>: ".$data->kata_sandi."<td>
															</tr>
															<tr>
																<td>Nama</td>
																<td>: ".$data->nama."</td>
															</tr>
															<tr>
																<td>Nomor Telepon</td>
																<td>: ".$data->telepon."</td>
															</tr>
															<tr>
																<td>Alamat Website</td>
																<td>: ".$data->website."</td>
															</tr>
															<tr>
																<td>URL Facebook</td>
																<td>: ".$data->facebook."</td>
															</tr>
															<tr>
																<td>URL Twitter</td>
																<td>: ".$data->twitter."</td>
															</tr>
														";
														$stmt = $mysqli->query("select * from tbl_bank WHERE id_customer='".$_SESSION['kode_referal']."'");
														$data_bank = $stmt->fetch_object();
														echo "
															<tr>
																<td>Nama Bank</td>
																<td>: ".$data_bank->nama_bank."</td>
															</tr>
															<tr>
																<td>Nama Pemilik Rekening</td>
																<td>: ".$data_bank->atas_nama."</td>
															</tr>
															<tr>
																<td>Nomor Rekening</td>
																<td>: ".$data_bank->nomor_rekening."</td>
															</tr>
														";
													?>
													</tbody>
													</table>
													<!-- <a href="#" class="btn btn-primary">My Sales Performance</a>
                                        <a href="#" class="btn btn-primary">Team Sales Performance</a> -->
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</section>
</div>
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
            var base_url = "https:\/\/kasbon.com";
            var path = {"css":"https:\/\/kasbon.com\/assets\/frontend\/statics\/v2\/css\/","js":"https:\/\/kasbon.com\/assets\/frontend\/statics\/v2\/js\/","images":"https:\/\/kasbon.com\/assets\/frontend\/statics\/v2\/images\/","icon":"https:\/\/kasbon.com\/assets\/frontend\/statics\/v2\/images\/icons\/","web":"https:\/\/kasbon.com\/assets\/frontend\/statics\/v2\/images\/web\/","font":"https:\/\/kasbon.com\/assets\/frontend\/statics\/v2\/font\/","vendor":"https:\/\/kasbon.com\/assets\/frontend\/statics\/v2\/vendor\/","twiml":"https:\/\/kasbon.com\/assets\/frontend\/statics\/v2\/twiml\/","assets":"https:\/\/kasbon.com\/assets\/","temp_path":"https:\/\/kasbon.com\/assets\/temp_files\/"};
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
<script>
  $(function() { 
    $( "#side-navigation" ).tabs({ show: { effect: "fade", duration: 400 } });
  });
  </script>
</body>
</html>
