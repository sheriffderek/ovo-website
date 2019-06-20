<?php include('header.php'); ?>


  <section class='page-content'>

    <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>

        <?php
          $brand = the_field('project_lockup')['url'];
        ?>

        <section class='page-section'>
          <?php include('components/page-section-loop.php'); ?>
        </section>

      <?php endwhile; ?>
    <?php endif; ?>

  </section>


<?php include('footer.php'); ?>