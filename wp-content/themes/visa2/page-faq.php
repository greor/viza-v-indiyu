<?php
/*
Template Name: FAQ
*/
?>

<?php get_header(); ?>

<?php include(TEMPLATEPATH.'/page-title-block.php'); ?>

<div class="content_fullwidth less2">
  <div class="container">
    <div class="content_left">
    <?php if(get_field('faq')): ?>
      <h2>FAQ</h2>
      <div id="st-accordion-four" class="st-accordion-four">
        <ul>
        <?php while(has_sub_field('faq')): ?>
          <li>
            <a href="#"><?php the_sub_field('faq_question'); ?><span class="st-arrow">Открыть/Закрыть</span></a>
            <div class="st-content">
              <?php the_sub_field('faq_answer'); ?>
            </div>
          </li>
          <?php endwhile; ?>
         </ul>
      </div>
    <?php endif; ?>
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
          <?php while ( $query->have_posts() ) {
            $query->the_post(); ?>
            <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="<?php the_permalink(); ?>"><i class="fa fa-angle-right"></i> для граждан <?php the_title(); ?></a></li>
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