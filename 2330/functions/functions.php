<?php 
session_start();
//$mysqli = new mysqli("localhost","uicyhihu_kbuser","kasbon1234","uicyhihu_kasbon");
$mysqli = new mysqli("localhost","root","","db_kasbon");
	
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
// getting the user IP address
function getIpCustomer(){
$ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'IP Tidak Dikenali';
 
    return $ipaddress;
}
function generateOTP(){
   $karakter = 'ABCDEFGHIJKLMNOPQRSTU1234567890';
   $string = '';
   for($i = 0; $i < 6; $i++) {
   $pos = rand(0, strlen($karakter)-1);
   $string .= $karakter{$pos};
   }
    return $string;
}
function kirimSMS($tipe_sms,$data,$nomor){
	$isi_pesan = '';
	$data = explode("/",$data);
	if($tipe_sms == "register"){
		$isi_pesan = 'Selamat bergabung di kasbon.id, kode OTP anda adalah '.$data[0].', silahkan masukan pada halaman website yang muncul';
	}
	if($tipe_sms == "peminjaman"){
		$isi_pesan = 'Selamat peminjaman dari kasbon.id sebesar Rp.'.setHarga($data[0]).' telah dikirim ke nomor rekening '.$data[1].', terimakasih';
	}
	if($tipe_sms == "member"){
		$isi_pesan = 'Untuk pembayaran di kasbon.id silahkan login ke member area menggunakan password '.$data[0].' dan email di daftarkan.';
	}
	if($tipe_sms == "pencairan"){
		$isi_pesan = 'Saldo dari kasbon.id sebesar Rp.'.setHarga($data[0]).' telah dicairkan ke rekening '.$data[1].', terimakasih.';
	}
	$userkeyanda = 'inxa3r';
	$passkeyanda = 'kasbon123';
	$nohptujuan = $nomor;
	$url = "https://reguler.zenziva.net/apps/smsapi.php?userkey=$userkeyanda&passkey=$passkeyanda&nohp=$nohptujuan&pesan=$isi_pesan";
	$url = str_replace(" ","%20",$url);
	file_get_contents($url);
}
function kirimEmail($tipe_email,$data,$email){
	include '../../emailLibrary/function.php';
	$isi_pesan = '';
	$data = explode("/",$data);
	if($tipe_email == "register"){
		$isi_pesan = 'Selamat bergabung di kasbon.id, anda secara resmi sudah menjadi member di kasbon.id';
	}
	if($tipe_email == "peminjaman"){
		$isi_pesan = 'Selamat peminjaman dari kasbon.id sebesar <b>Rp.'.setHarga($data[0]).'</b> telah dikirim ke nomor rekening <b>'.$data[1].'</b>, terimakasih';
	}
	if($tipe_email == "member"){
		$isi_pesan = 'Untuk pembayaran di kasbon.id silahkan login ke member area menggunakan password <b>'.$data[0].'</b> dan email di daftarkan.';
	}
	if($tipe_email == "pencairan"){
		$isi_pesan = 'Saldo dari kasbon.id sebesar <b>Rp.'.setHarga($data[0]).'</b> telah dicairkan ke rekening <b>'.$data[1].'</b>, terimakasih.';
	}
    $to       = $email;
    $subject  = 'Kasbon.id Pinjaman Uang Cepat';
    $message  = "<p>".$isi_pesan."</p>";
    smtp_mail($to, $subject, $message, '', '', 0, 0, true);
}
function enkripPassword($value){
	return sha1(md5($value));	
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
function pengaturanUmum(){
	global $mysqli;
	$stmt = $mysqli->query("select * from tbl_pengaturan");
	$i=0;
	while($row = $stmt->fetch_object()){
		$data[$row->id_pengaturan] = $row->value_pengaturan;
		$i++;
	}
	$stmt->close();
	if(isset($_POST['btnUbahPengaturan'])){
		$pengaturan = $_POST['pengaturan'];
		for($i=1;$i<=9;$i++){
			$stmt = $mysqli->query("
				UPDATE tbl_pengaturan SET
				value_pengaturan = '".$pengaturan[$i]."'
				WHERE id_pengaturan = '$i'
			");
		}
		echo '		
			<div class="divider divider--xs"></div>
			<div class="alert alert-success" role="alert" align="center">
				Pengaturan berhasil diubah.
			</div>
			<meta http-equiv="Refresh" content="2; URL=">
		';					
	}
	echo'
	<form action="" role="form" method="post">
		<h6>Perusahaan :</h6>
		<div class="form-group row">
			<label for="inputEmail3" class="col-sm-5 form-control-label">Nama Perusahaan</label>
			<div class="col-sm-7">
				<input type="text" class="form-control" name="pengaturan[4]" placeholder="Nama Perusahaan" value="'.$data[4].'"></div>
		</div>
		<div class="form-group row">
			<label for="inputEmail3" class="col-sm-5 form-control-label">Deskripsi Perusahaan</label>
			<div class="col-sm-7">
				<textarea class="form-control" name="pengaturan[6]" rows="5" cols="28" width="100%" style="resize:none;" placeholder="Alamat Perusahaan Anda">'.$data[6].'</textarea>
			</div>
		</div>
		<div class="form-group row">
			<label for="inputEmail3" class="col-sm-5 form-control-label">Alamat Perusahaan</label>
			<div class="col-sm-7">
<input type="text" class="form-control" name="pengaturan[7]" placeholder="Alamat Perusahaan" value="'.$data[7].'"></div>
		</div>
		<div class="form-group row">
			<label for="inputEmail3" class="col-sm-5 form-control-label">Nomor Telepon</label>
			<div class="col-sm-7">
				<input type="text" class="form-control" name="pengaturan[2]" placeholder="Nomor telepon perusahaan/website" value="'.$data[2].'"></div>
		</div>
		<h6>Website :</h6>
		<div class="form-group row">
			<label for="inputEmail3" class="col-sm-5 form-control-label">Logo Website</label>
			<div class="col-sm-7">
				<input type="text" class="form-control" name="pengaturan[5]" placeholder="Link/URL gambar website anda" value="'.$data[5].'"></div>
		</div>
		<h6>Affiliate & Peminjaman :</h6>
		<div class="form-group row">
			<label for="inputEmail3" class="col-md-5 col-xs-12 form-control-label">Komisi Awal</label>
			<div class="col-xs-6 col-md-4">
				<input type="number" class="form-control" name="pengaturan[3]" placeholder="Komisi Awal" min="0" value="'.$data[3].'"></div>
			<div class="col-xs-6 col-md-1">
				<label for="inputEmail3" class="form-control-label"><b> rupiah</b></label>
			</div>
		</div>
		<div class="form-group row">
			<label for="inputEmail3" class="col-md-5 col-xs-12 form-control-label">Komisi Peminjaman</label>
			<div class="col-xs-6 col-md-4">
				<input type="number" class="form-control" name="pengaturan[8]" placeholder="Komisi pinjaman" min="0" value="'.$data[8].'"></div>
			<div class="col-xs-6 col-md-1">
				<label for="inputEmail3" class="form-control-label"><b> rupiah</b></label>
			</div>
		</div>
		<div class="form-group row">
			<label for="inputEmail3" class="col-md-5 col-xs-12 form-control-label">Komisi Pelunasan</label>
			<div class="col-xs-6 col-md-4">
				<input type="number" class="form-control" name="pengaturan[9]" placeholder="Komisi Lunas" min="0" value="'.$data[9].'"></div>
			<div class="col-xs-6 col-md-1">
				<label for="inputEmail3" class="form-control-label"><b> rupiah</b></label>
			</div>
		</div>
		<div class="form-group row">
			<label for="inputEmail3" class="col-md-5 col-xs-12 form-control-label">Bunga pinjaman</label>
			<div class="col-xs-6 col-md-4">
				<input type="number" class="form-control" name="pengaturan[1]" placeholder="Bunga pinjaman" min="0" value="'.$data[1].'"></div>
			<div class="col-xs-6 col-md-2">
				<label for="inputEmail3" class="form-control-label"><b>%/hari</b></label>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-sm-12">
				<button type="submit" name="btnUbahPengaturan" class="btn btn-primary col-sm-12 col-md-6 col-md-offset-3 pull-right">Ubah pengaturan</button>
			</div>
		</div>
	</form>
	<hr>
	<hr>
	<hr>
	';
}
function dashboardPinjaman(){
	global $mysqli;
	$stmt = $mysqli->prepare("select tbl_customer.nama_lengkap,tbl_peminjaman.total_peminjaman,tbl_peminjaman.tanggal_pengajuan from tbl_customer,tbl_peminjaman WHERE tbl_peminjaman.status_peminjaman = 'pending' AND tbl_peminjaman.id_customer = tbl_customer.id_customer");
	$stmt->execute(); 
	$stmt->bind_result($nama_lengkap,$total_peminjaman,$tanggal_pengajuan); 
	while($stmt->fetch()){ 
		$tanggal_pengajuan = date("d M/H:m",strtotime($tanggal_pengajuan)); 
		echo '
		<li class="item">
			<div class="item-row">
				<div class="item-col item-col-title no-overflow">
					<div>
						<a href="#" class=""><h4 class="item-title no-wrap">'.$nama_lengkap.'</h4></a>
					</div>
				</div>
				<div class="item-col item-col-sales">
					<div class="item-heading">Pinjaman</div>
					<div>Rp '.setHarga($total_peminjaman).'</div>
				</div>
				<div class="item-col item-col-date">
					<div class="item-heading">Published</div>
					<div>'.$tanggal_pengajuan.'</div>
				</div>
			</div>
		</li>
		';
	}
	$stmt->close();
}

function memberList($cari){
	global $mysqli;
	
	if($cari == "all" OR $cari == ""){
		$cari = "nama_lengkap != ''";
	}else{
		$cari = "nama_lengkap LIKE '%$cari%'";
	}
	$stmt = $mysqli->query("select * from tbl_customer where $cari GROUP BY id_customer");
	if($stmt->num_rows== 0){
		echo '<tr class=""><td colspan="8" class="center">Tidak ada data ditemukan.</td></tr>';
	}else{
		while($data = $stmt->fetch_object()){
			echo'
				<tr class="">
					<td>'.$data->nama_lengkap.'</td>
					<td>'.$data->email.'</td>
					<td class="center">'.$data->jenis_kelamin.'</td>
					<td class="center">'.$data->tempat_lahir.', '.date("d F Y",strtotime($data->tanggal_lahir)).'</td>
					<td class="center">'.$data->agama.' / '.$data->ras_suku.'</td>
					<td>'.$data->pendidikan.'</td>
					<td>'.$data->status_pernikahan.'</td>
					<td align="right">'.$data->jumlah_tanggungan.' orang</td>
					<td>
						<div class="btn-group dropup" style="width:100%;">
							<button type="button" class="btn btn-primary fa fa-gear dropdown-toggle" style="width:100%;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
							<div class="dropdown-menu">
								<a class="dropdown-item btn btn-danger" href="?page=daftar-member&delete='.$data->id_customer.'">Hapus Member</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="?page=daftar-member&detail='.$data->id_customer.'">Lihat Detail</a>
							</div>
						</div>
					</td>
				</tr>
			';		
		}
	}
}

function memberDelete($id_customer){
	global $mysqli;
	
	$data = getDataByCollumn("tbl_customer","id_customer",$id_customer);
	$stmt = $mysqli->query("delete from tbl_customer where id_customer = $id_customer");
	if($stmt){
		$stmt = $mysqli->query("delete from tbl_bank where id_customer = $id_customer");
		if($stmt){
			echo '		
				<div class="divider divider--xs"></div>
				<div class="alert alert-success" role="alert" align="center">
					Data dengan nama <strong>'.$data->nama_lengkap.'</strong> berhasil dihapus.
				</div>
				<meta http-equiv="Refresh" content="2; URL=?page=daftar-member">
			';
		}else{
			echo '		
				<div class="divider divider--xs"></div>
				<div class="alert alert-danger" role="alert" align="center">
					Data gagal dihapus dari <strong>Data Bank</strong>.
				</div>
			';
		}
	}else{
		echo '		
			<div class="divider divider--xs"></div>
			<div class="alert alert-danger" role="alert" align="center">
				Data gagal dihapus, silahkan coba lagi.
			</div>
		';
	}
}
function memberDetail($id_customer){
	global $mysqli;
	
	$stmt = $mysqli->query("select * from tbl_customer where id_customer = $id_customer");
	if($stmt->num_rows== 0){
		echo '<tr class=""><td colspan="8" class="center">Tidak ada data ditemukan.</td></tr>';
	}else{
		$data = $stmt->fetch_object();
		echo'
			<tr class="">
				<td>'.$data->id_customer.'</td>
				<td>'.$data->nama_lengkap.'</td>
				<td>'.$data->email.'</td>
				<td class="center">'.$data->jenis_kelamin.'</td>
				<td class="center">'.$data->tempat_lahir.', '.date("d F Y",strtotime($data->tanggal_lahir)).'</td>
				<td class="center">'.$data->agama.' / '.$data->ras_suku.'</td>
				<td>'.$data->pendidikan.'</td>
				<td>'.$data->status_pernikahan.'</td>
				<td align="right">'.$data->jumlah_tanggungan.' orang</td>
			</tr>
		';		
	}
}

function memberBank($id_customer){
	global $mysqli;
	
	$stmt = $mysqli->query("select * from tbl_bank where id_customer = '$id_customer'");
	if($stmt->num_rows== 0){
		echo '<tr class=""><td colspan="8" class="center">Tidak ada data ditemukan.</td></tr>';
	}else{
		$data = $stmt->fetch_object();
		echo'
			<tr class="">
				<td>'.$data->id_bank.'</td>
				<td>'.$data->nama_bank.'</td>
				<td align="center">'.$data->nomor_rekening.'</td>
				<td>'.$data->atas_nama.'</td>
			</tr>
		';		
	}
}

function memberKontak($id_customer){
	global $mysqli;
	
	$stmt = $mysqli->query("select * from tbl_customerkontak where id_customer = $id_customer");
	if($stmt->num_rows== 0){
		echo '<tr class=""><td colspan="8" class="center">Tidak ada data ditemukan.</td></tr>';
	}else{
		$data = $stmt->fetch_object();
		$data_customer = getDataByCollumn("tbl_customer","id_customer",$id_customer);
		$dokumen = getDataByCollumn("tbl_dokumen","id_customer",$id_customer);
		if($dokumen != null){
			$file_ktp = "<a href='".$dokumen->file_ktp."' target='_blank'>Lihat KTP</a>";
			$file_kk = "<a href='".$dokumen->file_kk."' target='_blank'>Lihat KK</a>";
		}else{
			$file_ktp = "Belum Upload";
			$file_kk = "Belum Upload";
		}
		echo'
			<tr class="">
				<td>'.$data->id_kontak.'</td>
				<td>'.$data->nomor_ktp.'</td>
				<td>'.$data_customer->nama_lengkap.'</td>
				<td class="center">'.$data->nomor_seluler.'</td>
				<td class="center">'.$data->nomor_telepon.'</td>
				<td class="center">'.$file_ktp.'</td>
				<td class="center">'.$file_kk.'</td>
			</tr>
		';		
	}
}

function memberAlamat($id_customer){
	global $mysqli;
	
	$stmt = $mysqli->query("select * from tbl_customeralamat where id_customer = $id_customer");
	if($stmt->num_rows== 0){
		echo '<tr class=""><td colspan="8" class="center">Tidak ada data ditemukan.</td></tr>';
	}else{
		$data = $stmt->fetch_object();
		$data_kota = getDataByCollumn("tbl_kota","id_kota",$data->id_kota);
		echo'
			<tr class="">
				<td>'.$data->id_alamat.'</td>
				<td>'.$data->nama_alamat.'</td>
				<td>'.$data->status_rumah.'</td>
				<td>'.$data_kota->provinsi.'</td>
				<td>'.$data_kota->kota.'</td>
				<td>'.$data_kota->kecamatan.'</td>
				<td>'.$data_kota->kelurahan.'</td>
				<td align="center">'.$data_kota->kode_pos.'</td>
			</tr>
		';		
	}
}

function memberKeluarga($id_customer){
	global $mysqli;
	
	$stmt = $mysqli->query("select * from tbl_customerkeluarga where id_customer = $id_customer");
	if($stmt->num_rows== 0){
		echo '<tr class=""><td colspan="8" class="center">Tidak ada data ditemukan.</td></tr>';
	}else{
		$data = $stmt->fetch_object();
		$data_kota = getDataByCollumn("tbl_kota","id_kota",$data->id_kota);
		echo'
			<tr class="">
				<td>'.$data->nama_keluarga.'</td>
				<td align="center">'.$data->nomor_telepon.'</td>
				<td>'.$data->nama_alamat.'</td>
				<td>'.$data_kota->provinsi.', '.$data_kota->kota.', '.$data_kota->kecamatan.', '.$data_kota->kelurahan.'</td>
				<td align="center">'.$data_kota->kode_pos.'</td>
			</tr>
		';		
	}
}

function memberPerusahaan($id_customer){
	global $mysqli;
	
	$stmt = $mysqli->query("select * from tbl_customerpekerjaan where id_customer = $id_customer");
	if($stmt->num_rows== 0){
		echo '<tr class=""><td colspan="8" class="center">Tidak ada data ditemukan.</td></tr>';
	}else{
		$data = $stmt->fetch_object();
		$data_kota = getDataByCollumn("tbl_kota","id_kota",$data->id_kota);
		echo'
			<tr class="">
				<td>'.$data->nama_perusahaan.'</td>
				<td align="center">'.$data->nomor_telepon.'</td>
				<td>'.$data->nama_alamat.'</td>
				<td>'.$data_kota->provinsi.', '.$data_kota->kota.', '.$data_kota->kecamatan.', '.$data_kota->kelurahan.'</td>
				<td align="center">'.$data_kota->kode_pos.'</td>
			</tr>
		';		
	}
}

function memberPekerjaan($id_customer){
	global $mysqli;
	
	$stmt = $mysqli->query("select * from tbl_customerpekerjaan where id_customer = $id_customer");
	if($stmt->num_rows== 0){
		echo '<tr class=""><td colspan="8" class="center">Tidak ada data ditemukan.</td></tr>';
	}else{
		$data = $stmt->fetch_object();
		$sisa_penghasilan = $data->penghasilan-($data->angsuran_kpr+$data->pengeluaran_utama);
		echo'
			<tr class="">
				<td>'.$data->jenis_pekerjaan.'</td>
				<td>'.$data->posisi_pekerjaan.'</td>
				<td align="right">Rp'.setHarga($data->penghasilan).'</td>
				<td align="right">'.$data->lama_bekerja.' bulan</td>
				<td align="right">Rp'.setHarga($data->pengeluaran_utama).'</td>
				<td align="right">Rp'.setHarga($data->angsuran_kpr).'</td>
				<td align="right">Rp '.setHarga($sisa_penghasilan).'</td>
			</tr>
		';		
	}
}

function peminjamanList($status,$cari){
	global $mysqli;
	
	if($status == "all" OR $status == ""){
		$status = "(status_peminjaman = 'pending' OR status_peminjaman = 'belum lunas' OR status_peminjaman = 'lunas' OR status_peminjaman = 'rejected')";
	}else if($status == "rejected" OR $status == "pending" OR $status == "belum lunas" OR $status == "lunas"){
		$status = "status_peminjaman = '$status'";
	}
	if($cari == "all" OR $cari == ""){
		$cari = "id_customer != '0'";
	}else{
		$cari_customer = $mysqli->query("select id_customer from tbl_customer where nama_lengkap LIKE '%$cari%'");
		$cari = "id_customer = '0'";
		while($data = $cari_customer->fetch_object()){
			$cari = $cari." OR id_customer = '".$data->id_customer."'";
		}
	}
	$stmt = $mysqli->query("select * from tbl_peminjaman where ($status) AND ($cari)");
	if($stmt->num_rows== 0){
		echo '<tr class=""><td colspan="8" class="center">Tidak ada data ditemukan.</td></tr>';
	}else{
		while($data = $stmt->fetch_object()){
			$data_customer = getDataByCollumn("tbl_customer","id_customer",$data->id_customer);
			$data_referal = getDataByCollumn("tbl_affiliate","id_affiliate",$data->referal);
			$tanggal_pengajuan = date("d F Y",strtotime($data->tanggal_pengajuan)); 
			$jatuh_tempo = date("d F Y",strtotime($data->jatuh_tempo)); 
			echo'
				<tr class="">
					<td>'.$data_customer->nama_lengkap.'</td>
					<td align="right">Rp '.setHarga($data->jumlah_pinjaman).'</td>
					<td align="right">Rp '.setHarga($data->total_peminjaman).'</td>
					<td align="right">Rp '.setHarga($data->sisa_peminjaman).'</td>
					<td class="center">'.$tanggal_pengajuan.'</td>
					<td class="center">'.$jatuh_tempo.'</td>
					<td>'.$data->alasan_pinjaman.'</td>
					<td class="center">'.$data->status_peminjaman.'</td>
					<td>
						<div class="btn-group dropup" style="width:100%;">
							<button type="button" class="btn btn-primary fa fa-gear dropdown-toggle" style="width:100%;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
							<div class="dropdown-menu">
								<a class="dropdown-item btn btn-danger" href="?page=peminjaman&delete='.$data->id_peminjaman.'">Hapus Pinjaman</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="?page=daftar-member&detail='.$data->id_customer.'" target="_blank">Lihat Peminjam</a>
								<a class="dropdown-item" href="?page=peminjaman&set=rejected-'.$data->id_peminjaman.'">Set Tolak</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="?page=peminjaman&set=pending-'.$data->id_peminjaman.'">Set Pending</a>
								<a class="dropdown-item" href="?page=peminjaman&set=belum_lunas-'.$data->id_peminjaman.'">Set Cair</a>
								<a class="dropdown-item" href="?page=peminjaman&set=lunas-'.$data->id_peminjaman.'">Set Lunas</a>
							</div>
						</div>
					</td>
				</tr>
			';		
		}
	}
}

function peminjamanSet($set_status){
	global $mysqli;
	
	$set_status = explode("-",$set_status);
	$status = str_replace("_"," ",$set_status[0]);
	$id_peminjaman = $set_status[1];
	
	$stmt = $mysqli->query("UPDATE tbl_peminjaman SET status_peminjaman = '$status' WHERE id_peminjaman = $id_peminjaman");
	if($stmt){
			$data_peminjaman = getDataByCollumn("tbl_peminjaman","id_peminjaman",$id_peminjaman);
		if($status == "belum lunas"){
			$komisi_peminjaman = $mysqli->query("select value_pengaturan from tbl_pengaturan where nama_pengaturan='komisi_peminjaman'");
			$komisi = $komisi_peminjaman->fetch_object();
			$stmt = $mysqli->query("UPDATE tbl_affiliate SET saldo=(saldo+".$komisi->value_pengaturan.") WHERE id_affiliate = '".$data_peminjaman->referal."'");						
			
			$data_nomor = getDataByCollumn("tbl_customerkontak","id_customer",$data_peminjaman->id_customer);
			$data_email = getDataByCollumn("tbl_customer","id_customer",$data_peminjaman->id_customer);
			$password = substr($data_nomor->nomor_seluler,3,7);
			$stmt = $mysqli->query("UPDATE tbl_customer SET password='$password' WHERE id_customer='".$data_peminjaman->id_customer."'");						
			if($stmt){
				$data_bank = getDataByCollumn("tbl_bank","id_bank",$data_peminjaman->id_customer);
				$data_pesan = $data_peminjaman->jumlah_pinjaman."/".$data_bank->nomor_rekening;
				kirimSMS("peminjaman",$data_pesan,$data_nomor->nomor_seluler);
				kirimEmail("peminjaman",$data_pesan,$data_email->email);
				$data_pesan = $password;
				kirimSMS("member",$data_pesan,$data_nomor->nomor_seluler);
				kirimEmail("member",$data_pesan,$data_email->email);
			}
		}else if($status == "lunas"){
			$komisi_pelunasan = $mysqli->query("select value_pengaturan from tbl_pengaturan where nama_pengaturan='komisi_pelunasan'");
			$komisi = $komisi_pelunasan->fetch_object();
			$stmt = $mysqli->query("UPDATE tbl_affiliate SET saldo=(saldo+".$komisi->value_pengaturan.") WHERE id_affiliate = '".$data_peminjaman->referal."'");						
		}
		echo '		
			<div class="divider divider--xs"></div>
			<div class="alert alert-success" role="alert" align="center">
				Status peminjaman dengan ID <strong>'.$id_peminjaman.'</strong> berhasil di ganti.
			</div>
		';
//			<meta http-equiv="Refresh" content="2; URL=?page=peminjaman&sub='.$set_status[0].'">
	}else{
		echo '		
			<div class="divider divider--xs"></div>
			<div class="alert alert-danger" role="alert" align="center">
				Status peminjaman dengan ID <strong>'.$id_peminjaman.'</strong> gagal, silahkan coba lagi.
			</div>
		';
	}
}

function peminjamanDelete($id_peminjaman){
	global $mysqli;
	
	$stmt = $mysqli->query("delete from tbl_peminjaman where id_peminjaman = $id_peminjaman");
	if($stmt){
		echo '		
			<div class="divider divider--xs"></div>
			<div class="alert alert-success" role="alert" align="center">
				Data berhasil dihapus.
			</div>
			<meta http-equiv="Refresh" content="2; URL=?page=peminjaman">
		';
	}else{
		echo '		
			<div class="divider divider--xs"></div>
			<div class="alert alert-danger" role="alert" align="center">
				Data gagal dihapus, silahkan coba lagi.
			</div>
		';
	}
}

function pembayaranList($status,$cari){
	global $mysqli;
	
	if($status == "all" OR $status == ""){
		$status = "(status_pembayaran = 'pending' OR status_pembayaran = 'berhasil' OR status_pembayaran = 'gagal')";
	}else if($status == "pending" OR $status == "berhasil" OR $status == "gagal"){
		$status = "status_pembayaran = '$status'";
	}
	if($cari == "all" OR $cari == ""){
		$cari = "id_customer != '0'";
	}else{
		$cari_customer = $mysqli->query("select id_customer from tbl_customer where nama_lengkap LIKE '%$cari%'");
		$cari = "id_customer = '0'";
		while($data = $cari_customer->fetch_object()){
			$cari = $cari." OR id_customer = '".$data->id_customer."'";
		}
	}
	$stmt = $mysqli->query("select * from tbl_pembayaran where ($status) AND ($cari) ORDER BY status_pembayaran DESC");
	if($stmt->num_rows== 0){
		echo '<tr class=""><td colspan="8" class="center">Tidak ada data ditemukan.</td></tr>';
	}else{
		while($data = $stmt->fetch_object()){
			$data_customer = getDataByCollumn("tbl_customer","id_customer",$data->id_customer);
			$data_bank = getDataByCollumn("tbl_bank","id_bank",$data->bank_kasbon);
			$tanggal_pembayaran = date("d F Y",strtotime($data->tanggal_pembayaran)); 
			echo'
				<tr class="">
					<td>'.$data_customer->nama_lengkap.'</td>
					<td>'.$data->nama_bank.' / '.$data->atas_nama.' / '.$data->nomor_rekening.'</td>
					<td align="right">Rp '.setHarga($data->total_pembayaran).'</td>
					<td class="center">'.$tanggal_pembayaran.'</td>
					<td>'.$data_bank->nama_bank.'</td>
					<td>'.$data->keterangan.'</td>
					<td class="center">'.$data->status_pembayaran.'</td>
					<td>
						<div class="btn-group dropup" style="width:100%;">
							<button type="button" class="btn btn-primary fa fa-gear dropdown-toggle" style="width:100%;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
							<div class="dropdown-menu">
								<a class="dropdown-item btn btn-danger" href="?page=peminjaman&delete='.$data->id_pembayaran.'">Hapus Pembayaran</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="?page=daftar-member&detail='.$data->id_customer.'" target="_blank">Lihat Peminjam</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="?page=pembayaran&set=pending-'.$data->id_pembayaran.'">Set Pending</a>
								<a class="dropdown-item" href="?page=pembayaran&set=berhasil-'.$data->id_pembayaran.'">Set Berhasil</a>
							</div>
						</div>
					</td>
				</tr>
			';		
		}
	}
}

function pembayaranSet($set_status){
	global $mysqli;
	
	$set_status = explode("-",$set_status);
	$status = str_replace("_"," ",$set_status[0]);
	$id_pembayaran = $set_status[1];
	
	$stmt = $mysqli->query("UPDATE tbl_pembayaran SET status_pembayaran = '$status' WHERE id_pembayaran = $id_pembayaran");
	if($stmt){
		if($status == "berhasil"){
			$data_peminjaman = getDataByCollumn("tbl_peminjaman","id_customer",$data_pembayaran->id_customer." ORDER BY id_peminjaman DESC");
			$sisa_peminjaman = $data_peminjaman->sisa_peminjaman-$data_pembayaran->total_pembayaran;
			if($sisa_peminjaman == 0){
				$stmt = $mysqli->query("UPDATE tbl_peminjaman SET sisa_peminjaman=$sisa_peminjaman,status_peminjaman='lunas' WHERE id_peminjaman = '".$data_peminjaman->id_peminjaman."'");			

				$komisi_pelunasan = $mysqli->query("select value_pengaturan from tbl_pengaturan where nama_pengaturan='komisi_pelunasan'");
				$komisi = $komisi_pelunasan->fetch_object();
				$stmt = $mysqli->query("UPDATE tbl_affiliate SET saldo=(saldo+".$komisi->value_pengaturan.") WHERE id_affiliate = '".$data_peminjaman->referal."'");						
			}else{
				$stmt = $mysqli->query("UPDATE tbl_peminjaman SET sisa_peminjaman=$sisa_peminjaman WHERE id_peminjaman = '".$data_peminjaman->id_peminjaman."'");							
			}
		}
		echo '
			<div class="divider divider--xs"></div>
			<div class="alert alert-success" role="alert" align="center">
				Status pembayaran dengan ID <strong>'.$id_pembayaran.'</strong> berhasil di ubah.
			</div>
			<meta http-equiv="Refresh" content="2; URL=?page=pembayaran&sub='.$set_status[0].'">
		';
	}else{
		echo '		
			<div class="divider divider--xs"></div>
			<div class="alert alert-danger" role="alert" align="center">
				Status pembayaran dengan ID <strong>'.$id_pembayaran.'</strong> gagal, silahkan coba lagi.
			</div>
		';
	}
}

function pembayaranDelete($id_pembayaran){
	global $mysqli;
	
	$stmt = $mysqli->query("delete from tbl_peminjaman where id_pembayaran = $id_pembayaran");
	if($stmt){
		echo '		
			<div class="divider divider--xs"></div>
			<div class="alert alert-success" role="alert" align="center">
				Data berhasil dihapus.
			</div>
			<meta http-equiv="Refresh" content="2; URL=?page=pembayaran">
		';
	}else{
		echo '		
			<div class="divider divider--xs"></div>
			<div class="alert alert-danger" role="alert" align="center">
				Data gagal dihapus, silahkan coba lagi.
			</div>
		';
	}
}

function affiliateList($cari){
	global $mysqli;
	
	if($cari == "all" OR $cari == ""){
		$cari = "nama != ''";
	}else{
		$cari = "nama LIKE '%$cari%'";
	}
	$stmt = $mysqli->query("select * from tbl_affiliate where $cari GROUP BY id_affiliate");
	if($stmt->num_rows== 0){
		echo '<tr class=""><td colspan="9" class="center">Tidak ada data ditemukan.</td></tr>';
	}else{
		while($data = $stmt->fetch_object()){
			echo'
				<tr class="">
					<td>'.$data->nama.'</td>
					<td>'.$data->email.'</td>
					<td class="center">'.$data->telepon.'</td>
					<td><a href="'.$data->website.'" target="_blank">'.$data->website.'</a></td>
					<td><a href="'.$data->facebook.'" target="_blank">'.$data->facebook.'</a></td>
					<td><a href="'.$data->twitter.'" target="_blank">'.$data->twitter.'</a></td>
					<td align="right">Rp '.setHarga($data->saldo).'</td>
					<td>
						<div class="btn-group dropup" style="width:100%;">
							<button type="button" class="btn btn-primary fa fa-gear dropdown-toggle" style="width:100%;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
							<div class="dropdown-menu">
								<a class="dropdown-item btn btn-danger" href="?page=affiliate&delete='.$data->id_affiliate.'">Hapus Affiliate</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="?page=affiliate&detail='.$data->kode_referal.'">Lihat Detail</a>
							</div>
						</div>
					</td>
				</tr>
			';		
		}
	}
}

function affiliateDetail($id_affiliate){
	global $mysqli;
	
	$stmt = $mysqli->query("select * from tbl_affiliate where kode_referal = '$id_affiliate'");
	if($stmt->num_rows== 0){
		echo '<tr class=""><td colspan="8" class="center">Tidak ada data ditemukan.</td></tr>';
	}else{
		$data = $stmt->fetch_object();
		echo'
			<tr class="">
				<td>'.$data->id_affiliate.'</td>
				<td>'.$data->kode_referal.'</td>
				<td>'.$data->nama.'</td>
				<td>'.$data->email.'</td>
				<td class="center">'.$data->telepon.'</td>
				<td><a href="'.$data->website.'" target="_blank">'.$data->website.'</a></td>
				<td><a href="'.$data->facebook.'" target="_blank">'.$data->facebook.'</a> / <a href="'.$data->twitter.'" target="_blank">'.$data->twitter.'</a></td>
				<td align="right">Rp '.setHarga($data->saldo).'</td>
			</tr>
		';		
	}
}

function affiliateKomisi($id_affiliate){
	global $mysqli;
	
	$stmt = $mysqli->query("select * from tbl_affiliatekomisi where id_affiliate = '$id_affiliate'");
	if($stmt->num_rows== 0){
		echo '<tr class=""><td colspan="4" class="center">Tidak ada data ditemukan.</td></tr>';
	}else{
		$data = $stmt->fetch_object();
		if($data->tipe == "B"){
			$tipe_komisi ="Komisi Awal";
		}else if($data->tipe == "B"){
			$tipe_komisi ="Komisi Peminjaman";
		}else if($data->tipe == "B"){
			$tipe_komisi ="Komisi Pelunasan";
		}else{
			$tipe_komisi ="Lain-lain";
		}
		if($data->sumber_komisi == "0"){
			$sumber_komisi ="Registrasi Affiliate";
		}else{
			$data_peminjaman = getDataByCollumn("tbl_peminjaman","id_peminjaman",$data->sumber_komisi);			
			$data_customer = getDataByCollumn("tbl_customer","id_customer",$data_peminjaman->id_customer);			
			$sumber_komisi = "Peminjaman <b>".$data_customer->nama_lengkap."</b> tanggal <b>".date("d F Y",strtotime($data_peminjaman->tanggal_pengajuan))."</b>";
		}
		echo'
			<tr class="">
				<td>'.$data->id_komisi.'</td>
				<td>'.date("d F Y",strtotime($data->tanggal)).'</td>
				<td align="right">Rp '.setHarga($data->jumlah_komisi).'</td>
				<td>'.$tipe_komisi.'</td>
				<td>'.$sumber_komisi.'</td>
			</tr>
		';		
	}
}

function affiliateDelete($id_affiliate){
	global $mysqli;
	
	$data = getDataByCollumn("tbl_affiliate","id_affiliate",$id_affiliate);
	$stmt = $mysqli->query("delete from tbl_affiliate where id_affiliate = $id_affiliate");
	if($stmt){
		$stmt = $mysqli->query("delete from tbl_bank where id_customer = ".$data->kode_referal."");
		if($stmt){
			echo '		
				<div class="divider divider--xs"></div>
				<div class="alert alert-success" role="alert" align="center">
					Data dengan nama <strong>'.$data->nama.'</strong> berhasil dihapus.
				</div>
			';
		}else{
			echo '		
				<div class="divider divider--xs"></div>
				<div class="alert alert-danger" role="alert" align="center">
					Data gagal dihapus dari <strong>Data Bank</strong>.
				</div>
			';
		}
	}else{
		echo '		
			<div class="divider divider--xs"></div>
			<div class="alert alert-danger" role="alert" align="center">
				Data gagal dihapus, silahkan coba lagi.
			</div>
		';
	}
}

function affiliatePencairan($id_affiliate){
	global $mysqli;
	
	$stmt = $mysqli->query("select * from tbl_withdraw where id_affiliate = '$id_affiliate'");
	if($stmt->num_rows== 0){
		echo '<tr class=""><td colspan="4" class="center">Tidak ada data ditemukan.</td></tr>';
	}else{
		$data = $stmt->fetch_object();
		echo'
			<tr class="">
				<td>'.$data->id_withdraw.'</td>
				<td>'.date("d F Y",strtotime($data->waktu)).'</td>
				<td>'.date("d F Y",strtotime($data->waktu_pencairan)).'</td>
				<td align="right">Rp '.setHarga($data->saldo).'</td>
				<td>'.$data->status.'</td>
			</tr>
		';		
	}
}

function pencairanList($status,$cari){
	global $mysqli;
	
	if($status == "all" OR $status == ""){
		$status = "(status = 'pengecekan' OR status = 'proses' OR status = 'sukses' OR status = 'gagal')";
	}else if($status == "pengecekan" OR $status == "proses" OR $status == "sukses" OR $status == "gagal"){
		$status = "status = '$status'";
	}
	if($cari == "all" OR $cari == ""){
		$cari = "id_affiliate != '0'";
	}else{
		$cari_affiliate = $mysqli->query("select kode_referal from tbl_affiliate where nama LIKE '%$cari%'");
		$cari = "id_affiliate = '0'";
		while($data = $cari_affiliate->fetch_object()){
			$cari = $cari." OR id_affiliate = '".$data->kode_referal."'";
		}
	}
	$stmt = $mysqli->query("select * from tbl_withdraw where ($status) AND ($cari)");
	if($stmt->num_rows== 0){
		echo '<tr class=""><td colspan="8" class="center">Tidak ada data ditemukan.</td></tr>';
	}else{
		while($data = $stmt->fetch_object()){
			$data_affiliate = getDataByCollumn("tbl_affiliate","id_affiliate",$data->id_affiliate);
			echo'
					<tr class="">
					<td>'.$data->id_withdraw.'</td>
					<td>'.$data_affiliate->nama.'</td>
					<td>'.date("d F Y",strtotime($data->waktu)).'</td>
					<td>'.date("d F Y",strtotime($data->waktu_pencairan)).'</td>
					<td align="right">Rp '.setHarga($data->saldo).'</td>
					<td>'.$data->status.'</td>
					<td>
						<div class="btn-group dropup" style="width:100%;">
							<button type="button" class="btn btn-primary fa fa-gear dropdown-toggle" style="width:100%;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
							<div class="dropdown-menu">
								<a class="dropdown-item btn btn-danger" href="?page=peminjaman&delete='.$data->id_withdraw.'">Hapus Pencairan</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="?page=affiliate&detail='.$data_affiliate->kode_referal.'" target="_blank">Detail Affiliate</a>
								<a class="dropdown-item" href="?page=pencairan&set=gagal-'.$data->id_withdraw.'">Set Gagal</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="?page=pencairan&set=proses-'.$data->id_withdraw.'">Set Proses</a>
								<a class="dropdown-item" href="?page=pencairan&set=sukses-'.$data->id_withdraw.'">Set Sukses</a>
							</div>
						</div>
					</td>
				</tr>
			';		
		}
	}
}

function pencairanSet($set_status){
	global $mysqli;
	
	$set_status = explode("-",$set_status);
	$status = str_replace("_"," ",$set_status[0]);
	$id_withdraw = $set_status[1];
	
	$stmt = $mysqli->query("UPDATE tbl_withdraw SET status = '$status' WHERE id_withdraw = $id_withdraw");
	if($stmt){
			$data_withdraw = getDataByCollumn("tbl_withdraw","id_withdraw",$id_withdraw);
		if($status=="gagal"){
			$stmt = $mysqli->query("UPDATE tbl_affiliate SET saldo=(saldo+".$data_withdraw->saldo.") WHERE id_affiliate='".$data_withdraw->id_affiliate."'");
		}else if($status=="sukses"){
			$data_affiliate = getDataByCollumn("tbl_affiliate","id_affiliate",$data_withdraw->id_affiliate);
			$stmt = $mysqli->query("select * from tbl_bank where id_customer = '".$data_affiliate->kode_referal."'");
			$data_bank = $stmt->fetch_object();
			$data_pesan = $data_withdraw->saldo."/".$data_bank->nomor_rekening;
			kirimSMS("pencairan",$data_pesan,$data_affiliate->telepon);
			$data_email = getDataByCollumn("tbl_customer","id_customer",$data_peminjaman->id_customer);
			kirimEmail("member",$data_pesan,$data_email->email);
		}
			echo '		
				<div class="divider divider--xs"></div>
				<div class="alert alert-success" role="alert" align="center">
					Status pencairan dengan ID <strong>'.$id_withdraw.'</strong> berhasil.
				</div>
				<meta http-equiv="Refresh" content="2; URL=?page=pencairan&sub='.$set_status[0].'">
			';
	}else{
		echo '		
			<div class="divider divider--xs"></div>
			<div class="alert alert-danger" role="alert" align="center">
				Status pencairan dengan ID <strong>'.$id_withdraw.'</strong> gagal, silahkan coba lagi.
			</div>
		';
	}
}

function pencairanDelete($id_withdraw){
	global $mysqli;
	
	$stmt = $mysqli->query("delete from tbl_withdraw where id_withdraw = $id_withdraw");
	if($stmt){
		echo '		
			<div class="divider divider--xs"></div>
			<div class="alert alert-success" role="alert" align="center">
				Data berhasil dihapus.
			</div>
			<meta http-equiv="Refresh" content="2; URL=?page=pencairan">
		';
	}else{
		echo '		
			<div class="divider divider--xs"></div>
			<div class="alert alert-danger" role="alert" align="center">
				Data gagal dihapus, silahkan coba lagi.
			</div>
		';
	}
}

function blogPosting(){
	global $mysqli;
	
	$stmt = $mysqli->query("insert into tbl_blog(judul_post,gambar_utama,deskripsi_post) values('".$_POST['txtJudul']."','".$_POST['txtUrlGambar']."','".$_POST['txtKonten']."')");
	if($stmt){
		echo '		
			<div class="divider divider--xs"></div>
			<div class="alert alert-success" role="alert" align="center">
				Posting dengan judul <b>'.$_POST['txtJudul'].'</b> telah berhasil di buat.
			</div>
			<meta http-equiv="Refresh" content="2; URL=?page=blog&sub=list">
		';
	}else{
		echo '		
			<div class="divider divider--xs"></div>
			<div class="alert alert-danger" role="alert" align="center">
				Maaf postingan gagal dibuat, silahkan coba lagi.
			</div>
		';
	}
}

function blogList($cari){
	global $mysqli;
	
	if($cari == "all" OR $cari == ""){
		$cari = "id_blog != '0'";
	}else{
		$cari_post = $mysqli->query("select id_blog from tbl_blog where judul_post LIKE '%$cari%'");
		$cari = "id_blog = '0'";
		while($data = $cari_post->fetch_object()){
			$cari = $cari." OR id_blog = '".$data->id_customer."'";
		}
	}
	$stmt = $mysqli->query("select * from tbl_blog where ($cari)");
	if($stmt->num_rows== 0){
		echo '<tr class=""><td colspan="8" class="center">Tidak ada data ditemukan.</td></tr>';
	}else{
		while($data = $stmt->fetch_object()){
			$tanggal_pembuatan = date("d F Y",strtotime($data->tanggal_posting)); 
			$terakhir_edit = date("d F Y",strtotime($data->terakhir_edit)); 
			echo'
				<tr class="">
					<td width="5%">'.$data->id_blog.'</td>
					<td align="center" width="20%">'.$tanggal_pembuatan.'</td>
					<td align="center" width="20%">'.$terakhir_edit.'</td>
					<td>'.$data->judul_post.'</td>
					<td>'.substr($data->deskripsi_post,0,50).'</td>
					<td width="5%">
						<div class="btn-group dropup" style="width:100%;">
							<button type="button" class="btn btn-primary fa fa-gear dropdown-toggle" style="width:100%;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
							<div class="dropdown-menu">
								<a class="dropdown-item btn btn-danger" href="?page=blog&delete='.$data->id_blog.'">Hapus Post</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="?page=blog&sub=list&edit='.$data->id_blog.'">Edit Post</a>
								<a class="dropdown-item" href="../blog/view.php?post='.$data->id_blog.'" target="_blank">Lihat Post</a>
							</div>
						</div>
					</td>
				</tr>
			';		
		}
	}
}

function blogDelete($id_blog){
	global $mysqli;
	
	$stmt = $mysqli->query("delete from tbl_blog where id_blog = $id_blog");
	if($stmt){
		echo '		
			<div class="divider divider--xs"></div>
			<div class="alert alert-success" role="alert" align="center">
				Postingan berhasil dihapus.
			</div>
			<meta http-equiv="Refresh" content="2; URL=?page=pencairan">
		';
	}else{
		echo '		
			<div class="divider divider--xs"></div>
			<div class="alert alert-danger" role="alert" align="center">
				Postingan gagal dihapus, silahkan coba lagi.
			</div>
		';
	}
}

function blogEdit($id_blog){
	global $mysqli;
	
	if(isset($_POST['btnEditPosting'])){
		$stmt = $mysqli->query("update tbl_blog set
			judul_post='".$_POST['txtJudul']."',
			deskripsi_post='".$_POST['txtKonten']."',
			terakhir_edit=now()
				WHERE id_blog='$id_blog'
			");
		if($stmt){
			echo '		
				<div class="divider divider--xs"></div>
				<div class="alert alert-success" role="alert" align="center">
					Postingan anda berhasil di edit.
				</div>
			';
		}else{			
			echo '		
				<div class="divider divider--xs"></div>
				<div class="alert alert-danger" role="alert" align="center">
					Data gagal dihapus, silahkan coba lagi.
				</div>
			';
		}
	}
	$stmt = $mysqli->query("select * from tbl_blog where id_blog = $id_blog");
	if($stmt->num_rows > 0){
		$data = $stmt->fetch_object();
		echo '		
			<div class="title-block">
				<h3 class="title">Edit Posting<span class="sparkline bar" data-type="bar"></span></h3>
			</div>
			<form name="item" action="" method="post"  enctype="multipart/form-data">
				<div class="card card-block">
					<table>
						<tr>
							<td><label><b>Judul Potingan : &nbsp </b></label></td>
							<td><input type="text" name="txtJudul" class="form-control" value="'.$data->judul_post.'"></td>
						</tr>
						<tr>
							<td></td>
							<td>&nbsp </td>
						</tr>
						<tr>
							<td><label><b>Gambar Utama : &nbsp </b></label></td>
							<td><input type="text" name="txtUrlGambar" class="form-control" placeholder="Simpan URL dari gambar yang dijadikan gambar utama" value="'.$data->gambar_utama.'"></td>
						</tr>
						<tr>
							<td></td>
							<td>&nbsp </td>
						</tr>
						<tr>
							<td valign="top"><label><b>Isi Potingan : &nbsp </b></label></td>
							<td><textarea name="txtKonten" class="ckeditor" >'.$data->deskripsi_post.'</textarea></td>
						</tr>
						<tr>
							<td></td>
							<td>&nbsp </td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" name="btnEditPosting" class="btn btn-primary" value="Posting"></td>
						</tr>
					</table>
				</div>
			</form>
		';
	}else{
		echo '		
			<div class="divider divider--xs"></div>
			<div class="alert alert-danger" role="alert" align="center">
				Data tidak ditemukan.
			</div>
		';
	}
}

?>


