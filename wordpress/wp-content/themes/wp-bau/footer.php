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

<?php if( is_page_template('page-projects.php')):

  $projectsData = new WP_Query(array(
    'post_type'      => 'project',
    //'cat'      => $curr__ID,
    'orderby'    => 'date',
    'order'    => 'DESC',
    'posts_per_page' => -1,
    //'numberposts' => -1,
  ));
  if ($projectsData->have_posts()):
  //var_dump($projectsData);
  $proData = '<script>';
        $proData .= 'proData = [';
          while ($projectsData->have_posts()) : $projectsData->the_post();
            $k = 0;
            if ( has_post_thumbnail()) {
              $gallArr[$k] = get_the_post_thumbnail_url(get_the_ID(), 'small');
              $gallFull[$k] = get_the_post_thumbnail_url(get_the_ID(), 'full');
              $k++;
            }
            $projGall = get_field('proj_gallery');
            $gallList = '';
            $gallFullList = '';
            if ($projGall) {
              foreach ($projGall as $projImg) {
                $gallArr[$k] = $projImg['sizes']['small'];
                $gallFull[$k] = $projImg['url'];
                $k++;
              }
              $gallList = implode(",", $gallArr);
              $gallFullList = implode(",", $gallFull);
            }
            $dateS = get_field('star_data', false, false);
            $dateS = new DateTime($dateS);
            $dataStart = $dateS->format('j.m.Y');
            $dataEnd = '';
            if(get_field('end_data')){
              $dateE = get_field('end_data', false, false);
              $dateE = new DateTime($dateE);
              $dataEnd = $dateE->format('j.m.Y');
            }
            $location = get_field('location');

            $proData .= "[" . $location['lat'] . "," . $location['lng'] . "," . get_field('map_icon')  . ",'" .  get_the_title() . "','" . $dataStart . "','" . $dataEnd . "','" . get_field('serv_type') . "','" . get_field('serv_volume') . "','" . get_field('city') . "','" . get_field('customer') . "','" . $post->post_name . "','" . $gallList . "','" . $gallFullList . "'],";
          endwhile;
          wp_reset_postdata();
        $proData .= '];';
    $proData .= '</script>';
    echo $proData;
  endif;
endif;
?>


</body>
</html>
