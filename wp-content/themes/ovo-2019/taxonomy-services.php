
<?php include('header.php'); ?>


  <section class='page-content'>

    <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>

        <?php
          $taxonomy = get_queried_object();
        ?>
   
        <section class='page-section tax'>
        <div class='inner-column'>

          <h2><?php echo $taxonomy->name; ?></h2>

          <p>You <em>could</em> have a page for each service</p>

          <div class='x'>
            <?php if ($taxonomy->name == 'Video') { ?>
              
              custom content about 'video'
              
            <?php } ?>

            <?php if ($taxonomy->name == 'Digital') { ?>
              
              custom content about 'digital'
              
            <?php } ?>

            <?php if ($taxonomy->name == 'Branding') { ?>
              
              custom content about 'branding'
              
            <?php } ?>
          </div>

        </div>
        </section>

      <?php endwhile; ?>
    <?php endif; ?>

  </section>


<?php include('footer.php'); ?>
