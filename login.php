<?php
session_start();
include("includes/top.php");
include("includes/navbar.php");
include("includes/hero.php");
include("includes/sqlutil.php");
?>
    <div class="main-content">
        <div class="txtBlock">
            <h1>Connexion</h1>
            <?php
            if (!isset($_SESSION['pseudo'])) {
                echo "<p>";
                if ($_POST['pseudo'] != "" && $_POST['mdp'] != "") {  // Si on a entré un login et un mdp

                    if (dbcontains($_POST['pseudo'])) {
                        if (HASH) {
                            if (password_verify($_POST['mdp'], get_hash_for_user($_POST['pseudo']))) {
                                echo "Login successful";
                                $_SESSION['pseudo'] = $_POST['pseudo'];
                            } else
                                echo "Tu vas arrêter de mentir comme ça ?";
                        } else {
                            if ($_POST['mdp'] == get_hash_for_user($_POST['pseudo'])) {
                                echo "Login successful";
                                $_SESSION['pseudo'] = $_POST['pseudo'];
                                echo "<meta http-equiv=\"refresh\" content=\"1;url=/index.php\">";
                            } else {
                                echo "Tu vas arrêter de mentir comme ça ? <br />";
                                echo $_POST['mdp'] . "." . get_hash_for_user($_POST['pseudo']);
                            }
                        }
                    } else
                        echo "Le login saisi est introuvable.";
                    echo "</p>";
                }
                echo "<form action=\"#\" method=\"post\">
                <label for=\"pseudo\">Pseudo :</label><input id=\"pseudo\" type=\"text\" name=\"pseudo\" required/><br/>
                <label for=\"mdp\">Mot de Passe :</label><input id=\"mdp\" type=\"password\" name=\"mdp\" required/><br/>
                <input type=\"submit\" style=\"margin: 10px 13vw\"/>
            </form>";
            } else {
                echo "<p>Vous êtes déjà connecté !</p>\n<meta http-equiv=\"refresh\" content=\"1;url=/index.php\">";
            }
            ?>
        </div>
    </div>
<?php
include("includes/bot.php");
?>