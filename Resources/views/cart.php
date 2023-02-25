<?php include_once 'header.php'; ?>
    
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col text-center mt-3">
                <h3>Cart</h3>
            </div>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col text-center mt-3">
                <div class="table-responsive h-100 w-100">
                    <table class="table table-sthiped table-hover">
                        <thead class="primary-background">
                            <tr>
                                <th> Preview </th>
                                <th> Product ID</th>
                                <th> Name</th>
                                <th> Description</th>
                                <th> Quantity</th>
                                <th> Price</th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($_SESSION['cart'] as $key => $value): ?>
                                <tr>
                                    <td class="text-center">
                                        <img src="<?= $value['product_ImagePath']; ?>" alt="" style='height: 5em;'>
                                    </td>
                                    <td> <?= $key; ?> </td>
                                    <td> <?= $value['productName']; ?> </td>
                                    <td> <?= $value['productDescription']; ?> </td>
                                    <td class="col-sm-2"> 
                                        <?= $value['productQuantity']; ?>
                                    </td>
                                    <td> <?= $value['productQuantity'] * $value['productPrice']; ?> </td>
                                    <td> 
                                        <form action="services/removeFromCart.php" method="post">
                                            <div class="dropdown open">
                                                <a type="button" id="triggerId-<?= $key; ?>" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <img src="\IS_Elective\Resources\src\img\icons\dots.png" style="height: 1.5em;">
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="triggerId-<?= $key; ?>">
                                                    <input type="hidden"  name="itemID" value="<?= $key; ?>">
                                                    <button class="dropdown-item"  type='submit'>Remove</button>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                <input type="hidden" id="total-<?= $key;?>" class="totalFields" value="<?= $value['productQuantity'] * $value['productPrice']; ?>">
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-6 text-start">
                <h2>Total:</h2>
            </div>
            <div class="col-6 text-end">
                <h3> ₱<span id="finalTotal"></span></h3>
            </div>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col text-end">
                <form action="services/checkout.php" method="post">
                    <button type="submit" class="btn btn-primary">Check Out</button>
                </form>
            </div>
        </div>
    </div>

<?php include_once 'footer.php'; ?>
<?php include_once 'services/toaster.php'; ?>


<script>
    $(document).ready(()=>{
        let finalTotal = 0;
        $.each($(".totalFields"), (key, value)=>{
            finalTotal += parseInt(value.value);
        });
        $('#finalTotal').text(finalTotal);
    });
</script>

