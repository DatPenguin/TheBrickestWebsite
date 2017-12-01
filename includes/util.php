<?php
function print_register_form()
{
    echo("<form action=\"#\" method=\"post\">
                <label for=\"login\">Identifiant :</label><input id=\"login\" type=\"text\" name=\"login\" required/><br/>
                <label for=\"pseudo\">Pseudo :</label><input id=\"pseudo\" type=\"text\" name=\"pseudo\" required/><br/>
                <label for=\"mdp\">Mot de Passe :</label><input id=\"mdp\" type=\"password\" name=\"mdp\" required/><br/>
                <label for=\"mdp2\">Confirmez votre MDP :</label><input id=\"mdp2\" type=\"password\" name=\"mdp2\" required/><br/>
                <label for=\"name\">Prénom :</label><input type=\"text\" id=\"name\" name=\"name\" required/><br/>
                <label for=\"surname\">Nom :</label><input type=\"text\" id=\"surname\" name=\"surname\" required/><br/>
                <label for=\"dob\">Date de Naissance :</label><input type=\"date\" id=\"dob\" name=\"dob\" required/><br/>
                <input type=\"submit\" style=\"margin: 10px 10vw\"/>
            </form>");
}

?>