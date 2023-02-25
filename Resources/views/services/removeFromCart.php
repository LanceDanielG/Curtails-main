<?php

    session_start();
    unset($_SESSION['cart'][$_POST['itemID']]);
    $_SESSION['toaster_Success'] = "Successfully Removed From Card";
    header("LOCATION: ../cart.php");

?>