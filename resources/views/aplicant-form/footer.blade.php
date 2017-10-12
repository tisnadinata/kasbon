 <footer>
      <div class="container">
        <div class="row top-footer">
          <div class="col-md-8" style="margin-bottom: 40px;">
            <h3 class="top-footer__title">Hubungi kami di</h3>
            <p class="top-footer__phone"><i class="fa fa-phone"></i> +6221 212 821 47</p>
            <p>
              Hari dan jam kerja: <br/>
              Senin-Jumat 09.00-17.00 WIB
            </p>
          </div>
          <div class="col-md-4">
            <h3 class="top-footer__title">PT Digital Alpha Indonesia</h3>
            <p>
              One Pacific Place Building Level 11<br/>
              Sudirman Central Business District<br/>
              Jl. Jend. Sudirman Kav 52-53<br/>
              Jakarta, 12190<br/>
              Indonesia<br/>
            </p>
          </div>
          <!-- <div class="col-md-6">
            <h3 class="top-footer__title">Butuh konsultasi tatap muka?</h3>
            <p>Seabank Centre' 12-14 Marine Parade Southport QLD, 4215</p>
          </div>
          <div class="col-md-3">
            <a type="button" class="btn btn-primary" href="">Send Us Email</a>
          </div> -->
        </div>
        <div class="row bottom-footer">
          <div class="col-md-12">
            <div class="pull-left">
              Copyright 2016. &copy; All Rights Reserved by PT Digital Alpha Indonesia ・ <a href="careers/index" class="ft-link">Karir</a> ・ <a href="press/index" class="ft-link">Press Info</a>
            </div>
            <div class="pull-right">
              <a href="https://mixpanel.com/f/partner" target="_blank"><img src="//cdn.mxpnl.com/site_media/images/partner/badge_light.png" alt="Mobile Analytics"/></a>
            </div>
          </div>

          <div class="clearfix"></div>
                    <div class="col-md-12">
            <p style="font-size: 13px;margin-top: 15px">
              PT Digital Alpha Indonesia, melalui merk UangTeman adalah perusahaan digital pertama di Indonesia yang menyediakan jasa pinjaman mikro jangka pendek, secara online. Dapat kami sampaikan, saat ini UangTeman telah berkomunikasi dan berkonsultasi secara berkala dengan Otoritas Jasa Keuangan, namun Otoritas Jasa Keuangan belum memiliki regulasi untuk ceruk bisnis finansial teknologi seperti UangTeman. UangTeman berkomitmen untuk patuh dan tunduk pada konstitusi yang berlaku di Indonesia, sehingga kami akan mengikuti kaidah-kaidah hukum yang berlaku yang diatur oleh Otoritas Jasa Keuangan.
            </p>
          </div>

        </div>
      </div>
    </footer>

    </div>
</div><!--  .offcanvas-wrapper -->
    <!-- This Page JavaScripts
    ============================================= -->
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-54108703-1', 'auto');
  // ga('create', 'UA-54108703-1', {
  // 'cookieDomain': 'none'
  // });
  ga('require', 'displayfeatures');
  ga('require', 'linkid', 'linkid.js');
  ga('send', 'pageview');
</script>    
  
  <!-- Placed at the end of the document so the pages load faster -->
  <script type="text/javascript" src="{{ asset('frontend/statics/v2/js/jquery-1.11.3.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('frontend/statics/v2/js/jquery.validate.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('frontend/statics/v2/js/jquery.bootstrap.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('frontend/statics/v2/js/menu.js')}}"></script>
  


  <script type="text/javascript" src="{{ asset('frontend/statics/js/plugins.js')}}"></script>
  <script type="text/javascript" src="{{ asset('frontend/statics/vendor/datepicker/bootstrap-datepicker.js')}}"></script>
  <script type="text/javascript" src="{{ asset('frontend/statics/vendor/bs-wizard/bootstrap.wizard.js')}}"></script>
  <script type="text/javascript" src="{{ asset('frontend/statics/vendor/accounting/accounting.min.js')}}"></script>
    
    <script type="text/javascript">
           $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
  // Get domisili location
        $("#ap_dom_province").change(function(){
            $("#ap_dom_kab_kot").html("<option value=''>Memuat..</option>");
            $val = $(this).val();
            $.ajax({ 
                url : "{{url('get/kab-kot')}}",
                type : 'post',
                data : 'mpa_province='+$(this).val(),
                success : function(resp){
                    $("#ap_dom_kab_kot").html(resp);
                    // $("#ap_fam1_province").val($val);
                    // $("#ap_fam2_province").val($val);
                    // $("#ap_fam1_kab_kot").html(resp);
                    // $("#ap_fam2_kab_kot").html(resp);
                }
            })
        });
        $("#ap_dom_kab_kot").change(function(){
           
            $("#ap_dom_kecamatan").html("<option value=''>Memuat..</option>");
            $val = $(this).val();
            $.ajax({ 
                url : "{{url('get/kecamatan')}}",
                type : 'post', 
                data : 'mpa_kab_kot='+$(this).val(),
                success : function(resp){
                    $("#ap_dom_kecamatan").html(resp);
                    // $("#ap_fam1_kecamatan").html(resp);
                }
            })
        });
        $("#ap_dom_kecamatan").change(function(){
            $("#ap_dom_kelurahan").html("<option value=''>Memuat..</option>");
            $.ajax({ 
                url : "{{url('get/kelurahan')}}",
                type : 'post', 
                data : 'mpa_kab_kot='+$("#ap_dom_kab_kot").val()+'&mpa_kecamatan='+$(this).val(),
                success : function(resp){
                    $("#ap_dom_kelurahan").html(resp);
                }
            })
        });
        $("#ap_dom_kelurahan").change(function(){
            getDomCodePost();
        });
        function getDomCodePost(){
            $("#ap_dom_postal_code").val("Memuat..");
            $ap_dom_province = $("#ap_dom_province").val();
            $ap_dom_kab_kot = $("#ap_dom_kab_kot").val();
            $ap_dom_kecamatan = $("#ap_dom_kecamatan").val();
            $ap_dom_kelurahan = $("#ap_dom_kelurahan").val();
            $.ajax({ 
                url : "{{url('get/kode-pos')}}",
                type : 'post',
                data : 'mpa_province='+$ap_dom_province+'&mpa_kab_kot='+$ap_dom_kab_kot+'&mpa_kecamatan='+$ap_dom_kecamatan+'&mpa_kelurahan='+$ap_dom_kelurahan,
                success : function(resp){
                    console.log(resp);
                    $("#ap_dom_postal_code").val(resp);
                }
            })
        }

        // Get Location fam 1
        $("#ap_fam1_province").change(function(){
            
            $("#ap_fam1_kab_kot").html("<option value=''>Memuat..</option>");
            $val = $(this).val();
            $.ajax({ 
                url : "{{url('get/kab-kot')}}",
                type : 'post', 
                data : 'mpa_province='+$(this).val(),
                success : function(resp){
                    //if($('[name="dom_similiar"]').parent().hasClass('checked')){
                        $("#ap_fam1_province").val($val);
                        $("#ap_fam2_province").val($val);
                        $("#ap_fam1_kab_kot").html(resp);
                        $("#ap_fam2_kab_kot").html(resp);
                    //}
                }
            })
        });
        // Get Family 1 Location
        $("#ap_fam1_kab_kot").change(function(){
   
            $("#ap_fam1_kecamatan").html("<option value=''>Memuat..</option>");
            $.ajax({ 
                url : "{{url('get/kecamatan')}}",
                type : 'post', 
                data : 'mpa_kab_kot='+$(this).val(),
                success : function(resp){
                    $("#ap_fam1_kecamatan").html(resp);
                }
            })
        });
        $("#ap_fam1_kecamatan").change(function(){

            $("#ap_fam1_kelurahan").html("<option value=''>Memuat..</option>");
            $.ajax({ 
                url : "{{url('get/kelurahan')}}",
                type : 'post', 
                data : 'mpa_kab_kot='+$("#ap_fam1_kab_kot").val()+'&mpa_kecamatan='+$(this).val(),
                success : function(resp){
                    $("#ap_fam1_kelurahan").html(resp);
                }
            })
        });
        $("#ap_fam1_kelurahan").change(function(){

            getFam1CodePost();
        });
        function getFam1CodePost(){
            $("#ap_fam1_postal_code").val("Memuat..");
            $ap_fam1_province = $("#ap_fam1_province").val();
            $ap_fam1_kab_kot = $("#ap_fam1_kab_kot").val();
            $ap_fam1_kecamatan = $("#ap_fam1_kecamatan").val();
            $ap_fam1_kelurahan = $("#ap_fam1_kelurahan").val();
            $.ajax({ 
                url : "{{url('get/kode-pos')}}",
                type : 'post',
                data : 'mpa_province='+$ap_fam1_province+'&mpa_kab_kot='+$ap_fam1_kab_kot+'&mpa_kecamatan='+$ap_fam1_kecamatan+'&mpa_kelurahan='+$ap_fam1_kelurahan,
                success : function(resp){
                    $("#ap_fam1_postal_code").val(resp);
                }
            })
        }

        // Get Location Employer
        $("#ap_employer_province").change(function(){

            $("#ap_employer_kab_kot").html("<option value=''>Memuat..</option>");
            $val = $(this).val();
            $.ajax({ 
                url : "{{url('get/kab-kot')}}",
                type : 'post', 
                data : 'mpa_province='+$(this).val(),
                success : function(resp){
                    $("#ap_employer_kab_kot").html(resp);
                }
            })
        });
        $("#ap_employer_kab_kot").change(function(){

            $("#ap_employer_kecamatan").html("<option value=''>Memuat..</option>");
            $val = $(this).val();
            $.ajax({ 
                url : "{{url('get/kecamatan')}}",
                type : 'post', 
                data : 'mpa_kab_kot='+$(this).val(),
                success : function(resp){
                    $("#ap_employer_kecamatan").html(resp);
                }
            })
        });
        $("#ap_employer_kecamatan").change(function(){

            $("#ap_employer_kelurahan").html("<option value=''>Memuat..</option>");
            $.ajax({ 
                url : "{{url('get/kelurahan')}}",
                type : 'post', 
                data : 'mpa_kab_kot='+$("#ap_employer_kab_kot").val()+'&mpa_kecamatan='+$(this).val(),
                success : function(resp){
                    $("#ap_employer_kelurahan").html(resp);
                }
            })
        });
        $("#ap_employer_kelurahan").change(function(){
            getCodePostEmp();
        });
        function getCodePostEmp(){
            $("#ap_employer_postal_code").val("Memuat..");
            $ap_employer_province = $("#ap_employer_province").val();
            $ap_employer_kab_kot = $("#ap_employer_kab_kot").val();
            $ap_employer_kecamatan = $("#ap_employer_kecamatan").val();
            $ap_employer_kelurahan = $("#ap_employer_kelurahan").val();
            $.ajax({ 
                url : "{{url('get/kode-pos')}}",
                type : 'post',
                data : 'mpa_province='+$ap_employer_province+'&mpa_kab_kot='+$ap_employer_kab_kot+'&mpa_kecamatan='+$ap_employer_kecamatan+'&mpa_kelurahan='+$ap_employer_kelurahan,
                success : function(resp){
                    $("#ap_employer_postal_code").val(resp);
                }
            })
        }
      // kissmetrics push
      _kmq.push(['trackClick', '#apply', 'Web submit form']);
    </script>
</body>
</html>
