<footer>
          <div class="container">
            <div class="row top-footer">
              <div class="col-md-8" style="margin-bottom: 40px;">
                <h3 class="top-footer__title">Hubungi kami di</h3>
                <p class="top-footer__phone">{{ $nomor_telepon->value_pengaturan }}</p>
               
              </div>
              <div class="col-md-4">
                <h3 class="top-footer__title">{{ $company->value_pengaturan }}</h3>
                <p>
                  {{ $alamat->value_pengaturan }}
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
                  Copyright 2016. &copy; All Rights Reserved by {{ $company->value_pengaturan }}
                </div>
                
              </div>
              </div>

            </div>
          </div>
        </footer>

      </div>
    </div><!--  .offcanvas-wrapper -->


    <div style="display: none;">
        <div id='inline_content'>
            <div style=" margin-bottom:0px;text-align: center;" class="mk-text-block  ">
                <div class="maincontainer">
                    <div class="topcontainer">
                        <div class="formtext"><b>HAI, APAKAH KAMU BERDOMISILI</b></div>
                        <div class="formtext">DI SALAH SATU KOTA INI?</div>
                    </div>
                    <div class="middlecontainer">
                        <img src="{{ asset('frontend/statics/v2/images/map.png')}}" style="width: 100%;" />
                    </div>
                    <div>
                        <div class="divleft">
                            <a href="javascript:void(0)" class="circlecontainer circleleft" onclick="loadBox2();"><img src="{{ asset('frontend/statics/v2/images/circle1.png')}}" /></a>
                        </div>
                        <div class="divright">
                            <a href="javascript:void(0)" class="circlecontainer circleright" onclick="loadBox1();"><img src="{{ asset('frontend/statics/v2/images/circle2.png')}}" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div style="display: none;">
        <div id='inline_content1'>
            <div style=" margin-bottom:0px;text-align: center;" class="mk-text-block  ">
                <div class="maincontainer">
                    <div class="middlecontainer-blue">
                        <div>
                            <img src="{{ asset('frontend/statics/v2/images/face.png')}}" style="width: 200px;" />
                        </div>
                        <div class="middlecontainer-blue-text-container">
                            <div class="formtext">MOHON MAAF KAMI BELUM DAPAT MELAYANI PINJAMAN</div>
                            <div class="formtext">DI AREA TEMPAT TINGGAL ANDA</div>
                        </div>
                    </div>
                    <div class="bottomcontainer">
                        <div class="formtext">TERIMA KASIH TELAH MENGUNJUNGI WEBSITE Kasbon</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="display: none;">
        <div id='inline_content2'>
            <div style=" margin-bottom:0px;text-align: center;" class="mk-text-block  ">
                <div class="maincontainer">
                    <div class="middlecontainer">
                        <a href="https://play.google.com/store/apps/details?id=com.dai.Kasbon" target="_blank"><img src="{{ asset('frontend/statics/v2/images/app_notify_1.jpg')}}" style="width: 100%;" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script type="text/javascript" src="{{ asset('frontend/statics/v2/js/jquery-1.11.3.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('frontend/statics/v2/js/jquery.validate.min.js')}}"></script>
   <!-- <script type="text/javascript" src="{{ asset('frontend/statics/js/jquery.colorbox.js')}}"></script>--> 
    <script type="text/javascript" src="{{ asset('frontend/statics/js/js.cookie.js')}}"></script>

    <!-- start Mixpanel -->
<script type="text/javascript">(function(e,b){if(!b.__SV){var a,f,i,g;window.mixpanel=b;b._i=[];b.init=function(a,e,d){function f(b,h){var a=h.split(".");2==a.length&&(b=b[a[0]],h=a[1]);b[h]=function(){b.push([h].concat(Array.prototype.slice.call(arguments,0)))}}var c=b;"undefined"!==typeof d?c=b[d]=[]:d="mixpanel";c.people=c.people||[];c.toString=function(b){var a="mixpanel";"mixpanel"!==d&&(a+="."+d);b||(a+=" (stub)");return a};c.people.toString=function(){return c.toString(1)+".people (stub)"};i="disable time_event track track_pageview track_links track_forms register register_once alias unregister identify name_tag set_config people.set people.set_once people.increment people.append people.union people.track_charge people.clear_charges people.delete_user".split(" ");
for(g=0;g<i.length;g++)f(c,i[g]);b._i.push([a,e,d])};b.__SV=1.2;a=e.createElement("script");a.type="text/javascript";a.async=!0;a.src="undefined"!==typeof MIXPANEL_CUSTOM_LIB_URL?MIXPANEL_CUSTOM_LIB_URL:"file:"===e.location.protocol&&"//cdn.mxpnl.com/libs/mixpanel-2-latest.min.js".match(/^\/\//)?"https://cdn.mxpnl.com/libs/mixpanel-2-latest.min.js":"//cdn.mxpnl.com/libs/mixpanel-2-latest.min.js";f=e.getElementsByTagName("script")[0];f.parentNode.insertBefore(a,f)}})(document,window.mixpanel||[]);
mixpanel.init("d4dc2382db9d9f10abed8ee8d5a155b3");</script>
<!-- end Mixpanel -->

    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','../www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-54108703-1', 'auto');
  // ga('create', 'UA-54108703-1', {
  // 'cookieDomain': 'none'
  // });
  ga('require', 'displayfeatures');
  ga('require', 'linkid', 'linkid.html');
  ga('send', 'pageview');
</script>

    <script type="text/javascript">
    $(document).on("change","#ap_email_address",function(){
      push_analytics("event","index.html","Home Page - Email input");
    });
    $(document).on("change","#principal_amount",function(){
      push_analytics("event","index.html","Home Page - Amount input");
    });
    $(document).on("change","#due_date",function(){
      push_analytics("event","index.html","Home Page - Duration input");
    });
    </script>
    
   

    <!--Start of Zopim Live Chat Script
        <script type="text/javascript">
    window.$zopim||(function(d,s){var z=$zopim=function(c){
    z._.push(c)},$=z.s=
    d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
    _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
    $.src='http://v2.zopim.com/?2xhHSlrnPF8NwQPVPeqr3GTXaVbyaEyW';z.t=+new Date;$.
    type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
    </script>
    End of Zopim Live Chat Script-->

   

    

    <script type="text/javascript" src="{{ asset('frontend/statics/v2/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('frontend/statics/v2/js/bootstrap-slider.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('frontend/statics/js/plugins.js')}}"></script>
    <script type="text/javascript" src="{{ asset('frontend/statics/js/functionsf46c.js?1436426629')}}"></script>
    <script type="text/javascript" src="{{ asset('frontend/statics/v2/js/main9ac0.js?1451560568')}}"></script>
<!-- <script type="text/javascript" src="{{ asset('frontend/statics/v2/js/typed.js')}}" ></script> -->
    <script type="text/javascript" src="{{ asset('frontend/statics/vendor/accounting/accounting.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('frontend/statics/vendor/date/date.js')}}"></script>


    <script type="text/javascript" src="{{ asset('frontend/statics/v2/js/loan-calculate.js')}}"></script>
    <script type="text/javascript" src="{{ asset('frontend/statics/v2/js/menu.js')}}"></script>

    <!--<script type="text/javascript" src="{{ asset('frontend/statics/v2/js/jquery.colorbox.js')}}"></script> -->
    <script type="text/javascript" src="{{ asset('frontend/statics/v2/js/js.cookie.js')}}"></script>

   
    <script type="text/javascript">

       
        function loadBox() {
            if (mobileAndTabletcheck()) {
                jQuery.colorbox({inline:true, opacity: "0.85", width: "100%", href:"#inline_content", closeButton: false, escKey: false, overlayClose: false});                
            } else {
                jQuery.colorbox({inline:true, opacity: "0.85", width: "70%", href:"#inline_content", closeButton: false, escKey: false, overlayClose: false});                
            }
    
            hideCol();
        }

        function loadBox1() {
            if (mobileAndTabletcheck()) {
                jQuery.colorbox({inline:true, opacity: "0.85", width: "100%", href:"#inline_content1", closeButton: true, escKey: false, overlayClose: false});                         
            } else {
                jQuery.colorbox({inline:true, opacity: "0.85", width: "60%", href:"#inline_content1", closeButton: true, escKey: false, overlayClose: false});            
            }
            hideCol();
        }

        function loadBox2() {
            if (mobileAndTabletcheck()) {
                jQuery.colorbox({inline:true, opacity: "0.85", width: "100%", href:"#inline_content2", closeButton: true, escKey: false, overlayClose: false});                         
            } else {
                jQuery.colorbox({inline:true, opacity: "0.85", width: "60%", href:"#inline_content2", closeButton: true, escKey: false, overlayClose: false});            
            }
            hideCol();
        }

        

      </script> 

     
<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6025535574180&amp;cd[value]=0.00&amp;cd[currency]=USD&amp;noscript=1" /></noscript>
        <script type="text/javascript">
// Mixpanel Track Link

// mixpanel.track_links("#apply_now_button","Apply now link click");
// mixpanel.track_links("#about_us_link","About us link click");
// mixpanel.track_links("#how_it_works_link","How it work link click");
// mixpanel.track_links("#privacy_police_link","Privacy policy link click");
// mixpanel.track_links("#fees_and_charges_link","Fees and charge link click");
// mixpanel.track_links("#contact_us_link","Contact us link click");
// mixpanel.track_links("#blog_menu","Blog menu link click");
// mixpanel.track_links("#terms_and_conditions_link","Terms and conditions link click");
// mixpanel.track_links("#share_fb_button","Share fb button click", {"Network": "Facebook"});
// mixpanel.track_links("#share_twitter_button","Share Twitter button click", {"Network": "Twitter"});
// mixpanel.track_links("#share_in_button","Share LinkedIn button click", {"Network": "LinkedIn"});
// mixpanel.track_links("#in_lang","Bahasa language select");
// mixpanel.track_links("#en_lang","English language select");

// Mixpanel Track Device
// if(device.desktop()) device_type = "Desktop";
// if(device.tablet()) device_type = "Tablet";
// if(device.mobile()) device_type = "Mobile";
// mixpanel.track("Device", {"Device type": device_type});

// E: for promo only

// First Time Visit
// mixpanel.unregister('First Time Visit');
// var cb = generate_callback($(this));
// setTimeout(cb, 500);

// function generate_callback(a) { 
//     return function() { 
//         mixpanel.register({"First Time Visitor": "False"});
//     } 
// }

</script>  </body>

<!-- Mirrored from Kasbon.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 17 Jul 2016 14:09:38 GMT -->
</html>
