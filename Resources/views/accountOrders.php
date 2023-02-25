<?php include 'header.php'; ?>
<?php 
    include_once 'services/dbConnection.php';
    $sql = "SELECT * FROM transactions WHERE customer='". $_SESSION['logged']['id'] ."'"; 
    $result = mysqli_query($connect, $sql);
?>
    <div class="container-fluid row m-0 p-0">
        <div class="row justify-content-center align-items-center">
            <div class="col-2 p-0 m-0">
                <ul class="dropdown-item d-grid gap-5 px-4">
                    <div class="mb-5 mt-5 py-5">
                        <h3>My Account</h3>
                    </div>
                    <li class="">
                        <a class="" href="myAccount.php">My Details</a>
                    </li>
                    <li class="nav-list">
                        <a class="" href="accountOrders.php">My Orders</a>
                    </li>
                    <li class="nav-list">
                        <a class="" href="accountSetting.php">Account Setting</a>
                    </li>
                </ul>
            </div>
            <div class="col p-0 m-0">
                <div class="container-fluid">
                    <div class="row mt-5 mx-0 p-5">
                        <h2 class="mb-5">My Details</h2>
                    </div>
                    <div class="row justify-content-center align-items-center mb-5">
                        <div class="col">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Date Ordered</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($result as $item): ?>
                                        <tr>
                                            <td><?= $item['productName']; ?></td>
                                            <td><?= $item['productQuantity']; ?></td>
                                            <td><?= $item['productPrice']; ?></td>
                                            <td><?= $item['transactionDate']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include 'footer.php'; ?>
<?php include 'services/toaster.php'; ?>
<script>
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "10000",
        "extendedTimeOut": "10000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>