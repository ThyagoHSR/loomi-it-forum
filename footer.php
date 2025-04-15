<footer class="site-footer">
  <div class="footer-top container">
    <div class="footer-intro">
      <h2>Conectando a<br>tecnologia e o futuro<br>dos negócios</h2>
      <p>Insights e inovações para líderes<br>no IT Forum.</p>
    </div>

    <div class="footer-columns">
      <div class="footer-col">
        <h4>Conteúdos</h4>
        <?php wp_nav_menu([
          'theme_location' => 'menu_conteudos',
          'menu_class'     => 'footer-menu',
          'container'      => false,
        ]); ?>
      </div>
      <div class="footer-col">
        <h4>Notícias</h4>
        <?php wp_nav_menu([
          'theme_location' => 'menu_noticias',
          'menu_class'     => 'footer-menu',
          'container'      => false,
        ]); ?>
      </div>
      <div class="footer-col">
        <h4>IT Forum</h4>
        <?php wp_nav_menu([
          'theme_location' => 'menu_itforum',
          'menu_class'     => 'footer-menu',
          'container'      => false,
        ]); ?>
      </div>
    </div>
  </div>

  <div class="footer-middle container">
    <div class="footer-logo">
      <strong>it<span>forum</span></strong>
      <p>Estr. Dr. Yojiro Takaoka, 4601 – Ingaí, Itapevi – SP, 06696-050</p>
      <div class="footer-social">
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-linkedin-in"></i></a>
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-tiktok"></i></a>
        <a href="#"><i class="fab fa-youtube"></i></a>
      </div>
    </div>

    <div class="footer-links">
        <?php wp_nav_menu([
            'theme_location' => 'menu_termos',
            'menu_class'     => 'footer-menu',
            'container'      => false,
            ]); ?>
    </div>
  </div>

  <div class="footer-bottom container">
    <p>Copyright © 2024 IT FORUM – Todos os Direitos Reservados</p>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
