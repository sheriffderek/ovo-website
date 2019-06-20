<?php
  /*
    Template name: Style Guide
  */
get_header();
/* ================================ */ ?>


<!-- <section class='page-section intro'>
<div class='inner-column'>
  
  Style guide

</div>
</section> -->

<header class='page-section section-name'>
<div class='inner-column'>

  <header class='section-title'>
    Style guide
  </header>

</div>
</header>

  <?php
    function logged_in_bbb() {
      $user = wp_get_current_user();
      return $user->exists();
    }
    $loggedInP = logged_in_bbb();
  ?>


  <?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>

      
    <?php endwhile; ?>
  <?php endif; ?>

  <?php
    // $code = $_GET['code'];
    // $preview = $code === 'freePreview';
    // echo $code;
  ?>





  <section class='page-section hi'>
  <div class='inner-column'>
    
    <header class='page-header'>
      <article class='content'>
        <h1 class='page-title'>Welcome!</h1>

        <aside class='video-player'>
          <?php $videoId = '337547173'; ?>

          <iframe src="https://player.vimeo.com/video/<?php echo $videoId; ?>" width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
        </aside>

        <?php the_content(); ?>
      </article>
    </header>
    
  </div>
  </section>



<article class='content article post'>

  <section class='article-section'>
  <div class='inner-column'>
    
    <h1 class='article-title'>
      <?php if ( get_field('has_formatted_title') ) { ?>
        <?php the_field('formatted_title', false, false); ?>
      <?php } else { ?>
        <?php the_title(); ?>
      <?php } ?>
    </h1>

    <p class='date'>
      Posted: <?php the_date(); ?> - and - 
      <span class='updated'>
        <em>Last updated: <?php the_modified_date('F j, Y'); ?></em>
      </span>
    </p>

    <p class='author'>
      Written by: <span class='name'><?php echo get_the_author_meta('display_name'); ?></span>
    </p>

    <aside>
      <?= the_field('customizable_rte'); ?>
    </aside>

    <aside>
      <?= the_field('example_snippet'); ?>
    </aside>

  </div>
  </section>

  

  <section class='article-section introduction'>
  <div class='inner-column'>

    <?php the_field('introduction'); ?>

  </div>
  </section>



  <?php // THEATER
    $videoId = get_field('video_id');
    if ($videoId) { ?>
    <section class='article-section theater'>
    <div class='inner-column'>
      
      <h3 class='heading'>Video walkthrough:</h3>

      <aside class='video-player'>
        <iframe src="https://player.vimeo.com/video/<?php echo $videoId; ?>" width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>

        <div class='info'>
  <!--             <h3 class='title'>
            video for: <?php // the_title(); ?>
          </h3> -->
        </div>

      </aside>

    </div>
    </section>
  <?php } ?>



  <?php // PAGE SECTIONS
  include('components/page-section-loop.php'); ?>



  <?php // CHALLENGES
    if ( get_field('lesson_challenges') ) { ?>

    <section class='article-section challenges'>
    <div class='inner-column'>

      <h3 class='heading'>The challenges:</h3>

      <?php include('components/challenges-list.php') ?>

    </div>
    </section>

  <?php } ?>



  <?php // CHECKLIST
    if ( get_field('lesson_checklist') ) { ?>

    <section class='article-section check-list'>
    <div class='inner-column'>

      <h3 class='heading'>The check list:</h3>

      <?php include('components/check-list.php') ?>

    </div>
    </section>

  <?php } ?>



  <section class='article-section conclusion'>
  <div class='inner-column'>

    <?php the_field('conclusion'); ?>

  </div>
  </section>



  <footer class='article-section data'>
  <div class='inner-column'>

    <p class='date'>
      Posted: <?php the_date(); ?> - and - 
      <span class='updated'>
        <em>Last updated: <?php the_modified_date('F j, Y'); ?></em>
      </span>
    </p>

  </div>
  </footer>

</article>



<section class='page-section contact'>
<div class='inner-column'>

  <?php include('components/login-form.php'); ?>
  <?php include('components/signup-form.php'); ?>

</div>
</section>



<?php /* ========================== */
get_footer(); ?>