<link href="/IS_Elective/Resources/css/toastr.css" rel="stylesheet"/>
<script src="/IS_Elective/Resources/js/toastr.js"></script>

<?php

    if(isset($_SESSION['success'])){
        echo "
            <script>
                toastr.success('". $_SESSION['success'] ."');
                toastr.options.timeOut = 3000;
            </script>
        
        ";
        unset($_SESSION['success']);
    }
    else if(isset($_SESSION['error'])){
        echo "
            <script>
                toastr.error('". $_SESSION['error'] ."');
                toastr.options.timeOut = 3000;
            </script>
        
        ";
        unset($_SESSION['error']);
    }
?>