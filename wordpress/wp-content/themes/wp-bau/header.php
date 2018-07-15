<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?php wp_title( '' ); ?><?php if ( wp_title( '', false ) ) { echo ' :'; } ?> <?php bloginfo( 'name' ); ?></title>

  <link href="http://www.google-analytics.com/" rel="dns-prefetch"><!-- dns prefetch -->

  <!-- icons -->
  <link href="<?php echo get_template_directory_uri(); ?>/favicon.ico" rel="shortcut icon">

  <!--[if lt IE 9]>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/selectivizr/1.0.2/selectivizr-min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- css + javascript -->
  <?php wp_head(); ?>
</head>

<?php $front__id = (int)(get_option( 'page_on_front' )); ?>

<body id="" <?php body_class('cursor ru'); ?>>

  <div class="print-header">
    <img src="<?php echo get_template_directory_uri(); ?>/img/kauper-logo.png" width="130" height="82" alt="Kauper">
    <?php the_field('print_text', $front__id); ?>
  </div>
  <div class="header">
    <h1 class="logo"><?php if ( !is_front_page() && !is_home() ){ ?><a href="<?php echo home_url(); ?>"><?php } else { echo '<span>';} the_field('header_slogan', $front__id);  if ( !is_front_page() && !is_home() ){ echo '</a>';} else { echo '</span>';}?></h1>
    <div class="main-menu">
      <?php wpeHeadNav(); ?>

      <ul class="langs">
<!--         <li class="ru active"><span>РУ</span></li>
        <li class="uk"><a href="/uk/">УК</a></li>
        <li class="en"><a href="/en/">EN</a></li> -->
      </ul>
    </div>
  </div>
