<?php
	//start session
	session_start();
	
	//set a key, checked in mailer, prevents against spammers trying to hijack the mailer.
	$security_token = $_SESSION['security_token'] = uniqid(rand());
	
	if(!isset($_SESSION['formMessage'])) $_SESSION['formMessage'] = 'Thank you for your interest in my services. Please fill out the form below and I will contact you as soon as possible.';
	if(!isset($_SESSION['formFooter'])) $_SESSION['formFooter'] = '';
	
	if(!isset($_SESSION['form'])) $_SESSION['form'] = array();
	
	function check($field, $type = "", $value = "") {
		$string = "";
		if(isset($_SESSION['form'][$field])) {
			switch($type) {
				case "checkbox":
					$string = 'checked="checked"';
					break;
				case "radio":
					if($_SESSION['form'][$field] == $value) $string = 'checked="checked"';
					break;
				case "select":
					if($_SESSION['form'][$field] == $value) $string = 'selected="selected"';
					break;
				default:
					$string = unescape_string($_SESSION['form'][$field]);
			}
		}
		return $string;
	}
	
	function unescape_string($string) {
		return stripslashes(@ html_entity_decode($string, ENT_QUOTES));
	}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta name="Title" content="Life Deserves Ceremonies Contact page" />
		<meta name="Content" content="wedding ceremonies" />
		<meta name="content" content="wedding officiant" />
		<meta name="keyword" content="officiant" />
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="robots" content="all" />
		<meta name="generator" content="RapidWeaver" />
		
		<title>LDC Contact</title>
		<link rel="stylesheet" type="text/css" media="screen" href="../rw_common/themes/caribou/styles.css" />
		<!--[if IE 6]><link rel="stylesheet" type="text/css" media="screen" href="../rw_common/themes/caribou/css/ie6.css" /><![endif]-->
		<link rel="stylesheet" type="text/css" media="screen" href="../rw_common/themes/caribou/colourtag-suzanne-peter-green.css" />
		<link rel="stylesheet" type="text/css" media="print" href="../rw_common/themes/caribou/print.css" />
		<link rel="stylesheet" type="text/css" media="handheld" href="../rw_common/themes/caribou/handheld.css" />
		<!--[if IE 6]><style type="text/css" media="screen">body {behavior: url(../rw_common/themes/caribou/csshover.htc);}</style><![endif]-->
		<link rel="stylesheet" type="text/css" media="screen" href="../rw_common/themes/caribou/css/banner/curve_solid.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="../rw_common/themes/caribou/css/logo_position/center.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="../rw_common/themes/caribou/css/sidebar/sidebar_none.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="../rw_common/themes/caribou/css/icons/black.css" />
		
		
		<script type="text/javascript" src="../rw_common/themes/caribou/javascript.js"></script>
		
		
		
		
		<!--[if IE 6]><script type="text/javascript" charset="utf-8">	var blankSrc = "../rw_common/themes/caribou/png/blank.gif";</script>	
		<style type="text/css">	img { behavior:	url("../rw_common/themes/caribou/png/pngbehavior.htc"); }</style><![endif]-->
	</head>
	
	<!-- This page was created with RapidWeaver from Realmac Software. http://www.realmacsoftware.com -->

<body>
<div id="bar"></div>
<div id="container"><!-- Start container -->
	<div id="pageHeader"><!-- Start page header -->
		<div id="navcontainer"><!-- Start Navigation -->
			<ul><li><a href="../" rel="self">LDC Home</a></li><li><a href="../page6/page6.html" rel="self">Services</a></li><li><a href="../page4/page4.html" rel="self">Photo Gallery</a></li><li><a href="contact.php" rel="self" id="current">LDC Contact</a></li><li><a href="../page3/page3.html" rel="self">FAQ's</a></li><li><a href="../page2/page2.html" rel="self">LDC Search</a></li><li><a href="../page5/page5.html" rel="self">Site Map</a></li></ul>
		</div><!-- End navigation --> 
		<div id="title">
			<div id="logo"></div>
			<h1>Life Deserves Ceremonies</h1>
			<h2>Life deserves meaning, life deserves celebration, Life Deserves Ceremonies</h2>
			<div id="overlay_swirls"><img src="../rw_common/themes/caribou/images/header_swirls.png" alt="" style="width: 900px; height: 150px;" /></div>
			<div id="overlay_stripes_glow"><img src="../rw_common/themes/caribou/images/header_stripes_glow.png" alt="" style="width: 900px; height: 150px;" /></div>
			<div id="overlay_stripes_solid"><img src="../rw_common/themes/caribou/images/header_stripes_solid.png" alt="" style="width: 900px; height: 150px;" /></div>
			<div id="overlay_curve_solid"><img src="../rw_common/themes/caribou/images/header_curve_solid.png" alt="" style="width: 900px; height: 150px;" /></div>
		</div>
		<div id="background"><img src="../rw_common/themes/caribou/images/header_bg.png" alt="" style="width: 914px; height: 197px;" /></div>
	</div><!-- End page header -->
	
	<div id="contentContainer"><!-- Start main content wrapper -->
		<div id="content"><!-- Start content -->
			<div class="contentSpacer"></div><!-- this makes sure the content is long enough for the design -->
			
<div class="message-text"><?php echo $_SESSION['formMessage']; unset($_SESSION['formMessage']); ?></div><br />

<form action="./files/mailer.php" method="post" enctype="multipart/form-data">
	 <div>
		<label>Your Name:</label> *<br />
		<input class="form-input-field" type="text" value="<?php echo check('element0'); ?>" name="form[element0]" size="40"/><br /><br />

		<label>Your Email:</label> *<br />
		<input class="form-input-field" type="text" value="<?php echo check('element1'); ?>" name="form[element1]" size="40"/><br /><br />

		<label>Subject:</label> *<br />
		<input class="form-input-field" type="text" value="<?php echo check('element2'); ?>" name="form[element2]" size="40"/><br /><br />

		<label>Message:</label> *<br />
		<textarea class="form-input-field" name="form[element3]" rows="8" cols="38"><?php echo check('element3'); ?></textarea><br /><br />

		<div style="display: none;">
			<label>Spam Protection: Please don't fill this in:</label>
			<textarea name="comment" rows="1" cols="1"></textarea>
		</div>
		<input type="hidden" name="form_token" value="<?php echo $security_token; ?>" />
		<input class="form-input-button" type="reset" name="resetButton" value="Reset" />
		<input class="form-input-button" type="submit" name="submitButton" value="Submit" />
	</div>
</form>

<br />
<div class="form-footer"><?php echo $_SESSION['formFooter']; unset($_SESSION['formFooter']); ?></div><br />

<?php unset($_SESSION['form']); ?>
			<div class="clearer"></div>
		</div><!-- End content -->
		
	</div><!-- End main content wrapper -->
	
	<div id="sidebarContainer"><!-- Start Sidebar wrapper -->
		<div id="sidebar"><!-- Start sidebar content -->
		<div class="sideHeader"></div><!-- Sidebar header --> 
			<!-- sidebar content you enter in the page inspector -->
			 <!-- sidebar content such as the blog archive links -->
		</div><!-- End sidebar content -->
	</div><!-- End sidebar wrapper -->
	
	<div class="clearer"></div>
	
</div><!-- End container -->

<div class="clearer"></div>
<div id="footer"><!-- Start Footer -->
	<p>1087 Honey Harbour Road, Port Severn, ON, L0K 1S0 ~ 705-770-4818 <a href="#" id="rw_email_contact">Contact Me</a><script type="text/javascript">var _rwObsfuscatedHref0 = "mai";var _rwObsfuscatedHref1 = "lto";var _rwObsfuscatedHref2 = ":su";var _rwObsfuscatedHref3 = "zan";var _rwObsfuscatedHref4 = "ne@";var _rwObsfuscatedHref5 = "suz";var _rwObsfuscatedHref6 = "ann";var _rwObsfuscatedHref7 = "epe";var _rwObsfuscatedHref8 = "ter";var _rwObsfuscatedHref9 = "s.c";var _rwObsfuscatedHref10 = "om";var _rwObsfuscatedHref = _rwObsfuscatedHref0+_rwObsfuscatedHref1+_rwObsfuscatedHref2+_rwObsfuscatedHref3+_rwObsfuscatedHref4+_rwObsfuscatedHref5+_rwObsfuscatedHref6+_rwObsfuscatedHref7+_rwObsfuscatedHref8+_rwObsfuscatedHref9+_rwObsfuscatedHref10; document.getElementById('rw_email_contact').href = _rwObsfuscatedHref;</script></p>
	<div id="breadcrumbcontainer"><!-- Start the breadcrumb wrapper -->
		<ul><li><a href="../">LDC Home</a>&nbsp;>&nbsp;</li><li><a href="contact.php">LDC Contact</a>&nbsp;>&nbsp;</li></ul>
	</div><!-- End breadcrumb -->
</div><!-- End Footer -->
</body>
</html>