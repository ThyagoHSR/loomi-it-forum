<?php

// Function to duplicate posts without the need for extra plugins

function loomi_duplicate_post_as_draft() {
    global $wpdb;
  
    if (!isset($_GET['post']) || !isset($_GET['action']) || $_GET['action'] !== 'loomi_duplicate_post') {
      return;
    }
  
    $post_id = absint($_GET['post']);
    $post = get_post($post_id);
  
    if (!$post) return;
  
    $new_post = array(
      'post_title'     => $post->post_title . ' (Cópia)',
      'post_content'   => $post->post_content,
      'post_excerpt'   => $post->post_excerpt,
      'post_status'    => 'draft',
      'post_type'      => $post->post_type,
      'post_author'    => get_current_user_id(),
    );
  
    $new_post_id = wp_insert_post($new_post);
  
    $meta = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id = $post_id");
    foreach ($meta as $m) {
      add_post_meta($new_post_id, $m->meta_key, maybe_unserialize($m->meta_value));
    }
  
    wp_redirect(admin_url('post.php?action=edit&post=' . $new_post_id));
    exit;
  }
  add_action('admin_action_loomi_duplicate_post', 'loomi_duplicate_post_as_draft');
  
  function loomi_duplicate_link($actions, $post) {
    if (current_user_can('edit_posts')) {
      $actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=loomi_duplicate_post&post=' . $post->ID, basename(__FILE__), 'duplicate_nonce') . '" title="Duplicar este item">Duplicar</a>';
    }
    return $actions;
  }
  
  add_filter('post_row_actions', 'loomi_duplicate_link', 10, 2);

?>