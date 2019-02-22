<section class="feedback" style="background-image: url(<?php the_field('feedback_background', 8) ?>)">
  <div class="container">
    <div class="feedback-form">
      <div class="section-head">
        <?php the_field('feedback_title', 8) ?>
      </div>
      <?php echo do_shortcode('[contact-form-7 id="6" title="Свяжитесь с нами (форма на каждой странице)"]'); ?>
    </div>
  </div>
</section>

