<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        include 'services/links.php';
        include_once 'services/dbConnection.php';
        session_start();
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
                    <a href="#">
                        <img height='60em' src="\IS_Elective\Resources\src\img\logo\whitepaw.png" alt=" ">
                    </a>
                </div>
                <!-- <li class="nav-list">
                    <a class="text-white" href="admincontrols.php">Dashboard</a>
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
                    <ul class="dropdown-menu text-center">
                        <a href="services/logout.php" class="dropdown-item text-center">Log Out</a>
                    </ul>
                </div>
            </div>
            <div class="row px-5 mt-3 mb-0">
                <hr>
            </div>
            <div class="row d-flex align-items-center px-5 py-0 m-0">
                <div class="col-1 p-0 m-0">
                    <h2 class="my-2">Categories</h2>  
                </div>
                <div class="col p-0 m-0 d-flex align-items-center justify-content-end">
                    <button type="button" class="btn border border-1" data-bs-toggle="modal" data-bs-target="#addModal">
                        Add new Category
                    </button>
                </div>
            </div>
            <div class="row justify-content-center align-items-center m-0 p-4">
                <div class="col">
                    <table class="table table-striped table-hover">
                        <thead class="primary-background">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="categoryBody">
                            <?php foreach($categories as $category): ?>
                                <tr>
                                    <td><?= $category['ID'];?></td>
                                    <td><?= $category['categoryName'];?></td>
                                    <td>
                                        <div class="dropdown open">
                                            <button class="border border-0 bg-transparent" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="triggerId">
                                                <button class="removeCategoryBtn dropdown-item" value="<?= $category['ID'];?>">Remove Category</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


<form action="services/addCategory.php" method="post">
    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade" id="addModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">Add Categories</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row justify-content-center align-items-center">
                            <div class="col">
                                <div class="mb-3">
                                <label for="" class="form-label">Category Name</label>
                                <input type="text" class="form-control" name="categoryName" id="categoryName" aria-describedby="helpId" placeholder="Category">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>

<?php include_once 'services/toaster.php'; include_once 'services/fontawesome.php';?>
<script>
    $('.removeCategoryBtn').on('click', (event)=>{
        $.ajax({
            url: "services/removeCategory.php",
            method: 'POST',
            data: {
                "ID" : $(event.currentTarget).val()
            },
            success: (data)=>{
                $('#categoryBody').html(data);
            }
        });
    });
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
    $('#categoryName').on('input', ()=>{
        if (/[^a-zA-Z \t]+/.test($('#categoryName').val())){
            $('#categoryName').val('');
            toastr.error("Invalid Product Name, Please Try Again");
            $('#categoryName').addClass('is-invalid');
            $('#categoryName').removeClass('is-valid');
        }
        else{
            $('#categoryName').removeClass('is-invalid');
            $('#categoryName').addClass('is-valid');
        }
    });
</script>