<?php
// registration queries and shits
    include 'dbConnection.php';
    session_start();
    //queries
    if (isset($_POST['save'])) {
        $firstname = $_POST['firstname'];
        $middlename = $_POST['middlename'];
        $lastname = $_POST['lastname'];
        $gender = $_POST['gender'];
        $birthdate = $_POST['birthdate'];
        $age = $_POST['age'];
        $street1 = $_POST['street1'];
        $street2 = $_POST['street2'];
        $baranggay = $_POST['baranggay'];
        $zipcode = $_POST['zipcode'];
        $city = $_POST['city'];

        $statement = $connect->prepare('UPDATE user_account SET firstname = ?, middlename = ?, lastname = ?, gender = ?, birthdate = ?, age = ?, street1 = ?, street2 = ?, baranggay = ?, zipcode = ?, city = ? WHERE id = "'.$_SESSION['logged']['id'].'"');
        $statement->bind_param("sssssssssss", $firstname, $middlename, $lastname, $gender, $birthdate, $age, $street1, $street2, $baranggay, $zipcode, $city);
        $statement->execute();

        $_SESSION['success'] = "Edited Successfuly";
        header("LOCATION: ../myAccount.php");
    } else {
        header("LOCATION: ../myAccount.php");
        $_SESSION['error'] = "No Changes";
    }
?>
