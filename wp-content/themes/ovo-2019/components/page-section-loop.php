
<?php if( have_rows('page_sections') ): ?>

  <?php

  // check if the flexible content field has rows of data
  if( have_rows('page_sections') ):

     // loop through the rows of data
    while ( have_rows('page_sections') ) : the_row(); ?>



      <?php if( get_row_layout() == 'editorial_block' ): ?>

        <section class='article-section block editorial-block'>
        <div class='inner-column'>
          <?php include('editorial-block.php'); ?>
        </div>
        </section>



      <?php elseif( get_row_layout() == 'optional_block' ): ?>

        <section class='article-section block optional-block'>
        <div class='inner-column'>
          <?php include('optional-block.php'); ?>
        </div>
        </section>



      <?php elseif( get_row_layout() == 'list_block' ): ?>

        <section class='article-section block list-block'>
        <div class='inner-column'>
          <?php include('list-block.php'); ?>
        </div>
        </section>



      <?php elseif( get_row_layout() == 'callout_block' ): ?>

        <section class='article-section block callout-block'>
        <div class='inner-column'>
          <?php include('callout-block.php'); ?>
        </div>
        </section>



      <?php elseif( get_row_layout() == 'snippet_block' ): ?>

        <section class='article-section block snippet-block'>
        <div class='inner-column'>
          <?php include('snippet-block.php'); ?>
        </div>
        </section>



      <?php elseif( get_row_layout() == 'live_code_block' ): ?>

        <section class='article-section block live-block'>
        <div class='inner-column'>
          <?php include('live-block.php'); ?>
        </div>
        </section>



      <?php elseif( get_row_layout() == 'diagram_block' ): ?>

        <section class='article-section block diagram-block'>
        <div class='inner-column'>
          <?php include('diagram-block.php'); ?>
        </div>
        </section>



      <?php endif;

    endwhile;

  else :

      // no layouts found

  endif;

  ?>

<?php endif; ?>
