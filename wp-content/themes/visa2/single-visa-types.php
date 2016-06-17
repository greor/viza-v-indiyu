<?php get_header(); ?>

<?php include(TEMPLATEPATH.'/page-title-block-visa-type.php'); ?>

<div class="content_fullwidth less2">
  <div class="container">
    <div class="left_sidebar">
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
            <li id="menu-item-54" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item menu-item-54"><a href="<?php the_permalink(); ?>"><i class="fa fa-angle-right"></i> для граждан <?php the_title(); ?></a></li>
            <?php } ?>
          </ul>
          <br>
        </div>
      </div>
      <?php } wp_reset_postdata(); ?>
      <?php include(TEMPLATEPATH.'/right-sidebar.php'); ?>
    </div>
    <div class="content_right">
      <?php $src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large'); if ($src) { ?>
      <div class="blog_post"> 
        <div class="blog_postcontent">
          <div class="image_frame"><img src="<?php echo $src[0]; ?>" alt="<?php the_title(); ?>" /></div>
        </div>
      </div>
      <?php }
      the_content();
      ?>
      <?php if(get_field('vise-type__table')):
        $i = 1;
      ?>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Тип визы</th>
            <th>Срок</th>
            <th>Стоимость визы для граждан <?php the_title(); ?><br>(+ мед. полис)</th>
          </tr>
        </thead>
        <tbody>
          <?php while(has_sub_field('vise-type__table')): ?>
            <tr>
              <th scope="row"><?php echo $i++; ?></th>
              <td><?php the_sub_field('vise-type__table-type'); ?></td>
              <td class="text-center"><?php the_sub_field('vise-type__table-duration'); ?></td>
              <td class="text-center"><?php the_sub_field('vise-type__table-price'); ?></td>
            </tr>
          <?php endwhile; ?>
          
        </tbody>
      </table>
      <?php endif; ?>

      <div class="feature_section6211">
        <div class="one_third2 <?php the_field('visa-type__color'); ?>">
          <div class="title">
            <h4>Виза для граждан</h4>
            <h2><?php the_title(); ?></h2>
          </div>
          <?php if( get_field('visa-type__price') || get_field('visa-type__days')): ?>
          <ul>
            <?php if( get_field('visa-type__price')): ?>
            <li><i class="fa  fa-check"></i>от <?php the_field('visa-type__price'); ?> рублей</li>
            <?php endif; ?>
            <?php if(get_field('visa-type__days')): ?>
            <li><i class="fa  fa-check"></i>от <?php the_field('visa-type__days'); ?></li>
            <?php endif; ?>
          </ul>
          <?php endif; ?>
          <div>
            <?php the_content(); ?>
          </div> 
          <div class="clearfix margin_bottom2"></div>
          <a class="button_2" href="">Скачать анкету</a>
        </div>
      </div>
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

  </div>
</div>

<?php get_footer(); ?>