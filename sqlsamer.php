<?php
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
            ?>
        </div>
    </div>
<?php
include("includes/bot.php");
?>