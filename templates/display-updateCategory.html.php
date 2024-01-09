<form action="updateCategory.php" method="post">
	<table class="TableLayout">
		<tr>
			<th>Category_Id</th>
			<th>Category_name</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		<?php foreach ($categoryRows as $row):
			 $category_Id = $row["Category_Id"];
			 $CategoryName = $row["Category_name"];

			 //check if the category ID matches the category in the query string
			 if($catId == $category_Id):
			 	//display the form
		?>
			<tr>
				<td>
					<input type="text" name="Category_Id" id="category_Id" required value="<?= $row["Category_Id"] ?>">
				</td>

				<td>
					<textarea name="Category_name" id="CategoryName"><?=$CategoryName?></textarea>
				</td>
				<td>
					<input type="hidden" value="<?= $category_Id?> " name="Category_Id">
					<input type="submit" name="submit" value="Update">
					<input type="submit" name="cancel" value="Cancel">
				</td>
			</tr>
		<?php else: ?>
			<tr>
				<td><?=$category_Id?></td>
				<td><?=$CategoryName?></td>
				<td><a href="updateCategory.php?id=<?=$category_Id?>">Edit</a></td>
				<td><a href="deleteCategory.php?id=<?=$category_Id?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a></td>
			</tr>
		<?php endif; ?>
		<?php endforeach; ?>
	</table>
</form>
