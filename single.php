<?php get_header(); ?>

<main class="single-post-container">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article class="single-post">
      <?php loomi_breadcrumbs(); ?>
      <h1 class="post-title-blog"><?php the_title(); ?></h1>

      <?php if (has_post_thumbnail()) : ?>
        <div class="post-thumbnail">
          <?php the_post_thumbnail('large'); ?>
        </div>
      <?php endif; ?>

      <?php
        $subtitulo = get_post_meta(get_the_ID(), 'meta_subtitulo', true);
        $tempo = get_post_meta(get_the_ID(), 'meta_tempo_leitura', true);
      ?>

      <?php if ($subtitulo) : ?>
        <p class="post-subtitle"><?php echo esc_html($subtitulo); ?></p>
      <?php endif; ?>

      <?php if ($tempo) : ?>
        <p class="post-time"><?php echo esc_html($tempo); ?> Minutos de Leitura</p>
      <?php endif; ?>

      <div class="post-content">
        <?php the_content(); ?>
      </div>

    </article>

    <?php get_template_part('parts/related-posts'); ?>

  <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>
