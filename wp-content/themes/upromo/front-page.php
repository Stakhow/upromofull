<?php get_header(); ?>

  <section class="main-banner front-page" style="background-image: url(<?php the_post_thumbnail_url() ?>);">
    <div class="container">
      <div class="flex-wrap">
        <div class="main-banner__text">
          <?php the_post()?>
          <?php the_content()?>
          <a data-fancybox data-src="#popupToOrder" href="javascript:;" class="btn btn-common">Заказать рекламу</a>
        </div>
      </div>
    </div>
  </section>


  <!--Продукция-->
  <section class="section-production">
    <div class="container">
      <div class="flex-wrap">
        <div class="section-head">
          <?php the_field('production_section_text', get_the_ID()) ?>

          <a href="<?= get_field('production_section_link', get_the_ID()) ?>" class="btn btn-common">Смотреть каталог</a>
        </div>
        <?php
        $args = array(
          'post_parent' => 179,
          'post_type'   => 'page',
          'numberposts' => -1,
          'post_status' => 'any'
        );
        $children = get_children( $args );
        ?>
        <ul class="production-list">
          <?php foreach ($children as $child): ?>
            <li>
              <a href="<?= $child->post_name ; ?>">
                <div class="production-list__ico">
                  <img src="<?php the_field('subcat_page_ico', $child->ID); ?>" class="style-svg" alt="">
                </div>
                <h4><?= $child->post_title ; ?></h4>
                <p><?php the_field('subcat_page_short_descr', $child->ID); ?></p>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </section>


  <!--Услуги-->
  <section class="section-services" style="background-image: url(<?php the_field('services_bg', get_the_ID()) ?>);">
    <div class="container">
      <div class="section-head">
        <?php the_field('services_title', get_the_ID()) ?>
      </div>
      <?php
      $args = array(
        'post_parent' => 198,
        'post_type'   => 'page',
        'numberposts' => -1,
        'post_status' => 'any'
      );
      $children = get_children( $args );
      ?>
      <ul class="services-list">
        <?php foreach ($children as $child): ?>
          <li class="services-item">
            <a href="<?= $child->post_name ; ?>">
              <div class="services-item__ico">
                <img class="style-svg" src="<?php the_field('subcat_page_ico', $child->ID); ?>" alt="">
              </div>
              <span><?= $child->post_title ; ?></span>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>

      <a href="<?php the_field('services_link', get_the_ID()) ?>" class="btn btn-common">Смотреть все услуги</a>
    </div>
  </section>


  <section class="section-clients">
    <div class="container">

      <div class="section-head">
        <?php the_field('clients_title', get_the_ID()) ?>
      </div>

      <ul class="clients-list">

        <?php if( have_rows('clients_list', get_the_ID()) ): ?>
          <?php while( have_rows('clients_list', get_the_ID()) ): the_row(); ?>
            <li>
              <img src="<?php the_sub_field('img'); ?>" alt="">
            </li>
          <?php endwhile; ?>
        <?php endif; ?>

      </ul>

    </div>
  </section>


  <!--region СВЯЖИТЕСЬ С НАМИ-->
    <?php get_template_part(TP. 'feedback-section') ?>
  <!--endregion-->

<?php get_footer() ?>





