<?php
  require_once("classes/FormValidationInfo.php");

  $title = "Contact Form";

  //create FormValidation object so that it can be used

  $form = new FormValidation();

  //start buffer
  ob_start();

  //check if the subit button was clicked
  if(isset($_POST["Contact"]))
  {
    //validate name was supplied
    $nameMessage = $form->checkEmpty("firstName");

    $nameMessage = $nameMessage . " " . $form->checkEmpty("lastName");
    //validate name is in the correct format
    $nameMessage = $nameMessage . " " . $form->checkName("firstName");

    $nameMessage = $nameMessage . " " . $form->checkName("lastName");

    //validate valid email address
    $emailMessage = $form->checkEmail("email");


    //validate Address
    // $addressMessage = $form->checkEmpty("address");

    // //validate gender was selected
    // $genderMessage = $form->checkEmpty("gender");

    //if any checks did not pass valid will be set to false
    //if all checks passed valid will be true

    if($form->valid === true)
    {
      //redirect to the thanks page
     header("location:confirmation.php");
     // echo "form is valid";
    }
    else {
      //display form with errors listed
      include 'templates/DisplayLayout.html.php';
    }
  }
  else //sumbit button was not clicked the form is displayed for the first time
  {
    //display form without errors
    $form->valid = true;

    $nameMessage = "";
    $emailMessage = "";
    // $addressMessage = "";
    // $genderMessage = "";

    include 'templates/DisplayLayout.html.php';
  }


?>
