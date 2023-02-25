<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        include 'services/links.php';
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
                <li class="nav-list">
                    <a class="text-white" href="admincontrols">Dashboard</a>
                </li>
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
        <div class="col admin-image login-wrapper p-0 m-0">
            <div class="col p-4 m-0 d-flex align-items-center justify-content-end">
                <div class="dropdown">
                        <i class="fa-solid fa-user fa-xl me-2" data-bs-toggle="dropdown"></i>
                        <ul class="dropdown-menu text-center">
                            <a href="services/logout.php" class="dropdown-item">Log Out</a>
                        </ul>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
