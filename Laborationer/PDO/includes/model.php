<?php

// All of the info required to connect to the database
$host = 'localhost';
$dbname = 'Blogg';
$user = 'admin';
$password = '12345678';

// Create an attribute for the PDO object
$attr = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);

// Change charset to utf8mb4
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

// Create the SQL code
$sql = "SELECT P.ID, P.Slug, P.Headline, CONCAT(U.First_Name, ' ', U.Last_Name) AS Name, P.Creation_Time, P.Text FROM Posts AS P JOIN Users AS U ON U.ID = P.User_ID ORDER BY P.Creation_Time DESC";

// Create the PDO object
$pdo = new PDO($dsn, $user, $password, $attr);

// Testing the connection
if($pdo) {

  // Create the $model array
  $model = array();

  foreach($pdo->query($sql) as $row) {
    $model += array(
      $row['ID'] => array(
        'slug' => $row['Slug'],
        'title' => $row['Headline'],
        'author' => $row['Name'],
        'date' => $row['Creation_Time'],
        'text' => $row['Text']
      )
    );
  }

} else {
  print_r($pdo->errorInfo());
}

/*
$model = array(
    '0' => array(
        'slug' => 'forsta-inlagget',
        'title' => 'Första inlägget',
        'author' => 'Gugge',
        'date' => '2015-01-01',
        'text' => 'Här kommer det första inlägget i sin helhet. Välkommen till Labb 3! Här övar vi på PHP för att bli duktiga webbserverprogrammerare. Detta är tredje labben och andra labben i en serie labbar som tillsammans bygger ihop detta projekt. Ett enkelt PHP-projekt men väl strukturerat och genomtänkt konstruerat.'
    ),
    '1' => array(
        'slug' => 'snart-ar-det-var',
        'title' => 'Snart är det vår',
        'author' => 'Gugge',
        'date' => '2015-02-24',
        'text' => 'Snart är det vår! Då övar vi på PHP för att bli duktiga webbserverprogrammerare. Detta är tredje labben och andra labben i en serie labbar som tillsammans bygger ihop detta projekt. Ett enkelt PHP-projekt men väl strukturerat och genomtänkt konstruerat.'
    ),
    '2' => array(
        'slug' => 'robin-presenterar-sig',
        'title' => 'Robin presenterar sig',
        'author' => 'Robin',
        'date' => '2015-02-25',
        'text' => 'Robin är en trevlig prick som gärna övar på PHP för att som du bli en duktig webbserverprogrammerare. Detta är tredje labben och andra labben i en serie labbar som tillsammans bygger ihop detta projekt. Ett enkelt PHP-projekt men väl strukturerat och genomtänkt konstruerat.'
    ),
    '3' => array(
        'slug' => 'senaste-inlagget',
        'title' => 'Senaste inlägget',
        'author' => 'Robin',
        'date' => '2015-02-26',
        'text' => 'Här kommer senaste inlägget i sin helhet. Välkommen till Labb 3! Här övar vi på PHP för att bli duktiga webbserverprogrammerare. Detta är tredje labben och andra labben i en serie labbar som tillsammans bygger ihop detta projekt. Ett enkelt PHP-projekt men väl strukturerat och genomtänkt konstruerat.'
    )
);
*/

?>
