
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Missing fields file</title>
  </head>
  <body>

     <h3>Missing Fields</h3>
     <p>Please supply the following details:</p>

    <ul>
      <?php foreach ($missingFields as $field):?>
        <li> <?= $field ?> </li>
      <?php endforeach; ?>
    </ul>


  </body>
</html>
