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
            <h1><?php the_title(); ?></h1>
            <a href="<?php echo $thumbFull; ?>" rel="zoom" class="news-zoom-image"><img src="<?php echo $thumbFull; ?>" class="news-image" alt="<?php the_title(); ?>"></a>
            <?php the_content(); ?>
            <p>Проект: <a href="https://kauper.com.ua/projects/kjbk/" class="project-link" data-start="01.08.17" data-works="отделочные работы" data-scope="78 000" data-client="ФК Столица" data-city="Киев" data-image="7c8a836a659fd22">Многоквартирный жилой дом 26-эт. Троещина</a>
            </p>
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
