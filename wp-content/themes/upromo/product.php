<?php
/*
  * Template Name: Станица товара
  */

?>

<?php get_header();

global $wp_query;

?>

<section class="common-section product">
  <div class="container">
    <div class="main-wrap">

      <!--SIDEBAR-->
      <aside class="sidebar">
        <div class="sidebar-item">
          <h5>Полиграфия</h5>
          <ul>
            <li><a href="#">Визитки</a>
            </li>
            <li><a href="#">Листовки и флаеры</a>
            </li>
            <li><a href="#">Афиши и плакаты</a>
            </li>
            <li><a href="#">Буклеты и брошюры</a>
            </li>
            <li><a href="#">Календари</a>
            </li>
            <li><a href="#">Открытки</a>
            </li>
            <li><a href="#">Журналы и газеты</a>
            </li>
            <li><a href="#">Книги и блокноты</a>
            </li>
            <li><a href="#">Бланки и каталоги</a>
            </li>
            <li><a href="#">Бумажные пакеты</a>
            </li>
            <li><a href="#">Стикеры, наклейки и этикетки</a>
            </li>
            <li><a href="#">Подарочная картонная упаковка</a>
            </li>
            <li><a href="#">Конверты</a>
            </li>
          </ul>
        </div>

        <div class="sidebar-item">
          <h5>Сувенирная продукция</h5>
          <ul>
            <li><a href="#">Сувенирная продукция</a>
            </li>
          </ul>
        </div>

        <div class="sidebar-item">
          <h5>Рекламно-выставочное
            оборудование</h5>
          <ul>
            <li><a href="#">Press-wall</a>
            </li>
            <li class="current-menu-item"><a href="#">Roll-up</a>
            </li>
            <li><a href="#">Pop-up</a>
            </li>
            <li><a href="#">Баннерные стенды</a>
            </li>
            <li><a href="#">Штендеры</a>
            </li>
            <li><a href="#">Ценникодержатели</a>
            </li>
            <li><a href="#">Карманы для печатной продукции</a>
            </li>
            <li><a href="#">Буклетницы рекламные</a>
            </li>
            <li><a href="#">Стойки (напольные)</a>
            </li>
            <li><a href="#">Многорамочные системы</a>
            </li>
            <li><a href="#">Рамки для информации</a>
            </li>
            <li><a href="#">Диспенсеры таблички</a>
            </li>
            <li><a href="#">Настенные информационные стенды</a>
            </li>
          </ul>
        </div>
        <div class="sidebar-item">
          <h5>НАРУЖНАЯ РЕКЛАМА</h5>
          <ul>
            <li><a href="#">Объёмные буквы</a>
            </li>
            <li><a href="#">Светодиодные вывески</a>
            </li>
            <li><a href="#">Световые короба</a>
            </li>
            <li><a href="#">Изготовление вывесок</a>
            </li>
          </ul>
        </div>

      </aside>

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
          <a href="#" class="btn btn-common">Заказать</a>
        </div>
        <article class="product__article">
          <?php the_post(); ?>
          <?php the_content(); ?>
        </article>


        <?php
        $get_table = get_field('product_table');

//                        echo "<pre>";
//                            echo (key($get_table));
//                        echo "</pre>";
//                        die();


        ?>
        <?php if( have_rows('product_table', get_the_ID()) ): ?>
          <?php while( have_rows('product_table', get_the_ID()) ): the_row(); ?>
            <div class="product-table">
              <div class="product-table__wrap">
                <div class="product-table__title">
                  <h6><?php the_sub_field('product_table_title'); ?></h6>
                </div>
                <div class="flex-wrap">
                  <div class="product-table__info">
                    <ul>
                      <?php $count = 0;
                      ?>
                      <?php if( have_rows('table_body') ): ?>
                        <?php while( have_rows('table_body') ): the_row(); ?>
                          <li class="table-row">
                            <?php if( have_rows('row')) : ?>
                              <?php while( have_rows('row')) : the_row(); ?>
                                <div class="table-cell"><?php the_sub_field('cell'); ?></div>

                              <?php endwhile; ?>
                            <?php endif; ?>
                            <?php
                            $count++;
                            if(!$count): ?>
                              <div class="table-cell">
                                <a data-fancybox="" data-src="#popupToFillForm" href="javascript:;" class="btn btn-common">ЗАКАЗАТЬ</a>
                              </div>
                            <?php endif;

                            ?>

                          </li>
                        <?php endwhile; ?>
                      <?php endif; ?>


                    </ul>
                  </div>
                </div>
              </div>
            </div>

          <?php endwhile; ?>
        <?php endif; ?>





        <!--region ПРИМЕРЫ РАБОТ-->
        <div class="examples-of-work">
          <div class="section-head">
            <small>ПОРТФОЛИО</small>
            <h2>ПРИМЕРЫ РАБОТ</h2>
          </div>
          <div class="flex-wrap">
            <a href="images/exmpls-of-works__full.jpg" data-fancybox="images">
              <img src="images/exmpls-of-works__1.jpg" alt="" />
              <div class="examples-of-work__descr">
                <h3>Pop-Up 300 x 300 см</h3>
                <p>Выставка веб-технологий, г.Москва</p>
              </div>
            </a>
            <a href="images/exmpls-of-works__full.jpg" data-fancybox="images">
              <img src="images/exmpls-of-works__2.jpg" alt="" />
              <div class="examples-of-work__descr">
                <h3>Pop-Up 300 x 300 см</h3>
                <p>Выставка веб-технологий, г.Ростов</p>
              </div>
            </a>
            <a href="images/exmpls-of-works__full.jpg" data-fancybox="images">
              <img src="images/exmpls-of-works__3.jpg" alt="" />
              <div class="examples-of-work__descr">
                <h3>Pop-Up 300 x 300 см</h3>
                <p>Выставка веб-технологий, г.Воронеж</p>
              </div>
            </a>
          </div>
        </div>
        <!--endregion-->

      </main>
    </div>
  </div>

</section>


<!--region СВЯЖИТЕСЬ С НАМИ-->
  <?php get_template_part(TP. 'feedback-section') ?>
<!--endregion-->


<?php get_footer(); ?>