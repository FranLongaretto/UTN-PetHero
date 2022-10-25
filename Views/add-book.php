<?php
  //include_once('header.php');
 include_once('navOwner.php'); 
 require_once("validate-session.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reservation</title>
        <link rel="stylesheet" href="<?php echo CSS_PATH ?>style.css">
        <!--  jQuery -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

        <!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
        <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

        <!-- Bootstrap Date-Picker Plugin -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
        
    </head>

    <body>
      <div class="wrapper fadeInDown">
        <div id="formContent">
          <!-- Tabs Titles -->

          <!-- Form -->
          <form action="<?php echo FRONT_ROOT?>Book/Add" method="POST">
            <h2>Add Book</h2>
            <input type="number" id="salary" class="fadeIn third" name="salary" placeholder="Salary per hour $" min="0" oninput="validity.valid||(value='');" required>
            <select class="fadeIn third" name="available" id="available" required>
              <option disabled selected>Select Availability</option>
              <option value="true">Available</option>
              <option value="false">Not Available</option>
            </select>
            <!-- Date input -->
            <!--<input class="form-control" id="date" name="date" placeholder="Availability: DD/MM/YYY" type="text" min=""/>-->
            <input type="date" name="dateStart" id="dateStart" class="form-control" aria-label="...">
            <input type="date" name="dateEnd" id="dateEnd" class="form-control" aria-label="...">

            <input type="submit" class="fadeIn fourth" value="Confirm Book">
             <a href="<?php echo FRONT_ROOT ?>Owner/ShowListKeeperView" class="btn btn-outline-primary">Cancel</a>
          </form>
        </div>
      </div>
    </body>

</html>
<?php
include('footer.php');
?>
<script>

  document.getElementById('dateStart').setAttribute('min', new Date().toISOString().split('T')[0])  
</script>
