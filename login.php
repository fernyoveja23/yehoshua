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
            <div class="hero-text background-info">
                <h2>Inicio de sesion</h2>
                <a href="/yehoshua">Click here to go back<br/><br/></a>
                <form action="checklogin.php" method="POST">
                Enter Username: <input type="text" name="username" required="required" /> <br/>
                Enter password: <input type="password" name="password" required="required" /> <br/>
                <input type="submit" value="Login"/>
                </form>
            </div>
        </div>
        <?php
        include 'foot.php';
        ?>
    </body>
   
</html>