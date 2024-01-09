<form action="createUser.php" method="post">
    <fieldset>
        <legend>Create User</legend>
        <p>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </p>

        <p>
            <label for="password">Password: </label>
            <input type="password" id="password" name="password" required>
        </p>

        <p>
            <input type="submit" name="submit" value="Add new user">
        </p>

    </fieldset>
</form>

<form action="createUser.php" method="post">
    <p>
        <input type="submit" name="back" value="Back">
    </p>
</form>

<p class="Success-User-Message"><?= $message?> </p>
