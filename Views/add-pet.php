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
          <form action="<?php echo FRONT_ROOT?>Pet/Add" method="POST">
            <h2>Add Pet</h2>
  
            <input type="text" id="race" class="fadeIn second" name="race" placeholder="Race" required>
            <select class="fadeIn third" name="size" id="size" required>
              <option disabled selected>Seleccionar Size</option>
              <option value="pequeño">Pequeño</option>
              <option value="mediano">Mediano</option>
              <option value="grande">Grande</option>
            </select>
            <input type="text" id="vaccination" class="fadeIn third" name="vaccination" placeholder="Vaccination" required>
            <input type="text" id="description" class="fadeIn third" name="description" placeholder="Description" required>
            <input type="text" id="image" class="fadeIn third" name="image" placeholder="Image" required>

            <input type="submit" class="fadeIn fourth" value="Add Pet">
          </form>
        </div>
      </div>
    </body>

</html>
<?php
//include('footer.php');
?>
