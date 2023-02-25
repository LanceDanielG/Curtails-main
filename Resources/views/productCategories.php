<?php include_once 'header.php';?>
<?php 

    if(isset($_GET['productID'])){
        $_SESSION['productID'] = $_GET['productID'];
    }
    else{
        unset($_SESSION['productID']);
        header('LOCATION: products.php');
    }

    include_once 'services/dbConnection.php';

    $SQL = "SELECT * FROM products WHERE id=" . $_SESSION['productID'];
    $product = mysqli_query($connect, $SQL);
    $row = mysqli_fetch_assoc($product);
?>  

    <div class="container-fluid bg-black">

    </div>

<?php include_once 'footer.php'; ?>