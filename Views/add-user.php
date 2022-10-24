<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login and Register</title>
        <link rel="stylesheet" href="<?php echo CSS_PATH ?>style.css">
    </head>

    <body>
      <div class="wrapper fadeInDown">
          <div id="formContent">
            <!-- Tabs Titles -->


            <!-- Login Form -->
            <form action="<?php echo FRONT_ROOT?>User/Add" method="POST">
              <h2>REGISTRATION</h2>
              <input type="email" id="email" class="fadeIn second" name="email" placeholder="email" required>
              <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" required>
              <select id="role" class="fadeIn third" name="role" required>
                  <option value="Owner">Owner</option>
                  <option value="Keeper">Keeper</option>
              </select>
              <input type="text" id="firstName" class="fadeIn third" name="firstName" placeholder="first name" required>
              <input type="text" id="lastName" class="fadeIn third" name="lastName" placeholder="last name" required>
              <input type="text" id="dni" class="fadeIn third" name="dni" placeholder="dni" required>
              <input type="text" id="phoneNumber" class="fadeIn third" name="phoneNumber" placeholder="phone number" required>
              <input type="submit" class="fadeIn fourth" value="Sign Up">
              <div>
               <?php
                    if($message != "") {
                         echo "<div class='container alert alert-danger mt-3 p-3 text-center'>
                         <p><strong>" . $message . "</strong></p>
                         </div>";
                    }
               ?>
               </div>
            </form>
          </div>
      </div>
    </body>

</html>
<?php

include('footer.php');
?>
