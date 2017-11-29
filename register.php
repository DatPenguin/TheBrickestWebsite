<?php
include("includes/top.php");
include("includes/navbar.php");
include("includes/hero.php");
require_once("includes/sqlutil.php");
require_once("includes/util.php");
?>
    <div class="main-content">
        <div class="txtBlock">
            <h1>Inscription</h1>
            <p>Tous les champs sont obligatoires.</p>
            <?php
            if ($_POST['pseudo'] != "") {
                $dbconnection = pg_connect("host=localhost dbname=postgres user=pguser password=password") or die('Connection failed : ' . pg_last_error());

                if (dbcontains($_POST['pseudo'])) {
                    echo '<p>Ce pseudo est déjà utilisé.</p>';
                    print_register_form();
                } else if ($_POST['mdp'] != $_POST['mdp2']) {
                    echo '<p>Les mots de passe saisis ne correspondent pas.</p>';
                    print_register_form();
                } else {

                    $dobar = explode("-", $_POST['dob']);

                    $dob = $dobar[2] . '/' . $dobar[1] . '/' . $dobar[0];

                    $query = 'INSERT INTO myusers VALUES (\'' . $_POST['pseudo'] . '\',\''
                        . password_hash($_POST['mdp'], PASSWORD_DEFAULT) . '\',\'' . $_POST['name'] . '\',\''
                        . $_POST['surname'] . '\', \'' . $dob . '\')';

                    $result = pg_query($query) or die('Echec de la requete : ' . pg_last_error());

                    echo("Votre inscription a bien été effectuée. Vous pouvez désormais vous connecter.");

                    pg_free_result($result);
                    pg_close();
                }
            } else
                print_register_form();
            ?>
        </div>
    </div>
<?php
include("includes/bot.php");
?>