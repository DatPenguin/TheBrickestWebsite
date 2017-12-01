<div class="hero">
    <?php include("menu.php"); ?>
    <div class="navAccount">
        <?php
        if(isset($_SESSION['pseudo']))
            echo "Bonjour, " . $_SESSION['pseudo'] . ". <a href=\"/logout.php\">Se déconnecter</a>";
        else
            echo "<a href=\"/login.php\">Connexion</a> / <a href=\"/register.php\">Inscription</a>";
        ?>
    </div>
</div>