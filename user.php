<?php
session_start();
include("includes/top.php");
include("includes/navbar.php");
include("includes/hero.php");
?>
    <div class="main-content">
        <div class="txtBlock">
            <h1>Espace membre</h1>
            <p>Bonjour et bienvenue, <?php echo $_SESSION['pseudo']; ?> !</p>
            <p>Vous vous appelez <?php echo $_SESSION['name'] . " " . $_SESSION['surname'] ?>.</p>
            <p>Vous êtes né le <?php echo $_SESSION['dob'] ?>.</p>
        </div>
    </div>
<?php
include("includes/bot.php");
?>