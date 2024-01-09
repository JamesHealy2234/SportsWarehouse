<table class="TableLayout2">
    <tr>
        <th>Item Name</th>
        <th>Price</th>
        <th>Sale_price</th>
        <th>Description</th>
        <th>Featured</th>
        <th>Category_Id</th>
        <th>PhotoPath</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

<?php foreach ($itemRows as $row):
    $Item_id = $row["Item_id"];
    $item_name = $row["Item_name"];
    $Price = $row["Price"];
    $Sale_price = $row["Sale_price"];
    $Description = $row["Description"];
    $Featured = $row["Featured"];
    $category_id = $row["Category_Id"];
    $PhotoPath = $row["PhotoPath"];
?>


    <tr>
        <td><?= $item_name?></td>
        <td><?= $Price?></td>
        <td><?= $Sale_price?></td>
        <td> <?= $Description?></td>
        <td> <?= $Featured?></td>
        <td> <?= $category_id?></td>
        <td> <?= $PhotoPath?></td>
        <td><a href="updateItem.php?id=<?=$Item_id?>#edit">Edit</td>
        <td><a href="deleteItem.php?id=<?=$Item_id?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a></td>
    </tr>
<?php endforeach; ?>
</table>
