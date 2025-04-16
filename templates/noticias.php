<?php

// Template Name: Notícias

get_header();

?>

<main class="noticias-container">
  <h1 class="noticias-title">Todas as notícias</h1>

  <div class="noticias-grid">
    <?php
    $args = [
      'post_type' => 'post',
      'posts_per_page' => 10,
      'paged' => get_query_var('paged') ?: 1
    ];
    $query = new WP_Query($args);

    if ($query->have_posts()) :
      while ($query->have_posts()) : $query->the_post();
        ?>
        <article class="noticia-item">
          <a href="<?php the_permalink(); ?>" class="noticia-link">
            <?php if (has_post_thumbnail()) : ?>
              <div class="noticia-thumb">
                <?php the_post_thumbnail('medium'); ?>
              </div>
            <?php endif; ?>

            <div class="noticia-content">
              <span class="noticia-categoria">
                <?php echo get_the_category()[0]->name ?? ''; ?>
              </span>
              <h2 class="noticia-titulo">
                <?php the_title(); ?>
              </h2>
              <p class="noticia-excerpt">
                <?php echo wp_trim_words(get_the_excerpt(), 25); ?>
              </p>
              <div class="noticia-meta">
                <span class="noticia-autor"><?php the_author(); ?></span>
                <span class="noticia-data">
                  <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' atrás'; ?>
                </span>
              </div>
            </div>
          </a>
        </article>
        <?php
      endwhile;
      wp_reset_postdata();
    else :
      echo '<p>Nenhuma notícia encontrada.</p>';
    endif;
    ?>
  </div>
</main>

<?php get_footer(); ?>