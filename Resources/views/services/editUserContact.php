<?php
// registration queries and shits
    include 'dbConnection.php';
    session_start();
    //queries
    if (isset($_POST['save'])) {
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];

        $statement = $connect->prepare('UPDATE user_account SET email = ?, phonenumber = ? WHERE id = "'.$_SESSION['logged']['id'].'"');
        $statement->bind_param("ss", $email, $phonenumber);
        $statement->execute();

        $_SESSION['success'] = "Edited Successfuly";
        header("LOCATION: ../myAccount.php");
    } else {
        header("LOCATION: ../myAccount.php");
        $_SESSION['error'] = "No Changes";
    }
?>
