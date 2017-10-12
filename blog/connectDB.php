<?php 
session_start();
$mysqli = new mysqli("localhost","root","","db_kasbon");
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
function kirimSMS($tipe_sms,$nomor){
	$isi_pesan = '';
	
	if($tipe_sms == "register"){
		$isi_pesan = 'Selamat bergabung di kasbon.id, kode OTP anda adalah '.$_SESSION['otp_register'].', silahkan masukan pada halaman website yang muncul';
	}
	if($tipe_sms == "verifikasi"){
	}
	
	$userkeyanda = 'inxa3r';
	$passkeyanda = 'kasbon123';
	$nohptujuan = $nomor;
	$url = "https://reguler.zenziva.net/apps/smsapi.php?userkey=$userkeyanda&passkey=$passkeyanda&nohp=$nohptujuan&pesan=$isi_pesan";
	$url = str_replace(" ","%20",$url);
	file_get_contents($url);
}
?>