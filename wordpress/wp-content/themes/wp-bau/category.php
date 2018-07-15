<?php get_header(); ?>



  <div class="wrapper">
    <div class="container">
      <div class="content">
        <h1>Новости</h1>
        <dl class="news list">

            <?php get_template_part('loop'); ?>

        </dl>
<?php get_template_part('pagination'); ?>
      </div>
      <?php get_sidebar(); ?>
    </div>
  </div>
  <div class="background">
    <div class="cycle-slideshow"><img src="<?php echo get_template_directory_uri(); ?>/img/kauper-bg.jpg" alt=""></div>
    <div class="pattern"></div>
  </div>

<?php get_footer(); ?>
