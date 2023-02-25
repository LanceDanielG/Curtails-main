<?php

    require "dbConnection.php";
    session_start();

    $SQL = "DELETE FROM user_account WHERE id='". $_POST['id'] . "'";
    mysqli_query($connect, $SQL);
?>