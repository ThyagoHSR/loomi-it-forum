<?php

// Function to inqueue theme css and js

function loomi_enqueue_assets() {

  //CSS

  wp_enqueue_style('loomi-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap', [], null);
  wp_enqueue_style('loomi-global', get_template_directory_uri() . '/assets/css/style.css', ['loomi-fonts'], '1.0');
  wp_enqueue_style('loomi-footer', get_template_directory_uri() . '/assets/css/components/footer.css', ['loomi-global'], '1.0');
  wp_enqueue_style('loomi-header', get_template_directory_uri() . '/assets/css/components/header.css', ['loomi-global'], '1.0');
  wp_enqueue_style('loomi-front-page', get_template_directory_uri() . '/assets/css/pages/front-page.css', ['loomi-global'], '1.0');
  wp_enqueue_style('loomi-noticias', get_template_directory_uri() . '/assets/css/pages/noticias.css', ['loomi-global'], '1.0');
  wp_enqueue_style('loomi-posts-page', get_template_directory_uri() . '/assets/css/components/posts-page.css', ['loomi-global'], '1.0');

  //JS

  wp_enqueue_script('loomi-ajax-filter', get_template_directory_uri() . '/assets/js/posts-ajax.js', [], '1.0', true);
  wp_localize_script('loomi-ajax-filter', 'loomi_ajax', [
  'ajax_url' => admin_url('admin-ajax.php'), // Wordpress requisitions
]);

  wp_enqueue_script('loomi-header-mobile', get_template_directory_uri() . '/assets/js/header-mobile.js', [], '1.0', true);

}


add_action('wp_enqueue_scripts', 'loomi_enqueue_assets');

?>
