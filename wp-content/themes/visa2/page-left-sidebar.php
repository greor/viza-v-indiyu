<?php
/*
Template Name: Left Sidebar
*/

get_header();
?>

<?php include(TEMPLATEPATH.'/page-title-block.php'); ?>

<div class="content_fullwidth less2">
<div class="container">
<div class="left_sidebar">

<?php include(TEMPLATEPATH.'/right-sidebar.php'); ?>

</div>
<div class="content_right">
    
					<?php if(have_posts()) : ?>
					<?php while(have_posts()) : the_post(); ?>

					<?php the_content(); ?>
					<?php endwhile; ?>
					<?php endif; ?>
	
</div>
</div>
</div>

<?php get_footer(); ?>