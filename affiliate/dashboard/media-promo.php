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
	<section id="page-title" class="page-title">
	<div class="container clearfix">
		<!--  <div id="kontak-top-content"> -->
		<h2 class="heading_title martop_1"><span>Media Promo</span></h2>
		<!-- </div> -->
		<ol class="breadcrumb">
			<li>
				<a href="index">Beranda</a>
			</li>
			<li>
				<a href="media-promo.php">Media Promo</a>
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
							<div id="side-navigation">
								<div class="col_one_third nobottommargin">
									<div class="list-group">
										<a href="index.php" class="list-group-item"><i class="fa fa-user"></i> Beranda</a>
										<a href="panduan.php" class="list-group-item "><i class="fa fa-book"></i> Panduan </a>
										<a href="media-promo.php" class="list-group-item active"><i class="fa fa-tag"></i> Media Promo </a>
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
											<h4 class="nomargin">Media Promo</h4>											
										</div>
										<div class="panel-body">
											Untuk menampilkan di website anda silahan salin script/kode yang ada dibawah gambar yang anda inginkan.
											lalu pasang pada website anda sesuai dengan ukuran yang anda inginkan.
										</div>
										<div class="panel-body">
											<div class="well well-sm">
												<h4>Banner 120 x 600</h4>
												<hr>
												<div class="row">
													<div class="col-xs-12 text-center">
														<img src="assets/120x600_B.jpg" alt="banner 120 x 600">
													</div>
													<div class="clearfix"></div>
													<div class="col-xs-12 text-center martop_1">
														<div class="row">
															<div class="clearfix"></div>
															<div class="col-xs-12">
																<textarea class="martop_1 form-control copymedia" data-copy="copy1" rows="3" id="txt1">&lt;a href="http://kasbon.id/?aff=<?php echo $_SESSION['kode_referal']; ?>" rel="nofollow" target="_top"&gt;&lt;img src="http://kasbon.id/assets/frontend/statics/images/aff_bnr/120x600_B.jpg" alt="bisnis online" title="bisnis online" /&gt;&lt;/a&gt;</textarea>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="well well-sm">
												<h4>Banner 160 x 600</h4>
												<hr>
												<div class="row">
													<div class="col-xs-12 text-center">
														<img src="assets/160x600_B.jpg" alt="banner 160 x 600">
													</div>
													<div class="clearfix"></div>
													<div class="col-xs-12 text-center martop_1">
														<div class="row">
															<div class="clearfix"></div>
															<div class="col-xs-12">
																<textarea class="martop_1 form-control copymedia" data-copy="copy2" rows="3" id="txt2">&lt;a href="http://kasbon.id/?aff=<?php echo $_SESSION['kode_referal']; ?>" rel="nofollow" target="_top"&gt;&lt;img src="http://kasbon.id/assets/frontend/statics/images/aff_bnr/160x600_B.jpg" alt="bisnis online" title="bisnis online" /&gt;&lt;/a&gt;</textarea>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="well well-sm">
												<h4>Banner 200 x 200</h4>
												<hr>
												<div class="row">
													<div class="col-xs-12 text-center">
														<img src="assets/200x200_B.jpg" alt="banner 200 x 200">
													</div>
													<div class="clearfix"></div>
													<div class="col-xs-12 text-center martop_1">
														<div class="row">
															<div class="clearfix"></div>
															<div class="col-xs-12">
																<textarea class="martop_1 form-control copymedia" data-copy="copy3" rows="3" id="txt3">&lt;a href="http://kasbon.id/?aff=<?php echo $_SESSION['kode_referal']; ?>" rel="nofollow" target="_top"&gt;&lt;img src="http://kasbon.id/assets/frontend/statics/images/aff_bnr/200x200_B.jpg" alt="bisnis online" title="bisnis online" /&gt;&lt;/a&gt;</textarea>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="well well-sm">
												<h4>Banner 240 x 400</h4>
												<hr>
												<div class="row">
													<div class="col-xs-12 text-center">
														<img src="assets/240x400_B.jpg" alt="banner 240 x 400">
													</div>
													<div class="clearfix"></div>
													<div class="col-xs-12 text-center martop_1">
														<div class="row">
															<div class="clearfix"></div>
															<div class="col-xs-12">
																<textarea class="martop_1 form-control copymedia" data-copy="copy4" rows="3" id="txt4">&lt;a href="http://kasbon.id/?aff=<?php echo $_SESSION['kode_referal']; ?>" rel="nofollow" target="_top"&gt;&lt;img src="http://kasbon.id/assets/frontend/statics/images/aff_bnr/240x400_B.jpg" alt="bisnis online" title="bisnis online" /&gt;&lt;/a&gt;</textarea>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="well well-sm">
												<h4>Banner 250 x 250</h4>
												<hr>
												<div class="row">
													<div class="col-xs-12 text-center">
														<img src="assets/250x250_B.jpg" alt="banner 250 x 250">
													</div>
													<div class="clearfix"></div>
													<div class="col-xs-12 text-center martop_1">
														<div class="row">
															<div class="clearfix"></div>
															<div class="col-xs-12">
																<textarea class="martop_1 form-control copymedia" data-copy="copy5" rows="3" id="txt5">&lt;a href="http://kasbon.id/?aff=<?php echo $_SESSION['kode_referal']; ?>" rel="nofollow" target="_top"&gt;&lt;img src="http://kasbon.id/assets/frontend/statics/images/aff_bnr/250x250_B.jpg" alt="bisnis online" title="bisnis online" /&gt;&lt;/a&gt;</textarea>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="well well-sm">
												<h4>Banner 300 x 250</h4>
												<hr>
												<div class="row">
													<div class="col-xs-12 text-center">
														<img src="assets/300x250_B.jpg" alt="banner 300 x 250">
													</div>
													<div class="clearfix"></div>
													<div class="col-xs-12 text-center martop_1">
														<div class="row">
															<div class="clearfix"></div>
															<div class="col-xs-12">
																<textarea class="martop_1 form-control copymedia" data-copy="copy6" rows="3" id="txt6">&lt;a href="http://kasbon.id/?aff=<?php echo $_SESSION['kode_referal']; ?>" rel="nofollow" target="_top"&gt;&lt;img src="http://kasbon.id/assets/frontend/statics/images/aff_bnr/300x250_B.jpg" alt="bisnis online" title="bisnis online" /&gt;&lt;/a&gt;</textarea>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="well well-sm">
												<h4>Banner 300 x 600</h4>
												<hr>
												<div class="row">
													<div class="col-xs-12 text-center">
														<img src="assets/300x600_B.jpg" alt="banner 300 x 600">
													</div>
													<div class="clearfix"></div>
													<div class="col-xs-12 text-center martop_1">
														<div class="row">
															<div class="clearfix"></div>
															<div class="col-xs-12">
																<textarea class="martop_1 form-control copymedia" data-copy="copy7" rows="3" id="txt7">&lt;a href="http://kasbon.id/?aff=<?php echo $_SESSION['kode_referal']; ?>" rel="nofollow" target="_top"&gt;&lt;img src="http://kasbon.id/assets/frontend/statics/images/aff_bnr/300x600_B.jpg" alt="bisnis online" title="bisnis online" /&gt;&lt;/a&gt;</textarea>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="well well-sm">
												<h4>Banner 300 x 1050</h4>
												<hr>
												<div class="row">
													<div class="col-xs-12 text-center">
														<img src="assets/300x1050_B.jpg" alt="banner 300 x 1050">
													</div>
													<div class="clearfix"></div>
													<div class="col-xs-12 text-center martop_1">
														<div class="row">
															<div class="clearfix"></div>
															<div class="col-xs-12">
																<textarea class="martop_1 form-control copymedia" data-copy="copy8" rows="3" id="txt8">&lt;a href="http://kasbon.id/?aff=<?php echo $_SESSION['kode_referal']; ?>" rel="nofollow" target="_top"&gt;&lt;img src="http://kasbon.id/assets/frontend/statics/images/aff_bnr/300x1050_B.jpg" alt="bisnis online" title="bisnis online" /&gt;&lt;/a&gt;</textarea>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="well well-sm">
												<h4>Banner 320 x 50</h4>
												<hr>
												<div class="row">
													<div class="col-xs-12 text-center">
														<img src="assets/320x50_B.jpg" alt="banner 320 x 50">
													</div>
													<div class="clearfix"></div>
													<div class="col-xs-12 text-center martop_1">
														<div class="row">
															<div class="clearfix"></div>
															<div class="col-xs-12">
																<textarea class="martop_1 form-control copymedia" data-copy="copy9" rows="3" id="txt9">&lt;a href="http://kasbon.id/?aff=<?php echo $_SESSION['kode_referal']; ?>" rel="nofollow" target="_top"&gt;&lt;img src="http://kasbon.id/assets/frontend/statics/images/aff_bnr/320x50_B.jpg" alt="bisnis online" title="bisnis online" /&gt;&lt;/a&gt;</textarea>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="well well-sm">
												<h4>Banner 320 x 100</h4>
												<hr>
												<div class="row">
													<div class="col-xs-12 text-center">
														<img src="assets/320x100_B.jpg" alt="banner 320 x 100">
													</div>
													<div class="clearfix"></div>
													<div class="col-xs-12 text-center martop_1">
														<div class="row">
															<div class="clearfix"></div>
															<div class="col-xs-12">
																<textarea class="martop_1 form-control copymedia" data-copy="copy10" rows="3" id="txt10">&lt;a href="http://kasbon.id/?aff=<?php echo $_SESSION['kode_referal']; ?>" rel="nofollow" target="_top"&gt;&lt;img src="http://kasbon.id/assets/frontend/statics/images/aff_bnr/320x100_B.jpg" alt="bisnis online" title="bisnis online" /&gt;&lt;/a&gt;</textarea>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="well well-sm">
												<h4>Banner 336 x 280</h4>
												<hr>
												<div class="row">
													<div class="col-xs-12 text-center">
														<img src="assets/336x280_B.jpg" alt="banner 336 x 280">
													</div>
													<div class="clearfix"></div>
													<div class="col-xs-12 text-center martop_1">
														<div class="row">
															<div class="clearfix"></div>
															<div class="col-xs-12">
																<textarea class="martop_1 form-control copymedia" data-copy="copy11" rows="3" id="txt11">&lt;a href="http://kasbon.id/?aff=<?php echo $_SESSION['kode_referal']; ?>" rel="nofollow" target="_top"&gt;&lt;img src="http://kasbon.id/assets/frontend/statics/images/aff_bnr/336x280_B.jpg" alt="bisnis online" title="bisnis online" /&gt;&lt;/a&gt;</textarea>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="well well-sm">
												<h4>Banner 468 x 60</h4>
												<hr>
												<div class="row">
													<div class="col-xs-12 text-center">
														<img src="assets/468x60_B.jpg" alt="banner 468 x 60">
													</div>
													<div class="clearfix"></div>
													<div class="col-xs-12 text-center martop_1">
														<div class="row">
															<div class="clearfix"></div>
															<div class="col-xs-12">
																<textarea class="martop_1 form-control copymedia" data-copy="copy12" rows="3" id="txt12">&lt;a href="http://kasbon.id/?aff=<?php echo $_SESSION['kode_referal']; ?>" rel="nofollow" target="_top"&gt;&lt;img src="http://kasbon.id/assets/frontend/statics/images/aff_bnr/468x60_B.jpg" alt="bisnis online" title="bisnis online" /&gt;&lt;/a&gt;</textarea>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="well well-sm">
												<h4>Banner 728 x 90</h4>
												<hr>
												<div class="row">
													<div class="col-xs-12 text-center">
														<img src="assets/728x90_B.jpg" alt="banner 728 x 90">
													</div>
													<div class="clearfix"></div>
													<div class="col-xs-12 text-center martop_1">
														<div class="row">
															<div class="clearfix"></div>
															<div class="col-xs-12">
																<textarea class="martop_1 form-control copymedia" data-copy="copy13" rows="3" id="txt13">&lt;a href="http://kasbon.id/?aff=<?php echo $_SESSION['kode_referal']; ?>" rel="nofollow" target="_top"&gt;&lt;img src="http://kasbon.id/assets/frontend/statics/images/aff_bnr/728x90_B.jpg" alt="bisnis online" title="bisnis online" /&gt;&lt;/a&gt;</textarea>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="well well-sm">
												<h4>Banner 970 x 90</h4>
												<hr>
												<div class="row">
													<div class="col-xs-12 text-center">
														<img src="assets/970x90_B.jpg" alt="banner 970 x 90">
													</div>
													<div class="clearfix"></div>
													<div class="col-xs-12 text-center martop_1">
														<div class="row">
															<div class="clearfix"></div>
															<div class="col-xs-12">
																<textarea class="martop_1 form-control copymedia" data-copy="copy14" rows="3" id="txt14">&lt;a href="http://kasbon.id/?aff=<?php echo $_SESSION['kode_referal']; ?>" rel="nofollow" target="_top"&gt;&lt;img src="http://kasbon.id/assets/frontend/statics/images/aff_bnr/970x90_B.jpg" alt="bisnis online" title="bisnis online" /&gt;&lt;/a&gt;</textarea>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="well well-sm">
												<h4>Banner 970 x 250</h4>
												<hr>
												<div class="row">
													<div class="col-xs-12 text-center">
														<img src="assets/970x250_B.jpg" alt="banner 970 x 250">
													</div>
													<div class="clearfix"></div>
													<div class="col-xs-12 text-center martop_1">
														<div class="row">
															<div class="clearfix"></div>
															<div class="col-xs-12">
																<textarea class="martop_1 form-control copymedia" data-copy="copy15" rows="3" id="txt15">&lt;a href="http://kasbon.id/?aff=<?php echo $_SESSION['kode_referal']; ?>" rel="nofollow" target="_top"&gt;&lt;img src="http://kasbon.id/assets/frontend/statics/images/aff_bnr/970x250_B.jpg" alt="bisnis online" title="bisnis online" /&gt;&lt;/a&gt;</textarea>
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
<script type="text/javascript" src="assets/copyClipboard.js"></script>
<script>
  $(function() { 
    new Clipboard('.btn');
    $("textarea").on("focus", function(event) {
      event.preventDefault();
      setTimeout(function() { $(event.target).select(); }, 1); 
    });
  });
  </script>
</body>
</html>