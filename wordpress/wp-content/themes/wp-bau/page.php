<?php get_header(); ?>
  <?php if (have_posts()): while (have_posts()) : the_post(); ?>
    <div class="wrapper">
      <div class="container">
        <div id="post-<?php the_ID(); ?>" <?php post_class('content'); ?>>
          <h1><?php the_title(); ?></h1><?php edit_post_link(); ?>
          <?php the_content(); ?>
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
