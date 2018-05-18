<?php

  // Add class="highlight" to the active navigation
  function echoMenu($highlight) {
    $start = "";
    $kontakt = "";
    $blogg = "";

    if($highlight == 'Start') {
      $start = 'class="highlight"';
    }
    elseif($highlight == 'Kontakt') {
      $kontakt = 'class="highlight"';
    }
    elseif($highlight == 'Blogg') {
      $blogg = 'class="highlight"';
    }

    echo '
      <nav>
        <ul>
          <li><a ' . $start . ' href="index.php">Start</a></li>
			    <li><a ' . $blogg . ' href="index.php?page=blogg">Blogg</a></li>
			    <li><a ' . $kontakt . ' href="index.php?page=kontakt">Kontakt</a></li>
		    </ul>
	    </nav>';
  }

?>
