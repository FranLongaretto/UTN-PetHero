<?php 
    include_once('navKeeper.php');
    require_once("validate-session.php"); 
?>

<link rel="stylesheet" href="<?php echo CSS_PATH ?>stylehome.css">
  <div align="center"  id="pageintro" class="hoc clear"> 
    <article class="center">
      <h3 class="heading underline">Pet Hero</h3>
      <p>Welcome Keeper!!!</p>
      <div id="formFooter" class="buttons-site">
        <a class="underlineHover" href="<?php echo FRONT_ROOT?>Keeper/RegistrationKeeper">Add Keeper</a>
      </div>
    </article>
  </div>
</div>

<?php 
  include_once('footer.php');
?> 