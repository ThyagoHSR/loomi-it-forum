<?php
$args = get_query_var('args', [
  'post_type' => 'post',
  'posts_per_page' => 12
]);

$query = new WP_Query($args);
?>

<?php if ($query->have_posts()) : ?>
  <div class="post-grid">
    <?php while ($query->have_posts()) : $query->the_post(); ?>
      <?php $tempo = get_post_meta(get_the_ID(), 'meta_tempo_leitura', true); ?>
      
      <article class="post-card">
        <a href="<?php the_permalink(); ?>">
          <?php if (has_post_thumbnail()) : ?>
            <div class="post-thumb"><?php the_post_thumbnail('medium'); ?></div>
          <?php endif; ?>

          <div class="post-meta">
            <span class="post-cat"><?php echo get_the_category()[0]->name ?? ''; ?></span>
          </div>

          <h2 class="post-title"><?php the_title(); ?></h2>

          <?php if (has_excerpt()) : ?>
            <div class="post-excerpt"><?php the_excerpt(); ?></div>
          <?php endif; ?>

          <?php if ($tempo) : ?>
            <p class="post-time"><?php echo esc_html($tempo); ?> Minutos de Leitura</p>
          <?php endif; ?>

          <p class="post-author">Autor: <?php the_author(); ?></p>
            <p class="post-date">Publicado em: <?php echo get_the_date('d/m/Y'); ?> às <?php echo get_the_time('H:i'); ?></p>


        </a>
      </article>
    <?php endwhile; ?>
  </div>
<?php else : ?>
  <p class="no-posts-found">Nenhum resultado encontrado.</p>
<?php endif; ?>

<?php wp_reset_postdata(); ?>
