
<?php
  $poster = get_field('project_poster_image')['url'];
  $customTitle = get_field('project_custom_title');
  if ($customTitle) {
    $title = $customTitle;
  } else {
    $title = get_the_title();
  }
?>

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
