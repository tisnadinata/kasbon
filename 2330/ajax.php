<?php
include_once 'functions/functions.php';
	
if(isset($_POST['cari_member'])){
	$cari = $_POST['cari_member'];
	memberList($cari);
}

if(isset($_POST['cari_affiliate'])){
	$cari = $_POST['cari_affiliate'];
	affiliateList($cari);
}

if(isset($_POST['cari_pencairan'])){
	$cari = $_POST['cari_pencairan'];
	pencairanList($_SESSION['pencairan'],$cari);
}

if(isset($_POST['cari_peminjaman'])){
	$cari = $_POST['cari_peminjaman'];
	peminjamanList($_SESSION['peminjaman'],$cari);
}

if(isset($_POST['cari_pembayaran'])){
	$cari = $_POST['cari_pembayaran'];
	pembayaranList($_SESSION['pembayaran'],$cari);
}
?>
