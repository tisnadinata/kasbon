<article class="content item-editor-page">
<div class="title-block">
	<h3 class="title">Post Berita Baru<span class="sparkline bar" data-type="bar"></span></h3>
	<?php
	if(isset($_POST['btnPosting'])){
		blogPosting();
	}
	?>
</div>
<form name="item" action="" method="post"  enctype="multipart/form-data">
	<div class="card card-block">
		<table>
			<tr>
				<td><label><b>Judul Potingan : &nbsp </b></label></td>
				<td><input type="text" name="txtJudul" class="form-control" placeholder="Judul postingan anda" required></td>
			</tr>
			<tr>
				<td></td>
				<td>&nbsp </td>
			</tr>
			<tr>
				<td><label><b>Gambar Utama : &nbsp </b></label></td>
				<td><input type="text" name="txtUrlGambar" class="form-control" placeholder="Simpan URL dari gambar yang dijadikan gambar utama" required></td>
			</tr>
			<tr>
				<td></td>
				<td>&nbsp </td>
			</tr>
			<tr>
				<td valign="top"><label><b>Isi Potingan : &nbsp </b></label></td>
				<td><textarea name="txtKonten" class="ckeditor"  required></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td>&nbsp </td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="btnPosting" class="btn btn-primary" value="Posting"></td>
			</tr>
		</table>
	</div>
</form>
</article>
