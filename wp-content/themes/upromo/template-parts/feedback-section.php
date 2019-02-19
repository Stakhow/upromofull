<section class="feedback" style="background-image: url(<?php the_field('feedback_background', 8) ?>)">
  <div class="container">
    <div class="feedback-form">
      <div class="section-head">
        <?php the_field('feedback_title', 8) ?>
      </div>

      <form action="">
        <div class="input-group">
          <div class="input-field">
            <label for="">Ваше имя</label>
            <input type="text" placeholder="Введдите ваше имя">
          </div>
          <div class="input-field">
            <label for="">Номер телефона</label>
            <input type="tel" placeholder="Ваш номер телефона">
          </div>
          <button class="btn btn-common" type="submit">Отправить</button>
        </div>
      </form>
    </div>
  </div>
</section>