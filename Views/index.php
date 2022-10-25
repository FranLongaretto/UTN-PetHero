<?php
  include('header.php');
?>

<div class="wrapper fadeInDown">
  <div id="formContent">
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

<?php
  include('footer.php');
?>
