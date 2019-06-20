
<?php include('header.php'); ?>


  <section class='page-content'>

    <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>

        <?php
          $taxonomy = get_queried_object();
        ?>
   
        <section class='page-section tax'>
        <div class='inner-column'>

          <h2>404</h2>

          <p>This page doesn't exist. Should it say something? Or redirect? or what / when?</p>

        </div>
        </section>

      <?php endwhile; ?>
    <?php endif; ?>

  </section>


<?php include('footer.php'); ?>
