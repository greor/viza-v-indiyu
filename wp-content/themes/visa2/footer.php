  <div class="clearfix"></div>
  <div class="feature_section6">
    <div class="container">
      <?php if(ot_get_option("contact_phone")){ ?>
      <div class="box1">
	    <?php
          $phone = str_replace(" ","",ot_get_option("contact_phone_tel"));
        ?>
	    <a href="tel:<?php echo $phone; ?>">
          <i class="fa fa-mobile-phone"></i>
          <h4 class="caps">Телефон <b><?php echo ot_get_option("contact_phone"); ?></b></h4>
		</a>
      </div>
      <?php ;} ?>
      <?php if(ot_get_option("contact_email")){ ?>
      <div class="box2">
	    <a href="mailto:<?php echo ot_get_option("contact_email"); ?>">
          <i class="fa fa-envelope-o"></i>
          <h4 class="caps">Email<b><?php echo ot_get_option("contact_email"); ?></b></h4>
		</a>
      </div>
      <?php ;} ?>
      <?php if(ot_get_option("address")){ ?>
      <div class="box3">
	    <a href="/contacts/#address">
          <i class="fa fa-map-marker"></i>
          <h4 class="caps">Наш адрес <b><?php echo ot_get_option("address"); ?></b></h4>
		</a>
      </div>
      <?php ;} ?>
      <div class="box4">
        <div class="newsletter">
        <?php echo do_shortcode( '[contact-form-7 id="77" title="Подписка"]' ); ?>
        </div>
      </div>
    </div>    
  </div>
  <!-- end feature_section 6 -->
    
  <div class="clearfix"></div>
  <div class="copyright_info">
    <div class="container">
      <div class="one_half"><?php echo ot_get_option("copyright"); ?> &copy; <?php echo date('Y'); ?></div>
      <div class="one_half last">
        <ul class="footer_social_links">
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
      </div>
    </div>
  </div>
  <!-- end copyright_info_section -->

  <a href="#" class="scrollup">Scroll</a><!-- end scroll to top of the page-->

  </div>


  <script src="<?php bloginfo('template_directory'); ?>/js/main.js"></script>

  <?php wp_footer(); ?>
  
  <?php include_once("counters/google.php") ?>
  <?php include_once("counters/yandex.php") ?>
  
  </body>
</html>