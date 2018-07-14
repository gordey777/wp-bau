<?php /* Template Name: Home Page */ get_header(); ?>
<?php $front__id = (int)(get_option( 'page_on_front' )); ?>
<?php if (have_posts()): while (have_posts()) : the_post(); ?>
  <?php if( have_rows('main_slider') ):
            $img_title = get_field('main_slider');
            $img_subtitle = get_field('main_slider');
            ?>

    <div class="background">
      <div class="cycle-slideshow" data-cycle-fx="tileSlide" data-cycle-tile-count="10" data-cycle-tile-vertical="false" data-cycle-timeout="6000">
        <?php while( have_rows('main_slider') ): the_row();
          $image = get_sub_field('img');
          ?>
          <img src="<?php echo $image['url']; ?>" title="<?php the_sub_field('title'); ?>" alt="<?php the_sub_field('subtitle'); ?>">
        <?php endwhile; ?>
      </div>
      <div class="pattern"></div>
      <div class="cycle-caption">
        <h3><?php echo $img_title[0]['title']; ?></h3>
        <p><?php echo $img_subtitle[0]['subtitle']; ?></p>
      </div>
    </div>
  <?php endif; ?>

  <div class="container">
    <div class="line">
      <?php if( have_rows('services_nav') ): ?>
        <?php $i = 0; ?>
        <div class="services">
          <?php while( have_rows('services_nav') ): the_row();?>
            <?php $i++; ?>
            <a href="<?php the_sub_field('link'); ?>" class="service-<?php echo $i; ?>"><i></i><b><?php the_sub_field('title'); ?></b></a>
          <?php endwhile; ?>
        </div>
      <?php endif; ?>
      <?php if( have_rows('serv_slider') ): ?>
        <?php $k = 0; ?>
        <div class="citation">
          <?php while( have_rows('serv_slider') ):
            the_row();
            $serv_class = '';
            if($k == 0){
              $serv_class = 'class="active"';
            }
            ?>
            <div <?php echo $serv_class; ?>>
              <h2><?php the_sub_field('title'); ?></h2>
              <p><?php the_sub_field('desc'); ?></p>
            </div>
            <?php $k++; ?>
          <?php endwhile; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>


  <?php if (get_field('news_category')):
    $category_link = get_category_link( get_field('news_category') );

    $newsargs = array(
      'numberposts' => 5,
      'category'    => get_field('news_category'),
      'orderby'     => 'date',
      'order'       => 'DESC',
      'post_type'   => 'post',
      'suppress_filters' => true,
    );

    $news = get_posts( $newsargs );
    ?>
    <div class="last-news">
      <div class="title"><a href="<?php echo $category_link; ?>">Новости</a></div>
      <div class="news-marquee">
      <?php foreach($news as $post){
        setup_postdata($post);?>
          <b><?php the_time('j F'); ?> </b>
          <a data-photo="<?php echo the_post_thumbnail_url('medium', get_the_ID()); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?php }
        wp_reset_postdata();?>
      </div>
    </div>
  <?php endif; ?>

</html>

  <?php endwhile; endif; ?>

<?php get_footer(); ?>
