<?php

    include_once 'dbConnection.php';

    $SQL = "DELETE FROM categories WHERE ID=". $_POST['ID'];
    mysqli_query($connect, $SQL);

    
    $SQL = "SELECT * FROM categories";
    $categories = mysqli_query($connect, $SQL);

?>

<?php foreach($categories as $category): ?>
    <tr>
        <td><?= $category['ID'];?></td>
        <td><?= $category['categoryName'];?></td>
        <td>
            <div class="dropdown open">
                <button class="border border-0 bg-transparent" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa-solid fa-ellipsis-vertical"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="triggerId">
                    <button class="removeCategoryBtn dropdown-item" value="<?= $category['ID'];?>">Remove Category</button>
                </div>
            </div>
        </td>
    </tr>
<?php endforeach; ?>