
<?php

class FormValidation
{
  //properties
  public $valid = true;
  private $_errorFields = [];

  //methods
  //check for empty fields
  public function checkEmpty($fieldName)
  {
      //echo "in the class". $this->valid;
    $message = "";

    //if the fields is empty return a message
    if(!isset($_POST[$fieldName]) || empty($_POST[$fieldName]))
    {
      //if the field is missing add it to the error array
      $this->_errorFields[] = $fieldName;

      //set the form to invalid
      $this->valid = false;

      $message = "Please supply a value";
    }
    return $message;
  }


  // check for a valid email

 public function checkEmail($fieldName)
 {
  $message = "";
  //check the field is in a valid email format
  if(isset($_POST[$fieldName]))
  {

    if(!filter_var($_POST[$fieldName], FILTER_VALIDATE_EMAIL))
    {
      //if the field is not in the correct format add it to the error array
      $this->_errorFields[] = $fieldName;

      //set the form to invalid
      $this->valid = false;
      $message = "Please enter a valid email";
    }
  }

  return $message;
 }


  //check name is using letters , spaces apostrophe and hyphens only
public function checkName($fieldName)
{
    $message = "";
  if(isset($_POST[$fieldName]) && !empty($_POST[$fieldName]))
  {
    if(!preg_match("/^[a-zA-Z \-']*$/", $_POST[$fieldName]))
    {
      //if the field is not in the correct format add it to the eror array
      $this->errorFields[] = $fieldName;

      //set the form to invalid
      $this->valid = false;

      $message = "Only letters, apostrophe, hyphens and white space allowed";
    }
  }

  return $message;
}

  //set css class for missing fields
  public function setErrorClass($fieldName)
  {
    if(in_array($fieldName, $this->_errorFields))
    return 'class="error" ';
  }


  //set the value of a field
  public function setValue($fieldName)
  {
    if(isset($_POST[$fieldName]))
    {
      return htmlentities($_POST[$fieldName]);
    }
  }

}

?>
