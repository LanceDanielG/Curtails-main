<!DOCTYPE html>
<html lang="en">
    <head>
    <?php
            session_start();
            include 'services/links.php';
            foreach ($_POST as $key => $value) {
                $_SESSION['info'][$key] = $value;
            }
            if (!isset($_SESSION['info']['street1'])){
                header("LOCATION: contactinfo.php");
                die();
            }
        ?>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Account Registration</title>
    </head>
    <body style="height: 100vh; color: #443C3D; overflow: hidden;">
        <div class="container-fluid h-100 m-0 p-0">
            <div class="row justify-content-center align-items-center" style="background-color: #F9F9FD; height: 15%;">
                <div class="col-2">
                    <div class="container">
                        <div class="row justify-content-center align-items-center pt-2">
                            <div class="col-5 text-end">
                                <img style="height: 5vh;" src="\IS_Elective\Resources\src\img\logo\bpaw.png" alt="" srcset="">
                            </div>
                            <div class="col p-0">
                                <h4 style="font-size: 1em;">Curl <br>Tailed</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-10">
                    <!-- Horizontal under breakpoint -->
                    <ul class="list-group list-group-horizontal float-end" id="regHeader">
                        <a href="/IS_Elective/index.php">
                            <li class="list-group-item border-0 bg-transparent">
                                <strong>Home</strong>
                            </li>
                        </a>
                        <a href="/IS_Elective/Resources/views/loginPage.php">
                            <li class="list-group-item border-0 bg-transparent">
                                <strong>Log In </Strong>
                            </li>
                        </a>
                        <li class="list-group-item border-0 bg-transparent">
                            
                        </li>
                      </ul>
                </div>
            </div>
            <div class="row justify-content-center align-items-center g-1" style="height: 85%;">
                <div class="col-2 h-100" style="background-color: #F9F9FD;">
                    <div class="container h-100">
                        <div class="row justify-content-center align-items-center mt-4" style="height: 10%;">
                            <div class="col text-center">
                                <p style="font-size: 1.5em;"><strong>Registration</strong></p>
                            </div>
                        </div>
                        <div class="row justify-content-center align-items-center" style="height: 100%;">
                            <div class="col text-center h-100">
                                <div class="container h-75">
                                    <div class="row justify-content-center align-items-center h-100">
                                        <div class="col h-100 text-end pr-0">                                                                                                                                                                                                                                                                                                                                                                        
                                            <div style="height: 33%; width: 20%; background-color: #FFC65F;"></div>
                                            <div style="height: 33%; width: 20%; background-color: #FFC65F;"></div>                                                                                                                                                                                                                                                             
                                            <div style="height: 33%; width: 20%; background-color: #FFC65F;"></div>                                                                                                                                                                                                                                                     
                                        </div>
                                        <div class="col text-start pl-0">
                                            <ul class="list-group m-0">
                                                <li class="list-group-item border-0 bg-transparent mb-4" style="color: #A6A6A6;">Personal information</li>
                                                <li class="list-group-item border-0 bg-transparent my-5" style="color: #A6A6A6;">Address</li>
                                                <li class="list-group-item border-0 bg-transparent mt-4">Account Creation</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-10 h-100 m-0 p-0" style="background-color: white;">
                    <div class="container py-5 px-5">
                        <div class="row justify-content-center align-items-center">
                            <div class="col">
                                <h4>Account Creation</h4>
                            </div>
                        </div>
                        <hr class="row">
                        <form action="services/register.php" method="post">
                            <div class="row justify-content-center align-items-center g-2 mt-5">
                                <div class="col-5">
                                    <div class="mb-3">
                                      <label for="" class="form-label">Username<span style="color: #F18F2D; margin: 0;">*</span></label>
                                      <input required type="text" class="form-control" name="username" id="username" placeholder="" <?= isset($_SESSION['info']['username']) ?  $_SESSION['info']['username']: "" ?>>
                                    </div> 
                                </div>
                            </div>
                            <div class="row justify-content-center align-items-center g-2">
                                <div class="col-5">
                                    <label for="" class="form-label">Password<span style="color: #F18F2D; margin: 0;">*</span></label>
                                    <div class="mb-3 input-group">
                                        <input required type="text" class="form-control" name="password" id="password" placeholder="" <?= isset($_SESSION['info']['password']) ?  $_SESSION['info']['password']: "" ?>>
                                        <div class="input-group-append">
                                            <button id="togglevisiblePasswordBtn" onclick="togglevisiblePassword()" class="btn btn-outline-primary" type="button"><i class="fa-solid fa-eye"></i></button>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="row justify-content-center align-items-center g-2 mb-5">
                                <div class="col-5">
                                    <label for="" class="form-label">Confirm Password<span style="color: #F18F2D; margin: 0;">*</span></label>
                                    <div class="mb-3 input-group">
                                        <input required type="text" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="" <?= isset($_SESSION['info']['confirmpassword']) ?  $_SESSION['info']['confirmpassword']: "" ?>>
                                        <div class="input-group-append">
                                            <button id="toggleVisibleConfirmBtn" onclick="toggleVisibleConfirm()" class="btn btn-outline-primary" type="button"><i class="fa-solid fa-eye"></i></button>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="row justify-content-center align-items-center mt-2">
                                <div class="col text-start">
                                    <a name="" id="regBackButton" class="rounded px-3 py-2" href="contactinfo.php" >Back</a>
                                </div>
                                <div class="col text-end">
                                    <input name="" type="submit" id="regSubmitButton" class="rounded px-3 py-2 d-none" value="Create" ></input>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
    include 'services/toaster.php';
?>
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
        "timeOut": "0",
        "extendedTimeOut": "0",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    $('#username').on('change', ()=>{
        if (/[^a-zA-Z0-9-._@#]/.test($('#username').val())){
            $('#username').val('');
            toastr.error("Invalid Character Found in username");
            $('#username').addClass('is-invalid');
            $('#username').removeClass('is-valid');
        }
        else if($('#username').val().length < 8 || $('#username').val().length > 24){
            $('#username').val('');
            toastr.error("Username Must be 8-24 characters only");
            $('#username').addClass('is-invalid');
            $('#username').removeClass('is-valid');
        }
        else{
            $('#username').removeClass('is-invalid');
            $('#username').addClass('is-valid');
        }
    });
    $('#password').on('input', ()=>{
        if ( /^(.{0,7}|[^0-9]*|[^A-Z]*|[^a-z]*|[a-zA-Z0-9]*)$/.test($('#password').val())){
            toastr.error("Password Must have 1 Upper Case Letter, 1 number, and 1 Special character");
            $('#password').addClass('is-invalid');
            $('#password').remove('is-valid');
            $('#confirmpassword').prop('readonly', true);
        }
        else if($('#password').val().length < 8 || $('#password').val().length > 16){
            toastr.error("password Must be 8-16 characters only");
            $('#password').addClass('is-invalid');
            $('#password').removeClass('is-valid');
            $('#confirmpassword').prop('readonly', true);
        }
        else{
            $('#password').removeClass('is-invalid');
            $('#password').addClass('is-valid');
            $('#confirmpassword').prop('readonly', false);
        }
    });
    $('#confirmpassword').on('input', ()=>{
        if(!($('#password').val() == $('#confirmpassword').val())){
            toastr.error("Confirm Password does not match");
            $('#confirmpassword').addClass('is-invalid');
            $('#confirmpassword').removeClass('is-valid');
            $('#regSubmitButton').addClass('d-none');
        }
        else{
            $('#confirmpassword').removeClass('is-invalid');
            $('#confirmpassword').addClass('is-valid');
            $('#regSubmitButton').removeClass('d-none');
        }
    });
    function togglevisiblePassword(){
        let temp = $('#password').prop('type') == "password" ? "text" : "password";
        $('#password').prop('type', temp);
        $('#togglevisiblePasswordBtn').toggleClass("btn-secondary text-light btn-outline-primary");
    }
    function toggleVisibleConfirm(){
        let temp = $('#confirmpassword').prop('type') == "password" ? "text" : "password";
        $('#confirmpassword').prop('type', temp);
        $('#toggleVisibleConfirmBtn').toggleClass('btn-secondary text-light btn-outline-primary');
    }
</script>