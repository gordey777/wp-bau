 <?php $front__id = (int)(get_option( 'page_on_front' )); ?>

  <div class="footer fixed">
    <div class="copyrights">
      <small>© 2007–<?php echo date("Y"); ?> Kauper. <span>All rights reserved.</span></small>
      <small class="cawas">Developed by <a href="http://cawas.com/" target="_blank">Cawas Ltd</a>.</small>
    </div>

    <?php if( have_rows('socials', $front__id)): ?>
      <div class="social">
        <?php while ( have_rows('socials', $front__id) ) : the_row(); ?>
          <a href="<?php the_sub_field('link'); ?>" class="social-item fa <?php the_sub_field('icon'); ?>" title="<?php the_sub_field('title'); ?>" target="_blank"></a>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>

  </div>
  <div class="loader"></div>

  <?php wp_footer(); ?>
<!--   <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/js.js"></script> -->
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.marquee.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.cycle.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/photoswipe.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/core.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZF31krTQH_5QnEpdIsEgmsBV-Iy884rE"></script>
  <script>
  var projectWorks = 'Виды работ';
  var projectScope = 'Объем работ';
  var projectDate = 'Время работ';
  var projectCity = 'Населенный пункт';
  var projectM = 'м';
  var projectFrom = 'с';
  var projectTo = 'по';
  var projectNow = 'текущий день';
  var projectClient = 'Заказчик';
  var projectMore = 'Подробнее';
  var careerAlert = 'Пожалуйста, заполните все поля.';
  var careerEmailAlert = 'Пожалуйста, введите правильный адрес вашей электронной почты.';

  </script>
</body>
</html>
