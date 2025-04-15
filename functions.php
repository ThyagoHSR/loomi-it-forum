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

]);
  
?>