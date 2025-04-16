<?php

 // Initial settings and support for the wordpress theme.

function loomi_theme_setup() {
  add_theme_support('title-tag');
  add_theme_support('menus');
  add_theme_support('post-thumbnails');
  add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);
  add_theme_support('custom-logo');
  add_theme_support('responsive-embeds');
  add_theme_support('customize-selective-refresh-widgets');
}

add_action('after_setup_theme', 'loomi_theme_setup');

function loomi_enable_excerpt_support() {
  add_post_type_support('post', 'excerpt');
  
}

add_action('init', 'loomi_enable_excerpt_support');
