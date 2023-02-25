<?php include 'services/links.php' ?>

<!-- General Header File Start -->
    <?php
        session_start();
        unset($_SESSION['info']);
    ?>

<nav class="nav p-0 m-0 container-fluid shadow-sm position-sticky sticky-top bg-white" style="z-index: 2; height: 10vh;">
    <div class="row justify-content-center align-items-center w-100 px-4">
        <div class="col-7 text-start">
            <img style="height: 4em;" src="/IS_Elective/Resources/src/img/logo/2bpaw.png" alt="">
        </div>
        <div class="col text-end">
            <div class="float-end">
                <!-- Horizontal under breakpoint -->
                <ul class="list-group list-group-horizontal">
                    <a href="/IS_Elective/index.php" class="list-group-item border-0 bg-transparent align-self-center">
                        Home
                    </a>
                    <a href="\IS_Elective\Resources\views\products.php" class="list-group-item border-0 bg-transparent align-self-center">
                        Search
                    </a>
                    <a href='\IS_Elective\Resources\views\products.php' class="list-group-item border-0 bg-transparent align-self-center">
                        Products
                    </a>
                    <?php if(isset($_SESSION['logged'])): ?>
                        <a href="/IS_Elective/Resources/views/cart.php" class="list-group-item border-0 bg-transparent align-self-center">
                            <div class="bg-white rounded shadow px-2 py-1 border">
                                <img style="height: 2em;" src="/IS_Elective/Resources/src/img/icons/shopping-cart.png" alt="">
                            </div>
                        </a>
                    <?php endif; ?>
                    <div class="dropdown bg-transparent align-self-center">
                        <a class="list-group-item border-0 bg-transparent align-self-center" type="button" id="accountDropDown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img style="height: 2em;" src="/IS_Elective/Resources/src/img/icons/account.png" alt="">
                        </a>
                        <div class="dropdown-menu" aria-labelledby="accountDropDown">
                            <?php if(isset($_SESSION['logged'])): ?>
                                <h6 class="dropdown-header">Logged in as <?= $_SESSION['logged']['name']; ?></h6>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/IS_Elective/Resources/views/myAccount.php">My Account</a>
                                <a class="dropdown-item" href="/IS_Elective/Resources/views/services/logout.php">Logout</a>
                                <?php else: ?>
                                <h6 class="dropdown-header">Account</h6>
                                <a class="dropdown-item" href="/IS_Elective/Resources/views/loginPage.php">Login</a>
                                <a class="dropdown-item" href="/IS_Elective/Resources/views/personalinfo.php">Register</a>
                            <?php endif ?>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</nav>