<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__( '%s', 'leniypaper' ), the_title_attribute('echo=0')); ?>"><h1 class="entry-title"><?php the_title(); ?></h1></a>
		
		<?php edit_post_link( __( 'Edit', 'leniypaper' ), '<span class="edit-link">', '</span>' ); ?>
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div>
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'leniypaper' ) ); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'leniypaper' ),
				'after'  => '</div>',
			) );
		?>
	</div>
	<?php endif; ?>

</article><!-- #post-## -->