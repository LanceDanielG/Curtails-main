<?php

    session_start();
    unset($_SESSION['logged']);
    unset($_SESSION['info']);
    $_SESSION['cart'] = [];
    header("Location: /IS_Elective/index.php")

?>
