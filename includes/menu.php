<a href="/index.php" style="white-space: nowrap"><img src="/rsc/title.png" alt="The Brickest Dungeon"></a>
<div class="menu-list">
    <a href="/ranking.php">Classements</a>
    <?php
    if (isset($_SESSION['pseudo'])) {
        if ($_SESSION['admin'])
            echo "<a href=\"/userlist.php\">Liste des Utilisateurs</a>";
    } else
        echo "<a href=\"/login.php\">Connexion</a>\n
                <a href=\"/register.php\">Inscription</a>";
    ?>
</div>