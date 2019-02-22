<?php
/*
  * Template Name: Печать наклеек
  */

?>

<?php get_header();

  global $wp_query;
  $page_id = $wp_query->post->ID;

?>
<div class="container">
  <?php if (function_exists('kama_breadcrumbs') ) kama_breadcrumbs(); ?>
</div>

<section class="common-section product">
  <div class="container">
    <div class="main-wrap">

      <?php get_sidebar('Sidebar'); ?>

      <main class="main-content tabs">
        <div class="tabs__wrap">
          <?php if( have_rows('sticker_list', $page_id) ): ?>
            <?php $counter = 0; while( have_rows('sticker_list', $page_id) ): the_row(); ?>
              <div class="tabs__content <?php echo $counter == 0 ? 'active' : '' ?>">
                <div class="product__img">
                  <img  src="<?php the_sub_field('sticker_img'); ?>" alt="">
                </div>
              </div>
              <?php $counter++ ?>
            <?php endwhile; ?>
          <?php endif; ?>
        </div>

        <form action="" id="pechatNakleyek">
          <ul class="tabs__caption kinds-of-forms">
            <?php if( have_rows('sticker_list', $page_id) ): ?>
              <?php $counter = 0; while( have_rows('sticker_list', $page_id) ): the_row(); ?>
                <li class="<?php echo $counter === 0 ? 'active' : '' ?>">
                  <label>
                    <input
                      type="radio"
                      name="forma"
                      value="<?php the_sub_field('sticker_form_name'); ?>"
                      <?php echo $counter === 0 ? ' checked="checked" ' : '' ?> >
                    <div class="kinds-of-forms__item">
                      <span>
                        <img class="style-svg" src="<?php the_sub_field('sticker_form_ico'); ?>" alt=""></span>
                        <?php the_sub_field('sticker_form_name'); ?>
                    </div>
                  </label>
                </li>
                <?php $counter++ ?>
              <?php endwhile; ?>
            <?php endif; ?>
          </ul>

          <div class="tabs__wrap">
            <?php if( have_rows('sticker_list', $page_id) ): ?>
              <?php $counter = 0; while( have_rows('sticker_list', $page_id) ): the_row(); ?>
                <?php if( have_rows('sticker_form_sizes') ): ?>
                  <div class="tabs__content <?php echo $counter === 0 ? 'active' : '' ?>">
                    <ul class="kinds-of-forms sizes">
                      <?php while( have_rows('sticker_form_sizes') ): the_row(); ?>
                        <li>
                          <label>
                            <input type="radio" name="size" value="<?php echo str_replace(" ", "", get_sub_field('size')) ; ?>">
                            <div class="kinds-of-forms__item">
                              <?php the_sub_field('size'); ?>
                            </div>
                          </label>
                        </li>
                      <?php endwhile; ?>
                    </ul>
                  </div>
                <?php endif; ?>
              <?php $counter++; endwhile; ?>
            <?php endif; ?>
          </div>

          <div class="set-custom-props set-sizes">
            <div class="set-custom-props__title">
                                <span>
              <img src="<?php echo get_template_directory_uri() ?>/images/ico_meter.svg" alt="">
            </span>
              <h5>Свой размер </h5>
            </div>
            <div class="form-wrap">
              <div class="input-group">
                <div class="input-field">
                  <input type="number" name="customHeight" placeholder="Высота, см">
                </div>
                <div class="input-field">
                  <input type="number" name="customWidth" placeholder="Ширина, см">
                </div>
                <div class="input-field">
                  <button data-fancybox data-src="#popupToFillForm" id="testbtn" class="btn btn-common" type="submit">ЗАКАЗАТЬ</button>
                  <!--<button class="btn btn-common" type="submit">ЗАКАЗАТЬ</button>-->
                </div>
              </div>
            </div>
          </div>

          <?php if( have_rows('sticker_list', $page_id) ): ?>
            <div class="tabs__wrap">
              <?php $counter = 0; while( have_rows('sticker_list', $page_id) ): the_row(); ?>
                <?php $if_added_order_btn = get_sub_field('btn_to_offer'); ?>
                <div class="tabs__content <?php echo $counter === 0 ? 'active' : '' ?>">
                  <?php if( get_sub_field('table_title')) : ?>
                   <div class="product-table">
                    <div class="product-table__wrap">
                      <div class="product-table__title">
                        <h6><?php the_sub_field('table_title'); ?></h6>
                      </div>
                      <div class="flex-wrap">

                        <?php if(get_sub_field('product_table_img')): ?>
                          <div class="product-table__img">
                            <img src="<?php the_sub_field('product_table_img'); ?>" alt="">
                          </div>
                        <?php endif; ?>

                        <div class="product-table__info">
                          <ul>
                            <?php $count = 0; ?>
                            <?php if( have_rows('table_body') ): ?>
                              <?php while( have_rows('table_body') ): the_row(); ?>
                                <li class="table-row">
                                  <?php if( have_rows('row')) : ?>
                                    <?php while( have_rows('row')) : the_row(); ?>
                                      <div class="table-cell"><?php the_sub_field('cell'); ?></div>
                                    <?php endwhile; ?>

                                    <?php if( $if_added_order_btn ): ?>
                                      <div class="table-cell">
                                        <?php if($count):  ?>
                                          <a data-fancybox="" data-src="#popupToFillForm" href="javascript:;" class="btn btn-common">ЗАКАЗАТЬ</a>
                                        <?php endif; ?>
                                      </div>
                                    <?php endif; ?>
                                  <?php endif; ?>
                                </li>
                                <?php $count++; ?>
                              <?php endwhile; ?>
                            <?php endif; ?>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php endif; ?>
                </div>
              <?php $counter++; endwhile; ?>
            </div>
          <?php endif; ?>

          <!--Свое количество-->
          <div class="set-custom-props set-quantity">
            <div class="set-custom-props__title">
                                <span>
                <img src="<?php echo get_template_directory_uri() ?>/images/ico_kolichestvo.svg" alt="">
              </span>
              <h5>Свое количество</h5>
            </div>
            <div class="form-wrap">
              <div class="input-group">
                <div class="input-field">
                  <input type="number" name="quantity" placeholder="Количество, штук">
                </div>
                <div class="input-field">
                  <button class="btn btn-common" type="submit" data-fancybox data-src="#popupToFillForm">Продолжить</button>
                </div>
              </div>
            </div>
          </div>
        </form>

        <article class="product__article">
          <?php the_post(); ?>
          <?php the_content(); ?>
        </article>

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