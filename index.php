<!DOCTYPE html>
<html>
<?php
include 'lang.php';
include 'head.php';
?>
    <body>
        <?php
            include 'menu.php';
            ?>    

        <div class="hero-image mt-5">
            <div class="hero-text">
                <img class="img-fluid logo-index" src="/yehoshua/resources/img/logo-blanco-viajes.png" alt="Viajes Yehoshússa">
            </div>
        </div>
        <div class="container">
            <section class="ss-style-bigtriangle">
                <h1>!Más que un viaje, una aventura!<h1>
				<h2>¿Quienes somos?</h2>
				<p class="section-p">
                Somos la Agencia de Viajes que te llevara a vivir grandes AVENTURAS.
                </p>
                <p class="section-p">
                Nos especializamos en viajes de fin de semana, buscamos crear el mejor ambiente para que te lleves los mejores recuerdos.
                </p>
            </section>
            <svg id="bigTriangleColor" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 100 102" preserveAspectRatio="none">
				<path d="M0 0 L50 100 L100 0 Z" />
            </svg>
            <?php
            include $_SERVER["DOCUMENT_ROOT"] . '/yehoshua/Administracion/Evento.php';
            ?>
        </div>
            <?php
    include 'foot.php';
    ?>
    </body>
    
</html>