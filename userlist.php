<?php
session_start();
include("includes/top.php");
include("includes/navbar.php");
include("includes/hero.php");
require_once("includes/sqlutil.php");
if (!isset($_SESSION['pseudo'])) {
    header("Location:index.php");
    die();
} else if (!$_SESSION['admin']) {
    header("Location:index.php");
    die();
}
?>
    <div class="main-content">
        <div class="txtBlock">
            <h1>Liste des Utilisateurs</h1>
            <?php
            /*print_table("myusers");
            print_table("player_account");
            print_table("player_info");
            print_table("administrators");*/
            list_users();
            echo "<h1>Liste des Administrateurs</h1>";
            list_admins();
            ?>
        </div>
    </div>
<?php
include("includes/bot.php");
?>