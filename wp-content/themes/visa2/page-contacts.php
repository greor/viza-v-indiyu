<?php
/*
Template Name: Contacts
*/

get_header();
?>

<?php include(TEMPLATEPATH.'/page-title-block.php'); ?>

  <div class="feature_section55">
    <div class="container">
      <?php the_post(); ?>
      <?php the_content(); ?>
    </div>
  </div>

  <div class="clearfix"></div>

  <div class="content_fullwidth less2">
    <div class="container">
      <div class="one_half">
        <?php if(get_field('contacts_form-text')): ?>
          <?php the_field('contacts_form-text'); ?>
        <?php endif; ?>

        <div class="cforms_sty3">
          <div id="form_status"></div>
          <?php echo do_shortcode( '[contact-form-7 id="28" title="Контактная форма"]' ); ?>
        </div>
      </div>

      <div class="one_half last">
        <div class="address_info">
          <h4>Наш адрес</h4>
          <ul>
            <li> <strong>ООО &laquo;Открытый Мир&raquo;</strong><br>
              Санкт-Петербург,<br>
              <?php echo ot_get_option("address"); ?><br>
              Телефон: <?php echo ot_get_option("contact_phone"); ?><br>
              E-mail: <a href="mailto:<?php echo ot_get_option("contact_email"); ?>"><?php echo ot_get_option("contact_email"); ?></a>
            </li>
          </ul>
        </div>
        <div class="clearfix"></div>
        <h4 id="map">Как нас найти</h4>
        <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=aBk0yVIsft64UmihVUtq5Zwp1V8Bias8&width=561&height=350&lang=ru_RU&sourceType=constructor&scroll=true"></script>
      </div>
    </div>
  </div>

<?php get_footer(); ?>