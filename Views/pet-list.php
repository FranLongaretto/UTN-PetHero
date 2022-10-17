<?php 
    include('header.php');
    include('navOwner.php');
?>

<div class="wrapper row4">
    <main class="hoc container clear"> 
    <div align="left">
        <a href="<?php echo FRONT_ROOT ?>User/HomeOwner" class="btn btn-outline-primary">Back to Menu</a>
    </div> 
        <!-- main body -->
        <div class="content">
        
            <div class="scrollable">
                <table style="text-align:center;">
                    <thead>
                        <tr>
                            <th>Race</th>
                            <th>Size</th>
                            <th>Vaccination</th>
                            <th>Description</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($petList as $pet) { ?>
                        <tr>
                            <td><?php echo $pet->getRace() ?></td>
                            <td><?php echo $pet->getSize() ?></td>
                            <td><?php echo $pet->getVaccination() ?></td>
                            <td><?php echo $pet->getDescription() ?></td>
                            <td><?php echo $pet->getImage() ?></td>
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