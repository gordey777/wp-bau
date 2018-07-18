<?php get_header(); ?>
    <div class="wrapper">
      <div class="container">
        <div class="content">
          <h1 class="search-title inner-title"><?php echo sprintf( __( '%s Search Results for ', 'wpeasy' ), $wp_query->found_posts ); echo get_search_query(); ?></h1>
          <?php get_template_part('loop'); ?>
          <?php get_template_part('pagination'); ?>
        </div>
      </div>
    </div>
    <div class="background">
      <div class="pattern"></div>
    </div>
<?php get_footer(); ?>


