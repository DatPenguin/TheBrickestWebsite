<?php
define("HASH", false);
define("CONNECTION_STRING", "host=localhost dbname=postgres user=pguser password=password");

function dbcontains($tablename, $pseudo) {
    $dbconnection = pg_connect(CONNECTION_STRING) or die('Connection failed : ' . pg_last_error());

    $query = 'SELECT * FROM ' . $tablename . ' WHERE login LIKE \'' . $pseudo . '\'';
    $result = pg_query($query) or die('Echec de la requete : ' . pg_last_error());

    if (pg_num_rows($result) == 0)
        return false;
    return true;
}

function print_table($tablename) {
    $dbconnection = pg_connect(CONNECTION_STRING) or die('Connection failed : ' . pg_last_error());

    $query = 'SELECT * FROM ' . $tablename;
    $result = pg_query($query) or die('Echec de la requete : ' . pg_last_error());

    echo "<table style='width: 100%'>\n<tr>\n";

    $i = pg_num_fields($result);
    for ($j = 0; $j < $i; $j++)
        echo "<td class='colname'>" . pg_field_name($result, $j) . "</td>\n";
    echo "</tr>\n";
    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
        echo "\t<tr>\n";
        foreach ($line as $col_value)
            echo "\t\t<td>$col_value</td>\n";
        echo "\t</tr>\n";
    }
    echo "</table>\n<br />\n";

    pg_free_result($result);
    pg_close();
}

function list_admins() {
    $dbconnection = pg_connect(CONNECTION_STRING) or die('Connection failed : ' . pg_last_error());

    $query = 'SELECT * FROM administrators ORDER BY is_student DESC';
    $result = pg_query($query) or die('Echec de la requete : ' . pg_last_error());

    echo "<table style='width: 100%'>\n<tr>\n";

    $i = pg_num_fields($result);
    for ($j = 0; $j < $i; $j++)
        echo "<td class='colname'>" . pg_field_name($result, $j) . "</td>\n";
    echo "</tr>\n";
    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
        echo "\t<tr>\n";
        foreach ($line as $col_value)
            echo "\t\t<td>$col_value</td>\n";
        echo "\t</tr>\n";
    }
    echo "</table>\n<br />\n";

    pg_free_result($result);
    pg_close();
}

function list_users() {
    $dbconnection = pg_connect(CONNECTION_STRING) or die('Connection failed : ' . pg_last_error());

    $query = 'SELECT * FROM player_info NATURAL JOIN player_account ORDER BY login';
    $result = pg_query($query) or die('Echec de la requete : ' . pg_last_error());

    echo "<table style='width: 100%'>\n<tr>\n";

    $i = pg_num_fields($result);
    for ($j = 0; $j < $i; $j++)
        echo "<td class='colname'>" . pg_field_name($result, $j) . "</td>\n";
    echo "</tr>\n";
    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
        echo "\t<tr>\n";
        foreach ($line as $col_value)
            echo "\t\t<td>$col_value</td>\n";
        echo "\t</tr>\n";
    }
    echo "</table>\n<br />\n";

    pg_free_result($result);
    pg_close();
}

function get_pseudo_for_login($login) {
    $dbconnection = pg_connect(CONNECTION_STRING) or die('Connection failed : ' . pg_last_error());

    $query = 'SELECT pseudo FROM player_account WHERE login LIKE \'' . $login . '\'';
    $result = pg_query($query) or die('Echec de la requete : ' . pg_last_error());

    return pg_fetch_array($result, 0, PGSQL_ASSOC)['pseudo'];
}

function get_ranking_for_player($login) {
    $rank = 0;

    $dbconnection = pg_connect(CONNECTION_STRING) or die('Connection failed : ' . pg_last_error());

    $query = 'SELECT * FROM ranked ORDER BY elo DESC';

    $result = pg_query($query) or die('Echec de la requete : ' . pg_last_error());

    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
        $rank++;
        if ($line['login'] == $login)
            return $rank;
    }
    return 0;
}

function print_relative_ranking() {
    $dbconnection = pg_connect(CONNECTION_STRING) or die('Connection failed : ' . pg_last_error());

    $offset = (get_ranking_for_player($_SESSION['login']) - 3);
    if ($offset < 0)
        $offset = 0;

    $query = 'SELECT elo, p_ranked, pseudo FROM ranked NATURAL JOIN player_account ORDER BY elo DESC LIMIT 5 OFFSET ' . $offset;

    $result = pg_query($query) or die('Echec de la requete : ' . pg_last_error());

    echo "<table style='width: 100%'>\n<tr>\n";

    $i = pg_num_fields($result);
    echo "<td class='colname'>Classement</td>";
    for ($j = 0; $j < $i; $j++)
        echo "<td class='colname'>" . pg_field_name($result, $j) . "</td>\n";
    echo "</tr>\n";
    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
        echo "\t<tr>\n<td>" . ++$offset . "</td>";
        foreach ($line as $col_value)
            echo "\t\t<td>$col_value</td>\n";
        echo "\t</tr>\n";
    }
    echo "</table>\n<br />\n";

    pg_free_result($result);
    pg_close();
}

function print_public_ranking() {
    $dbconnection = pg_connect(CONNECTION_STRING) or die('Connection failed : ' . pg_last_error());

    $nb = 1;

    $query = 'SELECT elo, p_ranked, pseudo FROM ranked NATURAL JOIN player_account ORDER BY elo DESC';
    $result = pg_query($query) or die('Echec de la requete : ' . pg_last_error());

    echo "<table style='width: 100%'>\n<tr>\n";

    $i = pg_num_fields($result);
    echo "<td class='colname'>Classement</td>";
    for ($j = 0; $j < $i; $j++)
        echo "<td class='colname'>" . pg_field_name($result, $j) . "</td>\n";
    echo "</tr>\n";
    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
        echo "\t<tr>\n<td>" . $nb++ . "</td>";
        foreach ($line as $col_value)
            echo "\t\t<td>$col_value</td>\n";
        echo "\t</tr>\n";
    }
    echo "</table>\n<br />\n";

    pg_free_result($result);
    pg_close();
}

function print_table_constraint($tablename, $constraint) {
    $dbconnection = pg_connect(CONNECTION_STRING) or die('Connection failed : ' . pg_last_error());

    $query = 'SELECT * FROM ' . $tablename . ' ' . $constraint;
    $result = pg_query($query) or die('Echec de la requete : ' . pg_last_error());
    echo "<table style='width: 100%'>\n<tr>\n";

    $i = pg_num_fields($result);
    for ($j = 0; $j < $i; $j++)
        echo "<td class='colname'>" . pg_field_name($result, $j) . "</td>\n";
    echo "</tr>\n";
    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
        echo "\t<tr>\n";
        foreach ($line as $col_value)
            echo "\t\t<td>$col_value</td>\n";
        echo "\t</tr>\n";
    }
    echo "</table>\n";

    pg_free_result($result);
    pg_close();
}

function get_user_infos($user) {
    $dbconnection = pg_connect(CONNECTION_STRING) or die('Connection failed : ' . pg_last_error());
    $query = 'SELECT * FROM player_account WHERE login LIKE \'' . $user . '\'';
    $result = pg_query($query) or die('Echec de la requete : ' . pg_last_error());
    $result_array = pg_fetch_array($result, 0, PGSQL_ASSOC);

    $_SESSION['login'] = $result_array['login'];
    $_SESSION['pseudo'] = $result_array['pseudo'];

    $query = 'SELECT * FROM player_info WHERE login LIKE \'' . $user . '\'';
    $result = pg_query($query) or die('Echec de la requete : ' . pg_last_error());
    $result_array = pg_fetch_array($result, 0, PGSQL_ASSOC);

    $_SESSION['name'] = $result_array['p_name'];
    $_SESSION['surname'] = $result_array['p_surname'];
    $_SESSION['dob'] = $result_array['birthday'];

    $query = 'SELECT * FROM ranked WHERE login LIKE \'' . $user . '\'';
    $result = pg_query($query) or die('Echec de la requete : ' . pg_last_error());
    $result_array = pg_fetch_array($result, 0, PGSQL_ASSOC);

    $_SESSION['elo'] = $result_array['elo'];

    $_SESSION['admin'] = dbcontains("administrators", $user);
}

function get_hash_for_user($user) {
    $dbconnection = pg_connect(CONNECTION_STRING) or die('Connection failed : ' . pg_last_error());
    $query = 'SELECT p_password FROM player_account WHERE login LIKE \'' . $user . '\'';
    $result = pg_query($query) or die('Echec de la requete : ' . pg_last_error());

    return pg_fetch_array($result, 0, PGSQL_ASSOC)['p_password'];
}

?>