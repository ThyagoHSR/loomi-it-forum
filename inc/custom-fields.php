<?php

function loomi_add_custom_meta_box() {
    add_meta_box(
      'loomi_post_info',
      'Informações do Post',
      'loomi_render_post_fields',
      'post',
      'normal',
      'default'
    );
  }
  add_action('add_meta_boxes', 'loomi_add_custom_meta_box');
  
  function loomi_render_post_fields($post) {
    $subtitulo = get_post_meta($post->ID, 'meta_subtitulo', true);
    $tempo = get_post_meta($post->ID, 'meta_tempo_leitura', true);
    wp_nonce_field('loomi_save_meta_box', 'loomi_meta_box_nonce');
    ?>
    <p>
      <label for="meta_subtitulo"><strong>Subtítulo:</strong></label><br>
      <input type="text" name="meta_subtitulo" id="meta_subtitulo" value="<?php echo esc_attr($subtitulo); ?>" class="widefat">
    </p>
    <p>
      <label for="meta_tempo_leitura"><strong>Tempo de leitura (min):</strong></label><br>
      <input type="number" name="meta_tempo_leitura" id="meta_tempo_leitura" value="<?php echo esc_attr($tempo); ?>" class="widefat" min="1" step="1">
    </p>
    <?php
  }
  
  function loomi_save_post_fields($post_id) {
    if (!isset($_POST['loomi_meta_box_nonce']) || !wp_verify_nonce($_POST['loomi_meta_box_nonce'], 'loomi_save_meta_box')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (isset($_POST['meta_subtitulo'])) {
      update_post_meta($post_id, 'meta_subtitulo', sanitize_text_field($_POST['meta_subtitulo']));
    }
    if (isset($_POST['meta_tempo_leitura'])) {
      update_post_meta($post_id, 'meta_tempo_leitura', sanitize_text_field($_POST['meta_tempo_leitura']));
    }
  }
  add_action('save_post', 'loomi_save_post_fields');  

?>