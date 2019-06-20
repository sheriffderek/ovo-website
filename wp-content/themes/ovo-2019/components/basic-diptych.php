
<?php
  $textContent = get_sub_field('text_content');
  $image = get_sub_field('image_content')['url'];
  $imageAlt = get_sub_field('image_content')['alt'];
  $position = get_sub_field('position');
  $color = get_sub_field('custom_color');

  if ($color) {
    $styles = 'background: ' . $color . '; color: white;';
  }
?>


<aside class='<?= $position ?>' style='<?= $styles ?>'>
  <div class='half text'>
    <?= $textContent ?>
  </div>

  <figure class='half'>
    <img src='<?= $image ?>' alt='<?= $imageAlt ?>' />
  </figure>
</aside>
