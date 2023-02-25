<?php

    require "dbConnection.php";
    session_start();
    $SQL = "SELECT * FROM user_account WHERE id='". $_GET['id'] . "'";
    $user = mysqli_query($connect, $SQL);
    $row = $user->fetch_array();

    echo "
    
    <div class='container-fluid'>
        <input type='hidden' value='". $row['id'] ."' name='id'/>
        <div class='row justify-content-center align-items-center'>
            <div class='col'>
                <div class='mb-3'>
                    <label for='' class='form-label'>First Name</label>
                    <input type='text' class='form-control' name='firstname' id='firstname' value='". $row['firstname'] ."' readonly>
                </div>
            </div>
            <div class='col'>
                <div class='mb-3'>
                    <label for='' class='form-label'>Middle Name</label>
                    <input type='text' class='form-control' name='middlename' id='middlename' value='". $row['middlename'] ."'  readonly>
                </div>
            </div>
            <div class='col'>
                <div class='mb-3'>
                    <label for='' class='form-label'>Last Name</label>
                    <input type='text' class='form-control' name='lastname' id='lastname' value='". $row['lastname'] ."'  readonly>
                </div>
            </div>
        </div>
        <div class='row justify-content-center align-items-center'>
            <div class='col'>
                <div class='mb-3'>
                    <label for='' class='form-label'>Username</label>
                    <input type='text' class='form-control' name='username' id='username' value='". $row['username'] ."'>
                </div>
            </div>
        </div>
        <div class='row justify-content-center align-items-center'>
            <div class='col'>
                <div class='mb-3'>
                    <label for='' class='form-label'>Password</label>
                    <input type='text' class='form-control' name='password' id='password' value='". $row['password'] ."'>
                </div>
            </div>
        </div>
    </div>
    
    ";


?>