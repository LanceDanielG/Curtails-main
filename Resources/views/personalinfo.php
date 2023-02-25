<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            session_start();
            include 'services/links.php';
            // array holder
                
            foreach ($_POST as $key => $value) {
                $_SESSION['info'][$key] = $value;
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
                                            <div style="height: 33%; width: 20%; background-color: #A6A6A6;"></div>                                                                                                                                                                                                                                                             
                                            <div style="height: 33%; width: 20%; background-color: #A6A6A6;"></div>                                                                                                                                                                                                                                                     
                                        </div>
                                        <div class="col text-start pl-0">
                                            <ul class="list-group m-0">
                                                <li class="list-group-item border-0 bg-transparent mb-4">Personal information</li>
                                                <li class="list-group-item border-0 bg-transparent my-5" style="color: #A6A6A6;">Address</li>
                                                <li class="list-group-item border-0 bg-transparent mt-4" style="color: #A6A6A6;">Account Creation</li>
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
                                <h4><strong>Personal Information</strong></h4>
                            </div>
                        </div>
                        <hr class="row">
                        <form action="contactinfo.php" method="post">
                            <div class="row justify-content-center align-items-center">
                                <div class="col px-5">
                                    <div class="mb-3">
                                      <label for="" class="form-label">Last Name<span style="color: #F18F2D; margin: 0;">*</span></label>
                                      <input required type="text" class="form-control" name="lastname" id="lastname" aria-describedby="helpId" placeholder="John"  value='<?= isset($_SESSION['info']['lastname']) ?  $_SESSION['info']['lastname']: "" ?>'>
                                    </div>   
                                </div>
                                <div class="col px-5">
                                    <div class="mb-3">
                                        <label for="" class="form-label">First Name<span style="color: #F18F2D; margin: 0;">*</span></label>
                                        <input required type="text" class="form-control" name="firstname" id="firstname" aria-describedby="helpId" placeholder="Doe" value='<?= isset($_SESSION['info']['firstname']) ?  $_SESSION['info']['firstname']: "" ?>'>
                                    </div>   
                                </div>
                            </div>
                            <div class="row justify-content-center align-items-center">
                                <div class="col px-5">
                                    <div class="mb-3">
                                      <label for="" class="form-label">Middle Name</label>
                                      <input type="text" class="form-control" name="middlename" id="middlename" aria-describedby="helpId" placeholder="Gro" value='<?= isset($_SESSION['info']['middlename']) ?  $_SESSION['info']['middlename']: "N/A" ?>'>
                                    </div>   
                                </div>
                                <div class="col px-5">
                                    <label for="contactNumber" class="form-label pr-2">Contact Number<span style="color: #F18F2D; margin: 0;">*</span></label>
                                    <div class="mb-3 input-group">
                                        <span class="input-group-text" id="contactNumberLabel">+63</span>
                                        <input required id="phonenumber" name="phonenumber" type="text" class="form-control" placeholder="917-625-6897" aria-describedby="contactNumberLabel" value='<?= isset($_SESSION['info']['phonenumber']) ?  $_SESSION['info']['phonenumber']: "" ?>'>
                                    </div>   
                                </div>
                            </div>
                            <div class="row justify-content-center align-items-center">
                                <div class="col px-5">
                                    <label for="" class="form-label">Email<span style="color: #F18F2D; margin: 0;">*</span></label>
                                    <div class="mb-3 input-group">
                                        <input required type="text" class="form-control" name="email" id="email" placeholder="ethanjex12" value='<?= isset($_SESSION['info']['email']) ?  $_SESSION['info']['email']: "" ?>'>
                                        <span class="input-group-text">@</span>   
                                        <select class="form-select" name="server" id="server">
                                            <option value="gmail.com">gmail.com</option>
                                            <option value="yahoo.com">yahoo.com</option>
                                            <option value="hotmail.com">hotmail.com</option>
                                        </select>
                                    </div>   
                                </div>
                                <div class="col px-5">
                                    <div class="mb-3">
                                        <label for="gender" class="form-label pr-2">Gender<span style="color: #F18F2D; margin: 0;">*</span></label>
                                        <select id="gender" name="gender" id="gender" class="form-select" >
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>   
                                </div>
                            </div>
                            <div class="row justify-content-center align-items-center">
                                <div class="col px-5">
                                    <div class="mb-3">
                                      <label for="" class="form-label">Birthdate<span style="color: #F18F2D; margin: 0;">*</span></label>
                                      <input required min='1901-01-01' type="date" class="form-control" name="birthdate" id="birthdate">
                                    </div>   
                                </div>
                                <div class="col px-5">
                                    <div class="mb-3">
                                        <label for="" class="form-label pr-2">Age <span style="color: #F18F2D; margin: 0;">*</span></label>
                                        <input id="age" name="age" type="text" class="form-control" value='<?= isset($_SESSION['info']['age']) ? $_SESSION['info']['age']: "" ?>' readonly>
                                    </div>   
                                </div>
                            </div>
                            <div class="row justify-content-center align-items-center mt-2">
                                <div class="col text-start">
                                    <a name="" id="regBackButton" class="rounded px-3 py-2" href="/IS_Elective/Resources/views/loginPage.php" >Back</a>
                                </div>
                                <div class="col text-end">
                                    <input name="" type="submit" id="regSubmitButton" class="rounded px-3 py-2" value="Next" ></input>
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
        $('#birthdate').on('input', function(e){
            $('#age').val((new Date()).getFullYear() - (new Date($('#birthdate').val())).getFullYear());
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
        $('#firstname').on('input', ()=>{
            if (/[^a-zA-Z \t]+/.test($('#firstname').val())){
                $('#firstname').val('');
                toastr.error("Invalid First name, Please Try Again");
                $('#firstname').addClass('is-invalid');
                $('#firstname').removeClass('is-valid');
            }
            else{
                $('#firstname').removeClass('is-invalid');
                $('#firstname').addClass('is-valid');
            }
        });
        $('#middlename').on('input', (object)=>{
            if ( /[^a-zA-Z ]+/.test($('#middlename').val())){
                $('#middlename').val('');
                toastr.error("Invalid Middle Name, Please Try Again");
                $('#middlename').addClass('is-invalid');
                $('#middlename').remove('is-valid');
            }
            else{
                $('#middlename').removeClass('is-invalid');
                $('#middlename').addClass('is-valid');
            }
        });
        $('#lastname').on('input', (object)=>{
            if (/[^a-zA-Z ]+/.test($('#lastname').val())){
                $('#lastname').val('');
                toastr.error("Invalid Last name, Please Try Again");
                $('#lastname').addClass('is-invalid');
                $('#lastname').remove('is-valid');
            }
            else{
                $('#lastname').removeClass('is-invalid');
                $('#lastname').addClass('is-valid');
            }
        });
        $('#email').on('input', (object)=>{
            if (/[^a-zA-Z0-9_.-]/.test($('#email').val())){
                $('#email').val('');
                toastr.error("Invalid Character found in email address");
                $('#email').addClass('is-invalid');
                $('#email').remove('is-valid');
            }
            else{
                $('#email').removeClass('is-invalid');
                $('#email').addClass('is-valid');
            }
        });
        $('#phonenumber').on('change', (object)=>{
            if (/[0-9]{3}-[0-9]{3}-[0-9]{4}$/.test($('#phonenumber').val()) == false){
                $('#phonenumber').val('');
                toastr.error("Please Follow the specified contact number format");
                $('#phonenumber').addClass('is-invalid');
                $('#phonenumber').remove('is-valid');
            }
            else{
                $('#phonenumber').removeClass('is-invalid');
                $('#phonenumber').addClass('is-valid');
            }
        });
        function format(input, format, sep) {
            var output = "";
            var idx = 0;
            for (var i = 0; i < format.length && idx < input.length; i++) {
                output += input.substr(idx, format[i]);
                if (idx + format[i] < input.length) output += sep;
                idx += format[i];
            }

            output += input.substr(idx);

            return output;
        }

        $('#phonenumber').on("input", function() {
            var foo = $(this).val().replace(/-/g, ""); // remove hyphens
            // You may want to remove all non-digits here
            // var foo = $(this).val().replace(/\D/g, "");

            if (foo.length > 0) {
                foo = format(foo, [3, 3, 4], "-");
            }
        
            
            $(this).val(foo);
        });
    </script>


