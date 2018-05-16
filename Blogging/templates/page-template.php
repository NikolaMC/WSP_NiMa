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
        echo $content;
    	echo "</div>";

      // Include footer
      require "footer.php";
    ?>

  </body>
</html>
