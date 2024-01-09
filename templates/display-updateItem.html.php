<?php
    if(count($rows) > 0):
     $row = $rows[0];
?>

<h2 id="edit">Edit Item</h2>
<form action="updateItem.php" method="post">
    <fieldset class="categoryForm">
        <legend>Item Details</legend>

        <p>
            <label for="item-name">Item Name: </label>
            <input type="text" name="Item_name" id="item-name" required value="<?=$row["Item_name"]?>">
        </p>

        <p>
            <label for="Price">Price $:</label>
            <input type="number" name="Price" id="price" step="any" value="<?= $row["Price"]?>">
        </p>

        <p>
            <label for="Sale-Price">Sale-Price $:</label>
            <input type="number" name="Sale_price" id="price" step="any" value="<?= $row["Sale_price"]?>">
        </p>

        <p>
            <label for="Description">Description:</label>
            <input type="text" name="Description" id="Description" value="<?= $row["Description"]?>">
        </p>

        <p>
            <label for="Featured">Featured: </label>
            <?php if ($row["Featured"]==1): ?>
                <input type="checkbox" name="Featured" id="Featured" checked>
            <?php else: ?>
                <input type="checkbox" name="Featured" id="Featured">
            <?php endif; ?>
        </p>


        <p>
            <label for="category">Category:</label>
            <select name="Category_Id" id="category">
                <?php foreach($categoryRows as $categoryRow):

                    $category_id = $categoryRow["Category_Id"];
                    $categoryName = $categoryRow["Category_name"];

                    if($category_id == $categoryRow["Category_Id"]):
                        //display the category as the selected item in the dropdown list
                    ?>
                        <option value="<?= $category_id?>" selected><?=$categoryName?></option>
                    <?php else: ?>
                        <option value="<?=$category_id?>"><?= $categoryName ?></option>

                    <?php endif; ?>
                <?php endforeach; ?>
            </select>
        </p>

        <p>
            <label for="PhotoPath">PhotoPath: </label>
            <input type="text" name="PhotoPath" id="PhotoPath" value="<?= $row["PhotoPath"]?>">
        </p>

        <input type="hidden" value="<?= $row["Item_id"]?>" name="Item_id">

        <p>
            <input type="submit" value="Update Item" name="submit">
        </p>

        <p class="Success-User-Message"><?= $message?></p>
    </fieldset>
</form>
<?php endif; ?>
