<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package ENK Shows
 */
?>
<h1>this is content-page.php</h1>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title page-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="main">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'enk-shows' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
<!-- <?php edit_post_link( __( 'Edit', 'enk-shows' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?> -->
</article><!-- #post-## -->
