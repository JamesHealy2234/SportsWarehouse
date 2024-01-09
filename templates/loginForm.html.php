<form action="login.php" method="post">
    <fieldset class="Desktop-Login-Form">
        <legend>Login</legend>
        <p>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </p>

        <p>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </p>

        <p>
            <input type="submit" id="loginSubmit" name="loginSubmit" value="Login">
        </p>


    </fieldset>
</form>

<?php if(isset($error)): ?>
    <p class="error"><?= $message ?></p>
<?php endif; ?>
