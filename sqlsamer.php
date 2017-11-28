<?php
include("includes/top.php");
include("includes/navbar.php");
include("includes/hero.php");
?>
    <div class="main-content">
        <div class="txtBlock">
            <h1>SQL</h1>
            <?php
            $dbconnection = pg_connect("host=localhost dbname=postgres user=pguser password=password") or die('Connection failed : ' . pg_last_error());

            $query = 'SELECT * FROM tabletest';
            $result = pg_query($query) or die('Echec de la requete : ' . pg_last_error());

            echo "<p>Query : \"$query\"</p>\n<table>\n<tr>\n";

            $i = pg_num_fields($result);
            for ($j = 0; $j < $i; $j++)
                echo "<td>" . pg_field_name($result, $j) . "</td>\n";
            while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
                echo "</tr>\n\t<tr>\n";
                foreach ($line as $col_value)
                    echo "\t\t<td>$col_value</td>\n";
                echo "\t</tr>\n";
            }
            echo "</table>\n";

            pg_free_result($result);
            pg_close();
            ?>
        </div>
    </div>
<?php
include("includes/bot.php");
?>