<?php

// Register Menus Wordpress

function loomi_register_menus() {
    register_nav_menus([

      'menu_superior' => 'Header - Superior',
      'menu_header-itforum' => 'Header - IT Forum',
      'menu_conteudos' => 'Rodapé - Conteúdos',
      'menu_noticias' => 'Rodapé - Notícias',
      'menu_itforum' => 'Rodapé - IT Forum',
      'menu_termos' => 'Rodapé - Termos e Condições',
    ]);
  }

  add_action('after_setup_theme', 'loomi_register_menus');

?>