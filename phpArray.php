<?php

  // Övning 1
  $color = array('white', 'green', 'red', 'blue', 'black');

  echo "The memory of that scene for me is like a frame of film forever frozen at that moment:
  the " . $color[2] . " carpet, the " . $color[1] . " lawn, the " . $color[0] . " house, the leaden sky.
  The new president and his first lady. - Richard M. Nixon<hr>";

  // Övning 2
  $color1 = array('white', 'green', 'red');

  foreach ($color1 as $key) {
    echo "$key, ";
  }

  echo "<br>";

  sort($color1); // Sort $color1 in an alphabetic order

  echo "<ul>"; // Open the unordered list HTML tag

    foreach ($color1 as $key) {
      echo "<li>$key</li>";
    }

  echo "</ul><hr>"; // Close the unordered list HTML tag

  // Övning 3
  $ceu = array( "Italy"=>"Rome", "Luxembourg"=>"Luxembourg", "Belgium"=>"Brussels", "Denmark"=>"Copenhagen",
  "Finland"=>"Helsinki", "France"=>"Paris", "Slovakia"=>"Bratislava", "Slovenia"=>"Ljubljana",
  "Germany"=>"Berlin", "Greece"=>"Athens", "Ireland"=>"Dublin", "Netherlands"=>"Amsterdam", "Portugal"=>"Lisbon",
  "Spain"=>"Madrid", "Sweden"=>"Stockholm", "United Kingdom"=>"London", "Cyprus"=>"Nicosia", "Lithuania"=>"Vilnius",
  "Czech Republic"=>"Prague", "Estonia"=>"Tallin", "Hungary"=>"Budapest", "Latvia"=>"Riga", "Malta"=>"Valetta",
  "Austria" => "Vienna", "Poland"=>"Warsaw");

  asort($ceu); // Sort $ceu in an alphabetic order according to the value

  foreach ($ceu as $key => $value) {
    echo "The capital of $key is $value<br>";
  }

  echo "<hr>";

  // Övning 4
  
?>
