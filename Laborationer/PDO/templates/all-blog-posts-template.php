<!DOCTYPE html>
<html lang="sv">
  <head>
  	<meta charset="utf-8"/>
  	<title>PHP-Labb2</title>
    <link rel="stylesheet" type="text/css" href="labb3.css">
  </head>
  <body>

  	<?php
      // Include header
      require "header.php";

      echoMenu($header);

      // Content
      echo "<div class='content'>";
        echo "<h2>Alla blogginlägg</h2>";
        foreach ($model as $key => $value) {
          echo "<div class='post'>";
            echo "<h3>" . $model[$key]['title'] . "</h3>";
            echo "<p class='author'>Författare: " . $model[$key]['author'] . "</p>";
            echo "<p class='date'>Datum: " . $model[$key]['date'] . "</p>";
            echo "<p class='message'>Här kommer själva inlägget men inte i sin helhet... <a href='index.php?page=blogg&post=" . $model[$key]['slug']. "'>Läs mer</a></p>";
          echo "</div>";
        }
    	echo "</div>";

      // Include footer
      require "footer.php";
    ?>

  </body>
</html>
