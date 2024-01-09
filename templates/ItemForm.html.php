<form action="uploadPicture.php" method="post" enctype="multipart/form-data">
    <fieldset class="categoryForm">
        <legend><strong>Upload Item Photo</strong></legend>
            <p>
                <label for="fileToUpload"><strong>Select image to uplaod: </strong></label>
                <input type="file" name="fileToUpload" id="fileToUpload">
            </p>
            <input type="submit" value="Upload-Image" name="submit1">
            <p class="Success-User-Message"><?=$message?></p>
    </fieldset>
</form>


<form action="insertItem.php" method="post">
    <fieldset class="categoryForm">
        <legend><strong>Item Details</strong></legend>

        <p>
            <label for="item-name">Item Name: </label>
            <input type="text" name="item_name" id="itemName" required>
        </p>

        <p>
            <label for="price">Price: $</label>
            <input type="number" name="Price" id="item-price" step="any" required>
        </p>

        <p>
            <label for="sale-price">sale price: $</label>
            <input type="number" name="Sale_price" id="Sale_price" step="any">
        </p>

        <p>
            <label for="Description">Description: </label>
            <input type="text" name="Description" id="Description" required>
        </p>

        <p>
            <label for="Featured">Featured: </label>
            <input type="checkbox" name="Featured" id="Featured" >
        </p>

        <p>
            <label for="category">Category:</label>
            <select name="Category_Id" id="category">
                <?php foreach($categoryRows as $row):
                    $category_id = $row["Category_Id"];
                    $categoryName = $row["Category_name"];
                ?>
                <option value="<?=$category_id?>"><?=$categoryName?> </option>
                <?php endforeach; ?>
            </select>
        </p>

        <p>
            <label for="PhotoPath">PhotoPath: </label>
            <input type="text" name="PhotoPath" id="PhotoPath">
        </p>

        <p>
            <input type="submit" value="Insert New item" name="submit">
        </p>


        <p class="Success-User-Message"> <?$message?></p>

    </fieldset>
</form>
