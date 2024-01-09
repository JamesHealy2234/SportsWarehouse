<h3>Insert Category</h3>
<form action="insertCategory.php" method="post">
    <fieldset class="categoryForm">
        <p class="formfield">
            <label for="Category_Id">Cateogry Id:</label>
            <input type="number" min="1" name="Category_Id" id="Category_Id" required>
        </p>

        <p class="formfield">
            <label for="Category_name">CateogryName:</label>
            <textarea name="Category_name" id="CategoryName" placeholder="Example: Footware"></textarea>
        </p>

        <p><input type="submit" name="submit" value="Insert Category"></p>
        <p class="Success-User-Message"><?=$message?></p>
    </fieldset>
</form>
