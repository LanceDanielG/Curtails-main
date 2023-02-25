<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            session_start();
            include 'services/links.php';
            unset($_SESSION['info']);
        ?>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Archivo&family=Nunito&display=swap">
        <title>Curl-Tailed Login</title>
    </head>    

    <body>
        <div class="container-fluid p-0">
            <div class="d-sm-flex justify-content-evenly" style=" height: 100vh;">
                <div class=" container-fluid">
                    <div class="text-start pb-5">
                        <img src="\IS_Elective\Resources\src\img\logo\bpaw.png" alt="" class="img-fluid" style="height: 3em;">
                        <!-- <div class="d-block">
                            <span class="d-inline">Curl</span>
                            <span class="d-inline">Tailed</span>
                        </div> -->
                    </div>
                    <p style="font-family: Archivo; font-size:2em; color:#443c3d;" class="mb-3 mt-4 fw-bold text-center login-header">Welcome back!</p>
                    <form action="\IS_Elective\Resources\views\services\login.php" method="post">
                        <div class="row w-50 mx-auto">
                            <label for="username" style="font-family: Archivo; font-size:20px; color:#443c3d;" class="form-label fw-bold">Username</label>
                            <input type="text" class="form-control  mb-2" id="username" placeholder="Username" name="username" required>
                        </div>
                        <div class="row w-50 mx-auto">
                            <label for="password" style="font-family: Archivo; font-size:20px; color:#443c3d;" class="form-label fw-bold">Password</label> 
                            <input type="password" placeholder="Password" class="form-control  mb-3" id="password" name="password" required>
                            <a class="p-1 fw-bold text-end" style="text-decoration: none; color:#F18F2D;" href="http://">Forgot password</a>
                        </div>
                        <input type="submit" class="mx-auto form-control mt-3 mb-3 w-50 login-btn" name="login" value="Log In" required>
                    </form>
                        <p class="fw-bold mt-5 d-block  text-center text-decoration-none" style=" color:#443c3d;"> Don't have an account? <a style="text-decoration: none; color:#F18F2D;" href="personalinfo.php">Sign up</a></p>
                </div>             
                <div class="d-none d-md-block container" style="background-color:#ffc65f;">
                </div>
            </div>
        </div>
    </body>
    </html>
    
    <?php
    include 'services/toaster.php';
    ?>
    