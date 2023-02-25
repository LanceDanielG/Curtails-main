<?php

    session_start();

    if(isset($_SESSION['cart'])){
        include_once 'dbConnection.php';
        foreach($_SESSION['cart'] as $itemID => $item){
            $SQL = "SELECT productStocks FROM products WHERE id=". $itemID;
            $result = mysqli_query($connect, $SQL);
            $row = mysqli_fetch_assoc($result);
            $initialQuantity = $row['productStocks'];
            $finalQuantity = $initialQuantity - $item['productQuantity'];
            
            $SQL = "UPDATE products SET productStocks='". $finalQuantity . "' WHERE id=" . $itemID;
            mysqli_query($connect, $SQL); 

            $SQL = "INSERT INTO transactions (transactionDate, productID, productQuantity, productPrice, productName, customer) VALUES (?, ?, ?, ?, ?, ?);";
            $statement = mysqli_prepare($connect, $SQL);
            $dateRN = date("d-m-Y");
            mysqli_stmt_bind_param($statement, "ssssss", 
                $dateRN,
                $itemID,
                $item['productQuantity'],
                $item['productPrice'],
                $item['productName'],
                $_SESSION['logged']['id']
            );
            mysqli_stmt_execute($statement);
            $_SESSION['cart'] = [];
            $_SESSION['toaster_Success'] = "Purchased Successfully";
        }
    }
    header("LOCATION: ../../../index.php");
?>