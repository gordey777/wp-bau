<?php
/*
Template Name:  News With Project
Template Post Type: post
*/
get_header(); ?>

  <?php if (have_posts()): while (have_posts()) : the_post(); ?>
   <?php  $thumb = catchFirstImage();
   $thumbFull = catchFirstImage();
    if ( has_post_thumbnail()) {
      $thumb = get_the_post_thumbnail_url(get_the_ID(), 'medium');
      $thumbFull = get_the_post_thumbnail_url(get_the_ID(), 'full');
    }
    $category = get_the_category();
    $curr_term = 'category_' . $category[0]->cat_ID;
   ?>

    <div class="wrapper">
      <div class="container">
        <div  id="post-<?php the_ID(); ?>" <?php post_class('content'); ?>>
          <div class="news-date"> <?php the_time('d F Y'); ?></div>
          <div class="news-content">
            <h1><?php the_title(); ?></h1><?php edit_post_link(); ?>
            <a href="<?php echo $thumbFull; ?>" rel="zoom" class="news-zoom-image"><img src="<?php echo $thumbFull; ?>" class="news-image" alt="<?php the_title(); ?>"></a>
            <?php the_content(); ?>

            <?php $proj = get_field('news_project');
            if($proj):
              $thumb = catchFirstImage($proj);
              $thumbFull = catchFirstImage($proj);
              if ( has_post_thumbnail()) {
                $thumb = get_the_post_thumbnail_url($proj, 'medium');
                $thumbFull = get_the_post_thumbnail_url($proj, 'full');
              } else if (get_field('proj_gallery', $proj)) {
                $thg = get_field('proj_gallery', $proj);
                $thumb = $thg[0]['sizes']['medium'];
                $thumbFull = $thg[0]['url'];
              }
              $dateS = get_field('star_data', $proj, false, false);
              $dateS = new DateTime($dateS);
              $dataStart = 'data-start="' . $dateS->format('j.m.Y') .'"';
              $dateE = get_field('end_data', $proj, false, false);
              $dateE = new DateTime($dateE);
              $dataEnd = 'data-end="' . $dateE->format('j.m.Y') .'"';
              ?>

              <p>Проект: <a href="<?php the_permalink($proj); ?>" class="project-link" alt="<?php echo get_the_title($proj); ?>" <?php echo $dataStart; ?> data-works="<?php the_field('serv_type', $proj); ?>" data-scope="<?php the_field('serv_volume', $proj); ?>" data-client="<?php the_field('customer', $proj); ?>" data-city="<?php the_field('city', $proj); ?>" data-photo="<?php echo $thumbFull; ?>"><?php echo get_the_title($proj); ?>. <?php the_field('city', $proj); ?></a></p>
            <?php endif; ?>
          </div>
        </div>
        <?php get_sidebar(); ?>
      </div>
    </div>
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
