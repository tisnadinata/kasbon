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
	<section id="page-title">
	<div class="container clearfix">
		<!--  <div id="kontak-top-content"> -->
		<h2 class="heading_title martop_1"><span>Konfigurasi</span></h2>
		<!-- </div> -->
		<ol class="breadcrumb">
			<li>
				<a href="index">Beranda</a>
			</li>
			<li>
				<a href="konfigurasi.php">Konfigurasi</a>
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
										<a href="konfigurasi.php" class="list-group-item active"><i class="fa fa-gears"></i> Konfigurasi</a>
										<a href="kontak.php" class="list-group-item "><i class="fa fa-phone"></i> Kontak Kami</a>
										<a href="profile.php" class="list-group-item "><i class="fa fa-desktop"></i> Profil</a>
									</div>
								</div>
								<div class="col_two_third col_last nobottommargin">
								<?php
										if(isset($_POST['btnUbahData'])){
											$stmt = $mysqli->query("UPDATE tbl_affiliate SET 
												email = '$_POST[email]',
												nama = '$_POST[nama]',
												telepon = '$_POST[telepon]',
												website = '$_POST[website]',
												facebook = '$_POST[facebook]',
												twitter = '$_POST[twitter]'
													WHERE kode_referal = '$_SESSION[kode_referal]'
											");
											if($stmt){
												echo'
												<div class="alert alert-success" role="alert">	Ubah <b> Data Pribadi </b> berhasil.	</div>
												';
											}else{
												echo'
												<div class="alert alert-danger" role="alert">	Ubah <b> Data Pribadi </b> gagal.	</div>
												';
											}
											echo '<meta http-equiv="Refresh" content="1; URL=">';
										}else if(isset($_POST['btnUbahBank'])){
											$stmt = $mysqli->query("UPDATE tbl_bank SET 
												nama_bank = '$_POST[bank_name]',
												atas_nama = '$_POST[bank_acc_name]',
												nomor_rekening = '$_POST[bank_acc_num]'
													WHERE id_customer = '$_SESSION[kode_referal]'
											");
											if($stmt){
												echo'
												<div class="alert alert-success" role="alert">	Ubah <b> Data Bank </b> berhasil.	</div>
												';
											}else{
												echo'
												<div class="alert alert-danger" role="alert">	Ubah <b> Data Bank </b> gagal.	</div>
												';
											}
											echo '<meta http-equiv="Refresh" content="1; URL=">';
										}else if(isset($_POST['btnUbahPassword'])){
											if($_POST['old_password'] == $_SESSION['password']){
												if($_POST['new_password'] == $_POST['conf_password']){
													$stmt = $mysqli->query("UPDATE tbl_affiliate SET 
														kata_sandi = '$_POST[new_password]'
															WHERE kode_referal = '$_SESSION[kode_referal]'
													");
													if($stmt){
														echo'
														<div class="alert alert-success" role="alert">	Ubah <b> Kata Sandi </b> berhasil. Kata sandi baru anda <b>'.$_POST['new_password'].'</b>	</div>
														';
													}else{
														echo'
															<div class="alert alert-danger" role="alert">	Ubah <b> Kata Sandi </b> gagal.	</div>
														';
													}
												}else{
												echo'
													<div class="alert alert-danger" role="alert">	Ubah <b> Kata Sandi </b> gagal. Password baru tidak cocok	</div>
												';
												}
											}else{
												echo'
													<div class="alert alert-danger" role="alert">	Ubah <b> Kata Sandi </b> gagal. Password lama tidak cocok	</div>
												';
											}
											echo '<meta http-equiv="Refresh" content="1; URL=">';
										}
									?>
									<div class="panel panel-default">
										<!-- Default panel contents -->
										<div class="panel-heading">
											<h4 class="nomargin">Konfigurasi</h4>
										</div>
										<div class="panel-body">
											<h4 class="marbot_1">Tanggung Jawab kasbon</h4>
											<p class="marbot_2">&nbsp;</p>
											<ul role="tablist" class="leftmargin-sm rightmargin-sm ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
												<li>
													Kami bertanggung jawab kepada nasabah agar tidak terbebani hutang yang tidak perlu dengan hanya meminjamkan kepada mereka yang mampu untuk membayar.
												</li>
												<li>
													Kami bertanggung jawab penuh kepada nasabah dengan menitikberatkan pada tiga hal; jelas, transparan dan adil.
												</li>
												<li>
													Kami ingin nasabah yang tidak termasuk dalam cakupan bank dapat memperoleh pinjaman sehingga dapat meningkatkan status sosial ekonomi masyarakat Indonesia.
												</li>
												<li>
													Kami sangat bertanggung jawab dan turut serta meningkatkan kesejahteraan bangsa serta berkontribusi penuh untuk masyarakat Indonesia.
												</li>
											</ul>
											<p>
												&nbsp;
											</p>
											<h4 class="marbot_1">Deklarasi Hak-Hak Konsumen kasbon</h4>
											<p class="marbot_2">&nbsp;</p>
											<ul class="leftmargin-sm rightmargin-sm">
												<li>
													Kami akan menginformasikan kepada konsumen berapa jumlah total biaya pinjaman dan biaya lainnya (jika ada). Konsumen tidak dibebankan biaya apapun yang tidak termasuk dalam kontrak.
												</li>
												<li>
													Kami memberikan konsumen keleluasaan untuk menentukan periode pinjaman (minimal 10 hari dan maksimal 30 hari).
												</li>
												<li>
													Kami memberikan kebebasan kepada konsumen untuk dapat melakukan pembayaran lebih awal, dengan membayar lebih awal maka biaya yang dibayarkan akan berkurang sesuai jumlah hari yang diinginkan. Kami tidak memberikan biaya tambahan jika konsumen melakukan pembayaran lebih awal (tanpa penalti).
												</li>
												<li>
													Kami berkomitmen untuk bekerja sama dengan konsumen jika konsumen belum dapat membayar sesuai dengan tanggal jatuh tempo.
												</li>
												<li>
													Kami berkomitmen untuk memberikan pelayanan kepada konsumen secara adil, jujur ​​dan hormat.
												</li>
												<li>
													Kami tidak mengijinkan nasabah meminjam untuk melunasi pinjaman yang telah ada, kami tidak ingin menempatkan nasabah dalam kondisi hutang lebih dari yang telah ada.
												</li>
												<li>
													Kami dengan senang hati memberikan konseling secara cuma-cuma kepada jika konsumen menginginkan layanan tersebut.
												</li>
												<li>
													Kami berkomitmen tidak akan pernah berbagi atau menjual data ke pihak manapun.
												</li>
												<li>
													Kami berkomitmen untuk tidak menggunakan metode kriminal atau quasi-pidana kepada konsumen pada saat penarikan dan penagihan pinjaman.
												</li>
											</ul>
										</div>
									</div>
									<div class="panel panel-default">
										<!-- Default panel contents -->
										<div class="panel-heading">
											<h4 class="nomargin">Data Pribadi</h4>
										</div>
										<div class="panel-body">
                                                <form action="" method="post" role="form">                                                  
                                                  <div class="col_full">
                                                      <label for="login-form-username">Email:</label>
                                                          <input aria-required="true" placeholder="Email" id="email" name="email" value="<?php echo $data->email;?>" class="required form-control input-block-level" type="email">
                                                  </div>

                                                 
                                                  <div class="col_full">
                                                      <label for="login-form-username">Nama:</label>
                                                          <input aria-required="true" placeholder="Nama Lengkap" id="full_name" value="<?php echo $data->nama;?>" name="nama" class="required form-control input-block-level" type="text">
                                                  </div>

                                                  <div class="col_full">
                                                      <label for="login-form-password">Nomor Telepon / HP :</label>
                                                          <input aria-required="true" placeholder="Nomor Telepon / HP . Contoh: 081234567891" id="phone_number" minlength="4" onkeypress="return onlyNumberkey(event)" value="<?php echo $data->telepon;?>" name="telepon" class="required form-control input-block-level" type="text">
                                                  </div>
                                                   <div class="col_full">
                                                      <label for="login-form-username">Alamat Website:</label>
                                                          <input placeholder="Website URL" id="site_url" name="website" value="<?php echo $data->website;?>" class="form-control input-block-level" type="url">
                                                       <em> contoh : http://www.domain.com </em>
                                                  </div>
                                                  <div class="col_full">
                                                      <label for="login-form-username">URL Facebook:</label>
                                                          <input placeholder="Facebook URL" id="url_facebook" name="facebook" value="<?php echo $data->facebook;?>" class="form-control input-block-level" type="text">
                                                      <em> contoh : http://www.facebook.com/nama-profil</em>
                                                  </div>

                                                  <div class="col_full">
                                                      <label for="login-form-password">URL Twitter:</label>
                                                          <input placeholder="Twitter URL" id="url_twitter" name="twitter" value="<?php echo $data->twitter;?>" class="form-control input-block-level" type="text">
                                                      <em> contoh : http://www.twitter.com/nama-profil</em>
                                                  </div>
                                                  
                                                  <div class="col_full">
                                                      <input type="submit" class="btn-loading btn-primary btn-sm" id="change_detail" name="btnUbahData" value="Ubah Data"> </input>                                                    
                                                  </div>
                                              </form>
										</div>
									</div>
									<div class="panel panel-default">
										<!-- Default panel contents -->
										<div class="panel-heading">
											<h4 class="nomargin">Data Bank</h4>
										</div>
										<div class="panel-body">
                                                <form action="" method="post" role="form">                                                  
                                                 <br>
                                                  <div class="col_full">
                                                      <label for="login-form-username">Nama Bank:</label>
                                                          <input aria-required="true" placeholder="Nama Bank" id="bank_name" value="<?php echo $data_bank->nama_bank;?>" name="bank_name" class="required form-control input-block-level" type="text">
                                                      <!-- <input type="text" placeholder="Facebook URL" id="login-form-username" name="bank_acc_id" value="" class="required form-control input-block-level" /> -->
                                                  </div>

                                                  <div class="col_full">
                                                      <label for="login-form-password">Nama Pemilik Rekening:</label>
                                                          <input aria-required="true" placeholder="Nama Akun" id="bank_acc_name" value="<?php echo $data_bank->atas_nama;?>" name="bank_acc_name" class="required form-control input-block-level" type="text">
                                                  </div>
                                                   <div class="col_full">
                                                      <label for="login-form-password">Nomor Rekening:</label>
                                                          <input aria-required="true" placeholder="Nomor Rekening" onkeypress="return onlyNumberkey(event)" id="bank_acc_num" minlength="2" value="<?php echo $data_bank->nomor_rekening;?>" name="bank_acc_num" class="required form-control input-block-level" type="text">
                                                  </div>
                                                  <div class="col_full">
                                                      <input type="submit" class="btn-loading btn-primary btn-sm" id="login-form-submit" name="btnUbahBank" value="Ubah Data"></input>
                                                  </div>
                                                  
                                              </form>
										</div>
									</div>
									<div class="panel panel-default">
										<!-- Default panel contents -->
										<div class="panel-heading">
											<h4 class="nomargin">Kata Sandi</h4>
										</div>
										<div class="panel-body">
                                                <form action="" method="post" role="form">                                                  
                                                 <br>
                                                  <div class="col_full">
                                                      <label for="login-form-password">Kata Sandi Lama:</label>
                                                          <input aria-required="true" placeholder="Kata Sandi" id="old_password" minlength="6" name="old_password" class="required form-control input-block-level" type="password" required>
                                                  </div>
                                                  <div class="col_full">
                                                      <label for="login-form-password">Kata Sandi Baru:</label>
                                                          <input aria-required="true" placeholder="Kata Sandi Baru" id="new_password" minlength="6" name="new_password" class="required form-control input-block-level" type="password"required>
                                                  </div>
                                                   <div class="col_full">
                                                      <label for="login-form-password">Konfirmasi Kata Sandi Baru:</label>
                                                          <input aria-required="true" placeholder="Konfirmasi Kata Sandi" id="conf_new_password" minlength="6" equalto="#new_password" name="conf_password" class="required form-control input-block-level" type="password"required>
                                                  </div>
                                                  <div class="col_full">
                                                      <input type="submit" class="btn-loading btn-primary btn-sm" id="login-form-submit" name="btnUbahPassword" value="Ubah Data"> </input>
                                                  </div>
                                              </form>
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
<script type="text/javascript">
    function onlyNumberkey(evt){
      var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
         return false;
         return true;
    }
  </script>
<script>
  $(function() { 
    $( "#side-navigation" ).tabs();
  });
  </script>
</body>
</html>