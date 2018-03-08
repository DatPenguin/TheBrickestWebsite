<?php
session_start();
include("includes/top.php");
include("includes/navbar.php");
include("includes/hero.php");
require_once("includes/sqlutil.php");
?>
    <div class="main-content">
        <div class="txtBlock">
            <h1>Classements</h1>
            <?php
            if (isset($_SESSION['pseudo'])) {
                print_relative_ranking();
                echo "<p>Vous êtes " . get_ranking_for_player($_SESSION['login']) . "e.</p>";
            } else {
                print_public_ranking();
            }
            ?>
        </div>
    </div>
<?php
include("includes/bot.php");
?>