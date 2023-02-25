<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        include 'services/links.php';
        session_start();
        include_once 'services/dbConnection.php';
        $SQL = "SELECT * FROM categories";
        $categories = mysqli_query($connect, $SQL);
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Control</title>
</head>
<body>
    <div class="container-fluid row m-0 p-0 login-picture" id="sidebar">
        <div class="col-2 p-0">
            <ul class="nav flex-column d-flex justify-content-center align-items-center gap-5 admin-nav login-wrapper">
                <div class="mb-5">
                    <a href="admincontrols.php">
                        <img height='60em' src="\IS_Elective\Resources\src\img\logo\whitepaw.png" alt=" ">
                    </a>
                </div>
                <!-- <li class="nav-list">
                    <a class="text-white" href="adminControls.php">Dashboard</a>
                </li> -->
                <li class="nav-list">
                    <a class="text-white" href="adminProducts.php">Product</a>
                </li>
                <li class="nav-list">
                    <a class="text-white" href="categories.php">Categories</a>
                </li>
                <li class="nav-list">
                    <a class="text-white" href="adminUser.php">User</a>
                </li>
            </ul>
        </div>
        <div class="col admin-image login-wrapper p-0">
            <div class="row dropdown mt-4 mx-0 mb-0 d-flex text-end">
                <div>
                    <i class="fa-solid fa-user fa-xl me-4" data-bs-toggle="dropdown"></i>
                    <ul class="dropdown-menu">
                        <a href="services/logout.php" class="dropdown-item text-center">Log Out</a>
                    </ul>
                </div>
            </div>
            <div class="row px-5 mt-3 mb-0">
                <hr>
            </div>
            <div class="row d-flex align-items-center px-5 py-0 m-0">
                <div class="col-1 p-0 m-0">
                    <h2 class="my-2">Products</h2>  
                </div>
                <div class="col p-0 m-0 d-flex align-items-center justify-content-end">
                    <div class="d-flex justify-content-end align-items-center py-4 pe-4 m-0">
                        <a data-bs-toggle="modal" data-bs-target="#modalId" class="product-btn me-3 p-2 shadow-sm">Add Product</a>
                    </div>
                    <!-- <i class="fa-regular fa-bell fa-xl me-4 p-0"></i> -->
                </div>
            </div>
            <div class="row m-3 p-3 shadow">
                <table id="productTable" class="table align-middle p-5">
                    <thead>
                        <tr>
                            <form action="GET" class="m-0 p-0">
                                <th class="col">Photo</th>
                                <th class="col" onclick="sort(1)"> Name </th>
                                <th class="col" onclick="sort(2)"> Price </th>
                                <th class="col" onclick="sort(3)"> Stock </th>
                                <th class="col" onclick="sort(4)"> Sales </th>
                                <th class="col"></th>
                            </form>
                        </tr>
                    </thead>
                    <tbody id="products">
                        <?php
                            include 'services/dbConnection.php';

                            $sql = "SELECT * FROM products";
                            $query = mysqli_query($connect,$sql);
                            
                            while ($row = mysqli_fetch_assoc($query)) {
                                echo "<tr>";
                                echo     "<td class='col image-resize'><img src =  '". $row['product_ImagePath'] ." ' alt=''></td>";
                                echo     "<td class='col'>" . $row['productName']   . "</td>";
                                echo     "<td class='col'>" . $row['productPrice']  . "</td>";
                                echo     "<td class='col'>" . $row['productStocks'] . "</td>";
                                echo     "<td class='col'>" . $row['productSales']  . "</td>";
                                echo     "<td class='col'>";
                                echo        "<a href='#' data-bs-toggle='dropdown'><i style='font-size: 1.5em;' class='fa-solid fa-ellipsis-vertical' ></i></a>";
                                echo        "<ul class='dropdown-menu dropdown-menu-end text-center p-0'>
                                                <a class='dropdown-item' href='#' onclick='editProduct(\"" . $row['productName']   . "\", \"" . $row['productPrice']   . "\", \"" . $row['productStocks']   . "\",\"" . $row['productSales']   . "\",\"" . $row['productDescription']   . "\")' data-bs-toggle='modal' data-bs-target='#modalEdit'>
                                                    Edit
                                                </a>
                                                <form id='" .  str_replace(' ', '', $row['productName']) . "RemoveForm' action='services/removeProduct.php' method='post'>
                                                    <input type='hidden' name='originalProductName' value='" . $row['productName'] . "'>
                                                    <a class='dropdown-item' onclick='$(\"#" . str_replace(' ', '', $row['productName']) . "RemoveForm\").submit()'>Remove</a>
                                                </form>
                                            </ul>";
                                echo     "</td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

<!-- Modal Body Adding Product -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<form id="addProductForm" action="services/addProductList.php" method="post" enctype="multipart/form-data" class="">
    <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mx-4">
                    <div class="container">
                        <div class="row">
                            <div class="row mb-3">
                                <label for="addImage" class="form-label m-0 p-0"></label>Product Image</label>
                                <input type="file" name="addImage" class="form-control" id="addImage" required>
                            </div>
                            <div class="row mb-3">
                                <label for="productName" class="form-label m-0 p-0">Product Name</label>
                                <input type="text" name="productName" class="form-control" id="productName" required>
                            </div>
                            <div class="row mb-3">
                                <label for="price" class="form-label m-0 p-0">Price</label>
                                <input type="text" name="price" class="form-control " id="price" required>
                            </div>
                            <div class="row mb-3">
                                <label for="stock" class="form-label m-0 p-0">Stock</label>
                                <input type="text" name="stock" class="form-control" id="stock" required>
                            </div>
                            <div class="row mb-3">
                                <label class="form-label m-0 p-0">Category</label>
                                <select name="category" id="category" class="form-select">
                                    <?php foreach($categories as $category): ?>
                                        <option value="<?= $category['categoryName'];?>"><?= $category['categoryName'];?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>    
                            <div class="row mb-3">
                                <label for="description" class="form-label m-0 p-0">Description</label>
                                <textarea name="description" class="form-control" id="description" cols="30" rows="10" required></textarea>
                            </div>  
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Save"></input>
                </div>
            </div>
        </div>
    </div>
</form>
    

<script>
    function sort(n) {
        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
        table = document.getElementById("productTable");
        switching = true;
        dir = "asc";
        while (switching) {
            switching = false;
            rows = table.rows;
            for (i = 1; i < (rows.length - 1); i++) {
                shouldSwitch = false;
                x = rows[i].getElementsByTagName("TD")[n];
                y = rows[i + 1].getElementsByTagName("TD")[n];
                if (dir == "asc") {
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    shouldSwitch = true;
                    break;
                    }
                } else if (dir == "desc") {
                    if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                    shouldSwitch = true;
                    break;
                    }
                }
            }
            if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                switchcount ++;
            } 
            else {
                if (switchcount == 0 && dir == "asc") {
                    dir = "desc";
                    switching = true;
                }
            }
        }
    }
</script>

<?php
    include_once 'services/toaster.php';
?>

<!-- Modal Body of Edit Product -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<form id="editProductForm" action="services/editProduct.php" method="post" class="">
    <div class="modal fade" id="modalEdit" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">Edit Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="row">
                    <div class="modal-body mx-4">
                        <div class="row form-floating mb-3">
                            <input type="text" class="form-control" name="editProductName" id="editProductName" placeholder="" required>
                            <input type="hidden" name="originalProductName" id="originalProductName">
                            <label for="editProductName">Name</label>
                        </div>
                        <div class="row form-floating mb-3">
                            <input type="text" class="form-control" name="editProductPrice" id="editProductPrice" placeholder="" required>
                            <label for="editProductPrice">Price</label>
                        </div>
                        <div class="row form-floating mb-3">
                            <input type="text" class="form-control" name="editProductStock" id="editProductStock" placeholder="" required>
                            <label for="editProductStock">Stock</label>
                        </div>
                        <div class="row form-floating mb-3">
                            <textarea name="editProductDesc" class="form-control" id="editProductDesc" placeholder="" cols="30" rows="10" required></textarea>
                            <label for="editProductDesc">Description</label>
                        </div> 
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    function editProduct(name, price, stock, sales, description){
        $('#editProductName').val(name);
        $('#originalProductName').val(name);
        $('#editProductPrice').val(price);
        $('#editProductStock').val(stock);
        $('#editProductSales').val(sales);
        $('#editProductDesc').val(description);
    }
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
    $('#productName').on('input', ()=>{
        if (/[^a-zA-Z \t]+/.test($('#productName').val())){
            $('#productName').val('');
            toastr.error("Invalid Product Name, Please Try Again");
            $('#productName').addClass('is-invalid');
            $('#productName').removeClass('is-valid');
        }
        else{
            $('#productName').removeClass('is-invalid');
            $('#productName').addClass('is-valid');
        }
    });
    $('#price').on('input', ()=>{
        if (/[^0-9.]+/.test($('#price').val())){
            $('#price').val('');
            toastr.error("Invalid Price, Please Try Again");
            $('#price').addClass('is-invalid');
            $('#price').removeClass('is-valid');
        }
        else{
            $('#price').removeClass('is-invalid');
            $('#price').addClass('is-valid');
        }
    });
    $('#stock').on('input', ()=>{
        if (/[^0-9]+/.test($('#stock').val())){
            $('#stock').val('');
            toastr.error("Invalid Stock, Please Try Again");
            $('#stock').addClass('is-invalid');
            $('#stock').removeClass('is-valid');
        }
        else{
            $('#stock').removeClass('is-invalid');
            $('#stock').addClass('is-valid');
        }
    });
    $('#editProductName').on('input', ()=>{
        if (/[^a-zA-Z \t]+/.test($('#editProductName').val())){
            $('#editProductName').val('');
            toastr.error("Invalid Product Name, Please Try Again");
            $('#editProductName').addClass('is-invalid');
            $('#editProductName').removeClass('is-valid');
        }
        else{
            $('#editProductName').removeClass('is-invalid');
            $('#editProductName').addClass('is-valid');
        }
    });
    $('#editProductPrice').on('input', ()=>{
        if (/[^0-9.]+/.test($('#editProductPrice').val())){
            $('#editProductPrice').val('');
            toastr.error("Invalid Price, Please Try Again");
            $('#editProductPrice').addClass('is-invalid');
            $('#editProductPrice').removeClass('is-valid');
        }
        else{
            $('#editProductPrice').removeClass('is-invalid');
            $('#editProductPrice').addClass('is-valid');
        }
    });
    $('#editProductStock').on('input', ()=>{
        if (/[^0-9]+/.test($('#editProductStock').val())){
            $('#editProductStock').val('');
            toastr.error("Invalid Stock, Please Try Again");
            $('#editProductStock').addClass('is-invalid');
            $('#editProductStock').removeClass('is-valid');
        }
        else{
            $('#editProductStock').removeClass('is-invalid');
            $('#editProductStock').addClass('is-valid');
        }
    });
</script>