<?php
session_start();
include("includes/top.php");
include("includes/navbar.php");
include("includes/hero.php");
?>
    <div class="main-content">
        <div class="txtBlock">
            <h1>The Brickest Dungeon</h1>
            <p>Ce site est celui du jeu The Brickest Dungeon, regroupant toutes les informations liées aux utilisateurs.<br/>
                Il a été réalisé dans le cadre du module Base de Données ainsi que de celui du projet de synthèse de L3
                Informatique à l'Université de Cergy-Pontoise.</p>
        </div>
        <div class="imageDiv">
            <h2>A propos du jeu</h2>
            <p>The Brickest Dungeon est un jeu mobile mélangeant le combat d'un RPG avec le gameplay d'un casse-briques
                multijoueur, faisant s'affronter les joueurs en un contre un.<br/>Chaque victoire entraîne un gain
                d'expérience permettant de débloquer de nouveaux sorts.</p>
        </div>
        <div class="txtBlock">
            <h2>Les créateurs du jeu</h2>
            <p>Matteo STAIANO, Mathieu HANNOUN et Rémi AROSIO ont créé The Brickest Dungeon dans le cadre de leur projet
                de synthèse, en L3 Informatique à l'Université de Cergy-Pontoise.<br/>
                Tous trois développent le jeu, avec chacun sa spécialité.</p>
            <ul>
                <li>Matteo est le référent <strong>serveurs</strong>. Il est reponsable du serveur de jeu, du serveur
                    query ainsi que des services associés (site web, ssh, ftp...).
                </li>
                <li>Rémi est responsable <strong>Android</strong>. Il développe l'application et les nouvelles
                    fonctionnalités.
                </li>
                <li>Mathieu est <strong>chef de projet</strong>. Il supervise le projet dans son ensemble et gère
                    notamment l'avancement et les différents rendus.
                </li>
            </ul>
        </div>
    </div>
<?php
include("includes/bot.php");
?>