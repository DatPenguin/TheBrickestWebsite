<?php
include("includes/top.php");
include("includes/navbar.php");
include("includes/hero.php");
include("includes/sqlutil.php");
?>
    <div class="main-content">
        <div class="txtBlock">
            <h1>Connexion</h1>
            <?php
            if ($_POST['pseudo'] != "" && $_POST['mdp'] != "") {  // Si on a entré un login et un mdp

                if (dbcontains($_POST['pseudo'])) {
                    if (password_verify($_POST['mdp'], get_hash_for_user($_POST['pseudo'])))
                        echo "Login successful";
                    else
                        echo "Tu vas arrêter de mentir comme ça ?";
                }
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