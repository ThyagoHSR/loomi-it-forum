<?php

function theme_require_includes($files) {
    foreach ($files as $file) {
        $filepath = get_template_directory() . '/' . $file;
        if (file_exists($filepath)) {
            require_once $filepath;
        }
    }
}

theme_require_includes([
    'inc/menus.php',
    'inc/theme-setup.php',
    'inc/enqueue-scripts.php',
    'inc/custom-fields.php',
    'inc/duplicate-posts.php',
    'inc/utils.php',
    'inc/ajax-load-posts.php',
]);

function loomi_ajax_load_posts() {
    $paged = isset($_POST['paged']) && is_numeric($_POST['paged']) ? intval($_POST['paged']) : 1;
    $year = isset($_POST['year']) && $_POST['year'] !== '' ? intval($_POST['year']) : null;
    $category = isset($_POST['category']) && $_POST['category'] !== '' ? intval($_POST['category']) : null;
  
    $posts_per_page = 8;
  
    $args = [
      'post_type' => 'post',
      'posts_per_page' => $posts_per_page,
      'paged' => $paged,
    ];
  
    if ($year) {
      $args['year'] = $year;
    }
  
    if ($category) {
      $args['cat'] = $category;
    }
  
    $query = new WP_Query($args);
  
    if ($query->have_posts()) {
      ob_start();
      while ($query->have_posts()) {
        $query->the_post();
        get_template_part('parts/post', 'card');
      }
  
      $html = ob_get_clean();
  
      $total_pages = $query->max_num_pages;
      $has_more = $paged < $total_pages;
  
      wp_send_json_success([
        'html' => $html,
        'has_more' => $has_more,
      ]);
    } else {
      wp_send_json_error('Nada mais para carregar.');
    }
  
    wp_die();
  }
  
  add_action('wp_ajax_loomi_load_more', 'loomi_ajax_load_posts');
  add_action('wp_ajax_nopriv_loomi_load_more', 'loomi_ajax_load_posts');
  
  
  
  
?>