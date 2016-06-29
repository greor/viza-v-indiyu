<?php
/*
Template Name: Home
*/

get_header();
?>

<?php masterslider(1); ?>

<div class="container">
  <div class="margin_top7"></div>
  <div class="clearfix"></div>
  <div class="one_full stcode_title8">
    <?php the_post(); ?>
	<div class="home-text">
		<?php the_content(); ?>
	</div>
  </div>
</div>

<?php if(get_field('main_anketa')): ?>
<div class="container">
  <div class="margin_top7"></div>
  <div class="clearfix"></div>
  <a href="<?php the_field('main_anketa'); ?>" target="_blank" class="but_full"><i class="fa fa-hand-o-right"></i>&nbsp; Скачать анкету</a>
  <div class="clearfix"></div>
</div>
<?php endif; ?>

<?php if(get_field('tabs')): ?>
<div class="content_fullwidth">
  <div class="container">
    <ul class="tabs3">
      <?php
      $count1 = 0;
      while(has_sub_field('tabs')):
        $count1 += 1;
      ?>
      <li><a href="#tab-<?php echo $count1; ?>" target="_self"><?php the_sub_field('tab_title'); ?></a></li>
      <?php endwhile; ?>
    </ul>
    <div class="tabs-content3 two">
      <?php
      $count2 = 0;
      while(has_sub_field('tabs')):
        $count2 += 1;
      ?>
      <div id="tab-<?php echo $count2; ?>" class="tabs-panel3">
        <?php the_sub_field('tab_content'); ?>
      </div><!-- end tab -->
      <?php endwhile; ?>
    </div><!-- end all tabs -->
  </div>
</div>
<?php endif; ?>

<?php
  $args = array(
    'post_type' => 'visa-types' 
  );
  $query = new WP_Query($args); 
  if ( $query->have_posts() ) { ?>
<div class="feature_section62">
  <div class="container">
    <h2>Типы виз</h2>
      <?php while ( $query->have_posts() ) {
        $query->the_post(); ?>
      <div class="one_third <?php the_field('visa-type__color'); ?>">
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
        <a class="button_2" href="<?php the_permalink(); ?>">Подробне</a>
      </div>
      <?php } ?>
  </div>
</div>
<?php } wp_reset_postdata(); ?>

<div class="clearfix"></div>


<?php
$args = array(
  'post_type' => 'post',
  'showposts' => '3'
);
$posts = new WP_Query($args);
if ( $posts->have_posts() ) { ?>
<div class="feature_section4">
  <div class="container">
    <h2>Статьи</h2>
    <div class="clearfix mar_top2"></div>
    <div class="posts-wrap">
      <?php while ( $posts->have_posts() ) {
              $posts->the_post(); ?>
      <div class="one_third_less">
        <?php $src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium'); if ($src) { ?>
        <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
          <img src="<?php echo $src[0]; ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
        </a>
        <?php } ?>
        <div class="box">
          <div class="boxcon">
            <h5><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h5>
            <p><?php truncate_post(150); ?></p>
          </div>
          <div class="conbtm">
            <ul class="links_small">
              <li class="content"><?php the_date('d.m.Y'); ?></li>
            </ul>
          </div>
        </div>
      </div>

      <?php } ?>
    </div>
  </div>
</div><!-- end featured section 4 -->
<?php } wp_reset_query(); ?>
  
<?php get_footer(); ?>