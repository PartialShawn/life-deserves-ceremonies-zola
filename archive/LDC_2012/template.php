<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta name="name" content="content" />
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="robots" content="all" />
		
		<title><?php get_page_title(); ?> ~ LDC</title>
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo get_theme_url() ?>/style.css"  />
		<link rel="stylesheet" type="text/css" media="print" href="<?php echo get_theme_url() ?>/print.css"  />
		<link rel="stylesheet" type="text/css" media="handheld" href="<?php echo get_theme_url() ?>/handheld.css"  />
		<link rel="stylesheet" type="text/css" media="screen" href="http://lifedeservesceremonies.com/rw_common/themes/ldc_composition_pro/css/media_frame/canvas1.css" />

		
		<script type="text/javascript" src="rw_common/themes/ldc_composition_pro/javascript.js"></script>
		<script type="text/javascript" src="rw_common/themes/ldc_composition_pro/scripts/rounded_corners_lite-YH.inc.js"></script>
		<script type="text/JavaScript">
			window.onload = function()
			{
			settings = {
			tl: { radius: 15 },
			tr: { radius: 15 },
			bl: { radius: 0 },
			br: { radius: 0 },
			antiAlias: true,
			autoPad: true
			}
			settings2 = {
			tl: { radius: 0 },
			tr: { radius: 0 },
			bl: { radius: 15 },
			br: { radius: 15 },
			antiAlias: true,
			autoPad: false
			}
			settings3 = {
			tl: { radius: 15 },
			tr: { radius: 15 },
			bl: { radius: 15 },
			br: { radius: 15 },
			antiAlias: true,
			autoPad: false
			}
			settings4 = {
			tl: { radius: 15 },
			tr: { radius: 15 },
			bl: { radius: 0 },
			br: { radius: 0 },
			antiAlias: true,
			autoPad: true
			}
			settings5 = {
			tl: { radius: 0 },
			tr: { radius: 0 },
			bl: { radius: 15 },
			br: { radius: 15 },
			antiAlias: true,
			autoPad: true
			}
			var divObj = document.getElementById("pageHeader");
			cornersObj = new curvyCorners(settings, divObj);
			cornersObj.applyCornersToAll();
			var divObj2 = document.getElementById("footerContainer");
			cornersObj = new curvyCorners(settings2, divObj2);
			cornersObj.applyCornersToAll();
			var divObj2 = document.getElementById("navOuter");
			cornersObj = new curvyCorners(settings3, divObj2);
			cornersObj.applyCornersToAll();
			var divObj2 = document.getElementById("sideTitleOuter");
			cornersObj = new curvyCorners(settings4, divObj2);
			cornersObj.applyCornersToAll();
			var divObj2 = document.getElementById("sidebarBodyOuter");
			cornersObj = new curvyCorners(settings5, divObj2);
			cornersObj.applyCornersToAll();
			}
		</script>

		<script type="text/javascript" charset="utf-8">
			var blankSrc = "rw_common/themes/ldc_composition_pro/scripts/blank.gif";
		</script>	
		<style type="text/css">

		img {
			behavior:	url("rw_common/themes/ldc_composition_pro/scripts/pngbehavior.htc");
		}

		</style>

		
		
		
	</head>
	<body>
		<div id="logoLeft"><a href="http://www.lifedeservesceremonies.com/"></a></div>
		<div id="logoRight"><a href="http://www.lifedeservesceremonies.com/"></a></div>
		<div id="border">	<!-- Start Border Wrapper -->
			<div id="primaryNavigation">
				<ul><?php get_navigation(return_page_slug()); /* SHAWN */ ?></ul>
				
			</div>
			<div class="clearer"></div>
			<div id="flashHeader"> <!-- INSERT CUSTOM FLASH HERE -->
				<noscript>
					<p style='background-color:#ffffff;color:#000000;padding:1em;'>Your browser doesn't support JavaScript or you have disabled JavaScript.</p>
				</noscript>
				<script type='text/javascript' src='rw_common/themes/ldc_composition_pro/flash/bzLoader.js'></script>
				<div id='SWBZ9014030809694CD19F77'></div>
				<div id='LKBZ9014030809694CD19F77'></div>
			</div> <!-- END OF FLASH CODE CONTAINER -->
			<div id="pageHeader">	<!-- Start Page Header -->
				<div id="headerLogo"><a href="http://www.lifedeservesceremonies.com/"></a></div>
				<h1><a href="http://www.lifedeservesceremonies.com/"><!--<?php get_page_title(); ?>--></a></h1>	<!-- This is the Title -->
				<h2></h2>	<!-- This is the Slogan -->
			</div>	<!-- Ends Title Area -->
		</div>	<!-- End Page Header -->
		<div id="container">	<!-- Start Main Content -->
			<div id="contentContainer">	<!-- Start main content -->
				<div id="sidebarContainer">	<!-- Start Sidebar -->
					<div class="sidebarSpacer"></div>
					<div id="navOuter">	<!-- Start Rounded Corners -->
						<div id="verticalNavigation">	<!-- Start Navigation -->
							<ul><li><a href="./" rel="self" class="current">LDC Home</a></li><li><a href="about/about.html" rel="self">About Me</a></li><li><a href="services/services.html" rel="self">Services</a></li><li><a href="PG/photos.html" rel="self">Photo Gallery</a></li><li><a href="contact/contact.php" rel="self">LDC Contact</a></li><li><a href="FAQ/FAQ.html" rel="self">FAQ's</a></li><li><a href="search/search.html" rel="self">LDC Search</a></li><li><a href="page8/page8.html" rel="self">LDC Blog</a></li></ul>
						</div>	<!-- End Navigation -->
						<div id="sidebarLogo"><a href="http://www.lifedeservesceremonies.com/"></a></div>
					</div>	<!-- End Rounded Corners -->
					<div class="spacer2"></div>
					<div id="sideTitleOuter">	<!-- Start Rounded Corners -->
						<div class="sideHeader"></div>	<!-- Sidebar title entered in page inspector-->
					</div>	<!-- End Rounded Corners -->
					<div id="sidebarBodyOuter">	<!-- Start Rounded Corners -->
						<div id="sidebar">	<!-- Start sidebar content -->
							 <!-- Sidebar content entered in page inspector -->
							<?php go_child_menu(); ?>
							 <!-- Sidebar ontent such as the blog archive links -->
						</div>	<!-- End sidebar content -->
					</div>	<!-- End Rounded Corners -->
				</div>	<!-- End Sidebar -->
				<div id="content">	<!-- Start content -->
<?php get_page_content(); ?>
				</div>	<!-- End content -->
			</div>	<!-- End main content -->
			<div class="clearer"></div>
			<div id="footerContainer">
				<div id="footerWrapper">
					<div id="breadcrumbcontainer"><!-- Start the breadcrumb wrapper -->
						<ul><li>&nbsp;&gt;&nbsp;<a href="./">LDC Home</a></li></ul>
						<br />
				<!-- Use this space for HTML links to your site privacy policies and sitemap links -->
					</div><!-- End breadcrumb -->
					<div id="footer">
						1087 Honey Harbour Road, Port Severn, ON, L0K 1S0 ~ 705-770-4818 <a href="#" id="rw_email_contact">~ email </a><script type="text/javascript">var _rwObsfuscatedHref0 = "mai";var _rwObsfuscatedHref1 = "lto";var _rwObsfuscatedHref2 = ":su";var _rwObsfuscatedHref3 = "zan";var _rwObsfuscatedHref4 = "ne@";var _rwObsfuscatedHref5 = "lif";var _rwObsfuscatedHref6 = "ede";var _rwObsfuscatedHref7 = "ser";var _rwObsfuscatedHref8 = "ves";var _rwObsfuscatedHref9 = "cer";var _rwObsfuscatedHref10 = "emo";var _rwObsfuscatedHref11 = "nie";var _rwObsfuscatedHref12 = "s.c";var _rwObsfuscatedHref13 = "om";var _rwObsfuscatedHref = _rwObsfuscatedHref0+_rwObsfuscatedHref1+_rwObsfuscatedHref2+_rwObsfuscatedHref3+_rwObsfuscatedHref4+_rwObsfuscatedHref5+_rwObsfuscatedHref6+_rwObsfuscatedHref7+_rwObsfuscatedHref8+_rwObsfuscatedHref9+_rwObsfuscatedHref10+_rwObsfuscatedHref11+_rwObsfuscatedHref12+_rwObsfuscatedHref13; document.getElementById('rw_email_contact').href = _rwObsfuscatedHref;</script>
						<br />
						<div id="lastPublished">Last Updated: 				
<?php
  echo date( "F d Y h:i", getlastmod() );
?>
						</div>
					</div><!-- End Footer -->
					<div class="clearer"></div>
				</div><!-- End of Footer wrapper -->
			</div><!-- End footer container -->
		</div><!-- End content container -->
	</body>
</html>