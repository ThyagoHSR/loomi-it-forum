<?php

function loomi_enqueue_assets() {
  wp_enqueue_style('loomi-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap', [], null);
  wp_enqueue_style('loomi-global', get_template_directory_uri() . '/assets/css/style.css', ['loomi-fonts'], '1.0');
  wp_enqueue_style('loomi-footer', get_template_directory_uri() . '/assets/css/footer.css', ['loomi-global'], '1.0');
  wp_enqueue_style('loomi-header', get_template_directory_uri() . '/assets/css/header.css', ['loomi-global'], '1.0');
  wp_enqueue_style('loomi-posts-page', get_template_directory_uri() . '/assets/css/posts-page.css', ['loomi-global'], '1.0');

  wp_enqueue_script('loomi-main', get_template_directory_uri() . '/assets/js/posts-ajax.js', [], '1.0', true);
  wp_localize_script('loomi-main', 'loomi_ajax', [
  'ajax_url' => admin_url('admin-ajax.php'),
]);
}


add_action('wp_enqueue_scripts', 'loomi_enqueue_assets');

?>
