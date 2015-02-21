<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>
		<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__( '%s', 'leniypaper' ), the_title_attribute('echo=0')); ?>"><h1 class="entry-title"><?php the_title(); ?></h1></a>
			<?php endwhile; ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
