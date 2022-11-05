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
                            <th>ID BOOK</th>
                            <th>SIZE PET</th>
                            <th>DATE START</th>
                            <th>DATE END</th>
                            <th>OWNER NAME</th>
                            <th>OWNER LAST NAME</th>
                            <th>Total Days</th>
                            <th>Total $</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    foreach($bookList as $book) {
                        
                        if($_SESSION["loggedUser"]->id == $book->getUser()->getId() && ($book->getStatus()=="confirmed")){

                            ?>
                            <tr>
                                <td><?php echo $book->getId() ?></td>
                                <td><?php echo $book->getKeeper()->getSize() ?></td>
                                <td><?php echo $book->getKeeper()->getDateStart() ?></td>
                                <td><?php echo $book->getKeeper()->getDateEnd() ?></td>
                                <td><?php echo $book->getUser()->getFirstName()?></td>
                                <td><?php echo $book->getUser()->getLastName() ?></td>
                                <td><?php echo $book->getCountDays()?></td>   
                                <td><?php echo $book->getAmount()?></td>   
                            </tr>
                    <?php }elseif($_SESSION["loggedUser"]->getRole()=="Keeper" && ($book->getStatus()=="confirmed")){?>
                        <tr>
                            <td><?php echo $book->getId() ?></td>
                            <td><?php echo $book->getKeeper()->getSize() ?></td>
                            <td><?php echo $book->getKeeper()->getDateStart() ?></td>
                            <td><?php echo $book->getKeeper()->getDateEnd() ?></td>
                            <td><?php echo $book->getUser()->getFirstName()?></td>
                            <td><?php echo $book->getUser()->getLastName() ?></td>
                            <td><?php echo $book->getCountDays()?></td>   
                            <td><?php echo $book->getAmount()?></td>   
                        </tr>
                        <?php }}?>
                    </tbody>
                </table>
            </div>
            <?php if($message){ ?>
                <p><?php echo $message ?></p>
            <?php } ?>
    </div>
</div>
