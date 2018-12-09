<html>
    <?php
    include 'head.php';
    ?>
    <body>
        <?php
            include 'menu.php';
        ?> 
        <h2>Inicio de sesion</h2>
        <a href="/yehoshua">Click here to go back<br/><br/></a>
        <form action="checklogin.php" method="POST">
           Enter Username: <input type="text" name="username" required="required" /> <br/>
           Enter password: <input type="password" name="password" required="required" /> <br/>
           <input type="submit" value="Login"/>
        </form>
        <?php
        include 'foot.php';
        ?>
    </body>
   
</html>