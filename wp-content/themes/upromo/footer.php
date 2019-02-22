<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package upromo
 */

?>

<footer class="footer">
  <div class="footer__top">
    <div class="container">
      <div class="flex-wrap">
        <div class="logo"><?php the_custom_logo(); ?></div>
        <?php
        wp_nav_menu( array(
          'theme_location'  => 'Primary',
          'menu'            => 'Menu 1',
          'container'       => 'nav',
          'container_class' => 'main-menu',
          'container_id'    => '',
          'menu_class'      => '',
          'menu_id'         => '',
          'echo'            => true,
          'fallback_cb'     => 'wp_page_menu',
          'before'          => '',
          'after'           => '',
          'link_before'     => '',
          'link_after'      => '',
          'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
          'depth'           => 0,
          'walker'          => '',
        ) );
        ?>

      </div>
    </div>

  </div>
  <div class="footer__bottom">
    <div class="container">
      <div class="flex-wrap">
        <div class="contacts">
          <a href="tel:<?php echo str_replace([' ', '-'], '', get_field('contact_tel', 8)); ?>" class="contacts__tel"><?php the_field('contact_tel', 8)?></a>
          <a href="mailto:<?php the_field('contact_mail', 8) ?>" class="contacts__mail"><?php the_field('contact_mail', 8) ?></a>
          <a href="" class="contacts__map"><?php the_field('contact_address', 8) ?></a>
        </div>
        <div class="soc-links">
          <?php if( have_rows('social_list', 8) ): ?>
            <?php while( have_rows('social_list', 8) ): the_row(); ?>
              <a href="<?php the_sub_field('link'); ?>" >
                <img class="style-svg" src="<?php the_sub_field('ico'); ?>" alt="">
              </a>
            <?php endwhile; ?>
          <?php endif; ?>
        </div>
      </div>

    </div>


  </div>
  <div class="copyrights">
    <div class="container">
      <div class="flex-wrap">
        <p>© <?php the_field('copyrights', 8) ?></p>
        <a href="#">Карта сайта</a>
      </div>
    </div>

  </div>
</footer>

<!--<Заказать>-->
<div style="display: none;" id="popupToOrder" class="popup popup_order">
  <div class="popup__top">
    <h2>Заказать</h2>
  </div>
  <div class="popup__bottom">
    <div class="feedback-form">
      <form action="">
        <div class="input-group">
          <div class="input-field">
            <input type="text" placeholder="Ваше имя">
          </div>
          <div class="input-field">
            <input type="tel" placeholder="Номер телефона">
          </div>
          <button class="btn btn-common" type="submit">Отправить</button>
        </div>
      </form>
      <div class="footnote">
        Ваши данные
        <br/>никогда не будут переданыa <a href="#"> 3-м лицам</a>
      </div>
    </div>
  </div>
</div>
<a data-fancybox data-src="#popupToOrder" href="javascript:;">Заказать</a>
<!--</Заказать>-->

<!--<Заполните форму>-->
<div style="display: none;" id="popupToFillForm" class="popup popup_order">
  <div class="popup__top">
    <h2>Заполните форму</h2>
  </div>
  <div class="popup__bottom">
    <div class="feedback-form">
      <?php echo do_shortcode('[contact-form-7 id="645" title="Форма в модальном окне"]') ?>
      <div class="footnote">
        Ваши данные<br/>
        никогда не будут переданыa <a href="#"> 3-м лицам</a>
      </div>
    </div>
  </div>
</div>
<a data-fancybox data-src="#popupToFillForm" href="javascript:;">Заполните форму</a>
<!--</Заполните форму>-->

<!--<Заполните форму с карточки товара>-->
<div style="display: none;" id="productCardForm" class="popup popup_order">
  <div class="popup__top">
    <h2>Заполните форму</h2>
  </div>
  <div class="popup__bottom">
    <div class="feedback-form">
      <?php echo do_shortcode('[contact-form-7 id="647" title="Форма с карточки товара"]') ?>
      <div class="footnote">
        Ваши данные<br/>
        никогда не будут переданыa <a href="#"> 3-м лицам</a>
      </div>
    </div>
  </div>
</div>
<a data-fancybox data-src="#popupToFillForm" href="javascript:;">Заполните форму</a>
<!--</Заполните форму>-->

<!--<Заполните форму с таблицы>-->
<div style="display: none;" id="productTableForm" class="popup popup_order">
  <div class="popup__top">
    <h2>Заполните форму</h2>
  </div>
  <div class="popup__bottom">
    <div class="feedback-form">
      <?php echo do_shortcode('[contact-form-7 id="652" title="Форма с таблицы"]') ?>
      <div class="footnote">
        Ваши данные<br/>
        никогда не будут переданыa <a href="#"> 3-м лицам</a>
      </div>
    </div>
  </div>
</div>
<a data-fancybox data-src="#popupToFillForm" href="javascript:;">Заполните форму</a>
<!--</Заполните форму>-->

<!--<Обичная форма со страницы товара, открывающаяся по клике на кнопку "Заказать">-->
<div style="display: none;" id="productSimpleForm" class="popup popup_order">
  <div class="popup__top">
    <h2>Заполните форму</h2>
  </div>
  <div class="popup__bottom">
    <div class="feedback-form">
      <?php echo do_shortcode('[contact-form-7 id="653" title="Форма со страницы товара (сверху), при клике на кнопку Заказать"]') ?>
      <div class="footnote">
        Ваши данные<br/>
        никогда не будут переданыa <a href="#"> 3-м лицам</a>
      </div>
    </div>
  </div>
</div>
<a data-fancybox data-src="#popupToFillForm" href="javascript:;">Заполните форму</a>
<!--< / Обичная форма со страницы товара, открывающаяся по клике на кнопку "Заказать">-->


<!--<СПАСИБО>-->
<div style="display: none;" id="popupGratitude" class="popup popup_gratitude">
  <div class="popup__top">
    <h2>СПАСИБО</h2>
    <p>Мы свяжемся с Вами в ближайшее время</p>
  </div>
</div>
<a data-fancybox data-src="#popupGratitude" href="javascript:;">СПАСИБО</a>
<!--</СПАСИБО>-->









<?php wp_footer(); ?>
</body>

</html>