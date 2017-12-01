<?php
session_start();
session_destroy();
include("includes/top.php");
include("includes/navbar.php");
include("includes/hero.php");
include("includes/sqlutil.php");
?>
    <div class="main-content">
        <div class="txtBlock">
            <h1>Déconnexion</h1>
            <p>Vous avez bien été déconnecté.</p>
        </div>
    </div>
<?php
include("includes/bot.php");
?>