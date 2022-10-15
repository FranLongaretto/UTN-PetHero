<?php
  //include_once('header.php');
 // include_once('nav-bar.php'); 
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Pet</title>
        <link rel="stylesheet" href="<?php echo CSS_PATH ?>style.css">
    </head>

    <body>
    <div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->


    <!-- Login Form -->
    <form action="<?php echo FRONT_ROOT?>Owner/AddPet" method="POST">
      <h2>Add Pet</h2>
      <input type="text" id="race" class="fadeIn second" name="race" placeholder="race" required>
      <input type="text" id="vaccination" class="fadeIn third" name="vaccination" placeholder="vaccination" required>
      <input type="text" id="description" class="fadeIn third" name="description" placeholder="description" required>
      <input type="text" id="image" class="fadeIn third" name="image" placeholder="image" required>
      <input type="submit" class="fadeIn fourth" value="Add Pet">
    </form>


  </div>
</div>
    </body>

</html>
<?php

//include('footer.php');
?>
