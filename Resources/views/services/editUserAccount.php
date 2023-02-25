<?php
// registration queries and shits
    include 'dbConnection.php';
    session_start();
    //queries
    if (isset($_POST['username'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $statement = $connect->prepare('UPDATE user_account SET username = ?, password = ? WHERE id = "'.$_SESSION['logged']['id'].'"');
        $statement->bind_param("ss", $username, $password);
        $statement->execute();

        $_SESSION['success'] = "Edited Successfuly";
        header("LOCATION: ../myAccount.php");
    } else {
        header("LOCATION: ../myAccount.php");
        $_SESSION['error'] = "No Changes";
    }
?>