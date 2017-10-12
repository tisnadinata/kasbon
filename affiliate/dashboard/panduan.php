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
		<h2 class="heading_title martop_1"><span>Panduan</span></h2>
		<!-- </div> -->
		<ol class="breadcrumb">
			<li>
				<a href="index">Beranda</a>
			</li>
			<li>
				<a href="panduan.php">Panduan</a>
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
										<a href="index.php" class="list-group-item "><i class="fa fa-user"></i> Beranda</a>
										<a href="panduan.php" class="list-group-item active"><i class="fa fa-book"></i> Panduan </a>
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
											<h4 class="nomargin">Panduan</h4>
										</div>
										<div class="panel-body">
											<strong>Berikut ringkasan beberapa strategi promosi yang sukup efektif untuk meningkatkan komisi dari affiliate program kami:</strong>
											<div style="padding:20px;text-align:justify;">
												<ol role="tablist" class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
													<li aria-selected="true" aria-labelledby="ui-id-1" aria-controls="ui-tabs-1" tabindex="0" role="tab" class="ui-state-default ui-corner-top ui-tabs-active ui-state-active">
														<strong>Kenali kasbon</strong>. Dengan begitu, Anda akan memiliki banyak ide dalam membuat sebuah tulisan sehingga pengunjung yang membaca tulisan Anda tertarik untuk memilih kasbon sebagai solusi keuangan. Untuk mengenal kasbon lebih jauh, pelajari semua tentang kasbon di <a id="ui-id-1" tabindex="-1" role="presentation" class="ui-tabs-anchor" href="http://kasbon.com/faq" onclick="window.open(this.href, 'kasbonFAQ', 'resizable=no,status=no,location=no,toolbar=no,menubar=no,fullscreen=no,scrollbars=no,dependent=no,width=800,height=800'); return false;"><strong>sini</strong></a>.
													</li>
													<br>
													<li>
														Gunakan&nbsp;<strong>blog</strong>&nbsp;Anda untuk mengarahkan pengunjung ke kasbon.com, baik berupa banner atau link. Semakin banyak jumlah pengunjung yang Anda arahkan, semakin besar kemungkinan Anda mendapatkan komisi.
													</li>
													<br>
													<li>
														<strong>Optimasi website/blog</strong>&nbsp;Anda untuk mendapatkan pengunjung dari search engine, social media, dan channel lainnya.
													</li>
													<br>
													<li>
														Bergabung dengan&nbsp;<strong>forum</strong>&nbsp;yang populer seperti kaskus, female daily, dan lainnya. Jadilah kontributor aktif di thread populer forum tersebut. Jangan lupa untuk mengubah "signature" di bagian profile dengan menyisipkan link yang mengarah ke postingan blog Anda tentang ulasan kasbon.com.
													</li>
													<br>
													<li>
														Jika Anda memiliki alamat&nbsp;<strong>email</strong>&nbsp;subscriber dari blog Anda, dan kebetulan blog Anda berisi tentang keuangan, kirim subscriber Anda email mengenai kasbon yang sesuai dengan kategori blog Anda.
													</li>
												</ol>
												<div aria-hidden="false" aria-expanded="true" role="tabpanel" aria-labelledby="ui-id-1" aria-live="polite" class="ui-tabs-panel ui-widget-content ui-corner-bottom" id="ui-tabs-1"></div>
												 *CATATAN - Kami tidak mentoleransi spamming dalam cara apapun*<br>
												 &nbsp;
												<ol>
													<li value="6">
														Membuat&nbsp;<strong>video</strong>&nbsp;singkat tentang produk kami dan upload di youtube dan video sharing website lainnya. Sisipkan link affiliate di bagian description atau di layar.
													</li>
													<br>
													<li>
														Jika Anda suka melakukan&nbsp;<strong>chatting</strong>&nbsp;dengan teman atau keluarga, kirimkan link affiliate melalui chattingan.
													</li>
													<br>
													<li>
														Manfaatkan&nbsp;<strong>campaign promo kasbon.com</strong>&nbsp;untuk menarik minat pembeli berbelanja produk promo. Gunakan banner yang kami sediakan mengenai promo tersebut jika ada.
													</li>
													<br>
													<li>
														Update status di&nbsp;<strong>social media</strong>&nbsp;mengenai promo kasbon.com yang sedang berlangsung. jangan lupa menyisipkan link dalam content update social media Anda.
													</li>
													<br>&nbsp;</ol>
												<strong>Tips &amp; trik tambahan untuk meningkatkan pendapatan sebagai affiliate</strong><br>
												 &nbsp;
												<ul>
													<li>
														Berdasarkan pengalaman kami, menulis ulasan sendiri mengenai sebuah produk memiliki tingkat keberhasilan tinggi dalam meningkatkan conversion rate (rata-rata penjualan/pengunjung) dibandingkan hanya memasang banner terutama jika blog/website tidak relevan. Tidak perlu menjadi pakar penulis untuk membuat ulasan. Cukup menuliskan tentang pengalaman menggunakan produk tertentu dan jangan lupa sisipkan link affiliate diakhir tulisan dalam sebuah paragraf
													</li>
													<br>
													<li>
														Bangun konten dengan kombinasi tulisan, poin-poin, quote, dan gambar. Format konten untuk web berbeda dengan format tulisan yang ada di koran dan majalah. Tanyakan pada diri Anda sebelum membangun sebuah konten, mengapa pembaca harus membeli produk yang Anda ulas.
													</li>
													<br>
													<li>
														Coba untuk berpikir layaknya pembaca, ketika mereka datang menuju halaman ulasan dengan lampiran link affiliate, Anda harus menarik minat pembaca untuk mengetahui lebih jauh dengan mengklik link tersebut. Bangun keingintahuan pembaca dengan membahas masalah atau ketakutan yang mungkin dimiliki pembaca. Jangan lupa memberikan dorongan untuk menggunakan produk tertentu untuk mengatasi masalah/ketakutan mereka.
													</li>
													<br>
													<li>
														Lakukan percobaan dengan banner yang berbeda, text link, atau ulasan yang bervariasi. Hasil bisa jadi berbeda untuk kata yang sedikit dirubah atau warna link.
													</li>
												</ul>
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