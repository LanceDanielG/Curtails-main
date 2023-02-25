<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            session_start();
            include 'services/links.php';
            include 'services/dbConnection.php';
            foreach ($_POST as $key => $value) {
                $_SESSION['info'][$key] = $value;
            }
            $sql = "SELECT * FROM user_account WHERE email like '%" . $_POST['email'] . "@" . $_POST['server'] . "%'";

            $result = mysqli_query($connect, $sql);
            mysqli_fetch_array($result);
            if(mysqli_num_rows($result)){
                $_SESSION['error'] = "Email Already Exists";
                unset($_SESSION['info']['email']);
                unset($_SESSION['info']['server']);
                header("LOCATION: personalinfo.php");
                die();
            }

            if (!isset($_SESSION['info']['firstname'])){
                header("LOCATION: personalinfo.php");
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
                                <p style="font-size: 1.5em;">Registration</p>
                            </div>
                        </div>
                        <div class="row justify-content-center align-items-center" style="height: 100%;">
                            <div class="col text-center h-100">
                                <div class="container h-75">
                                    <div class="row justify-content-center align-items-center h-100">
                                        <div class="col h-100 text-end pr-0">                                                                                                                                                                                                                                                                                                                                                                        
                                            <div style="height: 33%; width: 20%; background-color: #FFC65F;"></div>
                                            <div style="height: 33%; width: 20%; background-color: #FFC65F;"></div>                                                                                                                                                                                                                                                             
                                            <div style="height: 33%; width: 20%; background-color: #A6A6A6;"></div>                                                                                                                                                                                                                                                     
                                        </div>
                                        <div class="col text-start pl-0">
                                            <ul class="list-group m-0">
                                                <li class="list-group-item border-0 bg-transparent mb-4" style="color: #A6A6A6;">Personal information</li>
                                                <li class="list-group-item border-0 bg-transparent my-5">Address</li>
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
                                <h4>Address</h4>
                            </div>
                        </div>
                        <hr class="row">
                        <form action="verification.php" method="post">
                            <div class="row justify-content-center align-items-center g-2">
                                <div class="col px-5">
                                    <div class="mb-3">
                                      <label for="" class="form-label">House Lot and Block No<span style="color: #F18F2D; margin: 0;">*</span></label>
                                      <input required type="text" class="form-control" name="street1" id="street1" placeholder="Block 25 Lot 21" value='<?= isset($_SESSION['info']['street1']) ?  $_SESSION['info']['street1']: "" ?>'>
                                    </div>   
                                </div>
                            </div>
                            <div class="row justify-content-center align-items-center g-2">
                                <div class="col px-5">
                                    <div class="mb-3">
                                      <label for="" class="form-label">Street Address</label>
                                      <input type="text" class="form-control" name="street2" id="street2" placeholder="Job Street Kingstown 2" value='<?= isset($_SESSION['info']['street2']) ?  $_SESSION['info']['street1']: "N/A" ?>'>
                                    </div>   
                                </div>
                            </div>
                            <div class="row justify-content-center align-items-center g-2">
                                <div class="col px-5">
                                    <div class="mb-3">
                                      <label for="" class="form-label">City Address<span style="color: #F18F2D; margin: 0;">*</span></label>
                                      <select class="form-select" name="city" id="city">
                                        <option value="N/A">--Select City--</option>
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
                                </div>
                                <div class="col px-5">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Baranggay<span style="color: #F18F2D; margin: 0;">*</span></label>
                                        <select class="form-select" name="baranggay" id="baranggay" disabled>
                                        </select>
                                    </div>   
                                </div>
                            </div>
                            <div class="row align-items-center g-2 ">
                                <div class="col-6 px-5">
                                    <div class="mb-3">
                                      <label for="" class="form-label">Postal / Zip Code<span style="color: #F18F2D; margin: 0;">*</span></label>
                                      <input required type="text" class="form-control" name="zipcode" id="zipcode" placeholder="1421" value='<?= isset($_SESSION['info']['zipcode']) ?  $_SESSION['info']['zipcode']: "" ?>'>
                                    </div>   
                                </div>
                            </div>
                            <div class="row justify-content-center align-items-center mt-2">
                                <div class="col text-start">
                                    <a name="" id="regBackButton" class="rounded px-3 py-2" href="personalinfo.php" >Back</a>
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
</script>
<script src="/IS_Elective/Resources/js/baranggay.js"></script>