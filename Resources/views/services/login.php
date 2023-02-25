<?php
    session_start();
    include 'dbConnection.php';

    $query = "SELECT * FROM user_account";
    $sqlLogin = mysqli_query($connect,$query);
    
    if (isset($_POST['login'])) {
        while ($result = mysqli_fetch_assoc($sqlLogin)) {
            if ($_POST['username'] == $result['username'] && $_POST['password'] == $result['password']) {
                $_SESSION['logged']['name'] = $result['lastname'] . ", " . $result['firstname'] . " " . $result['middlename'];
                $_SESSION['logged']['username'] = $result['username'];
                $_SESSION['logged']['id'] = $result['id'];
                $_SESSION['cart'] = [];
            }
        }
        if (isset($_SESSION['logged'])) {
            header("LOCATION: \IS_Elective\index.php");
        }
        else{
            $_SESSION['toaster_Error'] = 'User Not Found';
            header("LOCATION: ../loginPage.php");
        }
    }
?>
