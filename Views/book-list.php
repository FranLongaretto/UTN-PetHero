<?php 
    require_once("validate-session.php");
    if($_SESSION["loggedUser"]->getRole() === "Owner")
    {
        include('navOwner.php');
    }else{
        include('navKeeper.php');
    }
    use DAO\UserDAOBD as UserDAOBD;
    use DAO\KeeperDAOBD as KeeperDAOBD;
?>

<div class="mainForm mainFormKeeper fadeInDown">
    <div class="mainForm__container">
            <div align="center">
                <h2 class="mainForm__form--title">BOOK´S LIST</h2>
            </div>
            <hr class="separator">
            <div class="content">
                <table style="text-align:center;">
                    <thead style="color:white">
                        <tr> 
                            <th>Date Start</th>
                            <th>Date End</th>
                            <th>Book Price</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    foreach($bookListFront as $book) {?>
                        <tr>
                            <td><?php echo $book->getDateStart() ?></td>
                            <td><?php echo $book->getDateEnd() ?></td>
                            <td><?php echo $book->getBookPrice() ?></td>
                            <td><?php echo $book->getStatus() ?></td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
            <?php if($message){ ?>
                <p><?php echo $message ?></p>
            <?php } ?>
    </div>
</div>
