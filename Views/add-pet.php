<?php
  //include_once('header.php');
 include_once('navOwner.php'); 
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
            <input type="text" id="description" class="fadeIn third" name="description" placeholder="Description" required>
            
            <!-- vacunacion -->
            <div class="fadeIn third">
            <t>Vaccination</t>
            </div>
            <form action="<?php echo FRONT_ROOT?>Pet/UploadImage" method="POST" enctype="multipart/form-data">
                <input type="file" name="vaccination" accept="image/*" class="fadeIn second"/>
                <button type="submit" class="fadeIn second">Upload</button>
            </form>
            <!-- imagen mascota -->
            <div class="fadeIn third">
            <t>Image</t>
            </div>
            <form action="<?php echo FRONT_ROOT?>Pet/UploadImage" method="POST" enctype="multipart/form-data">
                <input type="file" name="imagePet" accept="image/*" class="fadeIn second"/>
                <button type="submit" class="fadeIn second">Upload</button>
            </form>

            <input type="submit" class="fadeIn fourth" value="Add Pet">
            <a href="<?php echo FRONT_ROOT ?>User/HomeOwner" class="fadeIn third">Cancel</a>
          </form>
        </div>
      </div>
    </body>

</html>
<?php
include('footer.php');
?>
