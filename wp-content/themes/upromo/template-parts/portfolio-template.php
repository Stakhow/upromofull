<!--region ПРИМЕРЫ РАБОТ-->
<?php if(get_field('portfolio_show', $page_id)) : ?>
  <div class="examples-of-work">
    <div class="section-head">
      <small>ПОРТФОЛИО</small>
      <h2>ПРИМЕРЫ РАБОТ</h2>
    </div>
    <div class="flex-wrap">
      <?php if( have_rows('portfolio_list', $page_id) ): ?>
        <?php while( have_rows('portfolio_list', $page_id) ): the_row(); ?>
          <a href="<?php the_sub_field('img'); ?>" data-fancybox="images">
            <img src="<?php the_sub_field('img'); ?>" alt="" />
            <div class="examples-of-work__descr">
              <?php the_sub_field('descr'); ?>
            </div>
          </a>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </div>
<?php endif; ?>
<!--endregion-->