<?php 
    session_start();
    include 'dbConnection.php';

    $query = "SELECT * FROM admin_account";
    $sqlLogin = mysqli_query($connect,$query);
    
    if (isset($_POST['login'])) {
        while ($result = mysqli_fetch_assoc($sqlLogin)) {
            if ($_POST['username'] == $result['username'] && $_POST['password'] == $result['password']) {
                $_SESSION['logged'] = $_POST['username'];
            }
        }
        if (isset($_SESSION['logged'])) {
            unset($_SESSION['error']);
            header("LOCATION: ../adminProducts.php");
        }
        else{
            $_SESSION['error'] = 'Invalid Credentials';
            header("LOCATION: \IS_Elective\admin-login.php");
        }
    }
?>
