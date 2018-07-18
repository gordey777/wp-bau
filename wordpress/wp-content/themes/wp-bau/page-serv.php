<?php
/*
Template Name: Service
Template Post Type: page
*/
get_header(); ?>
  <?php if (have_posts()): while (have_posts()) : the_post(); ?>
    <div class="wrapper">
      <div class="container">
        <div id="post-<?php the_ID(); ?>" <?php post_class('content'); ?>>
          <h1><?php the_title(); ?></h1><?php edit_post_link(); ?>
          <?php the_content(); ?>
          <?php if( have_rows('servise_projects') ):?>
            <?php while( have_rows('servise_projects') ): the_row();?>
              <h2><?php the_sub_field('group_titile'); ?></h2>
              <?php if( have_rows('projects_group') ):?>
                <?php while( have_rows('projects_group') ): the_row();?>
                  <h4><span class="e-yellow"><?php the_sub_field('subgroup_title'); ?></span></h4>
                  <?php if( have_rows('projects_list') ):?>
                    <div class="e-box3col works" style="text-align: center">
                      <?php $i = 0;
                      while( have_rows('projects_list') ):
                        $i++;
                        $itemClass = 'e-third';
                        if ($i == 1){
                          $itemClass = 'e-first';
                        } else if ($i == 2){
                          $itemClass = 'e-second';
                        }
                        if ($i == 3){
                          $i = 0;
                        }
                        the_row();
                        $proj = get_sub_field('item');
                        $thumb = catchFirstImage();
                        $thumbFull = catchFirstImage();
                        if ( has_post_thumbnail($proj)) {
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
                        <div class="works-item <?php echo $itemClass; ?>">
                          <p>
                            <a href="<?php the_permalink($proj); ?>">
                              <img src="<?php echo $thumb; ?>" class="project-image" alt="<?php echo get_the_title($proj); ?>" <?php echo $dataStart; ?> data-works="<?php the_field('serv_type', $proj); ?>" data-scope="<?php the_field('serv_volume', $proj); ?>" data-client="<?php the_field('customer', $proj); ?>" data-city="<?php the_field('city', $proj); ?>" data-photo="<?php echo $thumbFull; ?>">
                            </a>

                            <?php if(get_sub_field('desc')){ ?><br><span class="e-yellow"><?php the_sub_field('desc'); ?></span><?php } ?>
                          </p>
                        <?php if ($i == 3){
                          $itemClass = 'e-third';
                          $i = 0;
                        } ?>
                        </div>
                      <?php endwhile; ?>
                      <div class="e-clear"></div>
                    </div>
                  <?php endif; ?>
                <?php endwhile; ?>
              <?php endif; ?>
            <?php endwhile; ?>
          <?php endif; ?>
          <p style="text-align: center"><?php the_field('after_content'); ?></p>
        </div>
        <?php get_sidebar(); ?>
      </div>
    </div>
    <div class="background">
      <?php if ( has_post_thumbnail()) {
        $thumbFull = get_the_post_thumbnail_url(get_the_ID(), 'full');?>
        <div class="cycle-slideshow">
          <img src="<?php echo $thumbFull;?>" alt="">
        </div>
      <?php }?>
      <div class="pattern"></div>
    </div>
  <?php endwhile; endif; ?>

<?php get_footer(); ?>
