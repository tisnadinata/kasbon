<article class="content dashboard-page">
<section class="section">
<div class="row sameheight-container col-md-6">
	<div class="col col-xs-12 col-sm-12 col-md-12 col-xl-12 stats-col">
		<div class="card sameheight-item stats" data-exclude="xs">
			<div class="card-block">
				<div class="title-block">
					<h4 class="title"><i class="fa fa-bar-chart-o"></i> &nbsp Stats</h4>
					<p class="title-description">
						 Statistik data <a href="#">kasbon.id</a>
					</p>
				</div>
				<div class="row row-sm stats-container">
					<div class="col-xs-12 col-sm-6 stat-col">
						<div class="stat-icon">
							<i class="fa fa-user"></i>
						</div>
						<div class="stat">
							<div class="value"><?php echo getCountData("select * from tbl_customer");?> orang</div>
							<div class="name">Total Member</div>
						</div>
						<progress class="progress stat-progress" value="<?php echo getCountData("select * from tbl_customer")?>" max="100">
						<div class="progress">
							<span class="progress-bar" style="width: 34%;"></span>
						</div>
						</progress>
					</div>
					<div class="col-xs-12 col-sm-6 stat-col">
						<div class="stat-icon">
							<i class="fa fa-money"></i>
						</div>
						<div class="stat">
							<div class="value">Rp <?php echo setHarga(getSumData("select sum(total_peminjaman) as total from tbl_peminjaman"));?></div>
							<div class="name">Total Pinjaman</div>
						</div>
						<progress class="progress stat-progress" value="<?php echo getSumData("select sum(total_peminjaman) as total from tbl_peminjaman");?>" max="10000000">
						<div class="progress">
							<span class="progress-bar" style="width: 34%;"></span>
						</div>
						</progress>
					</div>
					<div class="col-xs-12 col-sm-6 stat-col">
						<div class="stat-icon">
							<i class="fa fa-users"></i>
						</div>
						<div class="stat">
							<div class="value"><?php echo getCountData("select * from tbl_affiliate")?> orang</div>
							<div class="name">Total Affiliate</div>
						</div>
						<progress class="progress stat-progress" value="<?php echo getCountData("select * from tbl_affiliate");?>" max="100">
						<div class="progress">
							<span class="progress-bar" style="width: 34%;"></span>
						</div>
						</progress>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col col-xs-12 col-sm-12 col-md-12 stats-col">
		<div class="card sameheight-item items" data-exclude="xs,sm,lg">
			<div class="card-header bordered">
				<div class="header-block">
					<h3 class="title"><i class="fa fa-list-ol"></i> &nbsp Pinjaman Pending</h3>
				</div>
			</div>
			<ul class="item-list striped">
				<li class="item item-list-header hidden-sm-down">
					<div class="item-row">
						<div class="item-col item-col-header item-col-title">
							<div>
								<span>Nama Pengaju</span>
							</div>
						</div>
						<div class="item-col item-col-header item-col-sales">
							<div>
								<span>Pinjaman</span>
							</div>
						</div>
						<div class="item-col item-col-header item-col-date">
							<div>
								<span>Tanggal</span>
							</div>
						</div>
					</div>
				</li>
				<?php
					dashboardPinjaman();				
				?>
			</ul>
		</div>
	</div>
</div>
<div class="row sameheight-container col-md-6">
	<div class="col col-xs-12 col-sm-12 col-md-12 col-xl-12 stats-col">
		<div class="card card-block sameheight-item">
			<div class="title-block">
				<h3 class="title"><i class="fa fa-gears"></i> &nbsp Pengaturan Umum</h3>
			</div>
			<?php
				pengaturanUmum();
			?>
		</div>
	</div>
</div>
</section>
</article>