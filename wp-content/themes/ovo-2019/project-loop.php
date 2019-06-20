
<?php

$args = array(
  'post_type' => 'project',
  'orderby' => 'date',
  'order'=> 'ASC'
); 
$the_query = new WP_Query( $args );

?>


<?php if ( $the_query->have_posts() ) : ?>

  <!-- pagination here -->

  <ol class='course-list'>
  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); 

    ?>

    <li class='project'>
      <article class='content'>

        <figure class='graphic'>
          ...
        </figure>


        <h2 class='title'><?php the_title(); ?></h2>

      </article>
    </li>

  <?php endwhile; ?>
  </ol>

  <!-- pagination here -->

  <?php wp_reset_postdata(); ?>

<?php else : ?>
  <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
