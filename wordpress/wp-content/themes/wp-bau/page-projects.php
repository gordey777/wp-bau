<?php
/*
Template Name: All Projects
Template Post Type: page
*/
get_header(); ?>

  <?php
  $front__id = (int)(get_option( 'page_on_front' ));

  $query = new WP_Query(array(
    'post_type'      => 'project',
    //'cat'      => $curr__ID,
    'orderby'    => 'date',
    'order'    => 'DESC',
    'posts_per_page' => -1,
  ));
  ?>
  <?php if (have_posts()): while (have_posts()) : the_post(); ?>

  <div class="wrapper">
    <div class="container">
      <div  id="post-<?php the_ID(); ?>" <?php post_class('content'); ?>>
        <div id="projects-main">
          <h1 class="for-print"><?php the_title(); ?></h1>
          <div id="projects-map"></div>
          <div id="project-details" class="start">
            <div class="map-info"><?php the_content(); ?></div>
            <i></i>
          </div>


          <?php if ($query->have_posts()): ?>
            <?php $i = 0;?>

            <div class="projects-line">
              <div class="scroll-left"></div>
              <div class="scroll-right"></div>
              <div class="scroll">
                <?php while ($query->have_posts()) :
                  $query->the_post();
                  if (!get_field('end_data')):
                    $thumb = catchFirstImage();
                    $thumbFull = catchFirstImage();
                    if ( has_post_thumbnail()) {
                      $thumb = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                      $thumbFull = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    } else if (get_field('proj_gallery')) {
                      $thg = get_field('proj_gallery');
                      $thumb = $thg[0]['sizes']['medium'];
                      $thumbFull = $thg[0]['url'];
                    }
                    $category = get_the_category();
                    $curr_term = 'category_' . $category[0]->cat_ID;

                    $dateS = get_field('star_data', false, false);
                    $dateS = new DateTime($dateS);
                    $dataStart = 'data-start="' . $dateS->format('j.m.Y') .'"';
                    ?>
                    <?php //the_field('proj_gallery'); ?>
                    <?php //the_field('stages_gallery'); ?>

                    <a href="<?php the_permalink(); ?>">
                      <?php if($i == 0){ ?><i>Текущие объекты</i><?php } ?>
                      <img src="<?php echo $thumb; ?>" class="project-image" alt="<?php the_title(); ?>" <?php echo $dataStart; ?> data-works="<?php the_field('serv_type'); ?>" data-scope="<?php the_field('serv_volume'); ?>" data-client="<?php the_field('customer'); ?>" data-city="<?php the_field('city'); ?>" data-photo="<?php echo $thumbFull; ?>">
                    </a>
                    <?php $i++ ?>
                  <?php endif; ?>
                <?php endwhile;?>
                <?php $i = 0; ?>
                <?php wp_reset_postdata(); ?>

                <?php while ($query->have_posts()) :
                  $query->the_post();
                  if (get_field('end_data')):
                    $thumb = catchFirstImage();
                    $thumbFull = catchFirstImage();
                    if ( has_post_thumbnail()) {
                      $thumb = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                      $thumbFull = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    } else if (get_field('proj_gallery')) {
                      $thg = get_field('proj_gallery');
                      $thumb = $thg[0]['sizes']['medium'];
                      $thumbFull = $thg[0]['url'];
                    }
                    $category = get_the_category();
                    $curr_term = 'category_' . $category[0]->cat_ID;

                    $dateS = get_field('star_data', false, false);
                    $dateS = new DateTime($dateS);
                    $dataStart = 'data-start="' . $dateS->format('j.m.Y') .'"';
                    $dateE = get_field('end_data', false, false);
                    $dateE = new DateTime($dateE);
                    $dataEnd = 'data-end="' . $dateE->format('j.m.Y') .'"';
                    ?>
                    <a href="<?php the_permalink(); ?>">
                      <?php if($i == 0){ ?><i>Реализованные объекты</i><?php } ?>
                      <img src="<?php echo $thumb; ?>" class="project-image" alt="<?php the_title(); ?>" <?php echo $dataStart; ?> <?php echo $dataEnd; ?> data-works="<?php the_field('serv_type'); ?>" data-scope="<?php the_field('serv_volume'); ?>" data-client="<?php the_field('customer'); ?>" data-city="<?php the_field('city'); ?>" data-photo="<?php echo $thumbFull; ?>">
                    </a>
                    <?php $i++ ?>
                  <?php endif; ?>
                <?php endwhile;?>
                <?php wp_reset_postdata();?>
              </div>
            </div>
          <?php endif; ?>
        </div>
        <div class="project-body hide" style="display: none">
        </div>

      </div>
    </div>
  </div>
  <div class="background">
    <?php if(get_field('categiry_bg', $curr_term)){ ?>
      <div class="cycle-slideshow">
        <img src="<?php the_field('categiry_bg', $curr_term); ?>" alt="">
      </div>
    <?php } ?>
  </div>
  <div id="map-hint"></div>
  <?php endwhile; endif; ?>




<?php get_footer(); ?>
