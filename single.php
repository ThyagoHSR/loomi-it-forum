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

      <div class="post-share">
        <span>Compartilhar:</span>

        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" rel="noopener" class="share-icon facebook" title="Compartilhar no Facebook">
            <svg viewBox="0 0 24 24" width="20" height="20" fill="#fff" xmlns="http://www.w3.org/2000/svg">
            <path d="M22 12a10 10 0 10-11.5 9.9v-7H8v-2.9h2.5V9.6c0-2.5 1.5-3.9 3.7-3.9 1.1 0 2.2.2 2.2.2v2.5h-1.2c-1.2 0-1.6.8-1.6 1.6v1.9H17l-.3 2.9h-2.4v7A10 10 0 0022 12z"/>
            </svg>
        </a>

        <a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank" rel="noopener" class="share-icon twitter" title="Compartilhar no Twitter">
            <svg viewBox="0 0 24 24" width="20" height="20" fill="#fff" xmlns="http://www.w3.org/2000/svg">
            <path d="M22.46 6c-.77.34-1.6.57-2.46.67a4.25 4.25 0 001.86-2.35 8.36 8.36 0 01-2.67 1.02 4.22 4.22 0 00-7.17 3.84 12 12 0 01-8.7-4.4 4.22 4.22 0 001.3 5.63 4.2 4.2 0 01-1.91-.53v.05a4.23 4.23 0 003.39 4.13 4.23 4.23 0 01-1.9.07 4.23 4.23 0 003.95 2.94A8.47 8.47 0 012 19.54a11.94 11.94 0 006.29 1.84c7.55 0 11.68-6.26 11.68-11.68 0-.18-.01-.36-.02-.53A8.36 8.36 0 0024 5.56a8.18 8.18 0 01-2.36.65 4.15 4.15 0 001.81-2.3z"/>
            </svg>
        </a>

        <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>" target="_blank" rel="noopener" class="share-icon linkedin" title="Compartilhar no LinkedIn">
            <svg viewBox="0 0 24 24" width="20" height="20" fill="#fff" xmlns="http://www.w3.org/2000/svg">
            <path d="M4.98 3.5a2.5 2.5 0 11-.01 5.01A2.5 2.5 0 014.98 3.5zM2 9h6v12H2zM14.5 9a4.5 4.5 0 00-4.5 4.5V21h-4V9h4v1.8c.59-1.11 1.98-1.8 3.5-1.8 2.5 0 4.5 2 4.5 4.5V21h-4v-7c0-.83-.67-1.5-1.5-1.5z"/>
            </svg>
        </a>

        <a href="https://api.whatsapp.com/send?text=<?php the_title(); ?>%20<?php the_permalink(); ?>" target="_blank" rel="noopener" class="share-icon whatsapp" title="Compartilhar no WhatsApp">
            <svg viewBox="0 0 24 24" width="20" height="20" fill="#fff" xmlns="http://www.w3.org/2000/svg">
            <path d="M20.52 3.48A11.93 11.93 0 0012 0C5.37 0 0 5.38 0 12a11.94 11.94 0 001.62 6l-1.1 4 4.15-1.08A11.94 11.94 0 0012 24c6.63 0 12-5.37 12-12 0-3.2-1.25-6.22-3.48-8.52zM12 22c-1.83 0-3.61-.49-5.15-1.41l-.37-.22-2.46.65.66-2.42-.24-.39A9.95 9.95 0 012 12c0-5.52 4.48-10 10-10s10 4.48 10 10-4.48 10-10 10zm5.05-7.55c-.28-.14-1.64-.8-1.89-.89-.25-.09-.43-.14-.6.14-.18.28-.7.89-.85 1.07-.16.18-.31.2-.58.07a8.12 8.12 0 01-2.39-1.47 8.96 8.96 0 01-1.65-2.05c-.17-.29-.02-.45.12-.6.13-.13.29-.34.44-.5.15-.17.2-.29.3-.48.1-.19.05-.36-.02-.5-.07-.14-.6-1.45-.82-1.99-.22-.52-.45-.45-.6-.46H8.5c-.15 0-.39.05-.6.25s-.79.77-.79 1.88.82 2.18.94 2.33c.12.15 1.61 2.45 3.9 3.44.55.24.98.38 1.31.48.55.17 1.05.14 1.45.09.44-.06 1.36-.55 1.55-1.08.19-.53.19-.98.14-1.08-.06-.1-.25-.16-.52-.3z"/>
            </svg>
        </a>
        </div>

    </article>

    <?php get_template_part('parts/related-posts'); ?>

  <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>
