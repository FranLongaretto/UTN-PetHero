<?php 
    require_once("validate-session.php");
    include('header.php');
    include('navOwner.php');
?>

<div class="wrapper row4">
    <main style="background-color:white;"> 
    <div align="left">
        <a href="<?php echo FRONT_ROOT ?>User/HomeOwner" class="btn btn-outline-primary">Back to Menu</a>
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
                            <th>Date</th>

                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($keeperList as $keeper) { ?>
                        <tr>
                            <td><?php echo $keeper->getSize() ?></td>
                            <td><?php echo $keeper->getSalary() ?></td>
                            <td><?php echo $keeper->getAvailable() ?></td>
                            <td><?php echo $keeper->getDate() ?></td>
                          
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- / main body -->
    </main>
</div>

<?php 
    include('footer.php');
?>