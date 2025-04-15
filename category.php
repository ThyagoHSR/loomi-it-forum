<?php get_header(); ?>

<main class="category-page-container">
  <h1 class="category-title"><?php single_cat_title(); ?></h1>

  <?php
    $categoria = get_queried_object();

    $args = [
      'post_type' => 'post',
      'posts_per_page' => 12,
      'category__in' => [$categoria->term_id]
    ];

    set_query_var('args', $args);
    get_template_part('parts/post', 'grid');
  ?>
</main>

<?php get_footer(); ?>
