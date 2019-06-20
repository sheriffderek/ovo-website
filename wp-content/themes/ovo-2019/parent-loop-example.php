<?php 

$lessons = get_posts(array(
  'post_type' => 'lesson',
  'orderby' => 'date',
  'order'=> 'ASC',
  'meta_query' => array(
    array(
      'key' => 'belongs_to_unit', // name of custom field
      'value' => '"' . get_the_ID() . '"', // matches exactly "123", not just 123. This prevents a match for "1234"
      'compare' => 'LIKE'
    )
  )
));

?>

<?php if( $lessons ): ?>

  <h2 class='total'>Contains <?php echo count($lessons); ?> lessons</h2>

  <ol class='lesson-list'>
  <?php foreach( $lessons as $index => $lesson ): ?>
    <li class='lesson'>
      <article class='content'>
        <h3 class='unit'>Lesson: <?php echo($index + 1); ?></h3>

        <h2 class='title'>
          <?php 
            $formattedTitle = get_field('formatted_title', $lesson->ID);
            if ($formattedTitle) { ?>
            <?php echo $formattedTitle; ?>
          <?php } else { ?>
            Figure out this title
          <?php } ?>
        </h2>

        <div class='teaser'>
          <?php the_field('teaser', $lesson->ID); ?>
        </div>
        
        <footer class='actions'>
          <a class='button' href='<?php the_permalink($lesson->ID); ?>'>
            <span>Engage</span>
          </a>
        </footer>
      </article>
    </li>
  <?php endforeach; ?>
  </ol>

<?php else: ?>

  <h2 class='total'>Contains 0 lessons</h2>

  There are no lessons in this unit yet!

<?php endif; ?>
