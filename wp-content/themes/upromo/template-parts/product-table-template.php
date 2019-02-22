<?php if( have_rows('product_table', get_the_ID()) ): ?>
  <?php while( have_rows('product_table', get_the_ID()) ): the_row(); ?>
    <?php $if_added_order_btn = get_sub_field('product_table_btn'); ?>
    <div class="product-table">
      <div class="product-table__wrap">
        <div class="product-table__title">
          <h6><?php the_sub_field('product_table_title'); ?></h6>
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
                            <a data-fancybox="" data-src="#productTableForm" href="javascript:;" class="btn btn-common btn-order">ЗАКАЗАТЬ</a>
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
  <?php endwhile; ?>
<?php endif; ?>