<?php if (have_posts()): while (have_posts()) : the_post(); ?>
  <dd id="post-<?php the_ID(); ?>" <?php post_class('looper'); ?>>
    <a rel="nofollow" class="feature-img" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
      <?php if ( has_post_thumbnail()) { ?>
        <img src="<?php echo the_post_thumbnail_url('medium'); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
      <?php } else { ?>
        <img src="<?php echo catchFirstImage(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
      <?php } ?>
    </a>
    <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
    <small><?php the_time('j F Y'); ?></small>
    <?php //wpeExcerpt('wpeExcerpt40'); ?>
  </dd>
<?php endwhile; endif; ?>
