<?php
   if(isset($redirect) && $redirect == true)
   {
     Header("Location:confirmation.php");
   }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title> <?= $title?> </title>
        <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    </head>
    <body>


    <div id="header">
        <img src="images/LogoLarge.gif" alt="main logo">
    </div>


<div class="header2">
    <h1>Contact us</h1>
    <p>Please fill out the details to register</p>
</div>

<div id="backButton">
    <input type="button" onclick="goBack();" name="BACK" value="Back to home">
</div>


 <!-- require_once 'classes/FormValidationInfo.php';  -->
 <?php if($form->valid == false): ?>
   <p class="error">Please supply the missing information</p>
 <?php endif; ?>


<div id="BackgroundStyle">
    <form action="Contact.php" id="contactFrom" method="post">

        <div class="cool-image">
            <img src="images/FiFa-soccerBall.jpg" alt="fifa soccerBall">
        </div>

     <fieldset>
    	<legend>Name</legend>

        <div class="MO">
          <div>
            <label for="firstName" <?=$form->setErrorClass("firstName")?>> First Name:* </label>

          </div>

          <div>
            <input type="text" name="firstName" id="firstName" value="<?=$form->setValue("firstName")?>">
            <span class="message"> <?=$nameMessage?>  </span>
          </div>
        </div>


      <div>
          <div>
    			 <label for="lastName" <?= $form->setErrorClass("lastName") ?> >Last Name:* </label>

          </div>

          <div>
    			<input type="text" id="lastName" name="lastName" value="<?=$form->setValue("lastName")?>">
                <span class="message"> <?=$nameMessage?> </span>

          </div>

    	</div>

    </fieldset>

    	<fieldset class="BB">
    			<legend>Contact Details</legend>
    		<div>
                    <div>
    			        <label for="email" <?= $form->setErrorClass("email") ?>> Email:* </label>
                   </div>

                    <div>
    			        <input type="email" id="email" name="email" value="<?=$form->setValue("email")?>">
                        <span class="message"> <?=$emailMessage?></span>
                   </div>
    		</div>

            <div>
                <div>
                    <label for="mobile"> Mobile:* </label>
                </div>

                <div>
                    <input type="tel" name="mobile" id="mobile" value="">
                </div>
            </div>


    		    <div>
                    <div>
    			        <label for="phone" > Phone: </label>
                    </div>
                    <div>
    			        <input type="tel" name="phone" id="phone" value="">
                    </div>
    		    </div>

    	</fieldset>
    	   <fieldset class="Leave A Product">
                <legend class="nu1">Products</legend>


    			<p class="nu1">list some of the things you would like to see on our website </p>


                <label for="areaComments" class="nu1">Comments*</label>
                    <div class="commentBox" >
                        <textarea  name="areaComments" id="areaComments" resize="false" cols="40" rows="5" placeholder="Leave some ideas..."></textarea>
                    </div>
    	    </fieldset>

    		<div id="Clickbutton">
    			 <input type="submit" name="Contact" value="Contact" id="Contact">
    		</div>
      </form>

  <footer>
      <p> Copyright &copy; SportsWare House 2019 </p>
  </footer>

</div>


</body>
</html>

<script>
  function goBack() {
  window.history.back();
}
</script>


<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous">
</script>

<!-- include Jquery plugin resources after library has been implemented-->

<script src="plugins/jquery.validate/jquery.validate.min.js"></script>

<script src="scripts/contactApp.js"></script>
