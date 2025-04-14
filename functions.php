<?php

function loomicodes_css() {
    wp_register_style('loomicodes-style',
    get_template_directory_uri() . '/style.css', [], '1.0.0');
    wp_enqueue_style('loomicodes-style');
}

add_action('wp_enqueue_scripts', 'loomicodes_css');

?>