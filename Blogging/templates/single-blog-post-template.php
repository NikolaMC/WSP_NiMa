<!DOCTYPE html>
<html lang="sv">
  <head>
  	<meta charset="utf-8"/>
  	<title>PHP-Labb2</title>
    <link rel="stylesheet" type="text/css" href="labb3.css">
  </head>
  <body>

    <?php

    require "header.php";

    echoMenu($header);

    ?>

    <div class="content">
      <h2><?php echo $title; ?></h2>
      <p class="author">Författare: <?php echo $author; ?></p>
      <p class="date">Datum: <?php echo $date; ?></p>
      <p class="message"><?php echo $message; ?></p>
    </div>

    <?php require "footer.php"; ?>

  </body>
</html>
