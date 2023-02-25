<?php

    include_once 'dbConnection.php';
    session_start();
    if(isset($_POST['categoryName'])){
        $SQL = "INSERT INTO categories (categoryName) values (?);";
        $statement = mysqli_prepare($connect, $SQL);
        $statement->bind_param("s", $_POST['categoryName']);
        $statement->execute();
        $_SESSION['success'] = "Category Successfully Created";
    }
    header("LOCATION: ../categories.php");

?>