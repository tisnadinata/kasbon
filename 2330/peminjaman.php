<script>
function cari(){		
	var value = $("#txtCari").val();
	var dataString = "cari_peminjaman="+value;
	$.ajax({
		type: "POST",
		url: "ajax.php",
		data: dataString,
		cache: false,
		success: function(html) {
			$("#daftar_peminjaman").html(html);
		}
	});
}
</script>
<article class="content dashboard-page">
	<div class="title-block">
		<h1 class="title">
			Data Peminjaman
			<?php 
				if(isset($_GET['sub'])){
					echo ucfirst(str_replace("_"," ",($_GET['sub'])));
				}
			?>
		</h1>
		<?php
			if(!isset($_GET['detail'])){
				echo'<p class="title-description">Untuk menghapus dan mengubah status peminjaman, silahkan klik tombol <button class="btn btn-default fa fa-gear"></button> disamping data.</p>';
			}
		?>
    </div>
	<section class="section">
	<?php
		if(isset($_GET['set'])){
			peminjamanSet($_GET['set']);
		}else if(isset($_GET['delete'])){
			peminjamanDelete($_GET['delete']);
		} 
	?>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-block">
				<?php
					if(isset($_GET['sub'])){
						$page = str_replace("_"," ",$_GET['sub']);
					}else{
						$page = "all";
					}
					$_SESSION['peminjaman'] = $page;
				?>
					<!--	LIST CUSTOMER -->
					<div class="form-group row">
						<label class="col-xs-3 col-md-1 col-md-offset-7 form-control-label">Cari :</label>
						<div class="col-xs-9 col-md-4">
							<input type="text" class="form-control" id="txtCari"  onInput="cari()" placeholder="Cari berdasarkan nama peminjam">
						</div>
					</div>					
					<section class="example">
					<div class="table-flip-scroll table-responsive">
						<table class="table table-striped table-bordered table-hover flip-content">
						<thead class="flip-header">
						<tr>
							<th>Nama Peminjam</th>
							<th>Jumlah Pinjaman</th>
							<th>Total Dibayar</th>
							<th>Sisa Pinjaman</th>
							<th>Tanggal Pinjam</th>
							<th>Jatuh Tempo</th>
							<th>Alasan Peminjaman</th>
							<th>Status</th>
							<th></th>
						</tr>
						</thead>
						<tbody id="daftar_peminjaman">
				<?php
					if($page == "pending"){
						peminjamanList("pending","all");
					}else if($page == "belum lunas"){
						peminjamanList("belum lunas","all");
					}else if($page == "lunas"){
						peminjamanList("lunas","all");
					}else if($page == "rejected"){
						peminjamanList("rejected","all");
					}else{
						peminjamanList("all","all");
					} 
				?>
						</tbody>
						</table>
					</div>
					</section>
				</div>
			</div>
		</div>
	</div>
	</section>
</article>