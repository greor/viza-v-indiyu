<?php get_header(); ?>

<?php include(TEMPLATEPATH.'/page-title-block.php'); ?>

<div class="content_fullwidth less2">
  <div class="container">
    <div class="content_left">
      <h2>FAQ</h2>
      <div id="st-accordion-four" class="st-accordion-four">
        <ul>
            <li>
                <a href="#">Тестовый вопрос<span class="st-arrow">Open or Close</span></a>
                <div class="st-content">
                  <p>Тестовый ответ</p>
                </div>
            </li>
         </ul>
      </div>
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