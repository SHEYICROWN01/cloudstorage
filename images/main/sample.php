<?php
require('connection.php');

$makeQuery =mysqli_query($conn, "SELECT * FROM abk_south_riders");

$myarray = array();

while ($resultsFrom = mysqli_fetch_array($makeQuery)){
$id =$resultsFrom['reg_code'];
   
    array_push(
        $myarray,array(
            "id"=>$resultsFrom['id'],
            "fullname"=>$resultsFrom['surname']." ".$resultsFrom['firstname'],
            "regCode"=>$resultsFrom['reg_code'],
            "tracking_id"=>$resultsFrom['tracking_id'],
            "phone"=>$resultsFrom['phone'],
            "photo"=>$resultsFrom['photo']
        )
    );

$makeQuery1 =mysqli_query($conn, "SELECT * FROM riders_employer WHERE riders_code = '$id'");

$myarray = array();

while ($results = mysqli_fetch_array($makeQuery1)){
$id2 =$results['riders_code'];
   
    array_push(
        $myarray,array(
            "id"=>$results['riders_code'],
            "fullname"=>$results['surname']." ".$results['firstname']." ".$results['othername'],
            "gender"=>$results['gender'],
            "address"=>$results['address']." ".$results['city']." ".$results['LGA'],
            "phone"=> $results['phone']
        )
    );

   
}
}

echo json_encode($myarray);

?>