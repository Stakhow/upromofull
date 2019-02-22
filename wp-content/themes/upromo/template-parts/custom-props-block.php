<?php if(get_field('set_custom_quantity', $page_id)) : ?>
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
          <input type="number" name="qauntity" placeholder="Количество, штук">
        </div>
        <div class="input-field">
          <button class="btn btn-common" type="submit" data-fancybox="" data-src="#popupToFillForm">Продолжить</button>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>

<?php if(get_field('set_custom_size', $page_id)) : ?>
  <div class="set-custom-props">
    <div class="set-custom-props__title">
              <span>
                <img src="<?php echo get_template_directory_uri() ?>/images/ico_meter.svg" alt="">
              </span>
      <h5>Создать свой размер</h5>
    </div>
    <div class="form-wrap">
      <form action="">
        <div class="input-group">
          <div class="input-field">
            <input type="number" placeholder="Высота, см">
          </div>
          <div class="input-field">
            <input type="number" placeholder="Ширина, см">
          </div>
          <div class="input-field">
            <button class="btn btn-common" type="submit">ЗАКАЗАТЬ</button>
          </div>
        </div>
      </form>
    </div>
  </div>
<?php endif; ?>