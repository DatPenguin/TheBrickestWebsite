<!DOCTYPE HTML>
<html>
  <head>
    <title>The Dankest Production</title>
    <meta charset='UTF-8' />
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <h1>Le site est up !</h1>
    <p>Il est un peu dégueu mais le serveur est chouette.</p>
    
    <?php
       $_connexionToken = pg_connect("user=pguser password=password host=localhost port=5432 dbname=postgres");

       if ($_connexionToken)
         echo("<p>Connection Success</p>");
       else
         echo("<p>Connection failed</p>");

       $_connexionClose = pg_close($_connexionToken);
       if ($_connexionClose)
         echo("<p>Deconnection Success</p>");
       else
         echo("<p>Deconnection failed</p>");
       ?>

    <img src="rsc/kappa.png" alt="kappa" />
    <img src="rsc/cat.jpg" alt="kitty" />
    <img src="rsc/doge.png" alt="doge" />
  </body>
</html>
