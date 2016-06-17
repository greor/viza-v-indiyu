<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html <?php language_attributes(); ?>>
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php

  global $page, $paged;

  wp_title( '|', true, 'right' );

  bloginfo( 'name' );

  $site_description = get_bloginfo( 'description', 'display' );
  if ( $site_description && ( is_home() || is_front_page() ) )
    echo " | $site_description";

  if ( $paged >= 2 || $page >= 2 )
    echo ' | ' . sprintf( __( 'Page %s' ), max( $paged, $page ) );

  ?></title>

<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
  if ( is_singular() && get_option( 'thread_comments' ) )
    wp_enqueue_script( 'comment-reply' );
    wp_head();
?>

<!-- Google fonts - witch you want to use - (rest you can just remove) -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:,400,400italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Dancing+Script:400,700' rel='stylesheet' type='text/css'>

<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/style.css" type="text/css" />

<!-- font awesome icons -->
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/font-awesome/css/font-awesome.min.css">

<!-- simple line icons -->
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/simpleline-icons/simple-line-icons.css" media="screen" />

<!-- animations -->
<link href="<?php bloginfo('template_directory'); ?>/js/animations/css/animations.min.css" rel="stylesheet" type="text/css" media="all" />

<!-- responsive devices styles -->
<link rel="stylesheet" media="screen" href="<?php bloginfo('template_directory'); ?>/css/responsive-leyouts.css" type="text/css" />
<link rel="stylesheet" media="screen" href="<?php bloginfo('template_directory'); ?>/css/responsive-leyouts14.css" type="text/css" />

<!-- shortcodes -->
<link rel="stylesheet" media="screen" href="<?php bloginfo('template_directory'); ?>/css/shortcodes.css" type="text/css" />


<!-- mega menu -->
<link href="<?php bloginfo('template_directory'); ?>/js/mainmenu/bootstrap.min2.css" rel="stylesheet">
<link href="<?php bloginfo('template_directory'); ?>/js/mainmenu/demo.css" rel="stylesheet">
<link href="<?php bloginfo('template_directory'); ?>/js/mainmenu/menu14.css" rel="stylesheet">


<!-- cubeportfolio -->
<link href="<?php bloginfo('template_directory'); ?>/js/cubeportfolio/cubeportfolio.min.css" rel="stylesheet" type="text/css">

<!-- tabs -->
<link href='<?php bloginfo('template_directory'); ?>/js/tabs3/tabulous.css' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/js/tabs/assets/css/responsive-tabs6.css">
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/js/tabs/assets/css/responsive-tabs.css">
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/js/tabs/assets/css/responsive-tabs2.css">
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/js/tabs/assets/css/responsive-tabs3.css">

<!-- accordion -->
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/js/accordion/style.css" />

</head>

<body>
<div class="site_wrapper">

  <div class="top_nav">
    <div class="container">
      <div class="left">
        <?php if( ot_get_option("contact_email") ){ ?>
        <a href="mailto:<?php echo ot_get_option("contact_email"); ?>"><i class="fa fa-envelope"></i>&nbsp; <?php echo ot_get_option("contact_email"); ?></a>
        <?php ;} ?>
        <?php
          if(ot_get_option("contact_phone")){ 
          $phone = str_replace(" ","",ot_get_option("contact_phone_tel"));
        ?>
        <a href="tel:<?php echo $phone; ?>"><i class="fa fa-phone-square"></i>&nbsp; <?php echo ot_get_option("contact_phone"); ?></a>
        <?php ;} ?>
      </div><!-- end left -->
      <div class="right">
        <ul class="topsocial">
          <?php if(ot_get_option("vk_link")){ ?>
          <li><a href="<?php echo ot_get_option("vk_link"); ?>" target="_blank" rel="nofollow noopener"><i class="fa fa-vk"></i></a></li>
          <?php ;} ?>
          <?php if(ot_get_option("fc_link")){ ?>
          <li><a href="<?php echo ot_get_option("fc_link"); ?>" target="_blank" rel="nofollow noopener"><i class="fa fa-facebook"></i></a></li>
          <?php ;} ?>
          <?php if(ot_get_option("od_link")){ ?>
          <li><a href="<?php echo ot_get_option("od_link"); ?>" target="_blank" rel="nofollow noopener"><i class="fa fa-odnoklassniki"></i></a></li>
          <?php ;} ?>
          <?php if(ot_get_option("insta_link")){ ?>
          <li><a href="<?php echo ot_get_option("insta_link"); ?>" target="_blank" rel="nofollow noopener"><i class="fa fa-instagram"></i></a></li>
          <?php ;} ?>
          <?php if(ot_get_option("twitter_link")){ ?>
          <li><a href="<?php echo ot_get_option("twitter_link"); ?>" target="_blank" rel="nofollow noopener"><i class="fa fa-twitter"></i></a></li>
          <?php ;} ?>
          <?php if(ot_get_option("youtube_link")){ ?>
          <li><a href="<?php echo ot_get_option("youtube_link"); ?>" target="_blank" rel="nofollow noopener"><i class="fa fa-youtube"></i></a></li>
          <?php ;} ?>
        </ul>
      </div><!-- end right -->
    </div>
  </div><!-- end top navigation links -->

  <div class="clearfix"></div>

  <header class="header" style="background: #fff;">
    <div class="container">
      <!-- Logo -->
      <div class="logo">
        <?php if(ot_get_option("main_logo")){ ?>
        <a href="/" id="logo" style="background: url('<?php echo ot_get_option('main_logo'); ?>') no-repeat left top;"></a>
        <?php ;} ?>
      </div>
      
      <!-- Navigation Menu -->
      <div class="menu_main">
        <div class="navbar yamm navbar-default">
          <div class="navbar-header">
            <div class="navbar-toggle .navbar-collapse .pull-right " data-toggle="collapse" data-target="#navbar-collapse-1" > <span></span>
              <button type="button" > <i class="fa fa-bars"></i></button>
            </div>
          </div>
          <div id="navbar-collapse-1" class="navbar-collapse collapse pull-right">
            <nav>
              <?php wp_nav_menu( array( 
                'container' => 'ul',
                'theme_location' => 'header-menu',
                'menu_class' => 'nav navbar-nav' 
              )); 
              ?>
            </nav>
          </div>
        </div>
      </div>
    </div><!-- end .container -->
  </header><!-- end Navigation Menu -->
  <div class="clearfix"></div>