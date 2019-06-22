
<?php

$args = array(
  'post_type' => 'projects',
  'orderby' => 'date',
  'order'=> 'ASC'
); 
$the_query = new WP_Query( $args );

?>


<?php if ( $the_query->have_posts() ) : ?>

  <!-- pagination here -->

  <ol class='landing-list'>
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

      <?php
        $poster = get_field('project_poster_image')['url'];
        $customTitle = get_field('project_custom_title');
        if ($customTitle) {
          $title = $customTitle;
        } else {
          $title = get_the_title();
        }
      ?>

      <li class='project'>
        <article class='content'>

          <aside class='project-overview'>

            <div class='half visual'>
              <figure>
                <img src='<?= $poster ?>' alt='' />
              </figure>
            </div>

            <div class='half info'>
              
              <div class='box'>
                <a href='<?php the_permalink(); ?>'>
                  <h4>View project</h4>

                  <h2 class='heading'>
                    <?= $title ?>
                  </h2>

                  <h3 class='subheading'>
                    subheading here
                  </h3>
                </a>
              </div>

            </div>
          </aside>

        </article>
      </li>

    <?php endwhile; ?>
  </ol>

  <!-- pagination here -->

  <?php wp_reset_postdata(); ?>

<?php else : ?>
  <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
