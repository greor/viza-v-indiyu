<?php get_header(); ?>

<?php include(TEMPLATEPATH.'/page-title-block.php'); ?>

<div class="content_fullwidth less2">
  <div class="container">

    <div class="content_left">
      <?php $src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large'); if ($src) { ?>
      <div class="blog_post"> 
        <div class="blog_postcontent">
          <div class="image_frame"><img src="<?php echo $src[0]; ?>" alt="<?php the_title(); ?>" /></div>
        </div>
      </div>
      <?php } ?>
      <?php the_post(); ?>
      <?php the_date('d.m.Y'); ?>
      <?php the_content(); ?>

      <div class="clearfix divider_line1"></div>
      <div class="sharepost">
        <h5 class="light">Поделиться с друзьями</h5>
        <ul class="js-share">
          <li><a href="#" data-resource="fb">&nbsp;<i class="fa fa-facebook fa-lg"></i>&nbsp;</a></li>
          <li><a href="#" data-resource="vk"><i class="fa fa-vk fa-lg"></i></a></li>
          <li><a href="#" data-resource="ok">&nbsp;<i class="fa fa-odnoklassniki fa-lg"></i>&nbsp;</a></li>
        </ul>
      </div><!-- end share post links -->
      <script type="text/javascript" src="/site.share.js"></script>
      <script type="text/javascript"> 
        jQuery(function(){ 
        s.share.init(".js-share a"); 
        }); 
      </script> 

      <div class="clearfix"></div>
      <!-- Put this script tag to the <head> of your page -->
      <script type="text/javascript" src="//vk.com/js/api/openapi.js?121"></script>

      <script type="text/javascript">
        VK.init({apiId: 5500203, onlyWidgets: true});
      </script>

      <!-- Put this div tag to the place, where the Comments block will be -->
      <div id="vk_comments"></div>
      <script type="text/javascript">
      VK.Widgets.Comments("vk_comments", {limit: 10, attach: false});
      </script>
    </div>

    <!-- right sidebar starts -->
    <div class="right_sidebar">
      <?php
      $args = array(
        'post_type' => 'visa-types' 
      );
      $query = new WP_Query($args); 
      if ( $query->have_posts() ) { ?>
      <div class="sidebar_widget" style="margin-bottom: 30px;">
        <div class="sidebar_title">
          <h4>Типы виз</h4>
        </div>
        <div class="textwidget">
          <ul class="menu">
            <?php  while ( $query->have_posts() ) {
                $query->the_post(); ?>
                <li id="menu-item-54" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item menu-item-54"><a href="<?php the_permalink(); ?>"><i class="fa fa-angle-right"></i> для граждан <?php the_title(); ?></a></li>
            <?php } ?>
          </ul>
          <br>
        </div>
      </div>
      <?php } wp_reset_postdata(); ?>
      <?php include(TEMPLATEPATH.'/right-sidebar.php'); ?>
    </div><!-- end right sidebar -->

  </div>
</div><!-- end content area -->

<?php get_footer(); ?>