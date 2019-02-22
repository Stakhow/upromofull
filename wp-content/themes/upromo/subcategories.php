<?php
/*
 * Template Name: Подкатегории
 */ ?>

<?php get_header(); ?>
<?php

  global $wp_query;

  $args = array(
    'post_parent' => $wp_query->post->ID,
    'post_type'   => 'page',
    'numberposts' => -1,
    'post_status' => 'any'
  );
  $children = get_children( $args );
  $page_style = "background-image: url(" . get_the_post_thumbnail_url() . ")";
?>

<section class="banner base-gradient" style=" <?php echo get_the_post_thumbnail_url() ? $page_style : ""; ?>">
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



<section class="section-services" style="background-image: url(<?php the_field('service_section_bg', get_the_ID()) ?>);">
  <div class="container">


    <ul class="production-list subproduction-list">
      <?php foreach ($children as $child): ?>
        <li>
          <a href="<?= $child->post_name ; ?>">
            <div class="production-list__ico">
              <img src="<?php the_field('subcat_page_ico', $child->ID); ?>" class="style-svg" alt="">
            </div>
            <h5><?= $child->post_title ; ?></h5>
            <p><?php the_field('subcat_page_short_descr', $child->ID); ?></p>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>



<?php get_footer() ?>





