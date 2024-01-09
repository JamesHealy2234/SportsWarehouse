<p id="adminP"><strong>Admin page only <?=$_SESSION["username"];?> can see</strong></p>

 <section id="successSection">
    <?php if(isset($_SESSION["message"])): ?>
        <p><?=$_SESSION["message"];?></p>
    <?php unset($_SESSION["message"]);  endif; ?>

 </section>


<div id="admin-Div">
    <ul>
        <li><p class="Admin-Mob-L">Create new user if you are new staff signing in <a href="createUser.php"> click here</a></p></li>
        <li><p class="Admin-Mob-L">Click here to <a href="logout.php">Logout</a> of the admin page</p></li>
        <li><p class="Admin-Mob-L">Click <a href="?type=changePassword">here</a> to change your password </p></li>
        <li><p class="Admin-Mob-L">Click <a href="insertCategory.php">here</a> to insert new Category </p></li>
        <li><p class="Admin-Mob-L">Click <a href="updateCategory.php">here</a> to Update or Delete a Category </p></li>
        <li><p class="Admin-Mob-L">Click <a href="insertItem.php">here</a> to insert a new item to Sports Warehouse</p></li>
        <li><P class="Admin-Mob-L">Click <a href="updateItem.php">here</a> to update or Delete an item on Sports Warehouse </p></li>
        <li><P class="Admin-Mob-L">Click <a href="ChangeTheme.php">here</a> to Change the Sports Warehouse Theme</p></li>
    </ul>
</div>

<div id="admin-imgD">
    <img src="images\tools-of-sys-admin.jpg"  width="520" height="300" alt="sys-admin-image">
</div>
