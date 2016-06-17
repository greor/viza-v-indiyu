<?php get_header(); ?>

<?php include(TEMPLATEPATH.'/category-title-block.php'); ?>

<div class="content_fullwidth less2">
  
  <div class="container">
    <div class="content_left">
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
          <div class="blog_post">	
            <div class="blog_postcontent">
              <div class="image_frame">
                <?php $src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large'); if ($src) { ?><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><img src="<?php echo $src[0]; ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" /></a><?php } else { ?><?php } ?>
              </div>
              <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
              <ul class="post_meta_links">
                <li><a href="#" class="date"><?php the_date(); ?></a></li>
              </ul>
              <div class="clearfix"></div>
              <div class="margin_top1"></div>
              <p><?php truncate_post(300); ?> <a href="<?php the_permalink() ?>">читать далее...</a></p>
            </div>
          </div>
          <div class="clearfix divider_line1"></div>
        <?php endwhile; ?>

        <div style="margin:0;">
          <?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
        </div>

      <?php else : ?>
      <?php endif; ?>
    </div>

    <!-- right sidebar starts -->
    <div class="right_sidebar">
      <div class="sidebar_widget" style="margin-bottom: 30px;">
        <div class="sidebar_title">
          <h4>Типы виз</h4>
        </div>
        <div class="textwidget">
          <ul class="menu">
            <?php
              $args = array(
                'post_type' => 'visa-types' 
              );
              $query = new WP_Query($args); 
              if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                  $query->the_post(); ?>
                  
                  <li id="menu-item-54" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item menu-item-54"><a href="<?php the_permalink(); ?>"><i class="fa fa-angle-right"></i> для граждан <?php the_title(); ?></a></li>

              <?php }
              } wp_reset_postdata(); ?>
          </ul>
          <br>
        </div>
      </div>

      <?php include(TEMPLATEPATH.'/right-sidebar.php'); ?>
    </div><!-- end right sidebar -->

  </div>
</div><!-- end content area -->

<?php get_footer(); ?>