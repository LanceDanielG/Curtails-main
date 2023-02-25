<?php
    include 'dbConnection.php';
    session_start();

    if (isset($_POST['editProductName'])) {
        $originalKey = $_POST['originalProductName'];
        $editName = $_POST['editProductName'];
        $editPrice = $_POST['editProductPrice'];
        $editStock = $_POST['editProductStock'];
        $editSales = $_POST['editProductSales'];
        $editDesc = $_POST['editProductDesc'];

        $sql = "UPDATE products SET productName = '$editName', productPrice = '$editPrice', productStocks = '$editStock', productSales = '$editSales', productDescription = '$editDesc' WHERE productName = '$originalKey'";
        $sqlQuery = mysqli_query($connect,$sql);

        header('LOCATION: ../adminProducts.php');
    }

?>