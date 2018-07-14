<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

<div id="primary" class="content-area container">
	<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<h1><?php the_title() ?></h1>
			<?php the_content() ?>
		<?php endwhile; ?>
	<?php else: ?>
		Записей нет.
	<?php endif; ?>

</main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>