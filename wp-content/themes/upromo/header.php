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
  <?php wp_head(); ?>
</head>



<body <?php body_class(); ?>>
<header class="header <?php echo is_front_page() ? 'header-abs' : '' ?>">
  <div class="container">
    <div class="header-wrap">
      <div class="header-nav">
        <div class="logo"><?php the_custom_logo(); ?></div>
      </div>
      <nav class="main-menu">
        <ul>
          <li class="current-menu-item">
            <a href="#" data-title="Главная">Главная</a>
          </li>
          <li><a href="#" data-title="Продукция">Продукция</a>
          </li>
          <li><a href="#" data-title="Услуги">Услуги</a>
          </li>
          <li><a href="#" data-title="Контакты">Контакты</a>
          </li>
        </ul>
      </nav>
      <div class="contacts">
        <a href="tel:<?php echo str_replace([' ', '-'], '', get_field('contact_tel', 8)); ?>" class="contacts__tel"><?php the_field('contact_tel', 8)?></a>
        <a href="mailto:<?php the_field('contact_mail', 8) ?>" class="contacts__mail"><?php the_field('contact_mail', 8) ?></a>
      </div>
    </div>
  </div>
</header>
