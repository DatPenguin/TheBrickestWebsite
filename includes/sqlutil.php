<?php
function dbcontains($pseudo)
{
    $dbconnection = pg_connect("host=localhost dbname=postgres user=pguser password=password") or die('Connection failed : ' . pg_last_error());

    $query = 'SELECT * FROM MyUsers WHERE login LIKE \'' . $pseudo . '\'';
    $result = pg_query($query) or die('Echec de la requete : ' . pg_last_error());

    if (pg_num_rows($result) == 0)
        return false;
    return true;
}

function print_table($tablename)
{
    $dbconnection = pg_connect("host=localhost dbname=postgres user=pguser password=password") or die('Connection failed : ' . pg_last_error());

    $query = 'SELECT * FROM ' . $tablename;
    $result = pg_query($query) or die('Echec de la requete : ' . pg_last_error());

    //echo "<p>Query : \"$query\"</p>\n";
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

function print_table_constraint($tablename, $constraint)
{
    $dbconnection = pg_connect("host=localhost dbname=postgres user=pguser password=password") or die('Connection failed : ' . pg_last_error());

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

function get_hash_for_user($user)
{
    $dbconnection = pg_connect("host=localhost dbname=postgres user=pguser password=password") or die('Connection failed : ' . pg_last_error());
    $query = 'SELECT pass FROM myusers WHERE login LIKE \'' . $user . '\'';
    $result = pg_query($query) or die('Echec de la requete : ' . pg_last_error());

    return pg_fetch_array($result, 0, PGSQL_ASSOC)[pass];
}

?>