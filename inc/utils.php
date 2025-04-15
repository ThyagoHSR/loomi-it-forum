<?php

function loomi_breadcrumbs() {
    if (is_single()) {
      echo '<nav class="breadcrumb">';
      echo '<a href="' . home_url() . '">Home</a> &raquo; ';
  
      $categories = get_the_category();
      if (!empty($categories)) {
        echo '<a href="' . esc_url(get_category_link($categories[0]->term_id)) . '">' . esc_html($categories[0]->name) . '</a> &raquo; ';
      }
  
      echo '<span>' . get_the_title() . '</span>';
      echo '</nav>';
    }
  }
  

?>