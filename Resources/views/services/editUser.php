<?php

    require "dbConnection.php";
    session_start();

    $SQL = "UPDATE user_account SET username=?, password=? WHERE id=?";
    $statement = mysqli_prepare($connect, $SQL);
    $statement->bind_param("sss",
        $_POST['username'],
        $_POST['password'],
        $_POST['id']
    );
    $statement->execute();

    $_SESSION['success'] = "User Successfully Modified";
    header("LOCATION: ../adminUser.php");

?>