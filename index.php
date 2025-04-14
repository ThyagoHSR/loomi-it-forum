<?php get_header(); ?>

<main class="site-main">
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      <article>
        <h2><?php the_title(); ?></h2>
        <div><?php the_content(); ?></div>
      </article>
    <?php endwhile; ?>
  <?php else : ?>
    <p>Nenhum conteúdo encontrado.</p>
  <?php endif; ?>
</main>

<?php get_footer(); ?>
