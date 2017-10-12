<?php 
session_start();
//$mysqli = new mysqli("localhost","root","","db_kasbon");
$mysqli = new mysqli("localhost","uicyhihu_kbuser","kasbon1234","uicyhihu_kasbon");
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
function generateOTP()
{
   $karakter = 'ABCDEFGHIJKLMNOPQRSTU1234567890';
   $string = '';
   for($i = 0; $i < 6; $i++) {
   $pos = rand(0, strlen($karakter)-1);
   $string .= $karakter{$pos};
   }
    return $string;
}
function setHarga($harga){
	return number_format($harga,0,",",".");
}
function getCountData($sql){
	global $mysqli;
	$stmt = $mysqli->query($sql);
	return $stmt->num_rows;
}
function getSumData($sql){
	global $mysqli;
	$stmt = $mysqli->query($sql);
	$row = $stmt->fetch_object();
	return $row->total;
}
function getDataByCollumn($table,$collumn,$value){
	global $mysqli;
	$stmt = $mysqli->query("select * from $table WHERE $collumn LIKE $value");
	if($stmt->num_rows > 0){
		return $stmt->fetch_object();		
	}else{
		return null;
	}
}
function daftarAffiliate(){
	global $mysqli;
	$email = $_SESSION['email'];
	$password = $_SESSION['password'];
	$conf_password = $_SESSION['password_confirmation'];
	$nama = $_SESSION['full_name'];
	$telepon = $_SESSION['mobile_num'];
	$website = $_SESSION['site_url'];
	$facebook = $_SESSION['fb_url'];
	$twitter = $_SESSION['tw_url'];
	$nama_bank = $_SESSION['bank_name'];
	$atas_nama = $_SESSION['bank_acc_name'];
	$nomor_rekening = $_SESSION['bank_acc_num'];	
	strtoupper($kode_referal = substr($email,0,3).substr($telepon,8,3));
	$stmt = $mysqli->query("select value_pengaturan from tbl_pengaturan where nama_pengaturan='komisi_awal'");
	$komisi = $stmt->fetch_object();
	$komisi_awal = $komisi->value_pengaturan;
	if($password == $conf_password){
		$stmt = $mysqli->query("insert into tbl_affiliate(kode_referal,email,kata_sandi,nama,telepon,website,facebook,twitter,saldo)
			values('$kode_referal','$email','$password','$nama','$telepon','$website','$facebook','$twitter','$komisi_awal');
		");
		if($stmt){
			$stmt = $mysqli->query("insert into tbl_bank(id_customer,nama_bank,atas_nama,nomor_rekening)
				values('$kode_referal','$nama_bank','$atas_nama','$nomor_rekening');
			");
			if($stmt){
				kirimEmail("affiliate",$nama,$email);
				$data_admin = $mysqli->query("select value_pengaturan from tbl_pengaturan where nama_pengaturan = 'nomor_telepon'");
				$no_admin = $data_admin->fetch_object();
				kirimSMS("admin/$nama",$no_admin->value_pengaturan);
				echo'
					<div class="alert alert-success" role="alert">
					Daftar berhasil, silahkan login.
					</div>
					<meta http-equiv="Refresh" content="1; URL=login.php">
				';										
			}else{
				echo'
					<div class="alert alert-danger" role="alert">
						Gagal menambahkan bank.
					</div>
				';										
			}
		}else{
			echo'
				<div class="alert alert-danger" role="alert">
					Gagal menambahkan affiliate.
				</div>
			';										
		}
	}else{
		echo'
			<div class="alert alert-danger" role="alert">
				Konfrimasi password tidak cocok.
			</div>
		';										
	}

}
function kirimSMS($tipe_sms,$nomor){
	$isi_pesan = '';
	$tipe_sms = explode("/",$tipe_sms);
	if($tipe_sms[0] == "register"){
		$isi_pesan = 'Selamat bergabung di kasbon.id, kode OTP anda adalah '.$_SESSION['otp_register'].', silahkan masukan pada halaman website yang muncul';
	}
	if($tipe_sms[0] == "admin"){
		$isi_pesan = "Ada affiliate baru terdaftar dengan nama ".$tipe_sms[1].",";
	}
	
	$userkeyanda = 'inxa3r';
	$passkeyanda = 'kasbon123';
	$nohptujuan = $nomor;
	$url = "https://reguler.zenziva.net/apps/smsapi.php?userkey=$userkeyanda&passkey=$passkeyanda&nohp=$nohptujuan&pesan=$isi_pesan";
	$url = str_replace(" ","%20",$url);
	file_get_contents($url);
}
function kirimEmail($tipe_email,$data,$email){
	include '../emailLibrary/function.php';
	$isi_pesan = '';
	$data = explode("/",$data);
	if($tipe_email == "register"){
		$isi_pesan = 'Selamat bergabung di kasbon.id, anda secara resmi sudah menjadi affiliate kami di kasbon.id dengan nama <b>'.$data[0].'</b>';
	}
    $to       = $email;
    $subject  = 'Kasbon.id Pinjaman Uang Cepat';
    $message  = "<p>".$isi_pesan."</p>";
    smtp_mail($to, $subject, $message, '', '', 0, 0, true);
}
?>