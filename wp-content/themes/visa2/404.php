<?php
/*
Template Name: 404
*/

get_header();
?>

<div class="page_title2 sty2">
  <div class="container">
    <h1>Ошибка 404</h1>
    <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
  </div>
</div><!-- end page title -->

<div class="clearfix"></div>

<div class="content_fullwidth less2">
  <div class="container">

    <div class="error_pagenotfound">
      <strong>404</strong>
      <br />
      <b>Страницы не существует!</b>
      <em>Вы попали на страницу которая отсутствует.</em>
      <p>Не спешите уходить, может вы ещё найдете интересное для себя.</p>
      <div class="clearfix margin_top3"></div>
      <a href="/" class="but_medium1"><i class="fa fa-arrow-circle-left fa-lg"></i>&nbsp; На главную</a>
    </div>

  </div>
</div><!-- end content area -->

<?php get_footer(); ?>