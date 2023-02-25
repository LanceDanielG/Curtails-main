<?php
// registration queries and shits
    include 'dbConnection.php';
    session_start();
    foreach ($_POST as $key => $value) {
        $_SESSION['info'][$key] = $value;
    }
    //queries
    if (isset($_SESSION['info']['username'])) {
        if ($_SESSION['info']['password'] == $_SESSION['info']['confirmpassword']) {
            $firstname = $_SESSION['info']['firstname'];
            $middlename = $_SESSION['info']['middlename'];
            $lastname = $_SESSION['info']['lastname'];
            $gender = $_SESSION['info']['gender'];
            $birthdate = $_SESSION['info']['birthdate'];
            $age = $_SESSION['info']['age'];
            $street1 = $_SESSION['info']['street1'];
            $street2 = $_SESSION['info']['street2'];
            $baranggay = $_SESSION['info']['baranggay'];
            $zipcode = $_SESSION['info']['zipcode'];
            $city = $_SESSION['info']['city'];
            $phonenumber = $_SESSION['info']['phonenumber'];
            $email = $_SESSION['info']['email'] . "@" . $_SESSION['info']['server'];
            $username = $_SESSION['info']['username'];
            $password = $_SESSION['info']['password'];

            $statement = $connect->prepare("INSERT INTO user_account (firstname, middlename, lastname, gender, birthdate, age, street1, street2, baranggay, zipcode, city, phonenumber, email, username, password) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $statement->bind_param("sssssssssssssss", $firstname, $middlename, $lastname, $gender, $birthdate, $age, $street1, $street2, $baranggay, $zipcode, $city, $phonenumber, $email, $username, $password);
            $statement->execute();

            $_SESSION['success'] = $username . " has successfully registered.";
            unset($_SESSION['error']);
            unset($_SESSION['info']);
            header("LOCATION: ../loginPage.php");
        }
        else{
            $_SESSION['error'] = 'Password does not Match';
            header("LOCATION: ../verification.php");
        }
    }

    else{
            $_SESSION['error'] = 'Password does not Match';
            header("LOCATION: ../verification.php");
        }
?>
