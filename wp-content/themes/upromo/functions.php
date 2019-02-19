<?php
/**
 * upromo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package upromo
 */

if ( ! function_exists( 'upromo_setup' ) ) :
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  function upromo_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on upromo, use a find and replace
     * to change 'upromo' to the name of your theme in all the template files.
     */
    load_theme_textdomain( 'upromo', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support( 'post-thumbnails' );


    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
      'menu-1' => esc_html__( 'Primary', 'upromo' ),
    ) );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ) );

    // Set up the WordPress core custom background feature.
    add_theme_support( 'custom-background', apply_filters( 'upromo_custom_background_args', array(
      'default-color' => 'ffffff',
      'default-image' => '',
    ) ) );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support( 'custom-logo', array(
      'height'      => 250,
      'width'       => 250,
      'flex-width'  => true,
      'flex-height' => true,
    ) );
  }
endif;
add_action( 'after_setup_theme', 'upromo_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function upromo_content_width() {
  // This variable is intended to be overruled from themes.
  // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
  // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
  $GLOBALS['content_width'] = apply_filters( 'upromo_content_width', 640 );
}
add_action( 'after_setup_theme', 'upromo_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function upromo_widgets_init() {
  register_sidebar( array(
    'name'          => esc_html__( 'Sidebar', 'upromo' ),
    'id'            => 'sidebar-1',
    'description'   => esc_html__( 'Add widgets here.', 'upromo' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );
}
add_action( 'widgets_init', 'upromo_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function upromo_scripts() {
  wp_enqueue_style( 'upromo-style', get_stylesheet_uri() );

  wp_enqueue_style( 'upromo-animate', get_template_directory_uri() . '/css/animate.css');
  wp_enqueue_style( 'upromo-fancybox', get_template_directory_uri() . '/css/jquery.fancybox.css');
  wp_enqueue_style( 'upromo-fonts', get_template_directory_uri() . '/css/fonts.css');
  wp_enqueue_style( 'upromo-slick', get_template_directory_uri() . '/css/slick.css');
  wp_enqueue_style( 'upromo-slick-theme', get_template_directory_uri() . '/css/slick-theme.css');
  wp_enqueue_style( 'upromo-main-style', get_template_directory_uri() . '/css/main.css');
  wp_enqueue_style( 'upromo-media-style', get_template_directory_uri() . '/css/media.css');

  wp_enqueue_script( 'upromo-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

  wp_enqueue_script( 'upromo-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
  wp_enqueue_script( 'upromo-libs-js', get_template_directory_uri() . '/js/libs.js', array(), '20151215', true );
  wp_enqueue_script( 'upromo-common-js', get_template_directory_uri() . '/js/common.js', array(), '20151215', true );

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
add_action( 'wp_enqueue_scripts', 'upromo_scripts' );

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

const TP = 'template-parts/';












add_action( 'init', 'register_post_types' );
function register_post_types(){
  register_post_type('gallery', array(
    'label'  => null,
    'labels' => array(
      'name'               => 'gallery items', // основное название для типа записи
      'singular_name'      => 'gallery item', // название для одной записи этого типа
      'add_new'            => 'Add new', // для добавления новой записи
      'add_new_item'       => 'Adding new item', // заголовка у вновь создаваемой записи в админ-панели.
      'edit_item'          => 'Edit item', // для редактирования типа записи
      'new_item'           => 'New item', // текст новой записи
      'view_item'          => 'View item', // для просмотра записи этого типа.
      'search_items'       => 'Search items', // для поиска по этим типам записи
      'not_found'          => 'Not found', // если в результате поиска ничего не было найдено
      'not_found_in_trash' => 'Not found in trash', // если не было найдено в корзине
      'parent_item_colon'  => '', // для родителей (у древовидных типов)
      'menu_name'          => 'Add to repair gallery', // название меню
    ),
    'description'         => '',
    'public'              => true,
    'publicly_queryable'  => null, // зависит от public
    'exclude_from_search' => null, // зависит от public
    'show_ui'             => null, // зависит от public
    'show_in_menu'        => null, // показывать ли в меню адмнки
    'show_in_admin_bar'   => null, // по умолчанию значение show_in_menu
    'show_in_nav_menus'   => null, // зависит от public
    'show_in_rest'        => null, // добавить в REST API. C WP 4.7
    'rest_base'           => null, // $post_type. C WP 4.7
    'menu_position'       => null,
    'menu_icon'           => null,
    //'capability_type'   => 'post',
    //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
    //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
    'hierarchical'        => false,
    'supports'            => array('title','editor','thumbnail'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
    'taxonomies'          => array('myTax'),
    'has_archive'         => true,
    'rewrite'             => true,
    'query_var'           => true,
  ) );
  register_post_type('photophoto', array(
    'label'  => null,
    'labels' => array(
      'name'               => 'photophoto items', // основное название для типа записи
      'singular_name'      => 'photophoto item', // название для одной записи этого типа
      'add_new'            => 'Add new', // для добавления новой записи
      'add_new_item'       => 'Adding new item', // заголовка у вновь создаваемой записи в админ-панели.
      'edit_item'          => 'Edit item', // для редактирования типа записи
      'new_item'           => 'New item', // текст новой записи
      'view_item'          => 'View item', // для просмотра записи этого типа.
      'search_items'       => 'Search items', // для поиска по этим типам записи
      'not_found'          => 'Not found', // если в результате поиска ничего не было найдено
      'not_found_in_trash' => 'Not found in trash', // если не было найдено в корзине
      'parent_item_colon'  => '', // для родителей (у древовидных типов)
      'menu_name'          => 'Add to repair photophoto', // название меню
    ),
    'description'         => '',
    'public'              => true,
    'publicly_queryable'  => null, // зависит от public
    'exclude_from_search' => null, // зависит от public
    'show_ui'             => null, // зависит от public
    'show_in_menu'        => null, // показывать ли в меню адмнки
    'show_in_admin_bar'   => null, // по умолчанию значение show_in_menu
    'show_in_nav_menus'   => null, // зависит от public
    'show_in_rest'        => null, // добавить в REST API. C WP 4.7
    'rest_base'           => null, // $post_type. C WP 4.7
    'menu_position'       => null,
    'menu_icon'           => null,
    //'capability_type'   => 'post',
    //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
    //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
    'hierarchical'        => false,
    'supports'            => array('title','editor','thumbnail'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
    'taxonomies'          => array(''),
    'has_archive'         => true,
    'rewrite'             => true,
    'query_var'           => true,
  ) );

  register_post_type('review', array(
    'label'  => null,
    'labels' => array(
      'name'               => 'review items', // основное название для типа записи
      'singular_name'      => 'review item', // название для одной записи этого типа
      'add_new'            => 'Add new', // для добавления новой записи
      'add_new_item'       => 'Adding new item', // заголовка у вновь создаваемой записи в админ-панели.
      'edit_item'          => 'Edit item', // для редактирования типа записи
      'new_item'           => 'New item', // текст новой записи
      'view_item'          => 'View item', // для просмотра записи этого типа.
      'search_items'       => 'Search items', // для поиска по этим типам записи
      'not_found'          => 'Not found', // если в результате поиска ничего не было найдено
      'not_found_in_trash' => 'Not found in trash', // если не было найдено в корзине
      'parent_item_colon'  => '', // для родителей (у древовидных типов)
      'menu_name'          => 'Add review', // название меню
    ),
    'description'         => '',
    'public'              => true,
    'publicly_queryable'  => null, // зависит от public
    'exclude_from_search' => null, // зависит от public
    'show_ui'             => null, // зависит от public
    'show_in_menu'        => null, // показывать ли в меню адмнки
    'show_in_admin_bar'   => null, // по умолчанию значение show_in_menu
    'show_in_nav_menus'   => null, // зависит от public
    'show_in_rest'        => null, // добавить в REST API. C WP 4.7
    'rest_base'           => null, // $post_type. C WP 4.7
    'menu_position'       => null,
    'menu_icon'           => null,
    //'capability_type'   => 'post',
    //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
    //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
    'hierarchical'        => false,
    'supports'            => array('title','editor', 'thumbnail'), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
    'taxonomies'          => array(),
    'has_archive'         => true,
    'rewrite'             => true,
    'query_var'           => true,
  ) );
}

add_action('init', 'create_taxonomy_types_appliance');
function create_taxonomy_types_appliance(){
  register_taxonomy('myTax', array('gallery'), array(
    'label'                 => '', // определяется параметром $labels->name
    'labels'                => array(
      'name'              => 'Types of appliance',
      'singular_name'     => 'Type of appliance',
      'search_items'      => 'Search appliances',
      'all_items'         => 'All appliances',
      'view_item '        => 'View appliance',
      'parent_item'       => 'Parent appliance',
      'parent_item_colon' => 'Parent appliance:',
      'edit_item'         => 'Edit appliance',
      'update_item'       => 'Update appliance',
      'add_new_item'      => 'Add new appliance',
      'new_item_name'     => 'New appliance name',
      'menu_name'         => 'Types of appliance',
    ),
    'description'           => '', // описание таксономии
    'public'                => true,
    'publicly_queryable'    => null, // равен аргументу public
    'show_in_nav_menus'     => true, // равен аргументу public
    'show_ui'               => true, // равен аргументу public
    'show_in_menu'          => true, // равен аргументу show_ui
    'show_tagcloud'         => true, // равен аргументу show_ui
    'show_in_rest'          => null, // добавить в REST API
    'rest_base'             => null, // $taxonomy
    'hierarchical'          => true,
    'update_count_callback' => '',
    'rewrite'               => true,
    //'query_var'             => $taxonomy, // название параметра запроса
    'capabilities'          => array(),
    'meta_box_cb'           => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
    'show_admin_column'     => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
    '_builtin'              => false,
    'show_in_quick_edit'    => null, // по умолчанию значение show_ui
  ) );
}
add_action( 'init', 'create_theme_taxonomy', 0 );


$args = array(
  'show_option_all'    => '',
  'show_option_none'   => ('No categories'),
  'orderby'            => 'name',
  'order'              => 'ASC',
  'show_last_update'   => 0,
  'style'              => 'list',
  'show_count'         => 0,
  'hide_empty'         => 1,
  'use_desc_for_title' => 1,
  'child_of'           => 0,
  'feed'               => '',
  'feed_type'          => '',
  'feed_image'         => '',
  'exclude'            => '',
  'exclude_tree'       => '',
  'include'            => '',
  'hierarchical'       => false,
  'title_li'           => ( '' ),
  'number'             => NULL,
  'echo'               => 1,
  'depth'              => 0,
  'current_category'   => 0,
  'pad_counts'         => 0,
  'taxonomy'           => 'myTax',
  'walker'             => 'Walker_Category',
  'hide_title_if_empty' => false,
  'separator'          => '<br />',
);