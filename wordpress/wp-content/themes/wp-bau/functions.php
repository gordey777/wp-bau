<?php
/*
 *  Author: knaipa | @Saitobaza
 *  URL: saitobaza.ru
 *  Custom functions, support, custom post types and more.
 */

//  Enable styles for WP admin panel
add_action('admin_enqueue_scripts', 'wpeAdminThemeStyle');
function wpeAdminThemeStyle() {
  wp_enqueue_style('wpe-admin-style', get_template_directory_uri() . '/css/admin.css');
  wp_enqueue_style('wpe-admin-style', get_template_directory_uri() . '/css/editor-style.css');
  wp_register_script('wpe-admin-script', get_template_directory_uri() . '/js/admin.js');
  wp_enqueue_script( 'wpe-admin-script' );
}

//  Catch first image from post and display it
function catchFirstImage() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i',
    $post->post_content, $matches);
  $first_img = $matches [1] [0];
  if(empty($first_img)){
    $first_img = get_template_directory_uri() . '/img/noimage.jpg'; }
    return $first_img;
}

add_action('acf/init', 'my_acf_init');
function my_acf_init() {
  acf_update_setting('google_api_key', 'AIzaSyCZF31krTQH_5QnEpdIsEgmsBV-Iy884rE');
}

add_action('wp_enqueue_scripts', 'wpeStyles'); // Add Theme Stylesheet
function wpeStyles()  {
  wp_dequeue_style('fancybox');
  wp_dequeue_style('wp_dequeue_style');

  //wp_register_style('wpeasy-owl', '//cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.6/assets/owl.carousel.min.css', array(), '2.1.6', 'all');
  //wp_enqueue_style('wpeasy-owl'); // Enqueue it!
  //wp_register_style('wpeasy-font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), '4.7.0', 'all');
  //wp_enqueue_style('wpeasy-font-awesome'); // Enqueue it!

  wp_register_style('wpeasy-style', get_template_directory_uri() . '/css/main.css', array(), '1.0', 'all');
  wp_enqueue_style('wpeasy-style'); // Enqueue it!
}

add_action('init', 'wpeHeaderScripts'); // Add Scripts to wp_head
function wpeHeaderScripts() {
  if (!is_admin()) {
    wp_deregister_script('jquery');
    wp_register_script('jquery', '//cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js', array(), '1.12.4');
    wp_enqueue_script('jquery');

    wp_register_script('jquery-migrate', '//cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.0.0/jquery-migrate.min.js', array(), '3.0.0');
    wp_enqueue_script('jquery-migrate');

    wp_register_script('modernizr', '//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js', array(), '2.8.3');
    wp_enqueue_script('modernizr');

    //wp_register_script('OwlCarousel2', '//cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.6/owl.carousel.min.js', array(), '2.1.6');
    //wp_enqueue_script('OwlCarousel2');

    wp_deregister_script( 'jquery-form' );

    //  Load footer scripts (footer.php)
    wp_register_script('wpeScripts', get_template_directory_uri() . '/js/scripts.js', array(), '1.0.0', true);
    wp_enqueue_script('wpeScripts');
    wp_localize_script( 'wpeScripts', 'adminAjax', array(
      'ajaxurl' => admin_url( 'admin-ajax.php' ),
      'templatePath' => get_template_directory_uri(),
      'posts_per_page' => get_option('posts_per_page')
    ));

  }
}



/*
function add_defer_attribute($tag, $handle) {
   // add script handles to the array below
   $scripts_to_defer = array('jquery', 'jquery-migrate', 'modernizr', 'wpeScripts');

   foreach($scripts_to_defer as $defer_script) {
      if ($defer_script === $handle) {
         return str_replace(' src', ' defer="defer" src', $tag);
      }
   }
   return $tag;
}
add_filter('script_loader_tag', 'add_defer_attribute', 10, 2);*/



// Move js and css to footer
function remove_head_scripts() {
  remove_action( 'wp_head', 'wp_print_styles', 8);
  remove_action('wp_head', 'wp_print_scripts');
  remove_action('wp_head', 'wp_print_head_scripts', 9);
  remove_action('wp_head', 'wp_enqueue_scripts', 1);


  add_action('wp_footer', 'wp_print_styles', 5);
  add_action('wp_footer', 'wp_print_scripts', 5);
  add_action('wp_footer', 'wp_enqueue_scripts', 5);
  add_action('wp_footer', 'wp_print_head_scripts', 5);
}
add_action( 'wp_enqueue_scripts', 'remove_head_scripts' );



//  Remove wp_head() injected Recent Comment styles
//  add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
function my_remove_recent_comments_style() {
  global $wp_widget_factory;
  remove_action('wp_head', array(
    $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
    'recent_comments_style'
  ));
}

/*------------------------------------*\
    Theme Support
\*------------------------------------*/

if (!isset($content_width)) {
  $content_width = 1140;
}

if (function_exists('add_theme_support')) {
  // Add Menu Support
  add_theme_support('menus');

  // Add Thumbnail Theme Support
  add_theme_support('post-thumbnails');
  add_image_size('large', 1200, '', true); // Large Thumbnail
  add_image_size('medium', 600, '', true); // Medium Thumbnail
  add_image_size('small', 250, '', true); // Small Thumbnail
  add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

  // Enables post and comment RSS feed links to head
  add_theme_support('automatic-feed-links');

  // Localisation Support
  load_theme_textdomain('wpeasy', get_template_directory() . '/languages');
}


// WPE head navigation
function wpeHeadNav() {
  wp_nav_menu(
  array(
    'theme_location'  => 'header-menu',
    'menu'            => '',
    'container'       => 'div',
    'container_class' => 'menu-{menu slug}-container',
    'container_id'    => '',
    'menu_class'      => 'menu',
    'menu_id'         => '',
    'echo'            => true,
    'fallback_cb'     => 'wp_page_menu',
    'before'          => '',
    'after'           => '',
    'link_before'     => '',
    'link_after'      => '',
    'items_wrap'      => '<ul class="headnav menu">%3$s</ul>',
    'depth'           => 0,
    'walker'          => ''
    )
  );
}
// WPE footer navigation
function wpeFootNav() {
  wp_nav_menu(
  array(
    'theme_location'  => 'footer-menu',
    'menu'            => '',
    'container'       => 'div',
    'container_class' => 'menu-{menu slug}-container',
    'container_id'    => '',
    'menu_class'      => 'menu',
    'menu_id'         => '',
    'echo'            => true,
    'fallback_cb'     => 'wp_page_menu',
    'before'          => '',
    'after'           => '',
    'link_before'     => '',
    'link_after'      => '',
    'items_wrap'      => '<ul class="footernav">%3$s</ul>',
    'depth'           => 0,
    'walker'          => ''
    )
  );
}
// WPE sidebar navigation
function wpeSideNav() {
  wp_nav_menu(
  array(
    'theme_location'  => 'sidebar-menu',
    'menu'            => '',
    'container'       => 'div',
    'container_class' => 'menu-{menu slug}-container',
    'container_id'    => '',
    'menu_class'      => 'menu',
    'menu_id'         => '',
    'echo'            => true,
    'fallback_cb'     => 'wp_page_menu',
    'before'          => '',
    'after'           => '',
    'link_before'     => '',
    'link_after'      => '',
    'items_wrap'      => '<ul class="sidebarnav">%3$s</ul>',
    'depth'           => 0,
    'walker'          => ''
    )
  );
}
//  Register WPE Navigation
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
function register_html5_menu() {
  register_nav_menus(array(
    'header-menu' => __('Меню в шапке', 'wpeasy'),
    'sidebar-menu' => __('Меню в сайдбар', 'wpeasy'),
    'footer-menu' => __('Меню в подвал', 'wpeasy')
  ));
}
//  If Dynamic Sidebar Existsов
if (function_exists('register_sidebar')) {
  //  Define Sidebar Widget Area 1
  register_sidebar(array(
    'name' => __('Блок виджетов #1', 'wpeasy'),
    'description' => __('Description for this widget-area...', 'wpeasy'),
    'id' => 'widgetarea1',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h6>',
    'after_title' => '</h6>'
  ));
  //  Define Sidebar Widget Area 2. If your want to display more widget - uncoment this
  /*
  register_sidebar(array(
    'name' => __('Блок виджетов #2', 'wpeasy'),
    'description' => __('Description for this widget-area...', 'wpeasy'),
    'id' => 'widgetarea2',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h6>',
    'after_title' => '</h6>'
  ));
  */
}

//  Custom Excerpts
//  RU: Произвольное обрезание текста
function wpeExcerpt10($length) {
  return 10;
}
function wpeExcerpt20($length) {
  return 20;
}
function wpeExcerpt40($length) {
  return 40;
}
//  Create the Custom Excerpts callback
//  RU: Собственная обрезка контента
function wpeExcerpt($length_callback = '', $more_callback = '') {
  global $post;
  if (function_exists($length_callback)) {
      add_filter('excerpt_length', $length_callback);
  }
  if (function_exists($more_callback)) {
      add_filter('excerpt_more', $more_callback);
  }
  $output = get_the_excerpt();
  $output = apply_filters('wptexturize', $output);
  $output = apply_filters('convert_chars', $output);
  $output = '<p>' . $output . '</p>';
  echo $output;
}

//  Custom View Article link to Post
//  RU: Добавляем "Читать дальше" к обрезанным записям
/*
function html5_blank_view_article($more) {
  global $post;
  return '... <!-- noindex --><a rel="nofollow" class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'wpeasy') . '</a><!-- /noindex -->';
}
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
*/
// Remove the <div> surrounding the dynamic navigation to cleanup markup
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
function my_wp_nav_menu_args($args = '') {
  $args['container'] = false;
  return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
function my_css_attributes_filter($var) {
  return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
function remove_category_rel_from_category_list($thelist) {
  return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
function add_slug_to_body_class($classes) {
  global $post;
  if (is_home()) {
    $key = array_search('blog', $classes);
    if ($key > -1) {
      unset($classes[$key]);
    }
  } elseif (is_page()) {
    $classes[] = sanitize_html_class($post->post_name);
  } elseif (is_singular()) {
    $classes[] = sanitize_html_class($post->post_name);
  }

  return $classes;
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination
function html5wp_pagination() {
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
      'base' => str_replace($big, '%#%', get_pagenum_link($big)),
      'format' => '?paged=%#%',
      'current' => max(1, get_query_var('paged')),
      'prev_text' => __('« Previous'),
      'next_text' => __('Next »'),
      'total' => $wp_query->max_num_pages
    )
  );
}

// Remove Admin bar
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
function remove_admin_bar() {
  return false;
}

// Remove 'text/css' from our enqueued stylesheet
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
function html5_style_remove($tag) {
  return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images
function remove_thumbnail_dimensions( $html ) {
  $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
  return $html;
}

// Custom Gravatar in Settings > Discussion
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults) {
  $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
  $avatar_defaults[$myavatar] = "Custom Gravatar";
  return $avatar_defaults;
}

// Threaded Comments
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
function enable_threaded_comments() {
  if (!is_admin()) {
    if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script('comment-reply');
    }
  }
}

// Custom Comments Callback
function html5blankcomments($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment;
  extract($args, EXTR_SKIP);

  if ( 'div' == $args['style'] ) {
    $tag = 'div';
    $add_below = 'comment';
  } else {
    $tag = 'li';
    $add_below = 'div-comment';
  }
?>
  <!-- heads up: starting < for the html tag (li or div) in the next line: -->
  <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
  <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>
      <div class="comment-author vcard">
        <?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
        <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
      </div>
      <?php if ($comment->comment_approved == '0') : ?>
        <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
        <br />
      <?php endif; ?>

    <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
      <?php printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' ); ?>
    </div>

    <?php comment_text() ?>

    <div class="reply">
      <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </div>
      <?php if ( 'div' != $args['style'] ) : ?>
    </div>
  <?php endif; ?>
<?php }

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

 // Как отключить комментарии для Медиафайлов WordPress
 // http://wordpresso.org/hacks/kak-otklyuchit-kommentarii-dlya-mediafaylov-wordpress/
add_filter( 'comments_open', 'filter_media_comment_status', 10 , 2 );
function filter_media_comment_status( $open, $post_id ) {
  $post = get_post( $post_id );
  if( $post->post_type == 'attachment' ) {
    return false;
  }
  return $open;
}

 // Редирект записи, когда поисковый запрос выдает один результат
 // http://wordpresso.org/hacks/29-wordpress-tryukov-dlya-rabotyi-s-zapisyami-i-stranitsami/
add_action('template_redirect', 'single_result');
function single_result() {
  if (is_search()) {
    global $wp_query;
    if ($wp_query->post_count == 1) {
      wp_redirect( get_permalink( $wp_query->posts['0']->ID ) );
    }
  }
}


// хлебные крошки   http://dimox.name/wordpress-breadcrumbs-without-a-plugin/
/* <?php if (function_exists('easy_breadcrumbs')) easy_breadcrumbs(); ?> */

function easy_breadcrumbs() {

  // Settings

  $text['home'] = __('Home', 'wpeasy'); // текст ссылки "Главная"
  $text['category'] = '%s'; // текст для страницы рубрики
  $text['search'] = '"%s"'; // текст для страницы с результатами поиска
  $text['tag'] = '"%s"'; // текст для страницы тега
  $text['author'] = '%s'; // текст для страницы автора
  $text['404'] = '404'; // текст для страницы 404
  $text['page'] = __('Page', 'wpeasy') . ' %s'; // текст 'Страница N'
  $text['cpage'] = __('Review', 'wpeasy') . ' %s'; // текст 'Страница комментариев N'


  $wrap_before = '<ul id="breadcrumbs" class="breadcrumbs">'; // открывающий тег обертки
  $wrap_after = '</ul>'; // закрывающий тег обертки
  $sep = ' / '; // разделитель между "крошками"
  $sep_before = '<li class="separator">'; // тег перед разделителем
  $sep_after = '</li>'; // тег после разделителя
  $show_home_link = 1; // 1 - показывать ссылку "Главная", 0 - не показывать
  $show_on_home = 0; // 1 - показывать "хлебные крошки" на главной странице, 0 - не показывать
  $show_current = 1; // 1 - показывать название текущей страницы, 0 - не показывать
  $before = '<li class="breadcrumb-item  active">'; // тег перед текущей "крошкой"
  $after = '</li>'; // тег после текущей "крошки"
  /* === КОНЕЦ ОПЦИЙ === */

  global $post;
  $home_url = home_url('/');
  $link_before = '<li class="breadcrumb-item">';
  $link_after = '</li>';
  $link_attr = ' itemprop="item"';
  $link_in_before = '';
  $link_in_after = '';
  $link = $link_before . '<a href="%1$s"' . $link_attr . '>' . $link_in_before . '%2$s' . $link_in_after . '</a>' . $link_after;
  $frontpage_id = get_option('page_on_front');
  $parent_id = ($post) ? $post->post_parent : '';
  $sep = ' ' . $sep_before . $sep . $sep_after . ' ';
  $home_link = $link_before . '<a href="' . $home_url . '"' . $link_attr . ' class="home">' . $link_in_before . $text['home'] . $link_in_after . '</a>' . $link_after;

  if (is_home() || is_front_page()) {

    if ($show_on_home) echo $wrap_before . $home_link . $wrap_after;

  } else {

    echo $wrap_before;
    if ($show_home_link) echo $home_link;

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
        //printf($link, $home_url . $slug['slug'] . '/', $post_type->labels->singular_name);
        if ($show_current) echo /*$sep .*/ $before . get_the_title() . $after;
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
        if ($show_current) echo $sep . $before . $post_type->label . $after ;
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

// to remove the /./ from links, use this filter
// https://stackoverflow.com/questions/17798815/remove-category-tag-base-from-wordpress-url-without-a-plugin
add_filter( 'term_link', function($termlink){
  return str_replace('/./', '/', $termlink);
}, 10, 1 );


add_action( 'init', 'disable_wp_emojicons' );
function disable_wp_emojicons() {
  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
  // filter to remove TinyMCE emojis
  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
function disable_emojicons_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}



/*Filter Page by Template*/
class FilterPagesByTemplate {
  public function __construct(){
    add_action( 'restrict_manage_posts', array( $this, 'filter_dropdown' ) );
    add_filter( 'request', array( $this, 'filter_post_list' ) );

    add_filter('manage_pages_columns', array( $this, 'post_list_columns_head'));
    add_action('manage_pages_custom_column', array( $this, 'post_list_columns_content' ), 10, 2);
  }

  public function filter_dropdown(){
    if ( $GLOBALS['pagenow'] === 'upload.php' ) {
      return;
    }

    $template = isset( $_GET['page_template_filter'] ) ? $_GET['page_template_filter'] : "all";
    $default_title = apply_filters( 'default_page_template_title',  __( 'Default Template' ), 'meta-box' );
    ?>
    <select name="page_template_filter" id="page_template_filter">
      <option value="all">All Page Templates</option>
      <option value="default" <?php echo ( $template == 'default' )? ' selected="selected" ' : "";?>><?php echo esc_html( $default_title ); ?></option>
      <?php page_template_dropdown($template); ?>
    </select>
    <?php
  }//end func

  public function filter_post_list( $vars ){
    if ( ! isset( $_GET['page_template_filter'] ) ) return $vars;
    $template = trim($_GET['page_template_filter']);
    if ( $template == "" || $template == 'all' ) return $vars;

    $vars = array_merge(
      $vars,
      array(
        'meta_query' => array(
          array(
            'key'     => '_wp_page_template',
            'value'   => $template,
            'compare' => '=',
          ),
        ),
      )
    );
    return $vars;
  }//end func

  # Add new column to post list
  public function post_list_columns_head( $columns ){
      $columns['template'] = 'Template';
      return $columns;
  }

  #post list column content
  public function post_list_columns_content( $column_name, $post_id ){
      $post_type = 'page';

      if($column_name == 'template'){
          $template = get_post_meta($post_id, "_wp_page_template" , true );
          if($template){
            if($template == 'default'){
              $template_name = apply_filters( 'default_page_template_title',  __( 'Default Template' ), 'meta-box' );
              echo '<span title="Template file : page.php">'.$template_name.'</span>';
            } else{
              $templates = wp_get_theme()->get_page_templates( null, $post_type );

              if( isset( $templates[ $template ] ) )
              {
                echo '<span title="Template file : '.$template.'">'.$templates[ $template ].'</span>';
              } else{
                echo '<span style="color:red" title="This template file does not exist">'.$template.'</span>';
              }
            }
          }
      }
  }
}//end class

new FilterPagesByTemplate();



?>
