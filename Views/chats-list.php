<?php 
    require_once("validate-session.php");
    if($_SESSION["loggedUser"]->getRole() === "Owner")
    {
        include('navOwner.php');
    }else{
        include('navKeeper.php');
    }
?>

<div class="mainForm mainFormKeeper fadeInDown">
    <div class="mainForm__container">
            <div align="center">
                <h2 class="mainForm__form--title">CHAT´S LIST</h2>
            </div>
            <hr class="separator">
            <div class="content">
                <table style="text-align:center;">
                    <thead style="color:white">
                        <tr> 
                            <?php if($_SESSION["loggedUser"]->getRole() == "Owner"){ ?>
                            <th>Keeper</th>
                            <?php }else{?>
                            <th>Owner</th>
                            <?php }?>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Open</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($chatListFront as $chat) { ?>
                        <tr>
                            <td><?php echo $user->getFirstName()." ".$user->getLastName() ?></td>
                            <td><?php echo $user->getEmail() ?></td>
                            <td><?php echo $user->getPhone() ?></td>
                            <td>Open</td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php if($frontMessage){ ?>
                <p><?php echo $frontMessage ?></p>
            <?php } ?>
    </div>
</div>
