<!-- Footer -->
<footer class="footer">

    
    <div class="footer-copyright text-center py-3"><?php echo idioma::FOOT_DERECHOS; ?>
      <a class="card-link" href="#"><?php echo idioma::FOOT_EMPRESA; ?></a>
    </div> 
    <?php
    if (!isset($_SESSION["usuario"]) && !isset($_SESSION["rol"])) {
    ?>
    <div class="container">
      <div class="row">
        <div class="list-group">
          <li class="list-group-item list-group-item-dark">
          <?php echo idioma::MENU_VENDEDORES; ?>
          </li>
          <a class="list-group-item list-group-item-action list-group-item-dark" href="/yehoshua/Vendedores/register.php"><?php echo idioma::MENU_VENDEDORES_SIGIN; ?></a>
          <a class="list-group-item list-group-item-action list-group-item-dark" href="/yehoshua/login.php"><?php echo idioma::MENU_VENDEDORES_LOGIN; ?></a>
        </div>
      </div>
    </div>
    <?php
    }
    ?>
    <!-- Copyright -->

  </footer>