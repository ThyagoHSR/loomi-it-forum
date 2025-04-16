<?php

// Template Name: Home

get_header();
?>

<main class="homepage-container">

  <div class="header-with-filters">
    <h1 class="page-title">Todos os materiais</h1>

    <div class="filters-wrapper">
      <select id="filter-year" name="year" class="filter-select">
        <option value="">Ano de publicação</option>
        <option value="2025">2025</option>
        <option value="2024">2024</option>
        <option value="2023">2023</option>
      </select>

      <select id="filter-category" name="category" class="filter-select">
        <option value="">Selecionar categoria</option>
        <?php
          $categories = get_categories();
          foreach ($categories as $cat) {
            echo '<option value="' . $cat->term_id . '">' . $cat->name . '</option>';
          }
        ?>
      </select>
    </div>
  </div>

  <?php get_template_part('parts/post', 'grid'); ?>

  </div>

</main>

<?php get_footer(); ?>
