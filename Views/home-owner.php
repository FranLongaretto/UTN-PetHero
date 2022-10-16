<?php 
    include_once('header.php');
    include_once('nav.php');
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
    -webkit-box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
    box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
    -webkit-border-radius: 5px 5px 5px 5px;
    border-radius: 5px 5px 5px 5px;
    margin: 5px 20px 40px 20px;
    -webkit-transition: all 0.3s ease-in-out;
    -moz-transition: all 0.3s ease-in-out;
    -ms-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
  }
  a{
    margin: 0;
  }
  
  input[type=button]:hover, input[type=submit]:hover, input[type=reset]:hover, a:hover  {
    background-color: #39ace7;
  }
  
  input[type=button]:active, input[type=submit]:active, input[type=reset]:active, a:active  {
    -moz-transform: scale(0.95);
    -webkit-transform: scale(0.95);
    -o-transform: scale(0.95);
    -ms-transform: scale(0.95);
    transform: scale(0.95);
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