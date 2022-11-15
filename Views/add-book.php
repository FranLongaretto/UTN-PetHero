<?php
  include_once('navOwner.php'); 
  require_once("validate-session.php");

?>

<div class="mainForm fadeInDown">
  <div class="mainForm__container">
    <!-- Form -->
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <form action="<?php echo FRONT_ROOT?>Book/Add" method="POST" class="mainForm__form">
      <h2 class="mainForm__form--title">CONFIRM BOOK</h2>

      <div class="form-confirmBook">
        <div class="confirmBook-keeper">
          <h5 style="color:#39ace7">Keeper Name: </h5>
          <p id="nameKeeper" name="nameKeeper" class="confirmBook-keeper-item"><?php echo $frontKeeper->getFirstName()." ". $frontKeeper->getLastName() ?></p>
          <input type="number" name="idKeeper" id="idKeeper" value="<?php echo $frontKeeper->getId() ?>" hidden>
          <input type="number" name="idOwner" id="idOwner" value="<?php echo $frontOwnerBook->getId() ?>" hidden>
          <input type="number" name="idKeeperBook" id="idKeeperBook" value="<?php echo $frontKeeperBook ?>" hidden>
        </div>
        <?php foreach ($frontBookPets as $key => $value) {?>
        <div class="confirmBook-pets">
          <h5 style="color:#39ace7">Pet: </h5>
          <p id="pet" name="pet" class="confirmBook-pets-item"><?php echo $value->getType() ?> / <?php echo $value->getRace() ?></p>
        </div>
        <?php } ?>
        <div class="confirmBook-book">
          <div class="confirmBook-book-date">
            <h5 style="color:#39ace7">Date range: </h5>
            <p class="confirmBook-book-date-item"><?php echo $frontDateStart . " / " . $frontDateEnd ?></p>
            <input type="date" name="dateStart" id="dateStart" value="<?php echo $frontDateStart ?>" hidden>
            <input type="date" name="dateEnd" id="dateEnd" value="<?php echo $frontDateEnd ?>" hidden>
          </div>
          <div class="confirmBook-book-price">
            <h5 style="color:#39ace7">Price: </h5>
            <p class="confirmBook-book-price-item"><?php echo $frontPrice ?></p>
            <input type="number" name="bookPrice" id="bookPrice" value="<?php echo $frontPrice ?>" hidden>
          </div>
        </div>
      </div>

      <input type="submit" class="mainForm__form--submit fadeIn second" value="Confirm">

      <?php if($_SESSION["loggedUser"]->getRole()=="Owner"){ ?>
        <a href="<?php echo FRONT_ROOT ?>Owner/HomeOwner" class="btn btn-outline-primary">Cancel</a>
      <?php }else{ ?>
        <a href="<?php echo FRONT_ROOT ?>User/HomeKeeper" class="btn btn-outline-primary">Cancel</a>
      <?php } ?>
      <input type="button" class="mainForm__form--submit fadeIn second" value="Send Email" onclick="sendEmail()">
    </form>
  </div>
</div>

<script>
  bookPrice = "Total Price: $".bold()+document.getElementById('bookPrice').value
  nameKeeper = "Keeper Name: ".bold()+document.getElementById('nameKeeper').innerHTML
  idOwner = "Owner Id:".bold()+document.getElementById('idOwner').value
  pet= "Pet: ".bold()+document.getElementById('pet').innerHTML
  dateStart= "Date Start: ".bold()+document.getElementById('dateStart').value
  dateEnd= "Date End: ".bold()+document.getElementById('dateEnd').value
  body= bookPrice+"," +nameKeeper+"," + idOwner+"," +pet+"," +dateStart+"," +dateEnd
  console.log(body)
  function sendEmail(){
    Email.send({
    Host : "smtp.elasticemail.com",
    Username : "german_oyarzo@hotmail.com",
    Password : "F6679CF7D87562C8DE6D167735C67681B57C",
    To : 'germanoyarzo94@gmail.com',
    From : "german_oyarzo@hotmail.com",
    Subject : "Book Details",
    Body : body
    }).then(
      (message) => {alert( "The email has been sent correctly" );
    });
  }
  
</script>