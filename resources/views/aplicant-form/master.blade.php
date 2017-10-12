

<!DOCTYPE html>
<html lang="en">
  <head>
  <meta name="_token" content="{!! csrf_token() !!}" />
    <script src="//cdn.optimizely.com/js/4412165250.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <meta name="google-play-app" content="app-id=com.dai.uangteman">

    
    <!-- Favicons
    ============================================= -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('frontend/statics/images/icons/favicon_144.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('frontend/statics/images/icons/favicon_114.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('frontend/statics/images/icons/favicon_72.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('frontend/statics/images/icons/favicon_57.png')}}">
    <link rel="apple-touch-icon" href="{{ asset('frontend/statics/images/icons/favicon_57.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/statics/images/icons/favicon.ico')}}">
    <link rel="icon" href="{{ asset('frontend/statics/images/icons/favicon.ico" type="image/x-icon')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Kasbon.com</title>


    <link href="{{ asset('frontend/statics/v2/css/style9571.css?v=2.4')}}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Karla:400,400italic,700,700italic' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="{{ asset('frontend/statics/v2/js/lib/jquery.mCustomScrollbar.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('frontend/statics/css/font-icons.css')}}" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/statics/vendor/datepicker/bootstrap-datepicker.css')}}" />

    <!-- Core JavaScripts
    ============================================= -->
    <script type="text/javascript">
        var locale = 'id';
    </script>
    
    <script type="application/ld+json">
    [
        {
            "@context": "http://schema.org",
            "@type": "Organization",
            "url": "https://uangteman.com",
            "description": "UangTeman merupakan penyedia layanan pinjaman jangka pendek online pertama di Indonesia
    dengan proses cepat dan terpercaya. Beroperasi sejak April 2015, UangTeman merupakan bagian dari
    PT Digital Alpha Indonesia dan Digital Alpha Group Pte Ltd, salah satu perusahaan digital keuangan di
    wilayah Asia Tenggara yang menyediakan pinjaman jangka pendek baik untuk keperluan konsumtif
    dan bisnis. UangTeman menyediakan pinjaman untuk masyarakat Indonesia dan untuk saat ini
    melayani daerah Jabodetabek, Yogyakarta, Solo, Magelang dan Klaten.",
            "logo": "{{ asset('frontend/statics/images/web/uangteman_logo.png')}}",
            "contactPoint" : [{
                "@type" : "ContactPoint",
                "telephone" : "+6221 212 821 47 / 48",
                "contactType" : "Customer Service",
                "areaServed" : "Indonesia"
            }],
            "sameAs" : [
                "https://www.facebook.com/uangteman",
                "https://twitter.com/uangteman",
                "https://www.linkedin.com/company/uangteman",
                "https://www.youtube.com/channel/UCimoawyf6RETfiB31MQuvBQ"
            ]
        },
        {
            "@context": "http://schema.org",
            "@type": "Person",
            "name" : "Aidil Zulkifli",
            "url" : "https://aidil.ceo",
            "sameAs" : [
                "https://id.linkedin.com/in/aidilzulkifli/in"
            ]
        }
    ]
    </script>
  </head>

  <body>

    <div class="visible-xs">
        <header class="offcanvas clearfix">
            <div id="smartbannertop"></div>
            <div id="topmenu">
                <a href="javascript:;" id="js-toggle" class="burger">
                    <span></span>
                </a>

                <div class="text-center offcanvas__logo">
                    <a href="https://uangteman.com"><img src="{{ asset('frontend/statics/images/web/uangteman_logo.png')}}" alt="UangTeman" /></a>
                </div>

                <a href="tel://+622121282147" class="header-call-center">
                    <img src="{{ asset('frontend/statics/v2/images/icon-phone.png')}}" alt="" />
                </a>
            </div>
        </header>


        <div id="js-aside" class="mobile-menu">
            <div class="mobile-menu__login-area">
                <p>Silahkan Login Untuk Kemudahan Anda Meminjam</p>
                <a href="login  " class="btn btn-primary">Login</a>
            </div>
            <div class="">
                <ul class="mobile-menu__list">
                    <li class="mobile-menu__list__item"><a href="https://uangteman.com" class="active">Pinjam Sekarang</a></li>
                    <!-- <li class="mobile-menu__list__item"><a href="status-pinjaman.php">Status Pinjaman</a></li> -->
                    <li class="mobile-menu__list__item divider"></li>
                    <li class="mobile-menu__list__item"><a href="fees">Biaya</a></li>
                    <li class="mobile-menu__list__item"><a href="work">Cara Pinjam</a></li>
                    <li class="mobile-menu__list__item"><a href="faq">Pertanyaan?</a></li>
                    <li class="mobile-menu__list__item"><a href="blog">Blog</a></li>
                    <li class="mobile-menu__list__item divider"></li>
                    <!-- <li class="mobile-menu__list__item"><a href="karir.php">Karir</a></li> -->
                    <li class="mobile-menu__list__item"><a href="pro-tips">Pro Tips</a></li>
                    <li class="mobile-menu__list__item"><a href="charter-of-responsible-lending">Tanggung Jawab</a></li>
                    <li class="mobile-menu__list__item"><a href="privacy-policy">Kebijakan Privasi</a></li>
                    <li class="mobile-menu__list__item"><a href="terms-conditions">Syarat dan Ketentuan</a></li>
                    <!-- <li class="mobile-menu__list__item"><a href="">Hubungi Kami</a></li> -->
                </ul>
            </div>
        </div>

        <div id="js-overlay" class="overlay"></div>
    </div>
    
    <div class="offcanvas-container">
        <div id="main" class="offcanvas-wrapper">    <nav class="navbar navbar-default m-bottom-0 navbar--blue">

      <div class="container">
      
        <div class="navbar-collapse collapse">
          <div class="navbar-header">
            <a class="navbar-brand form-pengajuan" href="https://uangteman.com"><img src="{{ asset('frontend/statics/images/web/uangteman_logo.png')}}"></a>
          </div>
          <ul class="nav navbar-nav navbar-right">
            <li class="contact-header">
              <img src="{{ asset('frontend/statics/v2/assets/icon-call.png')}}">Butuh Bantuan? Hubungi kami di <span>+6221 212 821 47</span>
              </br>
              &nbsp;
            </li>
          </ul>
        </div>

      <!-- /.navbar-collapse -->
      <!-- Page Heading -->
      @yield('content')
      <!-- /.row --> 
  <!--footer-->
    @include('aplicant-form.footer')