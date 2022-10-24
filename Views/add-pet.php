<?php
  require_once("validate-session.php");
  include_once("header.php");
  include_once("navOwner.php"); 
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
          <form action="<?php echo FRONT_ROOT?>Pet/Add" method="POST" enctype="multipart/form-data">
            <h2 class="formTitle">Add Pet</h2>
  
            <input type="text" id="race" class="fadeIn second" name="race" placeholder="Race" required>

            <select class="fadeIn third" name="size" id="size" required>
              <option disabled selected>Seleccionar Size</option>
              <option value="small">Small</option>
              <option value="medium">Medium</option>
              <option value="big">Big</option>
            </select>

            <input type="file" accept="image/*" id="vaccination" class="inputImgVaccine" name="vaccinationImg" required>

            <input type="text" id="description" class="fadeIn third" name="description" placeholder="Description" required>

            <input type="file" accept="image/*" id="image" class="inputImgPet" name="petImage" required>

            <div class="formSend">
              <input type="submit" class="fadeIn fourth formSend__cancel" value="Add Pet">
              <a href="<?php echo FRONT_ROOT ?>User/HomeOwner" class="formSend__cancel">Cancel</a>
            </div>
          </form>
        </div>
      </div>
    </body>
</html>

<?php
  include('footer.php');
?>