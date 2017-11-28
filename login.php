<?php
include("includes/top.php");
include("includes/navbar.php");
include("includes/hero.php");
?>
    <div class="main-content">
        <div class="txtBlock">
            <h1>Connexion</h1>
            <?php
            if ($_POST['pseudo'] != "" && $_POST['mdp'] != "") {  // Si on a entré un login et un mdp
                echo "La bite à dudule";
            } else
                echo "La techa à Natacha";
            ?>
            <form action="#" method="post">
                <p>Pseudo : <input type="text" name="pseudo"/></p>
                <p>Mot de Passe : <input type="password" name="mdp"/></p>
                <input type="submit"/>
            </form>
        </div>
    </div>
<?php
include("includes/bot.php");
?>