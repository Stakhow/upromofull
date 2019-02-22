<?php
  /**
  * The header for our theme
  *
  * This is the template that displays all of the <head> section and everything up until <div id="content">
  *
  * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
  *
  * @package upromo
  */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="HandheldFriendly" content="True" />
  <meta name="format-detection" content="telephone=no" />
  <meta name="format-detection" content="address=no" />
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1.0, shrink-to-fit=no">
  <title><?= get_the_title()  ?></title>
  <!--[if lt IE 9]> <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script> <![endif]-->
  <link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri() ?>/images/favicons/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri() ?>/images/favicons/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri() ?>/images/favicons/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri() ?>/images/favicons/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri() ?>/images/favicons/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri() ?>/images/favicons/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri() ?>/images/favicons/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri() ?>/images/favicons/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri() ?>/images/favicons/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_template_directory_uri() ?>/images/favicons/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri() ?>/images/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri() ?>/images/favicons/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri() ?>/images/favicons/favicon-16x16.png">
  <link rel="manifest" href="<?php echo get_template_directory_uri() ?>/images/favicons/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <?php wp_head(); ?>
</head>



<body <?php body_class(); ?>>
<header class="header <?php echo is_front_page() ? 'header-abs' : '' ?>">
  <div class="container">
    <div class="header-wrap">
      <div class="header-nav">
        <div class="logo">
          <?php if(is_front_page()) : ?>
            <?php the_custom_logo(); ?>
          <?php else: ?>
            <div class="logo"><a href="<?php echo get_home_url() ?>"><img class="style-svg" src="<?php the_field('header_logo', 8) ?>" alt=""></a>
              </div>
          <?php endif; ?>
        </div>

      </div>


      <?php
      wp_nav_menu( array(
        'theme_location'  => 'Primary',
        'menu'            => 'Menu 1',
        'container'       => 'nav',
        'container_class' => 'main-menu',
        'container_id'    => '',
        'menu_class'      => '',
        'menu_id'         => '',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'depth'           => 0,
        'walker'          => '',
      ) );
      ?>
      <div class="contacts">
        <a href="tel:<?php echo str_replace([' ', '-'], '', get_field('contact_tel', 8)); ?>" class="contacts__tel"><?php the_field('contact_tel', 8)?></a>
        <a href="mailto:<?php the_field('contact_mail', 8) ?>" class="contacts__mail"><?php the_field('contact_mail', 8) ?></a>
      </div>
    </div>
  </div>
</header>
