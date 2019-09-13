<?php
    $host = "localhost"; // ชื่อ Host
    $user = "root"; // username ของ host
    $pass = ""; // password ของ host
    $dbname = "roodee"; // ชื่อฐานข้อมูล
    
    $conn = new mysqli($host,$user,$pass,$dbname);
    mysqli_set_charset($conn,"utf8");
    if(mysqli_connect_error()){
        echo 'เชื่อมต่อข้อมูลไม่สำเร็จ'.mysqli_connect_error();
    }else{
        
    }

    $path = "roodee";