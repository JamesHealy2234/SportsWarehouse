<main>
    <h3>Change Password</h3>
    <form action="changePassword.php" method="post" class="form" id="changePassword">

        <fieldset class="ChangePWForm">
            <p>
                <label for="username"><strong>Username: </strong></label>
                <input type="text" name="username" id="username" placeholder="sysadmin" required autofocus value="<?=$_SESSION["username"];?>" disabled>
            </p>

            <p>
                <label for="password"><strong>New Password:</strong></label>
                <input name="password" id="password" placeholder="New password" required>
            </p>

            <p>
                <label for="confirmPassword"><strong>Confirm Password:</strong></label>
                <input  type="password" name="confirmPassword" id="confirmPassword" placeholder="New Password" required>
            </p>
            <p>
                <input type="submit" name="submit" id="submit" value="Changed Password">
            </p>
        </fieldset>
    </form>


</main>
