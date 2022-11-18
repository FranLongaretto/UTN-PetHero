<?php 
    require_once("validate-session.php");
    if($_SESSION["loggedUser"]->getRole() === "Owner"){
        include('navOwner.php');
    }else{
        include('navKeeper.php');
    }
?>

<div class="chat-container">
    <section class="chat">
        <header class="chat-header">
            <div class="chat-header-title">
                <p style="font-size: 16px;"><?php echo $chatDest->getFirstName()." ".$chatDest->getLastName() ?></p>
                <p style="font-weight: 400;color: #333; font-size: 14px;"><?php echo $chatDest->getPhoneNumber() ?></p>
            </div>
            <div class="chat-header-options">
                <span><i class="fas fa-cog"></i></span>
            </div>
        </header>

        <main class="chat-main">
            <?php if($frontMessage) {?>
            <div class="chat-welcome__message">
                <p class="chat-welcome__message-item"><?php echo $frontMessage?></p>
            </div>
            <?php }else{?>
            <div class="chat-msg left-msg">
                
                <?php 
                    if($_SESSION["loggedUser"]->getRole() == "Owner"){
                        foreach ($messageOwner as $key => $message) { 
                ?>
                <?php if($message->getMessage() != null) {?>
                <div class="chat-msg-bubble">
                    <!-- <div class="chat-msg-img" style="background-image: url(https://image.flaticon.com/icons/svg/327/327779.svg)"></div> -->
                    <div class="chat-msg-info">
                        <div class="chat-msg-info-name"><?php echo $chatDest->getFirstName()?></div>
                        <div class="chat-msg-info-time"><?php echo $message->getDate() ?></div>
                    </div>

                    <div class="chat-msg-text">
                        <p><?php echo $message->getMessage()?></p>
                    </div>
                </div>
                <?php } ?>
                <?php 
                    }}else{
                    foreach ($messageKeeper as $key => $message) { 
                ?>
                <?php if($message->getMessage() != null) {?>
                <div class="chat-msg-bubble">
                    <div class="chat-msg-info">
                        <div class="chat-msg-info-name"><?php echo $chatDest->getFirstName()?></div>
                        <div class="chat-msg-info-time"><?php echo $message->getDate()?></div>
                    </div>

                    <div class="chat-msg-text">
                        <p><?php echo $message->getMessage()?></p>
                    </div>
                </div>
                <?php } ?>
                <?php 
                    }} 
                ?>
            </div>

            <div class="chat-msg right-msg">
                
                <?php 
                    if($_SESSION["loggedUser"]->getRole() == "Owner"){
                        foreach ($messageOwner as $key => $message) { 
                ?>
                <?php if($message->getMessage() != null) {?>
                <div class="chat-msg-bubble">
                    <!-- <div class="chat-msg-img" style="background-image: url(https://image.flaticon.com/icons/svg/145/145867.svg)"></div> -->
                    <div class="chat-msg-info">
                        <div class="chat-msg-info-name"><?php echo $chatEmi->getFirstName()?></div>
                        <div class="chat-msg-info-time"><?php echo $message->getDate()?></div>
                    </div>

                    <div class="chat-msg-text">
                        <p><?php echo $message->getMessage()?></p>
                    </div>
                </div>
                <?php } ?>
                <?php 
                    }}else{
                    foreach ($messageKeeper as $key => $message) { 
                ?>
                <?php if($message->getMessage() != null) {?>
                <div class="chat-msg-bubble">
                    <div class="chat-msg-info">
                        <div class="chat-msg-info-name"><?php echo $chatEmi->getFirstName()?></div>
                        <div class="chat-msg-info-time"><?php echo $message->getDate()?></div>
                    </div>

                    <div class="chat-msg-text">
                        <p><?php echo $message->getMessage()?></p>
                    </div>
                </div>
                <?php } ?>
                <?php 
                    }} 
                ?>
            </div>
            <?php }?>
        </main>

        <form action="<?php echo FRONT_ROOT."Message/Add"?>" method="POST" class="chat-inputarea">
            <input type="number" id="idChat" name="idChat" value="<?php echo $chat->getId() ?>" hidden>
            <input type="text" id="messageText" name="messageText" class="chat-inputarea__input" placeholder="Enter your message...">
            <input type="submit" class="mainForm__form--submit fadeIn third" value="Enviar">
        </form>
    </section>
</div>