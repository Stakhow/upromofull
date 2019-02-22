<?php
/*
 * Template Name: Контакты
 */ ?>

<?php get_header(); ?>

<?php
  global $wp_query;
  $page_id =  $wp_query->post->ID;

  $args = array(
    'post_parent' => $page_id,
    'post_type'   => 'page',
    'numberposts' => -1,
    'post_status' => 'any'
  );
  $children = get_children( $args );
  $page_style = "background-image: url(" . get_the_post_thumbnail_url() . ")";

?>


<section class="banner base-gradient" style=" <?php echo get_the_post_thumbnail_url() ? $page_style : ""; ?>" >
  <div class="container">
    <div class="flex-wrap">
      <div class="banner__text">
        <h1><?= get_the_title()  ?></h1>
      </div>
    </div>
  </div>
</section>

<div class="container">
  <?php if (function_exists('kama_breadcrumbs') ) kama_breadcrumbs(); ?>
</div>

<section class="contact-page" style="background-image: url(<?php the_field('contact_page_background', 420) ?>);">
  <div class="container">
    <div class="section-head">
      <?php the_post() ?>
      <?php the_content() ?>

    </div>
    <ul class="contact-info-list">
      <div class="contacts">


      </div>
      <li>
        <div>
          <img src="<?php echo get_template_directory_uri() ?>/images/ico-map.svg" alt=""><span>Адрес:</span>
        </div>
        <p><?php the_field('contact_address', 8) ?></p>
      </li>

      <li>
        <div>
          <img src="<?php echo get_template_directory_uri() ?>/images/ico-tel-circle.svg" alt=""><span>Телефон:</span>
        </div>
        <p><a href="tel:<?php echo str_replace([' ', '-'], '', get_field('contact_tel', 8)); ?>" class="contacts__tel"><?php the_field('contact_tel', 8)?></a>
        </p>
      </li>

      <li>
        <div>
          <img src="<?php echo get_template_directory_uri() ?>/images/ico-mail-opened.svg" alt=""><span>Email:</span>
        </div>
        <p><a href="mailto:<?php the_field('contact_mail', 8) ?>" class="contacts__mail"><?php the_field('contact_mail', 8) ?></a>
        </p>
      </li>

      <li>
        <div>
          <img src="<?php echo get_template_directory_uri() ?>/images/ico-clock.svg" alt=""><span>Время работы:</span>
        </div>
        <p><?php the_field('contact_hours', 8) ?></p>
      </li>

    </ul>
  </div>
</section>

<section class="map">
  <div class="map-wrap">
<!--    --><?php //the_field('contact_page_map', 420) ?>
    <iframe src="https://www.google.com/maps/embed?pb=!1m13!1m8!1m3!1d4481.74492512999!2d49.06687760104981!3d55.83017294850892!3m2!1i1024!2i768!4f13.1!3m2!1m1!2z0JrQsNC30LDQvdGMLCDRg9C7LiDQkdC-0LvRjNGI0LDRjyDQv9C-0YfRgtC-0LLQsNGPLCAzNg!5e0!3m2!1suk!2sua!4v1549466810239"
            frameborder="0" style="border:0" allowfullscreen></iframe>
  </div>
  <div class="form-wrap">
    <div class="feedback-form">
      <div class="section-head">
        <small>ОБРАТНАЯ СВЯЗЬ</small>
        <h2>СВЯЖИТЕСЬ С НАМИ</h2>
      </div>

      <?php echo do_shortcode('[contact-form-7 id="644" title="Свяжитесь с нами на странице Контакты"]') ?>

    </div>
  </div>

</section>

<?php get_footer() ?>





