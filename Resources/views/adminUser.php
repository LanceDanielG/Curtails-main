<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        include 'services/links.php';
        include_once 'services/dbConnection.php';
        session_start();
        $SQL = "SELECT * FROM user_account;";
        $users = mysqli_query($connect, $SQL);
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Control</title>
</head>
<body>
    <div class="container-fluid row m-0 p-0 login-picture" id="sidebar">
        <div class="row justify-content-center align-items-center">
            
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
            <div class="col admin-image login-wrapper p-0 m-0">
                <div class="container-fluid">
                    <div class="row justify-content-center align-items-center">
                        <div class="col p-4 m-0 d-flex align-items-center justify-content-end">
                            <div class="dropdown">
                                <i class="fa-solid fa-user fa-xl me-2" data-bs-toggle="dropdown"></i>
                                <ul class="dropdown-menu text-center">
                                    <a href="services/logout.php" class="dropdown-item">Log Out</a>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center align-items-center">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead style="background: #FFB125;">
                                        <tr>
                                            <th>First Name</th>
                                            <th>Middle Name</th>
                                            <th>Last Name</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($users as $user): ?>
                                            <tr>
                                                <td><?= $user['firstname']?></td>
                                                <td><?= $user['middlename']?></td>
                                                <td><?= $user['lastname']?></td>
                                                <td><?= $user['username']?></td>
                                                <td><?= $user['password']?></td>
                                                <td>
                                                    <div class="dropdown open">
                                                        <a type="button" id="triggerId-<?= $user['password']?>" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i style='font-size: 1.5em; text-decoration: none;' class='fa-solid fa-ellipsis-vertical' ></i>
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="triggerId-<?= $user['password']?>">
                                                            <button class="editUserBtn dropdown-item" value="<?= $user['id'];?>" data-bs-toggle="modal" data-bs-target="#editModal" >Edit</button>
                                                            <button class="deleteUserBtn dropdown-item" value="<?= $user['id'];?>">Delete</button>
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
            </div>
        </div>
    </div>
</body>
</html>

<form action="services/editUser.php" method="post">
    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade" id="editModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">User Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="editModalBody">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $(".editUserBtn").on('click', (event)=>{
        $.ajax({
            url: "services/getUserModal.php",
            method: "GET",
            data: {
                "id": $(event.currentTarget).val() 
            },
            success: (data)=>{
                $("#editModalBody").html(data);
            }
        });
        
    });
    $(".deleteUserBtn").on('click', (event)=>{
        $.ajax({
            url: "services/deleteUser.php",
            method: "POST",
            data: {
                "id": $(event.currentTarget).val() 
            },
            success:(data)=>{
                location.reload();
            }
        });
    });
</script>