<?php
  function logged_in() {
    $user = wp_get_current_user();
    return $user->exists();
  }
  $loggedIn = logged_in();
  $secretPage = (is_page( array('courses', 'units', 'lessons')) 
    || is_singular('course', 'unit', 'lesson') ) && !$loggedIn ;
?>

<?php get_header(); ?>



  <?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>

      <?php // you can keep the anoying loop stuff here... - and build references to use below ?>

    <?php endwhile; ?>
  <?php endif; ?>



  <?php if ( is_page('landing') ) { ?>
    <section class='page-section hi'>
    <div class='inner-column'>
      
      <header class='page-header'>
        <article class='content'>
<!--           <h1 class='page-title'>Welcome!</h1> -->

          <?php the_content(); ?>
        </article>
      </header>
      
      
      <?php include('landing-blocks.php'); ?>
      

    </div>
    </section>
  <?php } ?>



  <?php if ( is_page('courses') ) { ?>

    <section class='page-section contact'>
    <div class='inner-column'>

      <header class='page-header'>
        <h1 class='page-title'>Our courses</h1>
      </header>

      <?php include('course-loop.php'); ?>

    </div>
    </section>

  <?php } ?>



  <?php if ( is_singular('course') ) { ?>
    <header class='page-section page-header'>
    <div class='inner-column'>

      <h1 class='page-title'><?php the_title(); ?></h1>

      <aside class='video-player'>
        <iframe src="https://player.vimeo.com/video/<?php the_field('course_intro_video'); ?>" width="1280" height="720" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
      </aside>

      <article class='content'>
        <?php the_field('course_description'); ?>
      </article>

    </div>
    </header>

    <?php if ($loggedIn) { ?>
      <section class='page-section page-header'>
      <div class='inner-column'>

        <?php include('unit-loop.php'); ?>

      </div>
      </section>
    <?php } ?>
  <?php } ?>



  <?php if ( is_singular('unit') && $loggedIn) { ?>

    <header class='page-section page-header'>
    <div class='inner-column'>

      <h1 class='page-title'><?php the_title(); ?></h1>

      <aside class='video-player'>
        <iframe src="https://player.vimeo.com/video/<?php the_field('course_intro_video'); ?>" width="1280" height="720" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
      </aside>

      <article class='content'>
        <?php the_field('course_description'); ?>
      </article>

    </div>
    </header>

    <section class='page-section page-header'>
    <div class='inner-column'>

      <?php include('lesson-loop.php'); ?>

    </div>
    </section>

  <?php } ?>



  <?php // BLOG
    if ( is_page('blog')) { ?>

    <section class='page-section contact'>
    <div class='inner-column'>

      <header class='page-header'>
        <h1 class='page-title'>Our blog</h1>
      </header>

      <?php include('post-loop.php'); ?>

    </div>
    </section>

  <?php } ?>



  <?php if ( is_page('contact')) { ?>

    <section class='page-section contact'>
    <div class='inner-column'>

      <header class='page-header'>
        <h1 class='page-title'><?php the_title(); ?></h1>
      </header><br><br>

      <?php if ($loggedIn) { ?>
        <?php include('components/team-contacts.php'); ?>
      <?php } else { ?>
        <?php include('components/normal-contacts.php'); ?>
      <?php } ?>
    
    </div>
    </section>

  <?php } ?>



  <?php if ($secretPage) { ?>
    <section class='page-section contact-options'>
    <div class='inner-column'>

      <?php include('components/login-form.php'); ?>
      <?php include('components/signup-form.php'); ?>

    </div>
    </section>
  <?php } ?>



<?php get_footer(); ?>
