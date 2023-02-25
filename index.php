<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Curl-Tailed</title>
    </head>
    <body class="p-0 m-0">
        <!-- General Header Start-->
            <?php 
                include 'Resources/views/header.php'; 
                unset($_SESSION['info']);
            ?>
        <!-- General Header End -->

        <!-- Content Start -->

        <div class="container-fluid justify-content-evenly px-5 py-3">
            <div class="row">
                <div class="col">
                    <div id="dashboardCarousel" class="carousel slide"  data-interval=1000 data-bs-ride="true">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#dashboardCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#dashboardCarousel" data-bs-slide-to="1" class="active" aria-current="true" aria-label="Slide 2"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="Resources\src\img\carousel.jpg" class="d-block w-100">
                            </div>
                            <div class="carousel-item">
                                <img src="Resources\src\img\carousel_1.jpg" class="d-block w-100">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col text-center">
                    <h2>Categories</h2>
                </div>
            </div>
            <div class="container">
                <div class="shadow  justify-content-evenly">
                    <div class="mt-3">
                        <div class="row">
                            <a href="#" class = "col food-card">
                                <div class="border rounded container border-warning border-5 shadow py-2 mb-3 bg-white">
                                    <div class="row">
                                        <div class="col-md text-center">
                                            <img height="90em" src="Resources\src\img\icons\dog-treat (1).png" alt="">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col text-center">
                                            <h5>Dry Food</h5>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class = "col food-card">
                                <div class="border rounded container border-warning border-5  shadow py-2 mb-3 bg-white">
                                    <div class="row">
                                        <div class="col-md text-center">
                                            <img height="90em" src="Resources\src\img\icons\dog-bowl.png" alt="">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col text-center">
                                            <h5>Bowls </h5>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        
                            <a href="#" class = "col food-card">
                                <div class="border rounded container border-warning border-5 shadow py-2 mb-3 bg-white">
                                    <div class="row">
                                        <div class="col text-center">
                                            <img height="90em" src="Resources\src\img\icons\cat-food.png" alt="">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col text-center">
                                            <h5>Wet Food</h5>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            
                            <a href="#" class = "col food-card">
                                <div class="border rounded container border-warning border-5 shadow py-2 mb-3 bg-white">
                                    <div class="row">
                                        <div class="col text-center">
                                            <img height="90em" src="Resources\src\img\icons\collar.png" alt="">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col text-center">
                                            <h5>Collars</h5>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="row mt-5">
                            <a href="#" class = "col food-card">
                                <div class="border rounded container border-warning border-5 shadow py-2 mb-3 bg-white">
                                    <div class="row">
                                        <div class="col text-center">
                                            <img height="90em" src="Resources\src\img\icons\dog-treat.png" alt="">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col text-center">
                                            <h5>Treats</h5>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class = "col food-card">
                                <div class="border rounded container border-warning border-5 shadow py-2 mb-3 bg-white">
                                    <div class="row">
                                        <div class="col text-center">
                                            <img height="90em" src="Resources\src\img\icons\pet-bed.png" alt="">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col text-center">
                                            <h5>Beds</h5>
                                        </div>
                                    </div>
                                </div>
                            </a>
                       
                        
                            <a href="#" class = "col food-card">
                                <div class="border rounded container border-warning border-5 shadow py-2 mb-3 bg-white">
                                    <div class="row">
                                        <div class="col text-center">
                                            <img height="90em" src="Resources\src\img\icons\pet-toy.png" alt="">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col text-center">
                                            <h5>Toys</h5>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class = "col food-card">
                                <div class="border rounded container border-warning border-5 shadow py-2 mb-3 bg-white ">
                                    <div class="row">
                                        <div class="col text-center">
                                            <img height="90em" src="Resources\src\img\icons\trimming.png" alt="">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col text-center">
                                            <h5>Wellness</h5>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>  
            </div>
            <div class="row mt-5">
                <div class="col">
                    <div class="border border-warning border-5 rounded page-divider bg-warning text-center" >

                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col">
                    <h2>Best Seller</h2>
                </div>
            </div>
            <div class="row mt-3 mb-5">
                <div class="col">
                    <div class="container">
                        <div class="row">
                            <div class="col-4">
                                <a href="#" style="text-decoration: none;">
                                    <div class="card text-center h-100">
                                        <img class="card-img-top img-fluid" src="Resources\src\img\products\Royal Canin Breed Health Nutrition Puppy Pug Dry Dog Food 500g.jfif" alt="Title">
                                        <div class="card-body">
                                            <h4 class="card-title">Royal Canin Breed Health Nutrition Puppy 500g</h4>
                                            <p class="card-text">Text</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col">
                                <div class="container" style="height: 100%;">
                                    <div class="row h-50">
                                        <div class="col" style="height: 100%;">
                                            <a href="" style="text-decoration: none;">
                                                <div class="card text-center" style="height: 100%; font-size: 0.7em;">
                                                    <img class="img-fluid card-img-top h-75" src="Resources\src\img\products\Royal Canin Breed Health Nutrition Puppy Pug Dry Dog Food 500g.jfif" alt="">
                                                    <div class="card-body">
                                                        <p class="card-title">Royal Canin Breed Health Nutrition Puppy Food 500g</p>
                                                        <p class="card-text">Text</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col" style="height: 100%;">
                                            <a href="" style="text-decoration: none;">
                                                <div class="card text-center" style="height: 100%; font-size: 0.7em;">
                                                    <img class="img-fluid card-img-top h-75" src="Resources\src\img\products\Royal Canin Breed Health Nutrition Puppy Pug Dry Dog Food 500g.jfif" alt="">
                                                    <div class="card-body">
                                                        <p class="card-title">Royal Canin Breed Health Nutrition Puppy Food 500g</p>
                                                        <p class="card-text">Text</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col" style="height: 100%;">
                                            <a href="" style="text-decoration: none;">
                                                <div class="card text-center" style="height: 100%; font-size: 0.7em;">
                                                    <img class="img-fluid card-img-top h-75" src="Resources\src\img\products\Royal Canin Breed Health Nutrition Puppy Pug Dry Dog Food 500g.jfif" alt="">
                                                    <div class="card-body">
                                                        <p class="card-title">Royal Canin Breed Health Nutrition Puppy Food 500g</p>
                                                        <p class="card-text">Text</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row h-50">
                                        <div class="col" style="height: 100%;">
                                            <a href="" style="text-decoration: none;">
                                                <div class="card text-center" style="height: 100%; font-size: 0.7em;">
                                                    <img class="img-fluid card-img-top h-75" src="Resources\src\img\products\Royal Canin Breed Health Nutrition Puppy Pug Dry Dog Food 500g.jfif" alt="">
                                                    <div class="card-body">
                                                        <p class="card-title">Royal Canin Breed Health Nutrition Puppy Food 500g</p>
                                                        <p class="card-text">Text</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col" style="height: 100%;">
                                            <a href="" style="text-decoration: none;">
                                                <div class="card text-center" style="height: 100%; font-size: 0.7em;">
                                                    <img class="img-fluid card-img-top h-75" src="Resources\src\img\products\Royal Canin Breed Health Nutrition Puppy Pug Dry Dog Food 500g.jfif" alt="">
                                                    <div class="card-body">
                                                        <p class="card-title">Royal Canin Breed Health Nutrition Puppy Food 500g</p>
                                                        <p class="card-text">Text</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col" style="height: 100%;">
                                            <a href="" style="text-decoration: none;">
                                                <div class="card text-center" style="height: 100%; font-size: 0.7em;">
                                                    <img class="img-fluid card-img-top h-75" src="Resources\src\img\products\Royal Canin Breed Health Nutrition Puppy Pug Dry Dog Food 500g.jfif" alt="">
                                                    <div class="card-body">
                                                        <p class="card-title">Royal Canin Breed Health Nutrition Puppy Food 500g</p>
                                                        <p class="card-text">Text</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
            
        </div>

        <!-- Content End -->

        <!-- General Footer Start-->
            <?php include 'Resources/views/footer.php'; ?>
        <!-- General Footer End -->        

    </body>
</html>