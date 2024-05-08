<html>

<head>
 <title><?php get_page_title(); ?> - <?php get_site_name(); ?></title>
 <?php get_header(); ?>
 <link type="text/css" rel="stylesheet" href="<?php get_theme_url(); ?>/style.css" />
 <link href='https://fonts.googleapis.com/css?family=Satisfy' rel='stylesheet' type='text/css'>
</head>

<body>
 <div id="wrapper">
  <ul id="siteNavigation">
   <?php get_navigation(return_page_slug()); ?>
  </ul>
  
  <a href="<?php get_site_url(); ?>"><img id="headerImg" alt="<?php get_site_name(); ?>" src="<?php get_theme_url(); ?>/ldc_header.jpg" /></a>
  
  <div id="content">
   <h1 class="<?php get_page_slug(); ?>"><?php get_page_title(); ?></h1>
   
   <div id="pageChildren" class="pageChildren <?php get_page_slug(); ?>"><?php go_child_menu(); ?></div>
   
   <?php get_page_content(); ?>
   
   <div id="footer"><?php get_component('footer'); ?></div>
  </div> <!-- id content -->
  
 </div> <!-- id wrapper -->
 
</body>

</html>