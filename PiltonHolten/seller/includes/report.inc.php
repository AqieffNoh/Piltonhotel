<?php
    header('Content-Type: application/json');

    require_once('includes/dbh.inc.php');

    $sqlQuery = "SELECT * FROM merch_order ORDER BY merch_id";

    $result = mysqli_query($conn,$sqlQuery);

    // $data = array();
    // foreach ($result as $row) {
    //     $data[] = $row;
    // }

    while ($row = mysqli_fetch_array($result)) {
        
    }

    mysqli_close($conn);

    echo json_encode($data);
?>