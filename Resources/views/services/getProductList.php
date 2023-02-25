<?php

    session_start();
    require "dbConnection.php";
    $temp = "%{$_GET['search']}%";
    $SQL = "SELECT * FROM products WHERE prodCategory=? OR productName LIKE ?";
    $statement = mysqli_prepare($connect, $SQL);
    $statement->bind_param("ss",
        $_GET['category'],
        $temp
    );
    $statement->execute();
    $result = $statement->get_result();

?>

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