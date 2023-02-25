<?php
    session_start();
    
    if(isset($_POST['productID'])){
        include_once 'dbConnection.php';
        $SQL = "SELECT * FROM products WHERE id=" . $_SESSION['productID'];
        $product = mysqli_query($connect, $SQL);
        $row = mysqli_fetch_assoc($product);
        if(array_key_exists($_POST['productID'], $_SESSION['cart'])){
            $_SESSION['cart'][$_POST['productID']]['productQuantity'] = $_POST['quantity'];
        }
        else{
            $_SESSION['cart'][$_POST['productID']] = array(
                'product_ImagePath' => $row['product_ImagePath'],
                'productName' => $row['productName'],
                'productDescription' => "WALA PA",
                'productQuantity' => $_POST['quantity'],
                'productPrice' => $row['productPrice'],
            );
        }
        $_SESSION['toaster_Success'] = "Product successfully added to cart";
    }

    header("LOCATION: ../products.php")

?>