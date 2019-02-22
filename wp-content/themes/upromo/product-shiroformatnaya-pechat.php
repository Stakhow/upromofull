<?php
/*
  * Template Name: Широкоформатная печать
  */

?>

<?php get_header();

global $wp_query;
$page_id = $wp_query->post->ID;
?>
<div class="container">
  <?php if (function_exists('kama_breadcrumbs') ) kama_breadcrumbs(); ?>
</div>

<section class="common-section product interior-printing">
  <div class="container">
    <div class="main-wrap">

      <!--region SIDEBAR-->
      <?php get_sidebar('Sidebar'); ?>
      <!--endregion-->

      <main class="main-content">
        <div class="product__img">
          <img src="<?php the_post_thumbnail_url() ?>" alt="">
        </div>
        <div class="product__order base-gradient">
          <div class="product__name">
            <span>
              <img class="style-svg" src="<?php the_field('subcat_page_ico', $wp_query->post->ID) ?>" alt="">
            </span>
            <h3><?php the_title();  ?></h3>
          </div>
          <a data-fancybox="" data-src="#popupToFillForm" href="javascript:; "class="btn btn-common">Заказать</a>
        </div>
        
        <article class="product__article">
          <?php the_post(); ?>
          <?php the_content(); ?>
        </article>


        <?php get_template_part(TP. 'product-table-template') ?>


        <?php get_template_part(TP. 'product-list-group') ?>


        <?php get_template_part(TP. 'custom-props-block') ?>


        <?php get_template_part(TP. 'portfolio-template') ?>

      </main>
    </div>
  </div>

</section>


<!--region СВЯЖИТЕСЬ С НАМИ-->
  <?php get_template_part(TP. 'feedback-section') ?>
<!--endregion-->


<?php get_footer(); ?>