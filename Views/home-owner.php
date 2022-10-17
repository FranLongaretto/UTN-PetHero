<?php 
    include_once('header.php');
    include_once('navOwner.php');
    require_once("validate-session.php"); 
?>
<style>
  input[type=button], input[type=submit], input[type=reset], a  {
    background-color: #56baed;
    border: none;
    color: white;
    padding: 15px 80px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    text-transform: uppercase;
    font-size: 13px;
    width: 300px;
    height: 50px;
    margin: 2px;
           
    
  }
  a{
    margin: 0;
  }
  

  
</style>

<div align="center"  id="pageintro" class="hoc clear"> 
  <article class="center">
    <h3 class="heading underline">Pet Hero</h3>

    <p>Bienvenido Owner!!!</p>

    <div id="formFooter" class="buttons-site">
      <a class="underlineHover" href="<?php echo FRONT_ROOT?>Pet/SignUpPet">Add Pet</a>
    </div>

    <div id="formFooter" class="buttons-site">
      <a class="underlineHover" href="<?php echo FRONT_ROOT?>Pet/ShowListView">Show List of Pet's</a>
    </div>
  </article>
</div>

<?php 
  include_once('footer.php');
?> 