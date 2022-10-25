<?php 
    include_once('navOwner.php');
    require_once("validate-session.php"); 
?>

<div class="homeOwner"> 
  <div class="homeOwner__header">
    <h1 class="homeOwner__title">Pet Hero</h1>
    <p class="homeOwner__subtitle">Welcome Owner!!!</p>
  </div>

  <div class="homeOwner__menu">
    <div class="homeOwner__menu--item">
      <a href="<?php echo FRONT_ROOT?>Pet/SignUpPet">Add Pet</a>
    </div>
  
    <div class="homeOwner__menu--item">
      <a href="<?php echo FRONT_ROOT?>Pet/ShowListView">Show Pet's List</a>
    </div>
  
    <div class="homeOwner__menu--item">
      <a href="<?php echo FRONT_ROOT?>Owner/ShowListKeeperView">Show Keeper's List</a>
    </div>
  
    <?php if($frontMessage){?>
      <div class="homeOwner__menu--message">
        <p class="check__message"><?php echo $frontMessage?></p>
      </div>
    <?php }?>
  </div>
</div>