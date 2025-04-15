<?php
$args = get_query_var('args', [
  'post_type' => 'post',
  'posts_per_page' => 8,
  'paged' => 1
]);

$query = new WP_Query($args);
?>

<div class="post-grid">
  <?php if ($query->have_posts()) : ?>
    <?php while ($query->have_posts()) : $query->the_post(); ?>
      <?php get_template_part('parts/post', 'card'); ?>
    <?php endwhile; ?>
  <?php else : ?>
    <p class="no-posts-found">Nenhum resultado encontrado.</p>
  <?php endif; ?>
</div>

<?php if ($query->found_posts > 8) : ?>
  <div class="load-more-wrapper">
    <button id="load-more" data-page="2">Ver mais</button>
  </div>
<?php endif; ?>

<?php wp_reset_postdata(); ?>
