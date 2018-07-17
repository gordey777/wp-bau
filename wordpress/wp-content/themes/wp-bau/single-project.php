<?php get_header(); ?>

  <?php if (have_posts()): while (have_posts()) : the_post();
    $category = get_the_category();
    $curr_term = 'category_' . $category[0]->cat_ID;
    $catLink = get_category_link( $category[0]->cat_ID);

    $projGall = get_field('proj_gallery');
    $stageGall = get_field('stages_gallery');
    $stepClass = 'no-steps';
    if($stageGall){
      $stepClass = 'close-steps';
    }

    $next_post = get_next_post();
    $prev_post = get_previous_post();
    $next_link = '<span class="next"></span>';
    $prev_link = '<span class="prev"></span>';
    if( ! empty($next_post) ){
    $next_link = '<a href="' . get_permalink( $next_post ) . '" data-postid="' . $next_post->ID . '" class="next"></a>';
    }
    if( ! empty($prev_post) ){
    $prev_link = '<a href="' . get_permalink( $prev_post ) . '" data-postid="' . $prev_post->ID . '" class="prev"></a>';
    }
    ?>
    <div class="wrapper">
      <div class="container">
        <div class="content">
          <div class="project-body <?php echo $stepClass ?>">
            <div class="project-nav">
              <div><?php echo $prev_link; ?></a><a  id="to_projects" href="/projects" class="to_projects"></a><?php echo $next_link; ?></div>
            </div>
            <h1><?php the_title(); ?></h1>
            <div class="project-cycle-wrap">
              <div class="project-cycle">
                <?php if ( has_post_thumbnail()) {
                    $thumb = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                    $thumbFull = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
                    <a href="<?php echo $thumbFull ?>"><img src="<?php echo $thumb ?>" alt="" /></a>
                <?php } ?>

                <?php if ($projGall) {
                  foreach ($projGall as $projImg) { ?>
                    <a href="<?php  echo $projImg['url']; ?>"><img src="<?php  echo $projImg['sizes']['medium']; ?>" alt="" /></a>
                  <?php } ?>
                <?php } ?>
              </div>
              <div class="project-cycle-pager-wrap">
                <div class="project-cycle-pager-scroll">
                  <div class="project-cycle-pager"></div>
                </div>
              </div>
            </div>
            <div class="project-text">
              <p class="project-info">
                <?php $dateS = get_field('star_data', false, false);
                $dateS = new DateTime($dateS);
                $dataStart = $dateS->format('j F Y'); ?>
                <b>Виды работ:</b> <?php the_field('serv_type'); ?><br />
                <b>Объем работ:</b> <?php the_field('serv_volume'); ?> м²<br />
                <b>Дата начала работ:</b> <?php echo $dataStart; ?><br />
                <?php if(get_field('end_data')){
                  $dateE = get_field('end_data', false, false);
                  $dateE = new DateTime($dateE);
                  $dataEnd = $dateE->format('j F Y'); ?>
                  <b>Дата окончания работ:</b> <?php echo $dataEnd; ?><br />
                <?php } ?>
                <b>Населенный пункт:</b> <?php the_field('city'); ?><br />
                <b>Заказчик:</b> <?php the_field('customer'); ?><br />
              </p>
              <p class="project-descr"><?php the_content(); ?></p>
            </div>
            <?php if ($stageGall) { ?>
              <div class="steps-wrap">
                <h3>Ход работ</h3>
                <div class="projects-line steps">
                  <div class="scroll-left"></div>
                  <div class="scroll-right"></div>
                  <div class="scroll">
                      <?php foreach ($stageGall as $projImg) { ?>
                        <a href="<?php  echo $projImg['url']; ?>"><img src="<?php  echo $projImg['sizes']['medium']; ?>" alt="" /></a>
                      <?php } ?>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>


    <div id="map-hint"></div>
    <div class="background">
      <?php if(get_field('categiry_bg', $curr_term)){ ?>
        <div class="cycle-slideshow">
          <img src="<?php the_field('categiry_bg', $curr_term); ?>" alt="">
        </div>
      <?php } ?>
      <div class="pattern"></div>
    </div>
  <?php endwhile; endif; ?>




<?php get_footer(); ?>
