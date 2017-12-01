<?php
session_start();
include("includes/top.php");
include("includes/navbar.php");
include("includes/hero.php");
include("includes/sqlutil.php");
include("includes/util.php");
?>
    <div class="main-content">
        <div class="txtBlock">
            <h1>Connexion</h1>
            <?php
            if (!isset($_SESSION['login'])) {
                echo "<p>";
                if ($_POST['login'] != "" && $_POST['mdp'] != "") {  // Si on a entré un login et un mdp

                    if (dbcontains("player_account", $_POST['login'])) {
                        if (HASH) {
                            if (password_verify($_POST['mdp'], get_hash_for_user($_POST['login']))) {
                                echo "Login successful";
                                get_user_infos($_POST['login']);
                            } else {
                                echo "Tu vas arrêter de mentir comme ça ?";
                                print_login_form();
                            }
                        } else {
                            if ($_POST['mdp'] == get_hash_for_user($_POST['login'])) {
                                echo "Login successful";
                                get_user_infos($_POST['login']);
                                echo "<meta http-equiv=\"refresh\" content=\"1;url=/user.php\">";
                            } else {
                                echo "Tu vas arrêter de mentir comme ça ? <br />";
                                print_login_form();
                            }
                        }
                    } else {
                        echo "Le login saisi est introuvable.";
                        print_login_form();
                    }
                    echo "</p>";
                } else
                    print_login_form();
            } else {
                echo "<p>Vous êtes déjà connecté !</p>\n<meta http-equiv=\"refresh\" content=\"1;url=/index.php\">";
            }
            ?>
        </div>
    </div>
<?php
include("includes/bot.php");
?>