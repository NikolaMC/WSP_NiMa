<?php
require 'resources/includes/db_conn.php'; // Include db_conn.php. If the file can't be included, display an error and stop running the code

if ($pdo) {

    // Select all of the posts from the database
    $sql = 'SELECT P.ID, P.Slug, P.Headline, CONCAT(U.First_Name, " ", U.Last_Name) AS Name, P.Creation_time, P.Text FROM Posts AS P JOIN Users AS U ON U.ID = P.User_ID ORDER BY P.Creation_time DESC';

    // Check if the user entered anything into the search bar and clicked the search button
    if (isset($_POST['search'])) {
        // Store what the user entered into the search bar into $data
        $data = $_POST['what'];

        /**********************************************************/
        /*********************** C-UPPGIFT 1 **********************/
        /*** Variabeln $data kan innehålla, som den är utformad, **/
        /********* information som kan skada vår databas. *********/
        /*** För betyget C så kräver jag att ni säkerställer att **/
        /***** $data inte innehåller någon form av skadlig kod ****/
        /**********************************************************/

        /**********************************************************/
        /*********************** C-UPPGIFT 2 **********************/
        /* I filen all-posts.php så skrivs det ut en kortare text */
        /* följt av en länk till berört inlägg. Vore det inte mer */
        /* passande att det istället skrivs ut ord från inlägget? */
        /* För betyget C så kräver jag att ni tar fram en lösning */
        /**** där 10 ord från inlägget skrivs ut före läs mer. ****/
        /************ Tänk implode och/eller explode! *************/
        /**********************************************************/

        /**********************************************************/
        /************************ A-UPPGIFT ***********************/
        /** Som det är just nu så tar vi bara in en variabel som **/
        /******* vi använder när vi söker igenom databasen. *******/
        /* Tittar man på sidor som exempelvis google och facebook */
        /**** så kan din sökning oftast innehålla flera sökord ****/
        /* För betyget A så kräver jag att ni tar fram en lösning */
        /** som gör det möjligt för användaren att kunna söka på **/
        /** flera separerade ord. Att man exempelvis kan söka på **/
        /***** texter som innehåller både "Lorum" och "Ipsum." ****/
        /**********************************************************/

        // If $data is not empty, return all of the posts that contain the words that the user entered into the search bar
        if (!empty($data)) {
/*
            $sql = 'SELECT p.ID, p.Slug, p.Headline, CONCAT(u.First_Name, " ", u.Last_Name) AS Name, p.Creation_time, p.Text FROM Posts AS p JOIN Users AS u ON U.ID = P.User_ID WHERE p.Text LIKE "%'.$data.'%" ORDER BY P.Creation_time DESC';
*/
            $sql = 'SELECT p.ID, p.Slug, p.Headline, CONCAT(u.First_Name, " ", u.Last_Name) AS Name, p.Creation_time, p.Text FROM Posts AS p JOIN Users AS u ON U.ID = P.User_ID WHERE';
            $keywords = explode(" ", $data);
            $keyCount = 0;
            foreach ($keywords as $keys) {
              if ($keyCount > 0){
                  $sql .= ' OR';
              }
              $sql .= ' p.Text LIKE "%'.$keys.'%" ';
              ++$keyCount;
            }
            $sql .= ' ORDER BY P.Creation_time DESC';

/*
            $query = 'SELECT p.ID, p.Slug, p.Headline, CONCAT(u.First_Name, " ", u.Last_Name) AS Name, p.Creation_time, p.Text FROM Posts AS p JOIN Users AS u ON U.ID = P.User_ID WHERE p.Text LIKE :keyword ORDER BY P.Creation_time DESC';

            $keywords = explode(" ", $data);
            foreach ($keywords as $keys) {

            }

            $pdo->prepare($query);
*/

        }
    }

    // Create an array that contains all of the posts from the database using a foreach loop to get all of the posts
    $model = array();
    foreach($pdo->query($sql) as $row) {
        // Add all of the correct values to the right keys in the associative array
        $model += array(
            $row['ID'] => array(
                'slug' => $row['Slug'],
                'title' => $row['Headline'],
                'author' => $row['Name'],
                'date' => $row['Creation_time'],
                'text' => $row['Text']
            )
        );
    }
}
else {
    print_r($pdo->errorInfo());
}
?>
