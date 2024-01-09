

<!-- <audio controls>
    <source src="audio\Billy Joel - Piano Man (Official Video).mp3" type="audio/mpeg">
</audio> -->


<form method="post" action="ChangeTheme.php">
    <fieldset class="categoryForm">
        <legend><strong>Choose your Theme for Sports Warehouse</strong></legend>


        <label for="theme">Please Select Your chosen theme</label>
        <select id="theme" name="theme">
    		<option value="plain">Plain</option>
    		<?php if($theme == "blue.css"): ?>
    			<option value="blue" selected>Blue Theme</option>
    		<?php else: ?>
    			<option value="blue">Blue Theme</option>
    		<?php endif;
    		if($theme == "dark.css"): ?>
    			<option value="dark" selected>Dark Theme</option>
    		<?php else: ?>
    			<option value="dark">Dark Theme</option>
    		<?php endif;
    		if($theme == "green.css"): ?>
    			<option value="green" selected>Green Theme</option>
    		<?php else: ?>
    			<option value="green">Green Theme</option>
    		<?php endif; ?>
    	</select>

        <br>

        <p>
            <input type="submit" value="send" name="submit">
        </p>
    </fieldset>
</form>
