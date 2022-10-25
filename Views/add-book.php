<?php
  //include_once('header.php');
 include_once('navOwner.php'); 
 require_once("validate-session.php");
?>
      <div class="wrapper fadeInDown">
        <div id="formContent">
          <!-- Tabs Titles -->
        
          <!-- Form -->
          <form action="<?php echo FRONT_ROOT?>Book/Add" method="POST">
            <h2>ADD BOOK</h2>
            <?php ?>
              <table id="addBook">
                  <tr>
                   <td>Pets Size</td>
                   <td><?php echo $keeper->getSize() ?></td>
                  </tr>  
                  <tr>
                    <td>Salary</td><td><?php echo $keeper->getSalary() ?></td>
                  </tr>
                  <tr>
                  <td>Date Start</td><td><?php echo $keeper->getDateStart() ?></td>
                  </tr>
                  <tr> 
                  <td>Date End</td><td><?php echo $keeper->getDateEnd() ?></td>
                  </tr>
              </table>

                
            <?php ?>
            <a id="idKeeper" href="<?php echo FRONT_ROOT."Book/Add/".$keeper->getId();?>" class="fadeIn fourth" value="Reservation">Confirm</a>
            <!--<input type="submit" class="fadeIn fourth" value="Confirm Book">-->
             <a href="<?php echo FRONT_ROOT ?>Owner/ShowListKeeperView" class="btn btn-outline-primary">Cancel</a>
          </form>
        </div>
      </div>

<script>
  document.getElementById('dateStart').setAttribute('min', new Date().toISOString().split('T')[0])  
</script>
