<?php
/*
 * Template Name: Категории
 */ ?>

<?php get_header(); ?>


<!--subcat_page_ico-->

<!--subcat_page_short_descr-->


<section class="banner base-gradient" style="background-image: url(<?php the_post_thumbnail_url() ?>);">
  <div class="container">
    <div class="flex-wrap">
      <div class="banner__text">
        <h1><?= get_the_title()  ?></h1>
      </div>
    </div>
  </div>
</section>

<!--region BREADCRUMBS-->
<div class="container">
  <div class="breadcrumbs">
    <ul>
      <li><a href="#">Главная страница</a></li>
      <li>Продукция</li>
    </ul>
  </div>
</div>
<!--endregion-->

<section class="section-services" style="background-image: url(<?php the_field('service_section_bg', 179) ?>);">
  <div class="container">

    <?php
    global $wp_query;

    $args = array(
      'post_parent' => 179,
      'post_type'   => 'page',
      'numberposts' => -1,
      'post_status' => 'any'
    );
    $children = get_children( $args );
    ?>

    <ul class="production-list ">
      <?php foreach ($children as $child): ?>
        <li>
          <a href="<?= $child->post_name ; ?>">
            <div class="production-list__ico">
              <img src="<?php the_field('subcat_page_ico', $child->ID); ?>" class="style-svg" alt="">
            </div>
            <h3><?= $child->post_title ; ?></h3>
            <p><?php the_field('subcat_page_short_descr', $child->ID); ?></p>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>

<?php get_footer() ?>





