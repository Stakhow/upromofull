<?php if( have_rows('product_group_list', $page_id) ): ?>
  <?php while( have_rows('product_group_list', $page_id) ): the_row(); ?>
    <?php if(get_sub_field('title')) : ?>
      <div class="product-subcategory">
        <h3><?php the_sub_field('title'); ?></h3>
      </div>
    <?php endif; ?>

    <?php if( have_rows('product_list', $page_id) ): ?>
      <ul class="product-list">
        <?php while( have_rows('product_list', $page_id) ): the_row(); ?>
          <li>
            <div class="product-list__content">
              <div class="product-list__img">
                <img src="<?php the_sub_field('image'); ?>" alt="">
              </div>
              <div class="product-list__info">
                <h4 class="product-title-name" ><?php the_sub_field('title'); ?></h4>
                <div class="product-list__descr">
                  <?php the_sub_field('descr'); ?>
                </div>
                <div class="input-group plus-minus-group">
                  <button class="btn-minus disable" data-quality="minus">-</button>
                  <input class="product-quantity" type="number" value="1">
                  <button class="btn-plus" data-quality="plus">+</button>
                </div>
                <div class="product-list__price">
                  <h5 class="current-price">Цена: <span class="price-value"><?php the_sub_field('price'); ?></span>  руб.</h5>
                </div>
              </div>
            </div>
            <div class="btns-wrap">
              <?php if (get_field('btn_equipment', $page_id)) :  ?>
                <a data-fancybox data-src="#popupToSetEquipment" href="javascript:;" data-touch="false" class="btn btn-common btn_set">Оснащение</a>
              <?php endif; ?>
              <?php if (get_field('btn_select_print', $page_id)) :  ?>
                <a data-fancybox data-src="#popupToSetPrint" href="javascript:;" data-touch="false" class="btn btn-common btn_print">Выбор печати</a>
              <?php endif; ?>
              <a data-fancybox="" data-src="#productCardForm" href="javascript:;" class="btn btn-base-gradient btn-order">Заказать</a>
            </div>
          </li>
        <?php endwhile; ?>
      </ul>
    <?php endif; ?>
  <?php endwhile; ?>
<?php endif; ?>