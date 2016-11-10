<?php
require_once('../util/main.php');

// get the search term
$search_term = isset($_REQUEST['term']) ? $_REQUEST['term'] : "";

// write your query to search for data
$query = "SELECT
            playerID, firstName, lastName
        FROM
            players
        WHERE
            firstName LIKE '%{$search_term}%'
            OR
            lastName LIKE '%{$search_term}%'
        LIMIT 0,10";

$statement = $db->prepare($query);
$statement->execute();

// get the number of records returned
$num = $statement->rowCount();

if($num>0){

    // this array will become JSON later
    $data = array();

    // loop through the returned data
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $data[] = array(
            'label' => $firstName . " " . $lastName,
            'value' => $playerID
        );
    }
    // convert the array to JSON
    echo json_encode($data);
}

//if no records found, display nothing
else{
    die();
}
?>
