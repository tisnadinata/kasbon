<?php
	$stmt = $mysqli->query("select * from tbl_pengaturan");
	while($pengaturan = $stmt->fetch_object()){
		$data_pengaturan[$pengaturan->id_pengaturan] = $pengaturan->value_pengaturan;
	}
?>

        <footer>
          <div class="container">
            <div class="row top-footer">
              <div class="col-md-8" style="margin-bottom: 40px;">
                <h3 class="top-footer__title">Hubungi kami di</h3>
                <p class="top-footer__phone"><i class="fa fa-phone"></i> <?php echo $data_pengaturan[2]; ?></p>
                <p>
                  Hari dan jam kerja: <br/>
                  Senin-Jumat 09.00-17.00 WIB
                </p>
              </div>
              <div class="col-md-4">
                <h3 class="top-footer__title"><?php echo $data_pengaturan[4]; ?></h3>
                <p>
                  <?php echo $data_pengaturan[7]; ?>
                </p>
              </div>
            </div>
            <div class="row bottom-footer">
              <div class="col-md-12">
                <div class="pull-left">
                  Copyright 2016. &copy; All Rights Reserved by <?php echo $data_pengaturan[4]; ?>
                </div>
              </div>

              <div class="clearfix"></div>
                            <div class="col-md-12">
                <p style="font-size: 13px;margin-top: 15px">
					<?php echo $data_pengaturan[6]; ?>
                </p>
              </div>

            </div>
          </div>
        </footer>
