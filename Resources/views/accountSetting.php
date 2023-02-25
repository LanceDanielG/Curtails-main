<?php 
    include_once 'services/dbConnection.php';
?>
<?php include 'header.php'; ?>
    <div class="container-fluid row m-0 p-0">
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
                    <a class="" href="#">Account Setting</a>
                </li>
            </ul>
        </div>
        <div class="col p-0 m-0">
            <div class="row mt-5 shadow mx-0 p-5">
                <h2 class="mb-5">Account Settings</h2>
                <?php
                    $username = $_SESSION['logged']['username'];
                    $sql = "SELECT * FROM user_account WHERE username = ?";
                    $statement = mysqli_prepare($connect, $sql);
                    mysqli_stmt_bind_param($statement,'s',$username);
                    mysqli_stmt_execute($statement);
                    $result = mysqli_stmt_get_result($statement);
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['logged']['id'] = $row['id'];
                ?>
                <form action="services/editUserAccount.php" method="post"></form>
                    <div class="row justify-content-center align-items-center g-2 mt-5">
                        <div class="col-5">
                            <div class="mb-3">
                                <label for="" class="form-label">Username<span style="color: #F18F2D; margin: 0;">*</span></label>
                                <input required type="text" class="form-control" name="username" id="username" placeholder="" value="<?= $row['username'] ?>">
                            </div> 
                        </div>
                    </div>
                    <div class="row justify-content-center align-items-center g-2">
                        <div class="col-5">
                            <label for="" class="form-label">Password<span style="color: #F18F2D; margin: 0;">*</span></label>
                            <div class="mb-3 input-group">
                                <input required type="text" class="form-control" name="password" id="password" placeholder="" value="<?= $row['password'] ?>">
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
                    <div class="row">
                        <div class="d-flex justify-content-end px-5 me-5 gap-2">
                            <input type="submit" name="edit" value="Edit">
                            <input type="submit" id="regSubmitButton" name="save" value="Save">
                        </div>
                    </div>
                </form>
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

<script src="/IS_Elective/Resources/js/baranggay.js"></script>
