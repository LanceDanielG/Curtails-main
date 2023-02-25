<?php 
    include_once 'header.php';
    include_once 'services/dbConnection.php'; 
    $SQL = "SELECT * FROM products";
    $result = mysqli_query($connect , $SQL);
    $SQL = "SELECT * FROM categories";
    $categories = mysqli_query($connect, $SQL);
?>


    <div class="container">
        <div class="row justify-content-center align-items-center mt-3">
            <div class="col text-center">
                <h3>Products</h3>
            </div>
        </div>
        <div class="row justify-content-center align-items-center mt-4">
            <div class="col text-start">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-magnifying-glass"></i></span>
                    <input class="form-control" type="text" name="searchText" id="searchText" placeholder="Type Something..." aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="col text-end">
                <select name="currentCategory" id="currentCategory" class="form-select">
                    <option value="">Select Category</option>
                    <?php foreach($categories as $category): ?>
                        <option value="<?= $category['categoryName']; ?>"><?= $category['categoryName']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <!-- Products Container -->
        <div class="row justify-content-center align-items-center mt-3">
            <div class="col">
                <div class="container-fluid" id="productContainer">
                    <?php $hook = 1; ?>
                    <?php foreach($result as $row): ?>
                        <?php if($hook == 1): ?>
                            <div class="row justify-content-center align-items-center">
                        <?php endif; ?>
                        <?php $hook += 1; ?>
                            <div class="col">
                                <button class="productCard border-0 w-100 h-100" value="<?= $row['id']; ?>"> 
                                    <div class="card h-100 w-100">
                                        <img class="card-img-top" src="<?= $row['product_ImagePath']; ?>" style='aspect-ratio: 3/2; object-fit: contain;'>
                                        <div class="card-body">
                                            <h4 class="card-title"><?= $row['productName']; ?></h4>
                                            <p class="card-text">P <?= $row['productPrice']; ?></p>
                                        </div>
                                    </div>
                                </button>
                            </div>
                        <?php 
                            if($hook == 3) {
                                $hook = 1;
                                echo "</div>";
                            }
                        ?>
                    <?php endforeach; ?>
                    <?php if($hook != 1) echo "</div>"; ?>
                </div>
            </div>
        </div>
    </div>
    <form action="productDescription.php" method="get" id="getProductIDForm">
        <input type="hidden" name="productID" id="productID" value="">
    </form>

<?php include_once 'footer.php'; ?>
<?php include_once 'services/toaster.php'; ?>

<script>
    $(document).ready(()=>{
        $('.productCard').on('click', (event)=>{
            $('#productID').val(event.currentTarget.value);
            $('#getProductIDForm').submit();
        });
        $('#searchText').on('input', ()=>{
            $.ajax({
                url: "services/getProductList.php",
                method: "GET",
                data: {
                    search: $("#searchText").val(),
                    category: $("#currentCategory option:selected").text()
                },
                success: (data)=>{
                    $("#productContainer").html(data);
                }
            });
        });
        $("#currentCategory").on("change", ()=>{
            $.ajax({
                url: "services/getProductList.php",
                method: "GET",
                data: {
                    search: $("#searchText").val(),
                    category: $("#currentCategory option:selected").text()
                },
                success: (data)=>{
                    $("#productContainer").html(data);
                }
            });
        });
    });
</script>
