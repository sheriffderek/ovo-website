
<?php if( have_rows('page_modules') ): ?>

  <?php

  // check if the flexible content field has rows of data
  if( have_rows('page_modules') ):

     // loop through the rows of data
    while ( have_rows('page_modules') ) : the_row(); ?>



      <?php if( get_row_layout() == 'project_header' ): ?>

        <section class='page-section block project-header'>
        <div class='inner-column'>
          <?php include('project-header.php'); ?>
        </div>
        </section>



      <?php elseif( get_row_layout() == 'basic_diptych' ): ?>

        <section class='page-section block basic-diptych'>
        <div class='inner-column'>
          <?php include('basic-diptych.php'); ?>
        </div>
        </section>

      <?php endif;

    endwhile;

  else :

      // no layouts found

  endif;

  ?>

<?php endif; ?>
