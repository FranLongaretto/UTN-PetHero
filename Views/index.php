
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login and Register</title>
        <link rel="stylesheet" href="<?php echo CSS_PATH ?>style.css">
        
    </head>

    <body class="main">
      <div class="wrapper fadeInDown">
        <div id="formContent">
          <!-- Tabs Titles -->

          <!-- Icon -->
          <div class="fadeIn first">
            <img src="<?php echo FRONT_ROOT.VIEWS_PATH?>img/dogIcon.png" id="icon" alt="User Icon" />
          </div>

          <!-- Login Form -->
          <form action="<?php echo FRONT_ROOT?>User/Login" method="POST">
            <input type="email" id="email" class="fadeIn second" name="email" placeholder="Email">
            <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password">
            <input type="submit" class="fadeIn fourth" value="Log In">
            <?php if($frontMessage){?>
              <p class="error__message"><?php echo $frontMessage?></p>
            <?php }?>
          </form>

          <!-- Sing Up -->
          <div id="formFooter">
            <a class="underlineHover" href="<?php echo FRONT_ROOT?>User/SignUp">Sign Up</a>
          </div>
          <!-- Remind Passowrd -->
          <div id="formFooter">
            <a class="underlineHover" href="#">Forgot Password?</a>
          </div>
          
        </div>
      </div>
    </body>

</html>
<?php

include('footer.php');
?>
