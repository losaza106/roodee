<?php 
function fetchRow($sql){
    include "dbh.inc.php";
    $result = $conn->query($sql);
    $data = [];
    if($result){
        while($row = $result->fetch_assoc()){
            array_push($data,$row);
        }

        return $data;
    }
}
function fetchOneRow($sql){
    include "dbh.inc.php";
    $result = $conn->query($sql);
    if($result){
        $row = $result->fetch_assoc();
        return $row;
    }
}
?>