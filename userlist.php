<?php
session_start();
include("includes/top.php");
include("includes/navbar.php");
include("includes/hero.php");
require_once("includes/sqlutil.php");
?>
    <div class="main-content">
        <div class="txtBlock">
            <h1>Liste des Utilisateurs</h1>
            <?php
            print_table("myusers");
            print_table("player_account");
            print_table("player_info");
            ?>
        </div>
    </div>
<?php
include("includes/bot.php");
?>