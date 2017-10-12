<?php
	if(!isset($_GET['post'])){
		echo'<meta http-equiv="Refresh" content="0; URL=index.php">';
	}else{
		include 'connectDB.php';
		$logo = getDataByCollumn("tbl_pengaturan","nama_pengaturan","'logo_website'");
		$data_post = getDataByCollumn("tbl_blog","id_blog",$_GET['post']);
		if($data_post == null){
			echo'<meta http-equiv="Refresh" content="0; URL=index.php">';
		}else{
			$stmt =$mysqli->query("UPDATE tbl_blog SET dilihat=(dilihat+1) where id_blog = ".$_GET['post']."");
		}
	}
?>
<html dir="ltr" lang="en-US" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
<!-- Mirrored from kasbon.com/blog/berita-bank/4-bank-dengan-kta-bunga-rendah/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 31 Jul 2016 09:33:52 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<!-- /Added by HTTrack -->
<head>
<!-- LIVE CHAT -->
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/57a6a33a3d4efacf135d4590/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<title><?php echo $data_post->judul_post; ?></title>
<meta charset="UTF-8">
<link rel="profile" href="http://gmpg.org/xfn/11"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="google-site-verification" content="-nn3cyrJBOZFNHadax90uzV1yR22_Fo3bqWUCVtVW7U"/>
<meta content="IE=edge,chrome=1" http-equiv="IE=edge,chrome=1">
<meta name="robots" content="index, follow">
<meta name="author" content="L9 for kasbon.id"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css"/>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="wp-content/themes/kasbon/css/bootstrap.css" type="text/css"/>
<link rel="stylesheet" href="wp-content/themes/kasbon/css/main_style.css" type="text/css"/>
<link rel="stylesheet" href="wp-content/themes/kasbon/css/dark.css" type="text/css"/>
<link rel="stylesheet" href="wp-content/themes/kasbon/css/font-icons.css" type="text/css"/>
<link rel="stylesheet" href="wp-content/themes/kasbon/css/animate.css" type="text/css"/>
<link rel="stylesheet" href="wp-content/themes/kasbon/css/magnific-popup.css" type="text/css"/>
<link rel="stylesheet" href="wp-content/themes/kasbon/css/responsive.css" type="text/css"/>
<!--[if lt IE 9]>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
<script type="text/javascript" src="wp-content/themes/kasbon/js/jquery.js"></script>
<script type="text/javascript" src="wp-content/themes/kasbon/js/plugins.js"></script>
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="wp-content/themes/kasbon/images/statics/icons/favicon_144.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="wp-content/themes/kasbon/images/statics/icons/favicon_114.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="wp-content/themes/kasbon/images/statics/icons/favicon_72.png">
<link rel="apple-touch-icon-precomposed" href="wp-content/themes/kasbon/images/statics/icons/favicon_57.png">
<link rel="shortcut icon" type="image/x-icon" href="wp-content/themes/kasbon/images/statics/icons/favicon.ico">
<link rel="icon" href="wp-content/themes/kasbon/images/statics/icons/favicon.ico" type="image/x-icon">
<link rel="alternate" href="index.php" hreflang="id"/>
<link rel="pingback" href="../../xmlrpc.php"/>
<!-- All in One SEO Pack 2.3.5.1 by Michael Torbert of Semper Fi Web Design[-1,-1] -->
<link rel="canonical" href="index.php"/>
<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','../../../../www.google-analytics.com/analytics.js','ga');
			ga('create', 'UA-54108703-1', 'auto');
			ga('send', 'pageview');
			</script>
<!-- /all in one seo pack -->
<link rel="alternate" type="application/rss+xml" title="kasbon Berita &raquo; 4 Bank Dengan KTA Bunga Rendah Comments Feed" href="feed/index.php"/>
<script type="text/javascript">
			window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/72x72\/","ext":".png","source":{"concatemoji":"https:\/\/kasbon.com\/blog\/wp-includes\/js\/wp-emoji-release.min.js?ver=4.5.3"}};
			!function(a,b,c){function d(a){var c,d,e,f=b.createElement("canvas"),g=f.getContext&&f.getContext("2d"),h=String.fromCharCode;if(!g||!g.fillText)return!1;switch(g.textBaseline="top",g.font="600 32px Arial",a){case"flag":return g.fillText(h(55356,56806,55356,56826),0,0),f.toDataURL().length>3e3;case"diversity":return g.fillText(h(55356,57221),0,0),c=g.getImageData(16,16,1,1).data,d=c[0]+","+c[1]+","+c[2]+","+c[3],g.fillText(h(55356,57221,55356,57343),0,0),c=g.getImageData(16,16,1,1).data,e=c[0]+","+c[1]+","+c[2]+","+c[3],d!==e;case"simple":return g.fillText(h(55357,56835),0,0),0!==g.getImageData(16,16,1,1).data[0];case"unicode8":return g.fillText(h(55356,57135),0,0),0!==g.getImageData(16,16,1,1).data[0]}return!1}function e(a){var c=b.createElement("script");c.src=a,c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c)}var f,g,h,i;for(i=Array("simple","flag","unicode8","diversity"),c.supports={everything:!0,everythingExceptFlag:!0},h=0;h<i.length;h++)c.supports[i[h]]=d(i[h]),c.supports.everything=c.supports.everything&&c.supports[i[h]],"flag"!==i[h]&&(c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&c.supports[i[h]]);c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&!c.supports.flag,c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.everything||(g=function(){c.readyCallback()},b.addEventListener?(b.addEventListener("DOMContentLoaded",g,!1),a.addEventListener("load",g,!1)):(a.attachEvent("onload",g),b.attachEvent("onreadystatechange",function(){"complete"===b.readyState&&c.readyCallback()})),f=c.source||{},f.concatemoji?e(f.concatemoji):f.wpemoji&&f.twemoji&&(e(f.twemoji),e(f.wpemoji)))}(window,document,window._wpemojiSettings);
		</script>
<style type="text/css">
img.wp-smiley,
img.emoji {
	display: inline !important;
	border: none !important;
	box-shadow: none !important;
	height: 1em !important;
	width: 1em !important;
	margin: 0 .07em !important;
	vertical-align: -0.1em !important;
	background: none !important;
	padding: 0 !important;
}
</style>
<link rel='https://api.w.org/' href='../../wp-json/index.php'/>
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="../../xmlrpc0db0.php?rsd"/>
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="../../wp-includes/wlwmanifest.xml"/>
<meta name="generator" content="WordPress 4.5.3"/>
<link rel='shortlink' href='../../indexcf3a.html?p=5087'/>
<link rel="alternate" type="application/json+oembed" href="../../wp-json/oembed/1.0/embed12a7.json?url=https%3A%2F%2Fkasbon.com%2Fblog%2Fberita-bank%2F4-bank-dengan-kta-bunga-rendah%2F"/>
<link rel="alternate" type="text/xml+oembed" href="../../wp-json/oembed/1.0/embedf0c9?url=https%3A%2F%2Fkasbon.com%2Fblog%2Fberita-bank%2F4-bank-dengan-kta-bunga-rendah%2F&amp;format=xml"/>
<script id="wpcp_disable_selection" type="text/javascript">
//<![CDATA[
var image_save_msg='You Can Not Save images!';
	var no_menu_msg='Context Menu disabled!';
	var smessage = "Content is protected !!";
function disableEnterKey(e)
{
	if (e.ctrlKey){
     var key;
     if(window.event)
          key = window.event.keyCode;     //IE
     else
          key = e.which;     //firefox (97)
    //if (key != 17) alert(key);
     if (key == 97 || key == 65 || key == 67 || key == 99 || key == 88 || key == 120 || key == 26 || key == 85  || key == 86 || key == 83 || key == 43)
     {
          show_wpcp_message('You are not allowed to copy content or view source');
          return false;
     }else
     	return true;
     }
}
function disable_copy(e)
{	
	var elemtype = e.target.nodeName;
	var isSafari = /Safari/.test(navigator.userAgent) && /Apple Computer/.test(navigator.vendor);
	elemtype = elemtype.toUpperCase();
	var checker_IMG = '';
	if (elemtype == "IMG" && checker_IMG == 'checked' && e.detail >= 2) {show_wpcp_message(alertMsg_IMG);return false;}
    if (elemtype != "TEXT" && elemtype != "TEXTAREA" && elemtype != "INPUT" && elemtype != "PASSWORD" && elemtype != "SELECT")
	{
		if (smessage !== "" && e.detail == 2)
			show_wpcp_message(smessage);
		if (isSafari)
			return true;
		else
			return false;
	}	
}
function disable_copy_ie()
{
	var elemtype = window.event.srcElement.nodeName;
	elemtype = elemtype.toUpperCase();
	if (elemtype == "IMG") {show_wpcp_message(alertMsg_IMG);return false;}
	if (elemtype != "TEXT" && elemtype != "TEXTAREA" && elemtype != "INPUT" && elemtype != "PASSWORD" && elemtype != "SELECT")
	{
		//alert(navigator.userAgent.indexOf('MSIE'));
			//if (smessage !== "") show_wpcp_message(smessage);
		return false;
	}
}	
function reEnable()
{
	return true;
}
document.onkeydown = disableEnterKey;
document.onselectstart = disable_copy_ie;
if(navigator.userAgent.indexOf('MSIE')==-1)
{
	document.onmousedown = disable_copy;
	document.onclick = reEnable;
}
function disableSelection(target)
{
    //For IE This code will work
    if (typeof target.onselectstart!="undefined")
    target.onselectstart = disable_copy_ie;
    //For Firefox This code will work
    else if (typeof target.style.MozUserSelect!="undefined")
    {target.style.MozUserSelect="none";}
    //All other  (ie: Opera) This code will work
    else
    target.onmousedown=function(){return false}
    target.style.cursor = "default";
}
//Calling the JS function directly just after body load
window.onload = function(){disableSelection(document.body);};
//]]>
</script>
<script id="wpcp_disable_Right_Click" type="text/javascript">
	//<![CDATA[
	document.ondragstart = function() { return false;}
	/* ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
	Disable context menu on images by GreenLava Version 1.0
	^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ */
	    function nocontext(e) {
	       return false;
	    }
	    document.oncontextmenu = nocontext;
	//]]>
	</script>
<style>
.unselectable
{
-moz-user-select:none;
-webkit-user-select:none;
cursor: default;
}
html
{
-webkit-touch-callout: none;
-webkit-user-select: none;
-khtml-user-select: none;
-moz-user-select: none;
-ms-user-select: none;
user-select: none;
-webkit-tap-highlight-color: rgba(0,0,0,0);
}
</style>
<script id="wpcp_css_disable_selection" type="text/javascript">
var e = document.getElementsByTagName('body')[0];
if(e)
{
	e.setAttribute('unselectable',on);
}
</script>
<!-- BEGIN GADWP v4.9.3.1 Universal Tracking - https://deconf.com/google-analytics-dashboard-wordpress/ -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','../../../../www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-54108703-1', 'auto');
  ga('send', 'pageview');
</script>
<!-- END GADWP Universal Tracking -->
<style type="text/css">html{ margin:0px !important;}</style>
</head>
<body class="stretched">
<div id="wrapper" class="clearfix">
	<header id="header" class="header_page">
	<div class="container clearfix">
		<div id="primary-menu-trigger">
			<i class="icon-reorder"></i>
		</div>
		<div id="logo">
			<a class="link_fade" href="http://kasbon.id/"><img src="wp-content/themes/kasbon/images/statics/web/kasbon_logo.png" alt="kasbon.id"></a>
		</div>
		<nav id="primary-menu">
		<ul>
			<li class="current">
				<a href="http://kasbon.id/blog">Beranda Blog</a>
			</li>
			<li>
				<a id="back_apply_now" href="http://kasbon.id/">Pinjam Sekarang</a>
			</li>
		</ul>
		</nav>
	</div>
	</header>
	<div class="header_marbot"></div>
	<section id="page-title" class="page-title-pattern brw_heading" style="background-image: url('wp-content/themes/kasbon/images/dyns/headings/what_is_ut_heading.jpg');">
	<div class="container clearfix">
		<h1 class="heading_title">Blog <span>kasbon</span></h1>
		<p class="heading_tag">Pinjaman Online Cepat dan Terpercaya</p>
		<ol class="breadcrumb">
			<li>
				<a href="http://kasbon.id/blog">Beranda Blog</a>
			</li>
			<li class="active"><?php echo $data_post->judul_post; ?></li>
		</ol>
	</div>
	</section>
	<section itemscope="itemscope" itemtype="http://schema.org/NewsArticle" id="content">
	<meta itemscope itemprop="mainEntityOfPage" itemtype="https://schema.org/WebPage" itemid="index.php"/>
	<div class="content-wrap">
		<div class="container clearfix">
			<div class="postcontent nobottommargin clearfix">
				<div class="single-post nobottommargin">
					<div class="entry clearfix">
						<div itemprop="image" itemscope itemtype="https://schema.org/ImageObject" class="entry-image">
							<a href="<?php echo $data_post->gambar_utama; ?>" title="<?php echo $data_post->judul_post; ?>"><img src="<?php echo $data_post->gambar_utama; ?>" alt="<?php echo $data_post->judul_post; ?>"/></a>
							<meta itemprop="url" content="<?php echo $data_post->gambar_utama; ?>">
							<meta itemprop="width" content="500">
							<meta itemprop="height" content="350"></a>
						</div>
						<div class="entry-title">
							<h2 itemprop="headline"><?php echo $data_post->judul_post; ?></h2>
						</div>
						<ul class="entry-meta clearfix">
							<li itemprop="datePublished">
								<i class="icon-calendar3"></i> <?php echo $data_post->tanggal_posting; ?>
							</li>
							<li itemprop="datePublished">
								<i class="icon-calendar3"></i>Terakhir di Edit : <?php echo $data_post->terakhir_edit; ?>
							</li>
						</li>
					</ul>
					<div itemprop="description" class="entry-content notopmargin">
						<p style="text-align: justify;">
							<?php echo $data_post->deskripsi_post; ?>
						</p>
					</div>
				</div>
						<ul class="pager nomargin marbot_2">
							<li class="previous"><a href="?post=<?php echo ($_GET['post']-1);?>" >← Sebelumnya</a></li>
							<li class="next"><a href="?post=<?php echo ($_GET['post']+1);?>" >Selanjutnya →</a></li>
						</ul>
				<div class="line nomargin"></div>
			</div>
		</div>
		<div class="sidebar nobottommargin col_last clearfix">
			<div class="sidebar-widgets-wrap">
				<div class="widget clearfix">
					<div class="tabs nobottommargin clearfix" id="sidebar-tabs">
							<ul class="tab-nav clearfix">
								<li>
									<a href="#tabs-1">Paling Banyak di Lihat</a>
								</li>
							</ul>
							<div class="tab-container">
								<div class="tab-content clearfix" id="tabs-1">
								<?php
									$stmt = $mysqli->query("select * from tbl_blog order by dilihat DESC");
									while($post = $stmt->fetch_object()){
										echo'
											<div class="spost clearfix">
												<div class="entry-image">
													<a href="view.php?post='.$post->id_blog.'" class="nobg"><img width="60" height="60" src="'.$post->gambar_utama.'" class="attachment-60x60 size-60x60 wp-post-image" alt="'.$post->judul_post.'"/></a>
												</div>
												<div class="entry-c">
													<div class="entry-title">
														<h3><a href="view.php?post='.$post->id_blog.'">'.$post->judul_post.'</a></h3>
													</div>
												</div>
											</div>
										';
									}
								?>
								</div>
							</div>
					</div>
					<script>
				$(function() {
					$( "#sidebar-tabs" ).tabs({ show: { effect: "fade", duration: 400 } });
				});
			</script>
				</div>
			</div>
		</div>
	</div>
</div>
<div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
	<div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
		<img src=""/>
		<meta itemprop="url" content="">
		<meta itemprop="width" content="195">
		<meta itemprop="height" content="48"></div>
	<meta itemprop="name" content="kasbon.id"></div>
</section>
<footer id="footer">
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<div class="ft_info">
				<p>
					<b>Peringatan</b>: Keterlambatan pembayaran berakibat pada masalah keuangan serius.
				</p>
			</div>
		</div>
	</div>
</div>
</footer>
</div>
<!-- Go To Top -->
<div id="gotoTop" class="icon-angle-up"></div>
<!-- Footer Scripts  -->
<script type="text/javascript" src="wp-content/themes/kasbon/js/functions.js"></script>
<!-- start Mixpanel EIJI -->
<script type="text/javascript">(function(f,b){if(!b.__SV){var a,e,i,g;window.mixpanel=b;b._i=[];b.init=function(a,e,d){function f(b,h){var a=h.split(".");2==a.length&&(b=b[a[0]],h=a[1]);b[h]=function(){b.push([h].concat(Array.prototype.slice.call(arguments,0)))}}var c=b;"undefined"!==typeof d?c=b[d]=[]:d="mixpanel";c.people=c.people||[];c.toString=function(b){var a="mixpanel";"mixpanel"!==d&&(a+="."+d);b||(a+=" (stub)");return a};c.people.toString=function(){return c.toString(1)+".people (stub)"};i="disable track track_pageview track_links track_forms register register_once alias unregister identify name_tag set_config people.set people.set_once people.increment people.append people.track_charge people.clear_charges people.delete_user".split(" ");
for(g=0;g<i.length;g++)f(c,i[g]);b._i.push([a,e,d])};b.__SV=1.2;a=f.createElement("script");a.type="text/javascript";a.async=!0;a.src="../../../../cdn.mxpnl.com/libs/mixpanel-2-latest.min.js";e=f.getElementsByTagName("script")[0];e.parentNode.insertBefore(a,e)}})(document,window.mixpanel||[]);
mixpanel.init("e46095dd8cacec0224f9a5ec464c579d");</script>
<!-- end Mixpanel -->
<!-- start Mixpanel -->
<script type="text/javascript">(function(f,b){if(!b.__SV){var a,e,i,g;window.mixpanel=b;b._i=[];b.init=function(a,e,d){function f(b,h){var a=h.split(".");2==a.length&&(b=b[a[0]],h=a[1]);b[h]=function(){b.push([h].concat(Array.prototype.slice.call(arguments,0)))}}var c=b;"undefined"!==typeof d?c=b[d]=[]:d="mixpanel";c.people=c.people||[];c.toString=function(b){var a="mixpanel";"mixpanel"!==d&&(a+="."+d);b||(a+=" (stub)");return a};c.people.toString=function(){return c.toString(1)+".people (stub)"};i="disable track track_pageview track_links track_forms register register_once alias unregister identify name_tag set_config people.set people.set_once people.increment people.append people.track_charge people.clear_charges people.delete_user".split(" ");
for(g=0;g<i.length;g++)f(c,i[g]);b._i.push([a,e,d])};b.__SV=1.2;a=f.createElement("script");a.type="text/javascript";a.async=!0;a.src="../../../../cdn.mxpnl.com/libs/mixpanel-2-latest.min.js";e=f.getElementsByTagName("script")[0];e.parentNode.insertBefore(a,e)}})(document,window.mixpanel||[]);
mixpanel.init("7d41ab3172bc7f5ce2887e88905698f9");</script>
<!-- end Mixpanel -->
<script type="text/javascript">
// Mixpanel Track Link
mixpanel.track_links("#back_apply_now","[Blog] Back to apply now link click");
$(".top-links .cat-item a").click(function(){
	mixpanel.track('[Blog] "'+$(this).text()+'" category link click');
});
// Track Article
$("#posts .entry a").click(function(){
	$title = $(this).parents(".entry").find(".entry-title h2 a").text();
	mixpanel.track('[Blog] Article link click', {"Post Title" : $title});
});
// Track Share Social
$(".si-share div a").click(function(e){
	$title = $(".single-post .entry-title h2").text();
	if($(this).hasClass('si-facebook')) $sc = "Facebook";
	if($(this).hasClass('si-twitter')) $sc = "Twitter";
	if($(this).hasClass('si-gplus')) $sc = "Google Plus";
	if($(this).hasClass('si-linkedin')) $sc = "Linkedin";
	mixpanel.track('[Blog] Share article click', {"Post Title" : $title, 'Social Media' : $sc});
});
// Track link UT Social
$(".ft_social a").click(function(e){
	$title = $(".single-post .entry-title h2").text();
	if($(this).hasClass('si-facebook')) $sc = "Facebook Page";
	if($(this).hasClass('si-twitter')) $sc = "Twitter Follow";
	if($(this).hasClass('si-linkedin')) $sc = "Linkedin Connect";
	mixpanel.track('[Blog] UT '+$sc+' link click');
});
// Track Search
$("#top-search form").submit(function(){
	$srch = $(this).find("#s").val();
	mixpanel.track('[Blog] Keyword search', {"Keyword" : $srch});
});
</script>
<script type="text/javascript">
setTimeout(function(){var a=document.createElement("script");
var b=document.getElementsByTagName("script")[0];
a.src=document.location.protocol+"//script.crazyegg.com/pages/scripts/0028/7591.js?"+Math.floor(new Date().getTime()/3600000);
a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);
</script>
</body>
<!-- Mirrored from kasbon.com/blog/berita-bank/4-bank-dengan-kta-bunga-rendah/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 31 Jul 2016 09:33:53 GMT -->
</html>