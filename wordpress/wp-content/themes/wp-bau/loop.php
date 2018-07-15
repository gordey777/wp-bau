<?php if (have_posts()): while (have_posts()) : the_post(); ?>
 <?php  $thumb = catchFirstImage();
  if ( has_post_thumbnail()) {
    $thumb = get_the_post_thumbnail_url(get_the_ID(), 'medium');
  }
 ?>

  <dd id="post-<?php the_ID(); ?>" <?php post_class('looper'); ?>>
    <a rel="nofollow" class="feature-img" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
        <img src="<?php echo $thumb; ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
    </a>
    <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
    <small><?php the_time('j F Y'); ?></small>
    <?php //wpeExcerpt('wpeExcerpt40'); ?>
  </dd>
<?php endwhile; endif; ?>
