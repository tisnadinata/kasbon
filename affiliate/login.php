<?php
	include 'dashboard/connectDB.php';
	if(isset($_SESSION['kode_referal'])){
		echo'
			<meta http-equiv="Refresh" content="0; URL=dashboard/index.php">
		';
	}
?>
<!DOCTYPE html>
<html dir="ltr" lang="id-ID" prefix="og: http://ogp.me/ns#">

<!-- Mirrored from Kasbon.com/affiliate/login by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 17 Jul 2016 14:15:17 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
     <!-- Meta Tags 
    ============================================= -->   
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- <meta name="description" content="Butuh pinjaman cepat, mudah, bunga terjangkau? Kasbon solusinya"> -->
    <!-- <meta name="author" content="Faizal Rahman Hakim"> -->

    
    
    <meta name="author" content="Kasbon Team" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>    Program Affiliate Kasbon - Login 
    </title>

        <meta name="description" content="Program Affiliate Kasbon. Bisnis online mudah dan menguntungkan. Pinjaman Online Cepat & Terpecaya" />
        <meta name="keywords" content="Pinjaman online, pinjaman, pinjaman tanpa anggunan, pinjaman tanpa jaminan, pinjaman tanpa syarat, pinjaman uang tunai">
        <link rel="canonical" href="login.html" />
        <meta property="og:locale" content="id-ID" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="Kasbon - Pinjaman Online, Cepat & Terpercaya - Program Affiliate Kasbon - Login" />
        <meta property="og:description" content="Program Affiliate Kasbon. Bisnis online mudah dan menguntungkan. Pinjaman Online Cepat & Terpecaya" />
        <meta property="og:url" content="login.html" />
        <meta property="og:image" content="../assets/frontend/statics/v2/images/icons/favicon_144.html" />
        <meta property="og:image:secure_url" content="../assets/frontend/statics/v2/images/web/main_uang_teman_logo.html" />
        <meta property="og:site_name" content="Kasbon" />
        <meta name="twitter:card" content="summary">
        <meta name="twitter:url" content="https://twitter.com/Kasbon">
        <meta name="twitter:title" content="Program Affiliate Kasbon - Login">
        <meta name="twitter:description" content="Program Affiliate Kasbon. Bisnis online mudah dan menguntungkan. Pinjaman Online Cepat & Terpecaya">
        <meta name="twitter:image" content="../assets/frontend/statics/v2/images/icons/favicon_144.html">
        
    <!-- Stylesheets
    ============================================= -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700,600,400" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../assets/frontend/statics/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="../assets/frontend/statics/css/dark.css" type="text/css" />
    <link rel="stylesheet" href="../assets/frontend/statics/css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="../assets/frontend/statics/css/animate.css" type="text/css" />

    <!-- CSS REQUIRED FOR THIS PAGE ONLY
    ============================================= -->
        <link rel="stylesheet" type="text/css" href="../assets/frontend/statics/vendor/icheck/square/grey.css" />
    
    <!-- Core Stylesheets
    ============================================= -->
    <link rel="stylesheet" href="../assets/frontend/statics/css/main_affiliate.css" type="text/css" />
    <link rel="stylesheet" href="../assets/frontend/statics/css/responsive.css" type="text/css" />


    <!--[if lt IE 9]>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

    <!-- Core JavaScripts
    ============================================= -->
    <script type="text/javascript">
        var locale = 'id';
    </script>
    
    <script type="text/javascript" src="../assets/backend/statics/js/jquery.min.js"></script>
     
    <script type="text/javascript" src="../assets/frontend/statics/js/plugins.js"></script>


    <!-- This Page JavaScripts
    ============================================= -->
        <script type="text/javascript" src="../assets/frontend/statics/vendor/icheck/jquery.icheck.min.js"></script>

    <!-- Favicons
    ============================================= -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/frontend/statics/images/icons/favicon_144.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/frontend/statics/images/icons/favicon_114.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/frontend/statics/images/icons/favicon_72.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/frontend/statics/images/icons/favicon_57.png">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/frontend/statics/images/icons/favicon.ico">
    <link rel="icon" href="../assets/frontend/statics/images/icons/favicon.ico" type="image/x-icon">
</head>

<body class="register bg-custom">

    <!-- Top Bar
    ============================================= -->
        <!-- #top-bar end -->

    <!-- Header
    ============================================= -->
        <!-- #header end -->

    <!-- Document Wrapper
    ============================================= -->
    <div class="wrapper" class="clearfix">
            <section id="content">
        <div class="content-wrap bg-custom" >
            <div class="container clearfix">
            <div class="box-style col-sm-4 col-sm-offset-4">
            <div class="logo">
            <img src="../assets/backend/statics/images/web/ut_logo_md.png" alt="Uang Teman Administration">
            </div>
            <br>
            </div>

                <div class="row">
                <div class="col-md-push-3 col-md-6 col-sm-12 nobottommargin">

                   
                    <div class="well_ut nobottommargin" style="border-bottom:5px solid #193f7c;background-color:white;">
                        <form action="" method="post">
                            <h3>Sign In Affiliate</h3>
							<?php
								if(isset($_POST['btnLogin'])){
									$stmt = $mysqli->query("select * from tbl_affiliate where email='$_POST[email]' AND kata_sandi='$_POST[password]'");
									if($stmt->num_rows>0){
										$aff = $stmt->fetch_object();
										$_SESSION['kode_referal'] = $aff->kode_referal;
										$_SESSION['email'] = $_POST['email'];		
										$_SESSION['password'] = $_POST['password'];		
										echo'
											<div class="alert alert-success" role="alert">
												Login berhasil, anda akan dialihkan.
											</div>
											<meta http-equiv="Refresh" content="1; URL=dashboard/index.php">
										';										
									}else{
										echo'
											<div class="alert alert-danger" role="alert">
												Login gagal, email dan password tidak cocok.
											</div>
										';										
									}
								}	
							?>

                            <div class="col_full">
                                <label for="login-form-username">Email:</label>
                                <div class="input-group input-group-sm">
                                    <span class="input-group-addon" id="sizing-addon1"><i class="icon-envelope font11"> </i></span>
                                    <input type="email" placeholder="Email" id="login-form-username" name="email"  class="required form-control input-block-level" />
                                </div>
                            </div>

                            <div class="col_full">
                                <label for="login-form-password">Kata Sandi:</label>
                                <div class="input-group input-group-sm">
                                    <span class="input-group-addon" id="sizing-addon1"><i class="icon-lock font11"> </i></span>
                                    <input type="password" placeholder="Kata Sandi" id="login-form-password" name="password"  class="required form-control input-block-level" />
                                </div>
                            </div>
                            
                            <div class="col_full">
                                <button class=" btn-primary btn-sm" id="login-form-submit" name="btnLogin" value="login">Sign In <i class="icon-line2-arrow-right"> </i> </button>
                                <span><i class="icon-user"></i><a class="register" href="register.php"> Daftar disini</a> </span>
                                |
                                <span><i class="icon-lock"></i><a class="forgot" href="forgot-password.php"> Lupa kata sandi</a> </span>
                            </div>

                        </form>
                    </div>
                </div>
                </div>
            </div>

        </div>

    </section>
    </div>
    <!-- #wrapper end -->

    <!-- Footer -->
        <!-- Go To Top
    ============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>

    <!-- Footer Scripts
    ============================================= -->
    <script type="text/javascript">
            var base_url = "login.html\/\/Kasbon.com";
            var path = {"css":"https:\/\/Kasbon.com\/assets\/frontend\/statics\/v2\/css\/","js":"https:\/\/Kasbon.com\/assets\/frontend\/statics\/v2\/js\/","images":"https:\/\/Kasbon.com\/assets\/frontend\/statics\/v2\/images\/","icon":"https:\/\/Kasbon.com\/assets\/frontend\/statics\/v2\/images\/icons\/","web":"https:\/\/Kasbon.com\/assets\/frontend\/statics\/v2\/images\/web\/","font":"https:\/\/Kasbon.com\/assets\/frontend\/statics\/v2\/font\/","vendor":"https:\/\/Kasbon.com\/assets\/frontend\/statics\/v2\/vendor\/","twiml":"https:\/\/Kasbon.com\/assets\/frontend\/statics\/v2\/twiml\/","assets":"https:\/\/Kasbon.com\/assets\/","temp_path":"https:\/\/Kasbon.com\/assets\/temp_files\/"};
            var jvalidation = {"required":"This field is required.","remote":"Please fix this field.","email":"Please enter a valid email address.","url":"Please enter a valid URL.","date":"Please enter a valid date.","dateISO":"Please enter a valid date (ISO).","number":"Please enter a valid number.","digits":"Please enter only digits.","creditcard":"Please enter a valid credit card number.","equalTo":"Please enter the same value again.","accept":"Please enter a value with a valid extension.","maxlength":"Please enter no more than {0} karakter.","minlength":"Please enter at least {0} karakter.","rangelength":"Please enter a value between {0} and {1} karakter long.","range":"Please enter a value between {0} and {1}.","max":"Please enter a value less than or equal to {0}.","min":"Please enter a value greater than or equal to {0}."};
            var conf = {"time_info":5000};
        </script>

    <script type="text/javascript" src="../assets/frontend/statics/js/functions.js"></script>
    <script type="text/javascript" src="../assets/frontend/statics/js/main_dashboard5e1f.js?v=2"></script>
    
    <script type="text/javascript">
    $(function(){
        // Check Cookies
        if(navigator.cookieEnabled == false) window.location = "http://www.wikihow.com/Enable-Cookies-in-Your-Internet-Web-Browser";

        $validator = $("#top-login, .login-user").validate({"rules":{"cd_email_address":{"required":true,"email":true},"cd_passwd":{"required":true,"minlength":"6"}},"messages":{"cd_email_address":{"required":"'Alamat Email' wajib diisi.","email":"'<strong>Alamat Email<\/strong>' harus dalam format yang benar."},"cd_passwd":{"required":"'Kata Sandi' wajib diisi.","minlength":"'<strong>Kata Sandi<\/strong>' harus lebih dari 6 karakter."}}});
        $validator = $("#top-login, .register-user").validate({"rules":{"cd_email_address":{"required":true,"email":true},"cd_passwd":{"required":true,"minlength":"6"}},"messages":{"cd_email_address":{"required":"'Alamat Email' wajib diisi.","email":"'<strong>Alamat Email<\/strong>' harus dalam format yang benar."},"cd_passwd":{"required":"'Kata Sandi' wajib diisi.","minlength":"'<strong>Kata Sandi<\/strong>' harus lebih dari 6 karakter."}}});
        $validator = $("#top-login, .forgot-user").validate({"rules":{"cd_email_address":{"required":true,"email":true},"cd_passwd":{"required":true,"minlength":"6"}},"messages":{"cd_email_address":{"required":"'Alamat Email' wajib diisi.","email":"'<strong>Alamat Email<\/strong>' harus dalam format yang benar."},"cd_passwd":{"required":"'Kata Sandi' wajib diisi.","minlength":"'<strong>Kata Sandi<\/strong>' harus lebih dari 6 karakter."}}});
        $validator = $("#top-login, .reset-user").validate({"rules":{"cd_email_address":{"required":true,"email":true},"cd_passwd":{"required":true,"minlength":"6"}},"messages":{"cd_email_address":{"required":"'Alamat Email' wajib diisi.","email":"'<strong>Alamat Email<\/strong>' harus dalam format yang benar."},"cd_passwd":{"required":"'Kata Sandi' wajib diisi.","minlength":"'<strong>Kata Sandi<\/strong>' harus lebih dari 6 karakter."}}});
        

    });
    
    </script>

    <!-- Syntax Javascript -->
    

</body>

<!-- Mirrored from Kasbon.com/affiliate/login by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 17 Jul 2016 14:15:21 GMT -->
</html>