<?php include('header.php'); ?>


  <section class='page-content'>

    <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>

        <header>
          <h1><?php the_title(); ?></h1>
        </header>

        <article>
          <?php the_content(); ?>
        </article>

      <?php endwhile; ?>
    <?php endif; ?>

  </section>


<?php include('footer.php'); ?>