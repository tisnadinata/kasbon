<script>
function cari(){		
	var value = $("#txtCari").val();
	var dataString = "cari_affiliate="+value;
	$.ajax({
		type: "POST",
		url: "ajax.php",
		data: dataString,
		cache: false,
		success: function(html) {
			$("#daftar_affiliate").html(html);
		}
	});
}
</script>
<article class="content dashboard-page">
	<div class="title-block">
		<h1 class="title">
			Data Lengkap Affiliate
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
			affiliateDelete($_GET['delete']);
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
							<th>Nama Lengkap</th>
							<th>E-Mail</th>
							<th>Telepon</th>
							<th>Website URL</th>
							<th>Facebook</th>
							<th>Twitter</th>
							<th>Saldo</th>
							<th></th>
						</tr>
						</thead>
						<tbody id="daftar_affiliate">
							<?php
								affiliateList("all");
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
							<a href="#komisi" class="nav-link" data-target="#komisi" aria-controls="komisi" data-toggle="tab" role="tab">Riwayat Komisi</a>
						</li>
						<li class="nav-item">
							<a href="#pencairan" class="nav-link" data-target="#pencairan" aria-controls="pencairan" data-toggle="tab" role="tab">Riwayat Pencairan</a>
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
									<th>REFERAL ID</th>
									<th>Nama Lengkap</th>
									<th>E-Mail</th>
									<th>Telepon</th>
									<th>Website URL</th>
									<th>Facebook / Twitter</th>
									<th>Saldo</th>
								</tr>
								</thead>
								<tbody id="daftar_member">
								<?php
									affiliateDetail($_GET['detail']);
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
						<div class="tab-pane fade" id="komisi">
							<h4>Komisi Diterima :</h4>
							<section class="example">
							<div class="table-flip-scroll table-responsive">
								<table class="table table-striped table-bordered table-hover flip-content">
								<thead class="flip-header">
								<tr>
									<th>ID</th>
									<th>Tanggal Penerimaan</th>
									<th>Jumlah Komisi</th>
									<th>TIpe Komisi</th>
									<th>Sumber Komisi</th>
								</tr>
								</thead>
								<tbody id="daftar_member">
								<?php
									affiliateKomisi($_GET['detail']);
								?>
								</tbody>
								</table>
							</div>
							</section>		
							<hr>
						</div>
						<div class="tab-pane fade" id="pencairan">
							<h4>Komisi Diterima :</h4>
							<section class="example">
							<div class="table-flip-scroll table-responsive">
								<table class="table table-striped table-bordered table-hover flip-content">
								<thead class="flip-header">
								<tr>
									<th>ID</th>
									<th>Tanggal Pengajuan</th>
									<th>Tanggal Pencairan</th>
									<th>Jumlah Pencairan</th>
									<th>Status Pencairan</th>
								</tr>
								</thead>
								<tbody id="daftar_member">
								<?php
									affiliatePencairan($_GET['detail']);
								?>
								</tbody>
								</table>
							</div>
							</section>		
							<hr>
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