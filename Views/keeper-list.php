<?php 
    require_once("validate-session.php");
    include('header.php');
    include('navOwner.php');
?>

<div id="formContent">
    <!-- Form -->
    <form action="<?php echo FRONT_ROOT?>Keeper/CheckAvailability" method="POST">

        <div class="wrapper row4">
            <main style="background-color:white;"> 
            <div align="left">
                <a href="<?php echo FRONT_ROOT ?>User/HomeOwner" class="btn btn-outline-primary">Back to Menu</a>
            </div> 
            <div align="center">
            <h3>KEEPER´S LIST</h3>
            </div>
                <!-- main body -->
                <div class="content">
                    <div class="scrollable">
                        <table style="text-align:center;">
                            <thead style="color:white">
                                <tr> 
                                    <th>Size</th>
                                    <th>Salary</th>
                                    <th>Available</th>
                                    <th>Date Start</th>
                                    <th>Date End</th>

                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($keeperList as $keeper) { ?>
                                <tr>
                                    <td><?php echo $keeper->getSize() ?></td>
                                    <td><?php echo $keeper->getSalary() ?></td>
                                    <td><?php echo $keeper->getAvailable() ?></td>
                                    <td><?php echo $keeper->getDateStart() ?></td>
                                    <td><?php echo $keeper->getDateEnd() ?></td>
                                
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- / main body -->
            </main>
            <div>
                <?php
                if($errorMessage){
                    ?>
                    <p><?php echo $errorMessage ?></p>
                    <?php 
                }
                ?>
            <link rel="stylesheet" href="<?php echo CSS_PATH ?>styleDateFilter.css">
                <h5 align="center">
                    APPLY FILTER DATE
                </h5>
                <div >
                    Start<input align="left" type="date" name="dateStart" id="dateStart" class="form-control" aria-label="..." required>
                
                    End<input align="right"type="date" name="dateEnd" id="dateEnd" class="form-control" aria-label="..." required>
                </div>
                <div align="center">
                    <input type="submit" class="fadeIn fourth" value="Check Availabilty Keeper">
                </div>
            </div>    
        </div>
    </form>    

<?php 
    include('footer.php');
?>


<script>
  document.getElementById('dateStart').setAttribute('min', new Date().toISOString().split('T')[0])
  document.getElementById('dateEnd').setAttribute('min', new Date().toISOString().split('T')[0])    
</script>
