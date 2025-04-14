<?php

function loomi_enqueue_assets() {
  wp_enqueue_style('loomi-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap', [], null);
  wp_enqueue_style('loomi-global', get_template_directory_uri() . '/assets/css/style.css', ['loomi-fonts'], '1.0');
  wp_enqueue_style('loomi-footer', get_template_directory_uri() . '/assets/css/footer.css', ['loomi-global'], '1.0');
  wp_enqueue_style('loomi-header', get_template_directory_uri() . '/assets/css/header.css', ['loomi-global'], '1.0');
  wp_enqueue_script('loomi-main', get_template_directory_uri() . '/assets/js/main.js', [], '1.0', true);
}


add_action('wp_enqueue_scripts', 'loomi_enqueue_assets');

?>
