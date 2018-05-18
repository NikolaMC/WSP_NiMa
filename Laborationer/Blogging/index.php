<?php

require ("includes/view.php");
require ('includes/model.php');

// Set header correct without using HTML
header("Content-type: text/html; charset=utf-8");

// Get value from url for key page
$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_URL);

// If/else to check what page to visit
if(empty($page)) {
  $header = "Start";
  $content = "Välkommen till Labb 2! Här övar vi på PHP för att bli duktiga webbserverprogrammerare. Detta är andra labben men första labben i en serie labbar som tillsammans bygger vidare på detta projekt som vi påbörjar här. Ett enkelt PHP-projekt men väl strukturerat och genomtänkt konstruerat.";
  require ("templates/page-template.php");
}

else if($page=="blogg") {
  $header = "Blogg";
  $post = filter_input(INPUT_GET, 'post', FILTER_SANITIZE_URL);
  $template = "all-blog-posts";

  // Check if subpage $post is not empty
	if (!empty($post)) {
		//Loop through the $model array and check if the message exists.
		foreach($model as $key => $slug) {
			if ($model[$key]['slug'] == $post) {
				$template = "single-blog-post";
				$title = $model[$key]['title'];
				$author = $model[$key]['author'];
				$date = $model[$key]['date'];
				$message = $model[$key]['text'];
			}
		}
	}

  require ("templates/" . $template . "-template.php");
}

else if($page=="kontakt") {
  $header = "Kontakt";
  $content = "Du når oss på epost@labb2.se";
  require ("templates/page-template.php");
}

else if($page=="test") {
  echo "Den sökta sidan finns inte";
}

else {
	echo "Det finns ett värde som inte känns igen";
}
?>
