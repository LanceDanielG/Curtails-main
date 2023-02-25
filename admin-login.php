<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        session_start();
        include 'Resources\views\services\links.php';
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Log In</title>
</head>
<body>
    <div class="container-fluid login-picture">
        <!-- content shits -->
        <div class="login-wrapper d-flex justify-content-center align-items-center">
            <div class="p-5 bg-light rounded rounded-5">
                <!-- <div class="text-center">
                    <img src="\IS_Elective\Resources\src\img\logo\1bpaw.png" alt="" class="img-fluid" style="height: 10em;">
                </div> -->
                <h5 class="mb-3 mt-4 login-header">Admin</h5>
                <form action="Resources\views\services\adminAccount.php" method="post">
                    <div class="row form-floating">
                        <input type="text" class="form-control  mb-2" id="username" placeholder="Username" name="username" required>
                        <label for="username" class="form-label">Username</label>
                    </div>
                    <div class="row form-floating">
                        <input type="password" placeholder="Password" class="form-control  mb-2" id="password" name="password" required>
                        <label for="password" class="form-label">Password</label> 
                    </div>
                    <div>
                        <p class="invalid-input">
                            <?php if(isset($_SESSION['error']['user-not-found'])) echo "Invalid Credential"; ?>
                        </p>        
                    </div>
                    <input type="submit" class="form-control mt-3 mb-3 login-btn" name="login" value="Log In" required>
                </form>
            </div>
        </div>
    </div>
</body>
</html>


<?php
    include 'Resources/views/services/toaster.php';
?>