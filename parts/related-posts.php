<?php

$categories = get_the_category();
if ($categories) :
  $category_id = $categories[0]->term_id;

  $related_posts = new WP_Query([
    'category__in' => [$category_id],
    'post__not_in' => [get_the_ID()],
    'posts_per_page' => 3
  ]);
  if ($related_posts->have_posts()) :
?>

<div class="related-posts">
  <h3>Posts relacionados</h3>
  <ul class="related-posts-list">
    <?php while ($related_posts->have_posts()) : $related_posts->the_post(); ?>
      <li class="related-post-item">
        <a href="<?php the_permalink(); ?>">
          <?php if (has_post_thumbnail()) : ?>
            <div class="related-thumb"><?php the_post_thumbnail('thumbnail'); ?></div>
          <?php endif; ?>
          <span class="related-title"><?php the_title(); ?></span>
        </a>
      </li>
    <?php endwhile; ?>
  </ul>
</div>

<?php
  endif;
  wp_reset_postdata();
endif;
?>
