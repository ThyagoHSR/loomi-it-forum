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
    '/inc/core/theme-setup.php',
    '/inc/custom/custom-fields.php',
    '/inc/custom/duplicate-posts.php',
    '/inc/support/enqueue-scripts.php',
    '/inc/support/utils.php',
    '/inc/support/menus.php',
    '/inc/ajax/ajax-load-posts.php',
]);
  
?>