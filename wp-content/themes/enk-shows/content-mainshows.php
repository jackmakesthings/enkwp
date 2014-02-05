<?php
/*
 Template Name: ENK SHOWS MAIN
 *
 * This page is for the main enk shows page (the homepage)
 *
 * @package ENK Shows
 */

get_header(); ?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
    <h1>this is a enkshows mainshow template</h1>
      <?php while ( have_posts() ) : the_post(); ?>
        
        <?php get_template_part( 'content', 'page' ); ?>
        <?php get_template_part( 'content', 'press' ); ?>
        <?php get_template_part( 'content', 'client-testimonial' ); ?>

      <?php endwhile; // end of the loop. ?>

    </main><!-- #main -->
  </div><!-- #primary -->


