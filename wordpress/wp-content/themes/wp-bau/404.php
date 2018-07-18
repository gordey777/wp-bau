<?php get_header(); ?>
    <div class="wrapper">
      <div class="container">
        <div class="content">
            <h1 class="ctitle"><?php _e( 'Page not found', 'wpeasy' ); ?></h1>
            <h2><a href="<?php echo home_url(); ?>"><?php _e( 'Return home?', 'wpeasy' ); ?></a></h2>
        </div>
        <?php get_sidebar(); ?>
      </div>
    </div>
    <div class="background">
      <div class="pattern"></div>
    </div>
<?php get_footer(); ?>

