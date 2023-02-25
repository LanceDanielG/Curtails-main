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

    <form action="services/addToCart.php" method="POST">
        <input type="hidden" name="productID" value="<?= $row['id']; ?> ">
        <div class="container">
            <div class="row justify-content-center align-items-center text-center mt-4">
                <div class="col">
                    <img src="<?= $row['product_ImagePath']; ?>" class="w-100" alt="">
                </div>
            </div>
            <div class="row justify-content-center align-items-center pt-3">
                <div class="col">
                    <h2><?= $row['productName'];?></h2>
                </div>
            </div>
            <div class="row justify-content-center align-items-center pt-3">
                <div class="col">
                    <h2>₱ <?= $row['productPrice'];?></h2>
                </div>
            </div>
            <div class="row justify-content-center align-items-center pt-3">
                <div class="col text-start">
                    <input class="form-control w-25" type="number" name="quantity" id="quantity" value="1">
                </div>
            </div>
            <div class="row justify-content-center align-items-center pt-3">
                <div class="col">
                    <h6>In Stock: <span id="numberOfStocks"><?= $row['productStocks'];?></span></h6>
                </div>
            </div>
            <div class="row justify-content-center align-items-center">
                <div class="col">
                    <button type="submit" class="btn btn-primary primary-background button-outline-secondary">Add to Cart</button>
                </div>
            </div>
        </div>
    </form>

<?php include_once 'footer.php'; ?>

<script>
    $('#quantity').on('input', ()=>{
        if(parseInt($('#numberOfStocks').text()) < $('#quantity').val()){
            $('#quantity').val(0);
        }
    });
</script>