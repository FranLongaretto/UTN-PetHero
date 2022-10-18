<?php 
    include_once('header.php');
    include_once('navOwner.php');
    require_once("validate-session.php"); 
?>

<link rel="stylesheet" href="<?php echo CSS_PATH ?>stylehome.css">
<div align="center"  id="pageintro" class="hoc clear"> 
  <article class="center">
    <h3 class="heading underline">Pet Hero</h3>

    <p>Welcome Owner!!!</p>

    <div id="formFooter" class="buttons-site">
      <a class="underlineHover" href="<?php echo FRONT_ROOT?>Pet/SignUpPet">Add Pet</a>
    </div>

    <div id="formFooter" class="buttons-site">
      <a class="underlineHover" href="<?php echo FRONT_ROOT?>Pet/ShowListView">Show Pet's List</a>
    </div>

    <div id="formFooter" class="buttons-site">
      <!-- deberia llamar a la controladora de Keepper -> Keeper/ShowListView -->
      <a class="underlineHover" href="<?php echo FRONT_ROOT?>Owner/ShowListKeeperView">Show Keeper's List</a>
    </div>
  </article>
</div>

<?php 
  include_once('footer.php');
?> 