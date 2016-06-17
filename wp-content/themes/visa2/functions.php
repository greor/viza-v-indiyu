<?php

register_sidebar ( array('name'=>'Widgets Block',
  'before_widget' => '<div class="sidebar_widget">',
  'after_widget' => '</div><div class="clearfix margin_top4"></div>',
  'before_title' => '<div class="sidebar_title"><h4>',
  'after_title' => '</h4></div>',
));

function register_header_menus() {
  register_nav_menus (
    array (
      'header-menu' => 'Header Menu',
    )
  );
}
add_action ( 'init', 'register_header_menus' );

add_action ( 'after_setup_theme', 'gorilla_setup' );

if ( ! function_exists( 'gorilla_setup' ) ):

function gorilla_setup() {
  add_theme_support( 'post-thumbnails' );
}
endif;


function truncate_post($amount,$echo=true) {
  global $post, $shortname;
  
  $postExcerpt = '';
  $postExcerpt = $post->post_excerpt;
  
  if (get_option($shortname.'_use_excerpt') == 'on' && $postExcerpt <> '') { 
    if ($echo) echo do_shortcode($postExcerpt);
    else return do_shortcode($postExcerpt);
  } else {
    $truncate = $post->post_content;
    $truncate = preg_replace('@\[caption[^\]]*?\].*?\[\/caption]@si', '', $truncate);
    
    if ( strlen($truncate) <= $amount ) $echo_out = '';
    else $echo_out = '...';
    $truncate = apply_filters('the_content', $truncate);
    $truncate = preg_replace('@<script[^>]*?>.*?</script>@si', '', $truncate);
    $truncate = preg_replace('@<style[^>]*?>.*?</style>@si', '', $truncate);
    
    $truncate = strip_tags($truncate);
    
    if ($echo_out == '...') $truncate = substr($truncate, 0, strrpos(substr($truncate, 0, $amount), ' '));
    else $truncate = substr($truncate, 0, $amount);

    if ($echo) echo $truncate,$echo_out;
    else return ($truncate . $echo_out);
  };
}

function dimox_breadcrumbs() {

  /* === ОПЦИИ === */
  $text['home'] = 'Главная'; // текст ссылки "Главная"
  $text['category'] = '%s'; // текст для страницы рубрики
  $text['search'] = 'Результаты поиска по запросу "%s"'; // текст для страницы с результатами поиска
  $text['tag'] = 'Записи с тегом "%s"'; // текст для страницы тега
  $text['author'] = '%s'; // текст для страницы автора
  $text['404'] = 'Ошибка 404'; // текст для страницы 404
  $text['page'] = 'Страница %s'; // текст 'Страница N'
  $text['cpage'] = '%s'; // текст 'Страница комментариев N'

  $wrap_before = '<div class="pagenation">'; // открывающий тег обертки
  $wrap_after = '</div><!-- .breadcrumbs -->'; // закрывающий тег обертки
  $sep = ' - '; // разделитель между "крошками"
  $sep_before = '<i>'; // тег перед разделителем
  $sep_after = '</i>'; // тег после разделителя
  $show_home_link = 1; // 1 - показывать ссылку "Главная", 0 - не показывать
  $show_on_home = 0; // 1 - показывать "хлебные крошки" на главной странице, 0 - не показывать
  $show_current = 1; // 1 - показывать название текущей страницы, 0 - не показывать
  $before = ''; // тег перед текущей "крошкой"
  $after = ''; // тег после текущей "крошки"
  /* === КОНЕЦ ОПЦИЙ === */

  global $post;
  $home_link = home_url('/');
  $link_before = '';
  $link_after = '';
  $link_attr = ' itemprop="url"';
  $link_in_before = '';
  $link_in_after = '';
  $link = $link_before . '<a href="%1$s"' . $link_attr . '>' . $link_in_before . '%2$s' . $link_in_after . '</a>' . $link_after;
  $frontpage_id = get_option('page_on_front');
  $parent_id = $post->post_parent;
  $sep = ' ' . $sep_before . $sep . $sep_after . ' ';

  if (is_home() || is_front_page()) {

    if ($show_on_home) echo $wrap_before . '<a href="' . $home_link . '">' . $text['home'] . '</a>' . $wrap_after;

  } else {

    echo $wrap_before;
    if ($show_home_link) echo sprintf($link, $home_link, $text['home']);

    if ( is_category() ) {
      $cat = get_category(get_query_var('cat'), false);
      if ($cat->parent != 0) {
        $cats = get_category_parents($cat->parent, TRUE, $sep);
        $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
        $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
        if ($show_home_link) echo $sep;
        echo $cats;
      }
      if ( get_query_var('paged') ) {
        $cat = $cat->cat_ID;
        echo $sep . sprintf($link, get_category_link($cat), get_cat_name($cat)) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_current) echo $sep . $before . sprintf($text['category'], single_cat_title('', false)) . $after;
      }

    } elseif ( is_search() ) {
      if (have_posts()) {
        if ($show_home_link && $show_current) echo $sep;
        if ($show_current) echo $before . sprintf($text['search'], get_search_query()) . $after;
      } else {
        if ($show_home_link) echo $sep;
        echo $before . sprintf($text['search'], get_search_query()) . $after;
      }

    } elseif ( is_day() ) {
      if ($show_home_link) echo $sep;
      echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $sep;
      echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F'));
      if ($show_current) echo $sep . $before . get_the_time('d') . $after;

    } elseif ( is_month() ) {
      if ($show_home_link) echo $sep;
      echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y'));
      if ($show_current) echo $sep . $before . get_the_time('F') . $after;

    } elseif ( is_year() ) {
      if ($show_home_link && $show_current) echo $sep;
      if ($show_current) echo $before . get_the_time('Y') . $after;

    } elseif ( is_single() && !is_attachment() ) {
      if ($show_home_link) echo $sep;
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        printf($link, $home_link . '' . $slug['slug'] . '/', $post_type->labels->singular_name);
        if ($show_current) echo $sep . $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, $sep);
        if (!$show_current || get_query_var('cpage')) $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
        $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
        echo $cats;
        if ( get_query_var('cpage') ) {
          echo $sep . sprintf($link, get_permalink(), get_the_title()) . $sep . $before . sprintf($text['cpage'], get_query_var('cpage')) . $after;
        } else {
          if ($show_current) echo $before . get_the_title() . $after;
        }
      }

    // custom post type
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      if ( get_query_var('paged') ) {
        echo $sep . sprintf($link, get_post_type_archive_link($post_type->name), $post_type->label) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_current) echo $sep . $before . $post_type->label . $after;
      }

    } elseif ( is_attachment() ) {
      if ($show_home_link) echo $sep;
      $parent = get_post($parent_id);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      if ($cat) {
        $cats = get_category_parents($cat, TRUE, $sep);
        $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
        echo $cats;
      }
      printf($link, get_permalink($parent), $parent->post_title);
      if ($show_current) echo $sep . $before . get_the_title() . $after;

    } elseif ( is_page() && !$parent_id ) {
      if ($show_current) echo $sep . $before . get_the_title() . $after;

    } elseif ( is_page() && $parent_id ) {
      if ($show_home_link) echo $sep;
      if ($parent_id != $frontpage_id) {
        $breadcrumbs = array();
        while ($parent_id) {
          $page = get_page($parent_id);
          if ($parent_id != $frontpage_id) {
            $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
          }
          $parent_id = $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        for ($i = 0; $i < count($breadcrumbs); $i++) {
          echo $breadcrumbs[$i];
          if ($i != count($breadcrumbs)-1) echo $sep;
        }
      }
      if ($show_current) echo $sep . $before . get_the_title() . $after;

    } elseif ( is_tag() ) {
      if ( get_query_var('paged') ) {
        $tag_id = get_queried_object_id();
        $tag = get_tag($tag_id);
        echo $sep . sprintf($link, get_tag_link($tag_id), $tag->name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_current) echo $sep . $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
      }

    } elseif ( is_author() ) {
      global $author;
      $author = get_userdata($author);
      if ( get_query_var('paged') ) {
        if ($show_home_link) echo $sep;
        echo sprintf($link, get_author_posts_url($author->ID), $author->display_name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
      } else {
        if ($show_home_link && $show_current) echo $sep;
        if ($show_current) echo $before . sprintf($text['author'], $author->display_name) . $after;
      }

    } elseif ( is_404() ) {
      if ($show_home_link && $show_current) echo $sep;
      if ($show_current) echo $before . $text['404'] . $after;

    } elseif ( has_post_format() && !is_singular() ) {
      if ($show_home_link) echo $sep;
      echo get_post_format_string( get_post_format() );
    }

    echo $wrap_after;

  }
} // end of dimox_breadcrumbs()


function add_menuclass($ulclass) {
  return preg_replace('/<a /', '<a class="callme_button" ', $ulclass, 1);
}
add_filter('wp_nav_menu','add_menuclass');


class trueTopPostsWidgetq333 extends WP_Widget {
 
  /* создание виджета */
  function __construct() {
    parent::__construct(
      'true_top_widget', 
      'Последние новости', // заголовок виджета
      array( 'description' => 'Позволяет вывести последние новости' ) // описание
    );
  }
 
  /* фронтэнд виджета */
  public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance['title'] ); // к заголовку применяем фильтр (необязательно)
    $posts_per_page = $instance['posts_per_page'];
 
    echo $args['before_widget'];
 
    if ( ! empty( $title ) )
      echo $args['before_title'] . $title . $args['after_title'];
 
    $q = new WP_Query("posts_per_page=$posts_per_page&orderby=date");
    if( $q->have_posts() ): ?>
    <ul class="recent_posts_list">
    <?php while( $q->have_posts() ): $q->the_post();
          $src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail'); ?>
      <li>
        <?php if ($src) { ?>
        <span><a href="<?php the_permalink() ?>"><img src="<?php echo $src[0]; ?>" alt="<?php the_title(); ?>" /></a></span>
        <?php } ?>
        <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
        <i><?php echo get_the_date(); ?></i> 
      </li>
      <?php endwhile;?>
    </ul>
    <?php endif;
    wp_reset_postdata();
 
    echo $args['after_widget'];
  }
 
  /*
   * бэкэнд виджета
   */
  public function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) ) {
      $title = $instance[ 'title' ];
    }
    if ( isset( $instance[ 'posts_per_page' ] ) ) {
      $posts_per_page = $instance[ 'posts_per_page' ];
    }
    ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>">Заголовок</label> 
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'posts_per_page' ); ?>">Количество постов:</label> 
      <input id="<?php echo $this->get_field_id( 'posts_per_page' ); ?>" name="<?php echo $this->get_field_name( 'posts_per_page' ); ?>" type="text" value="<?php echo ($posts_per_page) ? esc_attr( $posts_per_page ) : '5'; ?>" size="3" />
    </p>
    <?php 
  }
 
  /*
   * сохранение настроек виджета
   */
  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['posts_per_page'] = ( is_numeric( $new_instance['posts_per_page'] ) ) ? $new_instance['posts_per_page'] : '5'; // по умолчанию выводятся 5 постов
    return $instance;
  }
}
 
/*
 * регистрация виджета
 */
function true_top_posts_widget_load() {
  register_widget( 'trueTopPostsWidgetq333' );
}
add_action( 'widgets_init', 'true_top_posts_widget_load' );


?>
