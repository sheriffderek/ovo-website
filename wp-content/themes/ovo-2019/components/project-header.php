
<?php
  $lockup = get_sub_field('project_lockup')['url'];
  $lockupAlt = get_sub_field('project_lockup')['alt'];
  $introduction = get_sub_field('project_introduction');
  $servicesList = get_the_term_list( $post->ID, 'services' );
?>


<figure class='lockup'>
  <img src='<?= $lockup ?>' alt='<?= $lockupAlt ?>' />
</figure>

<article class='introduction'>
  <?= $introduction ?>
</article>

<aside class='services'>
  <h3 class='heading'>Project Services</h3>

  <div class='list'>
    <?= $servicesList ?>
  </div>
</aside>

<aside>
  <?php 
    $the_query = new WP_Query( array(
      'post_type' => 'projects',
      'tax_query' => array(
        array (
          'taxonomy' => 'services',
          'field' => 'slug',
        )
      ),
    ));

    while ( $the_query->have_posts() ) :
      $the_query->the_post(); ?>

      $post

  <?php endwhile;

  /* Restore original Post Data 
   * NB: Because we are using new WP_Query we aren't stomping on the 
   * original $wp_query and it does not need to be reset.
  */
  wp_reset_postdata(); ?>

</aside>
