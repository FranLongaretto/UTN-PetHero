<?php 
    include('header.php');
    include('nav.php');
?>

<div class="wrapper row4">
    <main class="hoc container clear"> 
        <!-- main body -->
        <div class="content"> 
            <div class="scrollable">
                <table style="text-align:center;">
                    <thead>
                        <tr>
                            <th>ID</th>
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
                            <td><?php echo $pet->getId() ?></td>
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