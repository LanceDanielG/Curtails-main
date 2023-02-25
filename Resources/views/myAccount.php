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
                    <a class="" href="#">My Details</a>
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
            <div class="row mt-5 shadow mx-0 p-5">
                <h2 class="mb-5">My Details</h2>
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
                <form action="services/editUserInfo.php" method="post">
                    <div class="row justify-content-center align-items-center p-2">
                        <div class="col">
                            <label for="firstname" class="form-label">First Name<span style="color: #F18F2D; margin: 0;">*</span></label>
                            <input type="text" name="firstname" id="firstname" class="form-control" value="<?= $row['firstname']; ?>" required>
                        </div>
                        <div class="col">
                            <label for="middlename" class="form-label">Middle Name<span style="color: #F18F2D; margin: 0;">*</span></label>
                            <input type="text" name="middlename" id="middlename" class="form-control" value="<?= $row['middlename']; ?>" required>
                        </div>
                        <div class="col">
                            <label for="lastname" class="form-label">Last Name<span style="color: #F18F2D; margin: 0;">*</span></label>
                            <input type="text" name="lastname" id="lastname" class="form-control" value="<?= $row['lastname']; ?>" required>
                        </div>
                    </div>
                    <div class="row justify-content-center align-items-center p-2">
                        <div class="col">
                            <label for="" class="form-label">Birthdate<span style="color: #F18F2D; margin: 0;">*</span></label>
                            <input min='1901-01-01' type="date" class="form-control" name="birthdate" id="birthdate" value="<?= $row['birthdate']; ?>" required>
                        </div>
                        <div class="col">
                            <label for="" class="form-label pr-2">Age <span style="color: #F18F2D; margin: 0;">*</span></label>
                            <input id="age" name="age" type="text" class="form-control" value="<?= $row['age']; ?>" readonly>
                        </div>
                        <div class="col">
                            <label for="gender" class="form-label pr-2">Gender<span style="color: #F18F2D; margin: 0;">*</span></label>
                            <select id="gender" name="gender" id="gender" class="form-select" value = "<?= $row['gender']; ?>">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select> 
                        </div>
                    </div>
                    <div class="row justify-content-center align-items-center p-2">
                        <label for="" class="form-label">House Lot and Block No<span style="color: #F18F2D; margin: 0;">*</span></label>
                        <input required type="text" class="form-control" name="street1" id="street1" placeholder="Block 25 Lot 21" value='<?= $row['street1']; ?>'>
                    </div>
                    <div class="row justify-content-center align-items-center p-2">
                        <label for="" class="form-label">Street Address</label>
                        <input type="text" class="form-control" name="street2" id="street2" placeholder="Job Street Kingstown 2" value='<?= $row['street2']; ?>'>
                    </div>
                    <div class="row justify-content-center align-items-center p-2">
                        <div class="col">
                            <label for="" class="form-label">City Address<span style="color: #F18F2D; margin: 0;">*</span></label>
                            <select class="form-select" name="city" id="city">
                                <option value="<?= $row['city']; ?>"><?= $row['city']; ?></option>
                                <option value='Alaminos City'>Alaminos City</option>
                                <option value='Angeles City'>Angeles City</option>
                                <option value='Antipolo City'>Antipolo City</option>
                                <option value='Bacolod City'>Bacolod City</option>
                                <option value='Bago City'>Bago City</option>
                                <option value='Bais City'>Bais City</option>
                                <option value='Balanga City'>Balanga City</option>
                                <option value='Batac City'>Batac City</option>
                                <option value='Batangas City'>Batangas City</option>
                                <option value='Bayawan City'>Bayawan City</option>
                                <option value='Baybay City'>Baybay City</option>
                                <option value='Bogo City'>Bogo City</option>
                                <option value='Cabuyao City'>Cabuyao City</option>
                                <option value='Cadiz City'>Cadiz City</option>
                                <option value='Cagayan De Oro City'>Cagayan De Oro City</option>
                                <option value='Calamba City'>Calamba City</option>
                                <option value='Calapan City'>Calapan City</option>
                                <option value='Calbayog City'>Calbayog City</option>
                                <option value='Caloocan City'>Caloocan City</option>
                                <option value='Candon City'>Candon City</option>
                                <option value='Canlaon City'>Canlaon City</option>
                                <option value='Carcar City'>Carcar City</option>
                                <option value='Catbalogan City'>Catbalogan City</option>
                                <option value='Cauayan City'>Cauayan City</option>
                                <option value='Cavite City'>Cavite City</option>
                                <option value='Cebu City'>Cebu City</option>
                                <option value='Dagupan City'>Dagupan City</option>
                                <option value='Danao City'>Danao City</option>
                                <option value='Dapitan City'>Dapitan City</option>
                                <option value='Dasmariñas City'>Dasmariñas City</option>
                                <option value='Davao City'>Davao City</option>
                                <option value='Digos City'>Digos City</option>
                                <option value='Dipolog City'>Dipolog City</option>
                                <option value='Dumaguete City'>Dumaguete City</option>
                                <option value='El Salvador City'>El Salvador City</option>
                                <option value='Escalante City'>Escalante City</option>
                                <option value='Gapan City'>Gapan City</option>
                                <option value='General Trias City'>General Trias City</option>
                                <option value='Gingoog City'>Gingoog City</option>
                                <option value='Guihulngan City'>Guihulngan City</option>
                                <option value='Himamaylan City'>Himamaylan City</option>
                                <option value='Ilagan City'>Ilagan City</option>
                                <option value='Iligan City'>Iligan City</option>
                                <option value='Iloilo City'>Iloilo City</option>
                                <option value='Imus City'>Imus City</option>
                                <option value='Iriga City'>Iriga City</option>
                                <option value='Isabela City'>Isabela City</option>
                                <option value='Kabankalan City'>Kabankalan City</option>
                                <option value='Kidapawan City'>Kidapawan City</option>
                                <option value='La Carlota City'>La Carlota City</option>
                                <option value='Laoag City'>Laoag City</option>
                                <option value='Lapu-Lapu City'>Lapu-Lapu City</option>
                                <option value='Las Piñas'>Las Piñas City</option>
                                <option value='Legazpi City'>Legazpi City</option>
                                <option value='Ligao City'>Ligao City</option>
                                <option value='Lipa City'>Lipa City</option>
                                <option value='Lucena City'>Lucena City</option>
                                <option value='Maasin City'>Maasin City</option>
                                <option value='Mabalacat City'>Mabalacat City</option>
                                <option value='Makati'>Makati City</option>
                                <option value='Malabon'>Malabon City</option>
                                <option value='Malaybalay City'>Malaybalay City</option>
                                <option value='Malolos City'>Malolos City</option>
                                <option value='Mandaluyong'>Mandaluyong City</option>
                                <option value='Mandaue City'>Mandaue City</option>
                                <option value='Manila'>Manila City</option>
                                <option value='Marikina'>Marikina City</option>
                                <option value='Masbate City'>Masbate City</option>
                                <option value='Mati City'>Mati City</option>
                                <option value='Meycauayan City'>Meycauayan City</option>
                                <option value='Muntinlupa'>Muntinlupa City</option>
                                <option value='Muñoz City'>Muñoz City</option>
                                <option value='Naga City'>Naga City</option>
                                <option value='Naga City'>Naga City</option>
                                <option value='Navotas'>Navotas City</option>
                                <option value='Ormoc City'>Ormoc City</option>
                                <option value='Oroquieta City'>Oroquieta City</option>
                                <option value='Ozamiz City'>Ozamiz City</option>
                                <option value='Pagadian City'>Pagadian City</option>
                                <option value='Palayan City'>Palayan City</option>
                                <option value='Panabo City'>Panabo City</option>
                                <option value='Parañaque'>Parañaque City</option>
                                <option value='Pasay'>Pasay City</option>
                                <option value='Pasig'>Pasig City</option>
                                <option value='Passi City'>Passi City</option>
                                <option value='Pateros'>Pateros City</option>
                                <option value='Puerto Prinsesa City'>Puerto Prinsesa City</option>
                                <option value='Quezon City'>Quezon City</option>
                                <option value='Roxas City'>Roxas City</option>
                                <option value='Sagay City'>Sagay City</option>
                                <option value='Samal City'>Samal City</option>
                                <option value='San Carlos City'>San Carlos City</option>
                                <option value='San Carlos City'>San Carlos City</option>
                                <option value='San Fernando City'>San Fernando City</option>
                                <option value='San Jose Del Monte City'>San Jose Del Monte City</option>
                                <option value='San Juan'>San Juan City</option>
                                <option value='San Pablo City'>San Pablo City</option>
                                <option value='Santa Rosa City'>Santa Rosa City</option>
                                <option value='Santiago City'>Santiago City</option>
                                <option value='Santo Tomas City'>Santo Tomas City</option>
                                <option value='Silay City'>Silay City</option>
                                <option value='Sipalay City'>Sipalay City</option>
                                <option value='Sorsogon City'>Sorsogon City</option>
                                <option value='Tabaco City'>Tabaco City</option>
                                <option value='Tacloban City'>Tacloban City</option>
                                <option value='Tagaytay City'>Tagaytay City</option>
                                <option value='Taguig'>Taguig City</option>
                                <option value='Tagum City'>Tagum City</option>
                                <option value='Talisay City'>Talisay City</option>
                                <option value='Talisay City'>Talisay City</option>
                                <option value='Tanauan City'>Tanauan City</option>
                                <option value='Tangub City'>Tangub City</option>
                                <option value='Tanjay City'>Tanjay City</option>
                                <option value='Tarlac City'>Tarlac City</option>
                                <option value='Tayabas City'>Tayabas City</option>
                                <option value='Toledo City'>Toledo City</option>
                                <option value='Trece Martires City'>Trece Martires City</option>
                                <option value='Tuguegarao City'>Tuguegarao City</option>
                                <option value='Urdaneta City'>Urdaneta City</option>
                                <option value='Valencia City'>Valencia City</option>
                                <option value='Valenzuela'>Valenzuela City</option>
                                <option value='Victorias City'>Victorias City</option>
                                <option value='Zamboanga City'>Zamboanga City</option>
                            </select> 
                        </div>
                        <div class="col">
                            <label for="" class="form-label">Baranggay<span style="color: #F18F2D; margin: 0;">*</span></label>
                            <select class="form-select" name="baranggay" id="baranggay" value ="<?= $row['baranggay']; ?>" disabled>
                            </select>
                        </div>
                        <div class="col">
                            <label for="" class="form-label">Postal / Zip Code<span style="color: #F18F2D; margin: 0;">*</span></label>
                            <input required type="text" class="form-control" name="zipcode" id="zipcode" placeholder="1421" value='<?= $row['zipcode']; ?>'>
                        </div>
                    </div>
                    <div class="row">
                        <div class="d-flex justify-content-end px-5 me-5 gap-2">
                            <input type="submit" name="edit" value="Edit">
                            <input type="submit" name="save" value="Save">
                        </div>
                    </div>
                </form>
                <hr>
                <h5>Emial and Phone Number</h5>
                <form action="services/editUserContact.php" method="post">
                    <div class="row justify-content-center align-items-center p-2">
                        <div class="col px-5">
                            <label for="email" class="form-label">Email</label>
                            <div class="input-group">
                                <input type="text" name="email" class="form-control" id="email" value="<?= $row['email']; ?>" required>
                                <span class="input-group-text">@</span>   
                                <select class="form-select" name="server" id="server">
                                    <option value="gmail.com">gmail.com</option>
                                    <option value="yahoo.com">yahoo.com</option>
                                    <option value="hotmail.com">hotmail.com</option>
                                </select>
                            </div>   
                        </div>
                        <div class="col">
                            <label for="phonenumber" class="form-label">Phone Number</label>
                            <div class="input-group">
                                <span class="input-group-text" id="contactNumberLabel">+63</span>
                                <input type="text" name="phonenumber" class="form-control" id="phonenumber" value="<?= $row['phonenumber']; ?>" required>
                            </div>   
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-flex justify-content-end px-5 me-5 gap-2">
                            <input type="submit" name="edit" value="Edit">
                            <input type="submit" name="save" value="Save">
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
        "timeOut": "10000",
        "extendedTimeOut": "10000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    $('#zipcode').on('input', (object)=>{
        if (/^\d{0,4}$/.test($('#zipcode').val()) == false){
            $('#zipcode').val('');
            toastr.error("Zipcodes only consists of Four Digits");
            $('#zipcode').addClass('is-invalid');
            $('#zipcode').removeClass('is-valid');
        }
        else{
            $('#zipcode').removeClass('is-invalid');
            $('#zipcode').addClass('is-valid');
        }
    });
    $('#street1').on('input', (object)=>{
        if ( /[^a-zA-Z0-9 .,-]+/.test($('#street1').val())){
            toastr.error("Street Address must contain Letters and Numbers Only");
            $('#street1').val('').addClass('is-invalid').remove('is-valid');
        }
        else{
            $('#street1').removeClass('is-invalid').addClass('is-valid');
        }
    });
    $('#street2').on('input', (object)=>{
        if ( /[^a-zA-Z0-9 .,-]+/.test($('#street2').val())){
            toastr.error("Street Address must contain Letters and Numbers Only");
            $('#street2').val('').addClass('is-invalid').remove('is-valid');
        }
        else{
            $('#street2').removeClass('is-invalid').addClass('is-valid');
        }
    });

    $('#birthdate').on('input', function(e){
        $('#age').val((new Date()).getFullYear() - (new Date($('#birthdate').val())).getFullYear());
    });
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
<script src="/IS_Elective/Resources/js/baranggay.js"></script>
