<?php 
    include 'dbConnection.php';
    session_start();

    if (isset($_POST['originalProductName'])) {
        $originalKey = $_POST['originalProductName'];
        
        $sql = "DELETE FROM products WHERE productName = '$originalKey'";
        $sqlQuery = mysqli_query($connect,$sql);
        $_SESSION['success'] = "Removed Successful";

        header('LOCATION: ../adminProducts.php');
    }
?>