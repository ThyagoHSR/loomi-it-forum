<?php

// Template Name: Home

get_header();
?>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <main>
        <h1 class="teste-css">teste wordpress</h1>
      </main>
    <?php endwhile; endif; ?>

<?php get_footer(); ?>
