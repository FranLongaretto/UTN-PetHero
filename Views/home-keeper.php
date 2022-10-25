<?php 
    include_once('navKeeper.php');
    require_once("validate-session.php"); 
?>
<div class="homeOwner"> 
  <div class="homeOwner__header">
    <h1 class="homeOwner__title">PET HERO</h1>
    <p class="homeOwner__subtitle">welcome keeper!!!</p>
  </div>

  <div class="homeOwner__menu">
    <div class="homeOwner__menu--item">
      <a class="underlineHover" href="<?php echo FRONT_ROOT?>Keeper/RegistrationKeeper">Add Keeper</a>
    </div>
  
    <?php if($frontMessage){?>
      <div class="homeOwner__menu--message">
        <p class="check__message"><?php echo $frontMessage?></p>
      </div>
    <?php }?>
  </div>
</div>
<?php 
  include_once('footer.php');
?> 