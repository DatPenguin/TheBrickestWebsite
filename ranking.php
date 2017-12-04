<?php
session_start();
include("includes/top.php");
include("includes/navbar.php");
include("includes/hero.php");
?>
    <div class="main-content">
        <div class="txtBlock">
            <h1>Classements</h1>
            <p>Ici s'affichera le tableau des classements.</p>
            <?php
            if (isset($_SESSION['pseudo'])) {
                if ($_SESSION['admin'])
                    echo "<p>MODE ADMIN</p>";
                else
                    echo "<p>MODE JOUEUR</p>";
            } else
                echo "<p>MODE PUBLIC</p>";
            ?>
        </div>
    </div>
<?php
include("includes/bot.php");
?>