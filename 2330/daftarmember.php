<script>
function cari(){		
	var value = $("#txtCari").val();
	var dataString = "cari_member="+value;
	$.ajax({
		type: "POST",
		url: "ajax.php",
		data: dataString,
		cache: false,
		success: function(html) {
			$("#daftar_member").html(html);
		}
	});
}
</script>
<article class="content dashboard-page">
	<div class="title-block">
		<h1 class="title">
			Data Lengkap Member
		</h1>
		<?php
			if(!isset($_GET['detail'])){
				echo'<p class="title-description">Untuk melihat data lengkap member, silahkan klik tombol <button class="btn btn-default fa fa-gear"></button> disamping member.</p>';
			}
		?>
    </div>
	<section class="section">
	<?php
		if(isset($_GET['delete'])){
			memberDelete($_GET['delete']);
		}
	?>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-block">
				<?php
					if(!isset($_GET['detail'])){
				?>
					<!--	LIST CUSTOMER -->
					<div class="form-group row">
						<label class="col-xs-3 col-md-1 col-md-offset-7 form-control-label">Cari :</label>
						<div class="col-xs-9 col-md-4">
							<input type="text" class="form-control" id="txtCari"  onInput="cari()" placeholder="Cari berdasarkan nama">
						</div>
					</div>					
					<section class="example">
					<div class="table-flip-scroll table-responsive">
						<table class="table table-striped table-bordered table-hover flip-content">
						<thead class="flip-header">
						<tr>
							<th>Nama</th>
							<th>E-Mail</th>
							<th>JK</th>
							<th>TTL</th>
							<th>Agama / Ras</th>
							<th>Pendidikan</th>
							<th>Status</th>
							<th>Tanggungan</th>
							<th></th>
						</tr>
						</thead>
						<tbody id="daftar_member">
							<?php
								memberList("all");
							?>
						</tbody>
						</table>
					</div>
					</section>
				<?php		
					}else{
				?>
					<ul class="nav nav-tabs nav-tabs-bordered">
						<li class="nav-item">
							<a href="#profile" class="nav-link active" data-target="#profile" aria-controls="profile" data-toggle="tab" role="tab">Profile</a>
						</li>
						<li class="nav-item">
							<a href="#kontak" class="nav-link" data-target="#kontak" aria-controls="kontak" data-toggle="tab" role="tab">Kontak&Alamat</a>
						</li>
						<li class="nav-item">
							<a href="#pekerjaan" class="nav-link" data-target="#pekerjaan" aria-controls="pekerjaan" data-toggle="tab" role="tab">Pekerjaan</a>
						</li>
					</ul>
					<!-- Tab panes -->
					<div class="tab-content tabs-bordered">
						<div class="tab-pane fade in active" id="profile">
							<h4>Detail Member :</h4>
							<section class="example">
							<div class="table-flip-scroll table-responsive">
								<table class="table table-striped table-bordered table-hover flip-content">
								<thead class="flip-header">
								<tr>
									<th>ID</th>
									<th>Nama</th>
									<th>E-Mail</th>
									<th>JK</th>
									<th>TTL</th>
									<th>Agama / Ras</th>
									<th>Pendidikan</th>
									<th>Status</th>
									<th>Tanggungan</th>
								</tr>
								</thead>
								<tbody id="daftar_member">
								<?php
									memberDetail($_GET['detail']);
								?>
								</tbody>
								</table>
							</div>
							<hr>
							<h4>Data Bank :</h4>
							<section class="example">
							<div class="table-flip-scroll table-responsive">
								<table class="table table-striped table-bordered table-hover flip-content">
								<thead class="flip-header">
								<tr>
									<th>ID</th>
									<th>Nama Bank</th>
									<th>Nomor Rekening</th>
									<th>Atas Nama</th>
								</tr>
								</thead>
								<tbody id="daftar_member">
								<?php
									memberBank($_GET['detail']);
								?>
								</tbody>
								</table>
							</div>
							</section>		
						</div>
						<div class="tab-pane fade" id="kontak">
							<h4>Kontak :</h4>
							<section class="example">
							<div class="table-flip-scroll table-responsive">
								<table class="table table-striped table-bordered table-hover flip-content">
								<thead class="flip-header">
								<tr>
									<th>ID</th>
									<th>Nomor KTP</th>
									<th>Atas Nama</th>
									<th>Nomor Seluler</th>
									<th>Nomor Telepon</th>
									<th>Dokumen KTP</th>
									<th>DOkumen KK</th>
								</tr>
								</thead>
								<tbody id="daftar_member">
								<?php
									memberKontak($_GET['detail']);
								?>
								</tbody>
								</table>
							</div>
							</section>		
							<hr>
							<h4>Alamat Pribadi :</h4>
							<section class="example">
							<div class="table-flip-scroll table-responsive">
								<table class="table table-striped table-bordered table-hover flip-content">
								<thead class="flip-header">
								<tr>
									<th>ID</th>
									<th>Alamat Jalan</th>
									<th>Status Rumah</th>
									<th>Provinsi</th>
									<th>Kota</th>
									<th>Kecamatan</th>
									<th>Kelurahan</th>
									<th>Kode Pos</th>
								</tr>
								</thead>
								<tbody id="daftar_member">
								<?php
									memberAlamat($_GET['detail']);
								?>
								</tbody>
								</table>
							</div>
							</section>		
							<hr>
							<h4>Kontak Kerabat/Keluarga:</h4>
							<section class="example">
							<div class="table-flip-scroll table-responsive">
								<table class="table table-striped table-bordered table-hover flip-content">
								<thead class="flip-header">
								<tr>
									<th>Nama Keluarga</th>
									<th>Nomor Telepon</th>
									<th>Nama Alaamat</th>
									<th>Provinsi/Kota</th>
									<th>Kode Pos</th>
								</tr>
								</thead>
								<tbody id="daftar_member">
								<?php
									memberKeluarga($_GET['detail']);
								?>
								</tbody>
								</table>
							</div>
							</section>		
						</div>
						<div class="tab-pane fade" id="pekerjaan">
							<h4>Data Perusahaan :</h4>
							<section class="example">
							<div class="table-flip-scroll table-responsive">
								<table class="table table-striped table-bordered table-hover flip-content">
								<thead class="flip-header">
								<tr>
									<th>Nama Perusahaan</th>
									<th>Nomor Telepon</th>
									<th>Nama Alamat</th>
									<th>Provinsi/Kota</th>
									<th>Kode Pos</th>
								</tr>
								</thead>
								<tbody id="daftar_member">
								<?php
									memberPerusahaan($_GET['detail']);
								?>
								</tbody>
								</table>
							</div>
							<hr>
							<h4>Detail Pekerjaan :</h4>
							<section class="example">
							<div class="table-flip-scroll table-responsive">
								<table class="table table-striped table-bordered table-hover flip-content">
								<thead class="flip-header">
								<tr>
									<th>Jenis Pekerjaan</th>
									<th>Posisi</th>
									<th>Penghasilan</th>
									<th>Lama Bekerja</th>
									<th>Pengeluaran Utama</th>
									<th>Angsuran KPR</th>
									<th>Sisa Penghasilan</th>
								</tr>
								</thead>
								<tbody id="daftar_member">
								<?php
									memberPekerjaan($_GET['detail']);
								?>
								</tbody>
								</table>
							</div>
							</section>		
						</div>
					</div>				
				<?php		
					}
				?>
				</div>
			</div>
		</div>
	</div>
	</section>
</article>