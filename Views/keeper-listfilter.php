<?php 
    require_once("validate-session.php");
    include('header.php');
    include('navOwner.php');
?>

<div id="formContent">
        <div class="wrapper row4">
            <main style="background-color:white;"> 
            <div align="left">
                <a href="<?php echo FRONT_ROOT ?>Owner/ShowListKeeperView" class="btn btn-outline-primary">Back to Menu</a>
            </div> 
            <div align="center">
            <h3>KEEPER´S AVAILABILITY</h3>
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
                                    <th>DateStart</th>
                                    <th>DateEnd</th>

                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($keeperListFilter as $keeper) { ?>
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
        </div>

<?php 
    include('footer.php');
?>

