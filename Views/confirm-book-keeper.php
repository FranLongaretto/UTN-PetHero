<?php
  include_once('navOwner.php'); 
  require_once("validate-session.php");
?>

<div class="mainForm fadeInDown">
    <div class="mainForm__container">
        <!-- Form -->
        <form action="<?php echo FRONT_ROOT?>Book/UpdateBook" method="POST" class="mainForm__form">
            <h2 class="mainForm__form--title">CONFIRM BOOK</h2>

            <div class="form-confirmBook">
                <div class="confirmBook-keeper">
                    <p>Keeper Name: </p>
                    <p class="confirmBook-keeper-item"><?php echo $frontKeeper->getFirstName()." ". $frontKeeper->getLastName() ?></p>
                </div>
                <div class="confirmBook-book">
                    <div class="confirmBook-book-date">
                        <p>Date range: </p>
                        <p class="confirmBook-book-date-item"><?php echo $frontDateStart . " / " . $frontDateEnd ?></p>
                    </div>
                    <div class="confirmBook-book-price">
                        <p>Price: </p>
                        <p class="confirmBook-book-price-item"><?php echo $frontPrice ?></p>
                    </div>
                </div>
            </div>

            <input type="number" name="idBook" id="idBook" value="<?php echo $book->getId() ?>" hidden>
            <input type="submit" class="mainForm__form--submit fadeIn second" value="Confirm">

            <?php if($_SESSION["loggedUser"]->getRole()=="Owner"){ ?>
                <a href="<?php echo FRONT_ROOT ?>Owner/HomeOwner" class="btn btn-outline-primary">Cancel</a>
            <?php }else{ ?>
                <a href="<?php echo FRONT_ROOT ?>User/HomeKeeper" class="btn btn-outline-primary">Cancel</a>
            <?php } ?>
        </form>
    </div>
</div>
