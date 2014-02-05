

<?php
/* 

 Template Name: Press Modules

*/
    $args = array(
      'post_type' => 'press'
    );

    
    $press = new WP_Query( $args );
    
    if( $press->have_posts() ) {
      while( $press->have_posts() ) {
        $press->the_post();
        ?>
        <figure>
          <?php the_post_thumbnail();?>" title="<?php the_title_attribute(); ?>" alt="this is alt text">
          <figcaption><a href="<?php echo get_permalink(); ?>"><?php echo the_title() ?></a></figcaption>
        </figure>
        <?php
      }
    }
    else {
      echo 'Oh ohm no products!';
    }
  ?>


  