<script>
function cari(){		
	var value = $("#txtCari").val();
	var dataString = "cari_posting="+value;
	$.ajax({
		type: "POST",
		url: "ajax.php",
		data: dataString,
		cache: false,
		success: function(html) {
			$("#daftar_posting").html(html);
		}
	});
}
</script>
<article class="content dashboard-page">
	<div class="title-block">
		<h1 class="title">
			Data Posting Blog
			<?php 
				if(isset($_GET['sub'])){
					echo ucfirst(str_replace("_"," ",($_GET['sub'])));
				}
			?>
		</h1>
		<?php
			if(!isset($_GET['detail']) AND !isset($_GET['edit'])){
				echo'<p class="title-description">Untuk menghapus dan mengubah postingan, silahkan klik tombol <button class="btn btn-default fa fa-gear"></button> disamping data.</p>';
			}
		?>
    </div>
	<section class="section">
	<?php
		if(isset($_GET['delete'])){
			blogDelete($_GET['delete']);
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
					if(isset($_GET['edit'])){
						blogEdit($_GET['edit']);
					}else{
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
							<th>ID</th>
							<th>Tanggal Pembuatan</th>
							<th>Terakhir di Edit</th>
							<th>Judul Posting</th>
							<th>Deskripsi Posting</th>
							<th></th>
						</tr>
						</thead>
						<tbody id="daftar_posting">
						<?php
							blogList("all");
						?>
						</tbody>
						</table>
					</div>
					</section>
				<?php
					}
				?>
				</div>
			</div>
		</div>
	</div>
	</section>
</article>