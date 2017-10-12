<?php	
	include 'connectDB.php';
$stmt = $mysqli->query("select * from tbl_affiliate WHERE kode_referal='".$_SESSION['kode_referal']."'"); 
$data = $stmt->fetch_object();
$stmt = $mysqli->query("select * from tbl_bank WHERE id_customer='".$_SESSION['kode_referal']."'"); 
$data_bank = $stmt->fetch_object();
?>
<html class=" desktop landscape" dir="ltr" prefix="og: http://ogp.me/ns#" lang="id-ID">
<?php
	include 'header.php';
?>
<br>
<br>
<!-- #header end -->
<!-- Document Wrapper
    ============================================= -->
<div class="clearfix">
	<!-- Page Title
    ============================================= -->
	<section id="page-title">
	<div class="container clearfix">
		<!--  <div id="kontak-top-content"> -->
		<h2 class="heading_title martop_1"><span>Laporan</span></h2>
		<!-- </div> -->
		<ol class="breadcrumb">
			<li>
				<a href="index">Beranda</a>
			</li>
			<li>
				<a href="laporan.php">Laporan</a>
			</li>
		</ol>
	</div>
	</section>
	<!-- #page-title end -->
	<!-- Content
    ============================================= -->
	<section id="content">
	<div class="content-wrap">
		<div class="container">
			<div class="row">
				<div class="col-sm-14">
					<div class="alert alert-success" role="alert">
						 Link affiliate anda : <b> http://kasbon.id/?aff=<?php echo $_SESSION['kode_referal']; ?> </b>
						| Komisi yang belum dibayarkan : <b>Rp<?php echo setHarga($data->saldo); ?>,- </b>
						<?php
							if($data->saldo >= 200000){
								echo"<a href='withdraw.php'><button class='btn btn-primary'>Withdraw</button></a>";
							}
						?>
					</div>
					<div class="panel panel-default">
						<!-- Default panel contents -->
						<div class="panel-heading">
							<h4 class="nomargin">kasbon Affiliate Program</h4>
						</div>
						<div class="panel-body">
							<div id="side-navigation">
								<div class="col_one_third nobottommargin">
									<div class="list-group">
										<a href="index.php" class="list-group-item"><i class="fa fa-user"></i> Beranda</a>
										<a href="panduan.php" class="list-group-item "><i class="fa fa-book"></i> Panduan </a>
										<a href="media-promo.php" class="list-group-item "><i class="fa fa-tag"></i> Media Promo </a>
										<a href="laporan.php" class="list-group-item active"><i class="fa fa-file"></i> Laporan</a>
										<a href="konfigurasi.php" class="list-group-item "><i class="fa fa-gears"></i> Konfigurasi</a>
										<a href="kontak.php" class="list-group-item "><i class="fa fa-phone"></i> Kontak Kami</a>
										<a href="profile.php" class="list-group-item "><i class="fa fa-desktop"></i> Profil</a>
									</div>
								</div>
								<div class="col_two_third col_last nobottommargin">
									<div id="snav-content2">
										<div class="panel panel-default">
											<!-- Default panel contents -->
											<div class="panel-heading">
												<h4 class="nomargin">Laporan</h4>
											</div>
											<div class="panel-body">
											<h5>Statistik</h5>
												<br>
												<?php
													$stmt = $mysqli->query("SELECT count(id_customer) as jum FROM tbl_peminjaman WHERE referal='$_SESSION[kode_referal]' AND status_peminjaman='rejected'");
													$rejected = $stmt->fetch_object();
													$stmt = $mysqli->query("SELECT count(id_customer) as jum FROM tbl_peminjaman WHERE referal='$_SESSION[kode_referal]' AND status_peminjaman='pending'");
													$pending = $stmt->fetch_object();
													$stmt = $mysqli->query("SELECT count(id_customer) as jum FROM tbl_peminjaman WHERE referal='$_SESSION[kode_referal]' AND (status_peminjaman='belum lunas' OR status_peminjaman='lunas')");
													$accepted = $stmt->fetch_object();
													$all = $rejected->jum + $pending->jum + $accepted->jum;
												?>
												<div class="panel panel-default">
													<div class="panel-body">
														<div class="row">
															<div class="col-xs-12">
																<div class="well text-center">
																	<h1>Applicants</h1>
																	<div class="row">
																		<div class="col-xs-3">
																			<h2><?php echo $all;?></h2>
																			<strong>All</strong>
																		</div>
																		<div class="col-xs-3">
																			<h2><?php echo $rejected->jum;?></h2>
																			<strong>Rejected</strong>
																		</div>
																		<div class="col-xs-3">
																			<h2><?php echo $pending->jum;?></h2>
																			<strong>Pending</strong>
																		</div>
																		<div class="col-xs-3">
																			<h2><?php echo $accepted->jum;?></h2>
																			<strong>Accepted</strong>
																		</div>
																	</div>
																	<!-- E: row --></div>
																<!-- E: well --></div>
															<!-- E: coloumn -->
														</div>
													</div>
												</div>
												<h5 class="martop_1">Riwayat Komisi</h5>
												<br>
												<div class="table-responsive">
													<table class="table table-bordered table-striped">
													<thead>
													<tr>
														<th>Tanggal</th>
														<th>Jumlah Komisi</th>
														<th>Tipe Komisi</th>
													</tr>
													</thead>
													<tbody id="comm_tbl">
													<tr>
													<?php 
														$stmt = $mysqli->query("select * from tbl_affiliatekomisi where id_affiliate='$_SESSION[kode_referal]' ORDER BY id_komisi DESC");
														$i=1;
														while($komisi = $stmt->fetch_object()){
															echo "
																<td>".$komisi->tanggal."</td>
																<td>Rp ".setHarga($komisi->jumlah_komisi)."</td>
																<td>".$komisi->tipe."</td>
															";
															$i++;
														}
													?>
													</tr>
													</tbody>
													</table>
												</div>
												<h5 class="martop_1">Riwayat Withdraw</h5>
												<br>
												<div class="table-responsive">
													<table class="table table-bordered table-responsive">
													<thead>
													<tr>
														<th class="center">#</th>
														<th class="center">Waktu Withdraw</th>
														<th class="center">Tanggal Pencairan</th>
														<th class="center">Jumlah Saldo</th>
														<th class="center">Status</th>
													</tr>
													</thead>
													<tbody>
													<tr>
													<?php 
														$stmt = $mysqli->query("select * from tbl_withdraw where id_affiliate='$_SESSION[kode_referal]' ORDER BY id_withdraw DESC");
														$i=1;
														while($withdraw = $stmt->fetch_object()){
															echo "
																<td class='center'>$i</td>
																<td>".$withdraw->waktu."</td>
																<td>".$withdraw->waktu_pencairan."</td>
																<td>Rp ".setHarga($withdraw->saldo)."</td>
																<td>".$withdraw->status."</td>
															";
															$i++;
														}
													?>
													</tr>
													</tbody>
													</table>
												</div>
												<div class="martop_1">
													<p align="justify">
														<i>
														<i style="box-sizing: border-box; color: rgb(85, 85, 85); font-family: 'Open Sans', sans-serif; font-size: 14px; line-height: 28px;">*) Jadwal pembayaran komisi adalah 1 (satu) kali per bulan, yaitu tanggal 10-15 di bulan berikutnya. Jika tanggal pembayaran komisi Anda jatuh pada hari Sabtu atau Minggu dan atau hari libur nasional lainnya atau pada hari dimana bank tidak beroperasi, maka pembayaran komisi &nbsp; &nbsp; &nbsp; akan dilakukan pada 1 (satu) hari kerja berikutnya *) Komisi bisa dicairkan bila sudah mencapai minimum&nbsp;<b style="box-sizing: border-box;">Rp200.000,-&nbsp;</b><br style="box-sizing: border-box;">
														 *) Tipe komisi: D = Pencairan Peminjaman, R = Pelunasan, B = Komisi awal &nbsp;<br style="box-sizing: border-box;">*) Status :&nbsp;</i>
														</i>
													</p>
													<ul style="padding:20px;margin-top:-40px;">
														<i>
														<li>
															<i style="box-sizing: border-box; color: rgb(85, 85, 85); font-family: 'Open Sans', sans-serif; font-size: 14px; line-height: 28px;">&nbsp;&nbsp; <b style="box-sizing: border-box;">Pengecekan</b>: Dana komisi Anda dalam proses pengecekan&nbsp;</i>
														</li>
														<li>
															<i style="box-sizing: border-box; color: rgb(85, 85, 85); font-family: 'Open Sans', sans-serif; font-size: 14px; line-height: 28px;">&nbsp; &nbsp;<b style="box-sizing: border-box;">Proses</b>: Dana komisi Anda dalam proses transfer&nbsp;</i>
														</li>
														<li>
															<i style="box-sizing: border-box; color: rgb(85, 85, 85); font-family: 'Open Sans', sans-serif; font-size: 14px; line-height: 28px;">&nbsp; &nbsp;<b style="box-sizing: border-box;">Sukses</b>: Dana komisi Anda berhasil ditransfer&nbsp;</i>
														</li>
														<li>
															<i style="box-sizing: border-box; color: rgb(85, 85, 85); font-family: 'Open Sans', sans-serif; font-size: 14px; line-height: 28px;">&nbsp;&nbsp; ​<b style="box-sizing: border-box;">Gagal</b>: Dana komisi Anda belum berhasil ditransfer&nbsp;</i>
														</li>
														</i>
													</ul>
													<i></i>
													<p></p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</section>
</div>
<!-- #wrapper end -->
<!-- Footer -->
<?php
	include 'footer.php';
?>
<!--  .offcanvas-wrapper -->
<!-- Go To Top
    ============================================= -->
<!-- Footer Scripts
    ============================================= -->
<script type="text/javascript">
            var base_url = "https:\/\/kasbon.com";
            var path = {"css":"https:\/\/kasbon.com\/assets\/frontend\/statics\/v2\/css\/","js":"https:\/\/kasbon.com\/assets\/frontend\/statics\/v2\/js\/","images":"https:\/\/kasbon.com\/assets\/frontend\/statics\/v2\/images\/","icon":"https:\/\/kasbon.com\/assets\/frontend\/statics\/v2\/images\/icons\/","web":"https:\/\/kasbon.com\/assets\/frontend\/statics\/v2\/images\/web\/","font":"https:\/\/kasbon.com\/assets\/frontend\/statics\/v2\/font\/","vendor":"https:\/\/kasbon.com\/assets\/frontend\/statics\/v2\/vendor\/","twiml":"https:\/\/kasbon.com\/assets\/frontend\/statics\/v2\/twiml\/","assets":"https:\/\/kasbon.com\/assets\/","temp_path":"https:\/\/kasbon.com\/assets\/temp_files\/"};
            var jvalidation = {"required":"This field is required.","remote":"Please fix this field.","email":"Please enter a valid email address.","url":"Please enter a valid URL.","date":"Please enter a valid date.","dateISO":"Please enter a valid date (ISO).","number":"Please enter a valid number.","digits":"Please enter only digits.","creditcard":"Please enter a valid credit card number.","equalTo":"Please enter the same value again.","accept":"Please enter a value with a valid extension.","maxlength":"Please enter no more than {0} karakter.","minlength":"Please enter at least {0} karakter.","rangelength":"Please enter a value between {0} and {1} karakter long.","range":"Please enter a value between {0} and {1}.","max":"Please enter a value less than or equal to {0}.","min":"Please enter a value greater than or equal to {0}."};
            var conf = {"time_info":5000};
        </script>
<script type="text/javascript" src="assets/functions.js"></script>
<script type="text/javascript" src="assets/main_dashboard.js"></script>
<script type="text/javascript">
    $(function(){
        // Check Cookies
        if(navigator.cookieEnabled == false) window.location = "http://www.wikihow.com/Enable-Cookies-in-Your-Internet-Web-Browser";
        //$validator = $("#top-login").validate('.json_encode($log_validate).');
        $validator = $(".edit-personal-user").validate('.json_encode($log_validate).');
        $validator = $(".edit-bank-user").validate('.json_encode($log_validate).');
        $validator = $(".edit-pas-user").validate('.json_encode($log_validate).');
    })
    </script>
<!-- Syntax Javascript -->
<script type="text/javascript">
  $(function() {
    var current_commission_page = parseInt($("#comm_curr").html()), commissions = {"is_empty":false,"data":[{"id":2613,"aff_users_id":2968,"aff_fare_id":3,"ap_id":null,"fare_value":50000,"category":"B","created_at":"2016-07-25 22:05:10","updated_at":"2016-07-25 22:05:10","fare":{"id":3,"value":50000,"detail":"Commission bonus when user activated their account","created_at":"2016-01-15 18:42:01","updated_at":"2016-01-15 18:42:01"},"applicant":null}],"pagination":{"take_all":false,"start_date":{"date":"2016-04-25 00:00:00.000000","timezone_type":3,"timezone":"Asia\/Jakarta"},"end_date":{"date":"2016-07-25 23:59:59.000000","timezone_type":3,"timezone":"Asia\/Jakarta"},"total_data":1,"total_page":1,"current_page":1}};
    var current_withdrawals_page = parseInt($("#with_curr").html()), withdrawals = {"is_empty":true,"data":[],"pagination":{"take_all":false,"start_date":"2016-04-25","end_date":"2016-07-25","total_data":0,"total_page":0,"current_page":1}};
    // initialize
    if (commissions.pagination.total_page > commissions.pagination.current_page) {
      $("#comm_next").removeAttr('disabled');
    }
    if (withdrawals.pagination.total_page > withdrawals.pagination.current_page) {
      $("#with_next").removeAttr('disabled');
    }
    setDateRangePicker();
    $(document).on("click", "#comm_next", function(e){
      var pg = parseInt(current_commission_page) + 1,
          sd = commissions.pagination.start_date.date,
          ed = commissions.pagination.end_date.date;
      getCommissions(pg, sd, ed);
      current_commission_page += 1;
      $("#comm_curr").html(current_commission_page);
    });
    $(document).on("click", "#comm_prev", function(e){
      var pg = parseInt(current_commission_page) - 1,
          sd = commissions.pagination.start_date.date,
          ed = commissions.pagination.end_date.date;
      getCommissions(pg, sd, ed);
      current_commission_page -= 1;
      $("#comm_curr").html(current_commission_page);
    });
    $(document).on("click", "#with_next", function(e){
      var pg = parseInt(current_withdrawals_page) + 1,
          sd = withdrawals.pagination.start_date.date,
          ed = withdrawals.pagination.end_date.date;
      getWithdrawals(pg, sd, ed);
      current_withdrawals_page += 1;
      $("#with_curr").html(current_withdrawals_page);
    });
    $(document).on("click", "#with_prev", function(e){
      var pg = parseInt(current_withdrawals_page) - 1,
          sd = withdrawals.pagination.start_date.date,
          ed = withdrawals.pagination.end_date.date;
      getWithdrawals(pg, sd, ed);
      current_withdrawals_page -= 1;
      $("#with_curr").html(current_withdrawals_page);
    });
    function onlyNumberkey(event){
      var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
         return true;
    }
    function getCommissions (pg, sd, ed) {
      $.ajax({
          async: false,
          url: "report",
          method: 'GET',
          data: {
            type: 'json',
            page: pg,
            sd: sd,
            ed: ed
          },
          cache: false,
          beforeSend: function(jqxhr, settings){
          },
          success: function(data, status, jqxhr) {
            console.log(data);
            // update the pagination button
            if (parseInt(data.commissions.pagination.total_page) > parseInt(data.commissions.pagination.current_page)) {
              $("#comm_next").removeAttr('disabled');
            } else {
              $("#comm_next").attr('disabled', 'true');
            }
            if (parseInt(data.commissions.pagination.current_page) > 1) {
              $("#comm_prev").removeAttr('disabled');
            } else {
              $("#comm_prev").attr('disabled', 'true');
            }
            // update table
            if (data.commissions.is_empty === false) {
              var newTable = "";
              for (var i = 0; i < data.commissions.data.length ; i++) {
                console.log(data.commissions.data[i]);
                newTable += "<tr>";
                newTable += "<td>"+ data.commissions.data[i].created_at +"</td>";
                newTable += "<td>Rp"+ new Intl.NumberFormat().format(data.commissions.data[i].fare_value) +"</td>";
                newTable += "<td>"+ data.commissions.data[i].status +"</td>";
                newTable += "</tr>";
              }
              $("#comm_tbl").html(newTable);
            }
          },
          error: function(jqxhr, status, error) {
              console.log(error);
              alert("Error: ", status);
          },
          complete: function(jqxhr, status) {
          }
      });
    }
    function getWithdrawals (pg, sd, ed) {
      $.ajax({
          async: false,
          url: "report",
          method: 'GET',
          data: {
            type: 'json',
            page: pg,
            sd: sd,
            ed: ed
          },
          cache: false,
          beforeSend: function(jqxhr, settings){
          },
          success: function(data, status, jqxhr) {
            console.log(data);
            // update the pagination button
            if (parseInt(data.withdrawals.pagination.total_page) > parseInt(data.withdrawals.pagination.current_page)) {
              $("#with_next").removeAttr('disabled');
            } else {
              $("#with_next").attr('disabled', 'true');
            }
            if (parseInt(data.withdrawals.pagination.current_page) > 1) {
              $("#with_prev").removeAttr('disabled');
            } else {
              $("#with_prev").attr('disabled', 'true');
            }
            // update table
            if (data.withdrawals.is_empty === false) {
              var newTable = "";
              for (var i = 0; i < data.withdrawals.data.length ; i++) {
                console.log(data.withdrawals.data[i]);
                newTable += "<tr>";
                newTable += "<td>"+ data.withdrawals.data[i].request_date +"</td>";
                newTable += "<td>"+ data.withdrawals.data[i].bank.master_bank.mb_name +": "+ data.withdrawals.data[i].bank.bank_acc_num + " a/n " + data.withdrawals.data[i].bank.bank_acc_name +"</td>";
                newTable += "<td>Rp"+ new Intl.NumberFormat().format(data.withdrawals.data[i].withdrawal_value) +"</td>";
                newTable += "<td>"+ data.withdrawals.data[i].category +"</td>";
                newTable += "</tr>";
              }
              $("#with_tbl").html(newTable);
            }
          },
          error: function(jqxhr, status, error) {
              console.log(error);
              alert("Error: ", status);
          },
          complete: function(jqxhr, status) {
          }
      });
    }
    function setDateRangePicker () {
        $("#dateRange").daterangepicker({
            "autoApply": true,
            "startDate": "2016-04-25 00:00:00",
            "endDate": "2016-07-25 23:59:59",
            'format': 'YYYY-MM-DD',
            }, function(start, end) {
              var sd = start.format("YYYY-MM-DD"), ed = end.format("YYYY-MM-DD"),
                  url = "report";
              var data = {"sd": sd, "ed": ed};
              $.submitManual("GET", url, data);
        });
    };
    jQuery.submitManual = function(method, url, data) {
        var form = $('<form></form>').attr('action', url).attr('method', method);
        if (data instanceof Object) {
            if (Object.keys(data).length > 0) {
                for (var prop in data) {
                    form.append($("<input></input>").attr('type', 'hidden').attr('name', prop).attr('value', data[prop]));
                };
                form.appendTo('body').submit().remove();
            } else {
                alert("Please provide data");
            }
        } else {
            alert("Please provide instanceof Object");
        }
    };
  });
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable(
      [["Hari","Pencairan","Pelunasan","Komisi Awal"],["25 Jul 16",0,0,50000]]
    );
    var options = {
      title: 'Commissions',
      hAxis: {title: 'Days',  titleTextStyle: {color: '#333'}},
      vAxis: {minValue: 0},
      // selectionMode: 'multiple',
      // Trigger tooltips
      // on selections.
      tooltip: {trigger: 'selection'},
      // Group selections
      // by x-value.
      aggregationTarget: 'category',
       chartArea: {
            left: "10%",
            top: "10%",
            height: "50%",
            width: "72%"
        }
    };
    var chart = new google.visualization.AreaChart(document.getElementById('comission_chart'));
    chart.draw(data, options);
  }
  $(window).on("resize", function (event) {
      drawChart();
  });
  </script>
<script src="assets/a" type="text/javascript"></script>
<link href="assets/uien.css" type="text/css" rel="stylesheet">
<script src="assets/formatendefaultenuiencorecharten.js" type="text/javascript"></script>
<div style="top: 544.5px; left: 581.617px; right: auto;" class="daterangepicker dropdown-menu opensright">
	<div style="display: block;" class="calendar right">
		<div class="calendar-date">
			<table class="table-condensed">
			<thead>
			<tr>
				<th class="prev available">
					<i class="icon-arrow-left glyphicon glyphicon-arrow-left"></i>
				</th>
				<th colspan="5" style="width: auto">Jul 2016</th>
				<th class="next available">
					<i class="icon-arrow-right glyphicon glyphicon-arrow-right"></i>
				</th>
			</tr>
			<tr>
				<th>Su</th>
				<th>Mo</th>
				<th>Tu</th>
				<th>We</th>
				<th>Th</th>
				<th>Fr</th>
				<th>Sa</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td class="available off in-range" data-title="r0c0">26</td>
				<td class="available off in-range" data-title="r0c1">27</td>
				<td class="available off in-range" data-title="r0c2">28</td>
				<td class="available off in-range" data-title="r0c3">29</td>
				<td class="available off in-range" data-title="r0c4">30</td>
				<td class="available in-range" data-title="r0c5">1</td>
				<td class="available in-range" data-title="r0c6">2</td>
			</tr>
			<tr>
				<td class="available in-range" data-title="r1c0">3</td>
				<td class="available in-range" data-title="r1c1">4</td>
				<td class="available in-range" data-title="r1c2">5</td>
				<td class="available in-range" data-title="r1c3">6</td>
				<td class="available in-range" data-title="r1c4">7</td>
				<td class="available in-range" data-title="r1c5">8</td>
				<td class="available in-range" data-title="r1c6">9</td>
			</tr>
			<tr>
				<td class="available in-range" data-title="r2c0">10</td>
				<td class="available in-range" data-title="r2c1">11</td>
				<td class="available in-range" data-title="r2c2">12</td>
				<td class="available in-range" data-title="r2c3">13</td>
				<td class="available in-range" data-title="r2c4">14</td>
				<td class="available in-range" data-title="r2c5">15</td>
				<td class="available in-range" data-title="r2c6">16</td>
			</tr>
			<tr>
				<td class="available in-range" data-title="r3c0">17</td>
				<td class="available in-range" data-title="r3c1">18</td>
				<td class="available in-range" data-title="r3c2">19</td>
				<td class="available in-range" data-title="r3c3">20</td>
				<td class="available in-range" data-title="r3c4">21</td>
				<td class="available in-range" data-title="r3c5">22</td>
				<td class="available in-range" data-title="r3c6">23</td>
			</tr>
			<tr>
				<td class="available in-range" data-title="r4c0">24</td>
				<td class="available active end-date" data-title="r4c1">25</td>
				<td class="available" data-title="r4c2">26</td>
				<td class="available" data-title="r4c3">27</td>
				<td class="available" data-title="r4c4">28</td>
				<td class="available" data-title="r4c5">29</td>
				<td class="available" data-title="r4c6">30</td>
			</tr>
			<tr>
				<td class="available" data-title="r5c0">31</td>
				<td class="available off" data-title="r5c1">1</td>
				<td class="available off" data-title="r5c2">2</td>
				<td class="available off" data-title="r5c3">3</td>
				<td class="available off" data-title="r5c4">4</td>
				<td class="available off" data-title="r5c5">5</td>
				<td class="available off" data-title="r5c6">6</td>
			</tr>
			</tbody>
			</table>
		</div>
	</div>
	<div style="display: block;" class="calendar left">
		<div class="calendar-date">
			<table class="table-condensed">
			<thead>
			<tr>
				<th class="prev available">
					<i class="icon-arrow-left glyphicon glyphicon-arrow-left"></i>
				</th>
				<th colspan="5" style="width: auto">Apr 2016</th>
				<th class="next available">
					<i class="icon-arrow-right glyphicon glyphicon-arrow-right"></i>
				</th>
			</tr>
			<tr>
				<th>Su</th>
				<th>Mo</th>
				<th>Tu</th>
				<th>We</th>
				<th>Th</th>
				<th>Fr</th>
				<th>Sa</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td class="available off" data-title="r0c0">27</td>
				<td class="available off" data-title="r0c1">28</td>
				<td class="available off" data-title="r0c2">29</td>
				<td class="available off" data-title="r0c3">30</td>
				<td class="available off" data-title="r0c4">31</td>
				<td class="available" data-title="r0c5">1</td>
				<td class="available" data-title="r0c6">2</td>
			</tr>
			<tr>
				<td class="available" data-title="r1c0">3</td>
				<td class="available" data-title="r1c1">4</td>
				<td class="available" data-title="r1c2">5</td>
				<td class="available" data-title="r1c3">6</td>
				<td class="available" data-title="r1c4">7</td>
				<td class="available" data-title="r1c5">8</td>
				<td class="available" data-title="r1c6">9</td>
			</tr>
			<tr>
				<td class="available" data-title="r2c0">10</td>
				<td class="available" data-title="r2c1">11</td>
				<td class="available" data-title="r2c2">12</td>
				<td class="available" data-title="r2c3">13</td>
				<td class="available" data-title="r2c4">14</td>
				<td class="available" data-title="r2c5">15</td>
				<td class="available" data-title="r2c6">16</td>
			</tr>
			<tr>
				<td class="available" data-title="r3c0">17</td>
				<td class="available" data-title="r3c1">18</td>
				<td class="available" data-title="r3c2">19</td>
				<td class="available" data-title="r3c3">20</td>
				<td class="available" data-title="r3c4">21</td>
				<td class="available" data-title="r3c5">22</td>
				<td class="available" data-title="r3c6">23</td>
			</tr>
			<tr>
				<td class="available" data-title="r4c0">24</td>
				<td class="available active start-date" data-title="r4c1">25</td>
				<td class="available in-range" data-title="r4c2">26</td>
				<td class="available in-range" data-title="r4c3">27</td>
				<td class="available in-range" data-title="r4c4">28</td>
				<td class="available in-range" data-title="r4c5">29</td>
				<td class="available in-range" data-title="r4c6">30</td>
			</tr>
			<tr>
				<td class="available off in-range" data-title="r5c0">1</td>
				<td class="available off in-range" data-title="r5c1">2</td>
				<td class="available off in-range" data-title="r5c2">3</td>
				<td class="available off in-range" data-title="r5c3">4</td>
				<td class="available off in-range" data-title="r5c4">5</td>
				<td class="available off in-range" data-title="r5c5">6</td>
				<td class="available off in-range" data-title="r5c6">7</td>
			</tr>
			</tbody>
			</table>
		</div>
	</div>
	<div class="ranges">
		<div class="range_inputs">
			<div class="daterangepicker_start_input" style="float: left">
				<label for="daterangepicker_start">From</label><input class="input-mini" name="daterangepicker_start" value="2016-04-25" disabled="disabled" type="text"></div>
			<div class="daterangepicker_end_input" style="float: left; padding-left: 11px">
				<label for="daterangepicker_end">To</label><input class="input-mini" name="daterangepicker_end" value="2016-07-25" disabled="disabled" type="text"></div>
			<button class="btn-success applyBtn btn btn-small">Apply</button>&nbsp;<button class="btn-default cancelBtn btn btn-small">Cancel</button>
		</div>
	</div>
</div>
</body>
</html>