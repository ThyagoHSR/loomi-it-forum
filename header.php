<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="site-header">
  <div class="top-bar">
    <nav class="top-nav">
      <?php wp_nav_menu([
        'theme_location' => 'menu_superior',
        'menu_class'     => 'header-menu',
        'container'      => false,
      ]); ?>
    </nav>
  </div>

  <div class="header-container">
    <div class="main-header">
      <div class="logo">
        <a href="<?php echo home_url(); ?>">It<span>forum</span></a>
      </div>

      <button class="menu-toggle" aria-label="Abrir menu">&#9776;</button>

      <nav class="main-nav">
        <?php wp_nav_menu([
          'theme_location' => 'menu_header-itforum',
          'menu_class'     => 'main-menu',
          'container'      => false,
        ]); ?>
      </nav>
    </div>
  </div>

  <div class="mobile-menu-overlay"></div>

  <nav class="mobile-menu" id="mobile-menu">
    <button class="close-menu" aria-label="Fechar menu">&times;</button>
    <?php wp_nav_menu([
      'theme_location' => 'menu_header-itforum',
      'menu_class'     => 'main-menu',
      'container'      => false,
    ]); ?>
  </nav>
</header>
