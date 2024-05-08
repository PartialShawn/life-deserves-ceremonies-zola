<?php
	//start session
	session_start();
	//set a key, checked in mailer, prevents against spammers trying to hijack the mailer.
	$security_token = $_SESSION['security_token'] = uniqid(rand());
?>
<html>

<head>
 <title><?php get_page_title(); ?> - <?php get_site_name(); ?></title>
 <?php get_header(); ?>
 <link type="text/css" rel="stylesheet" href="<?php get_theme_url(); ?>/style.css" />
 <link href='https://fonts.googleapis.com/css?family=Satisfy' rel='stylesheet' type='text/css'>
</head>

<body>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-42724410-1', 'lifedeservesceremonies.com');
  ga('send', 'pageview');

</script>

 <div id="wrapper">
  <ul id="siteNavigation">
   <?php get_navigation(return_page_slug()); ?>
  </ul>
  
  <a href="<?php get_site_url(); ?>"><img id="headerImg" alt="<?php get_site_name(); ?>" src="<?php get_theme_url(); ?>/ldc_header.jpg" /></a>
  
  <div id="content">
   <h1 class="<?php get_page_slug(); ?>"><?php get_page_title(); ?></h1>
   
   <div id="pageChildren" class="pageChildren <?php get_page_slug(); ?>"><?php go_child_menu(); ?></div>
   
   <?php get_page_content(); ?>
   
<!--
<form action="../scripts/mailer.php" method="post" enctype="multipart/form-data">
	 <div>
		<label>Your Name:</label> *<br />
		<input class="form-input-field" type="text" name="element0" size="40"/><br /><br />

		<label>Your Email:</label> *<br />
		<input class="form-input-field" type="text" name="element1" size="40"/><br /><br />

		<label>Subject:</label> *<br />
		<input class="form-input-field" type="text" name="element2" size="40"/><br /><br />

		<label>Message:</label> *<br />
		<textarea class="form-input-field" name="element3" rows="8" cols="38"></textarea><br /><br />

		<div style="display: none;">
			<label>Spam Protection: Please don&apos; fill this in:</label>
			<textarea name="comment" rows="1" cols="1"></textarea>
		</div>
		<input type="hidden" name="form_token" value="<?php echo $security_token; ?>" />
		<input class="form-input-button" type="reset" name="resetButton" value="Reset" />
		<input class="form-input-button" type="submit" name="submitButton" value="Submit" />
	</div>
</form>
-->
<?php //contact_page('shawn@snowbank.ca', false , false); ?>

   <div id="footer"><?php get_component('footer'); ?></div>
  </div> <!-- id content -->
  
 </div> <!-- id wrapper -->
 
</body>

</html>