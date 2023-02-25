<?php
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "curltail_db";
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $connect = mysqli_connect(
        // Server Name
        $servername,
        // Server Default Username
        $db_username,
        // Server Default Password
        $db_password,
        // Server Database Name
        $db_name
    );
    

    
?>
