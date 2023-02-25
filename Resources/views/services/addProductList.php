<?php 
    include 'dbConnection.php';
    session_start();
    // Variable for File Uploading
    $targetDir = $_SERVER['DOCUMENT_ROOT'] . "/IS_Elective/Resources/src/img/uploads/";
    $targetFile = $targetDir . basename($_FILES['addImage']['name']);
    $imgFileType = pathinfo($targetFile,PATHINFO_EXTENSION);
    // On Submit
    if (isset($_POST['productName'])) {
        //files allowed
        $allowedType = array('jpg', 'jpeg', 'png', 'gif', 'webp', 'JPG', 'JPEG', 'PNG', 'GIF', 'WEBP');
        // File Uploading and Validation
        if (file_exists($targetFile)) {
            $_SESSION['error'] = 'Uploaded FIle ALready Exists';
            header('LOCATION: ../adminProducts.php');
            
        }
        else if (!in_array($imgFileType, $allowedType)) {
            $_SESSION['error'] = 'File is not an Image';
            header('LOCATION: ../adminProducts.php');
        } 
        else {
            // Moving the file to project folder
            if (move_uploaded_file($_FILES['addImage']['tmp_name'], $targetFile)) {
                // echo "The File".basename($_FILES['addImage']['name'])."Has Been Uploaded";
                
                // Inserting to Database
                $productName = $_POST['productName'];
                $productPrice = $_POST['price'];
                $productStocks = $_POST['stock'];
                $productSales = 0;
                $productDescription = $_POST['description'];
                $productPath = "/IS_Elective/Resources/src/img/uploads/" . $_FILES['addImage']['name'];
                $productCategory = $_POST['category'];
                
                $statement = $connect->prepare('INSERT INTO products (product_ImagePath,productName,productPrice,productStocks,productSales,productDescription, prodCategory) VALUES (?,?,?,?,?,?, ?)');
                $statement->bind_param("sssssss", $productPath,$productName,$productPrice,$productStocks,$productSales,$productDescription, $productCategory);
                $statement->execute();

                $_SESSION['success'] = "Product Successfully Created";
                
                header('LOCATION: ../adminProducts.php');
            } else {
                $_SESSION['Transaction-Failed'] = 'True';
                header('LOCATION: ../adminProducts.php');
            }
        }
    } else {
        $_SESSION['Transaction-Failed'] = 'True';
        header('LOCATION: ../adminProducts.php');
    }
?>