
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



      <?php elseif( get_row_layout() == 'pattern_fill' ): ?>
        <?php
          $image = get_sub_field('image')['url'];
          $styles = "background-image: url(" . $image . ")";
        ?>
        <section class='page-section block pattern-fill' style='<?= $styles ?>'>
        <div class='inner-column'>
          
        </div>
        </section>



      <?php elseif( get_row_layout() == 'image_fill' ): ?>
        <?php
          $image = get_sub_field('image')['url'];
        ?>
        <section class='page-section block image-fill full-width'>
        <div class='inner-column'>
          <figure>
            <img src='<?= $image ?>' alt='' />
          </figure>
        </div>
        </section>
      <?php endif;



    endwhile;

  else :

      ?>
      
        

      <?php

  endif;

  ?>

<?php else: ?>

  <section class='page-section'>
  <div class='inner-column'>
    
    <h1 class='t'><?php the_title(); ?></h1>

    <p>No modules here yet...</p>

  </div>
  </section>

<?php endif; ?>
