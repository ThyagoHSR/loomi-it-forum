<?php

// Template Name: Home

get_header();
?>

<main class="homepage-container">
  
  <h1 class="page-title">Todos os materiais</h1>

  <?php get_template_part('parts/post', 'grid'); ?>

</main>

<?php get_footer(); ?>

