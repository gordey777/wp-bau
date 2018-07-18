<?php
/*
Template Name: News Page
Template Post Type: page
*/
get_header(); ?>
  <?php
  $front__id = (int)(get_option( 'page_on_front' ));
  $curr__ID = get_field('category_id');
  $curr_term = 'category_' . $curr__ID;
  $front__id = (int)(get_option( 'page_on_front' ));
  $cat_title =  get_queried_object()->name;
  ?>

  <div class="wrapper">
    <div class="container">
      <div class="content">
        <h1><?php echo $cat_title; ?></h1>
        <dl class="news list">
          <?php get_template_part('loop'); ?>
        </dl>
        <?php get_template_part('pagination'); ?>
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

<?php get_footer(); ?>

