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
                <i class="fas fa-comment-alt"></i> CHAT
            </div>
            <div class="chat-header-options">
                <span><i class="fas fa-cog"></i></span>
            </div>
        </header>

        <main class="chat-main">
            <div class="chat-msg left-msg">
                <div class="chat-msg-img" style="background-image: url(https://image.flaticon.com/icons/svg/327/327779.svg)"></div>

                <div class="chat-msg-bubble">
                    <div class="chat-msg-info">
                        <div class="chat-msg-info-name">Destinatario</div>
                        <div class="chat-msg-info-time">hora 00:00</div>
                    </div>

                    <div class="chat-msg-text">
                        <p>Mensaje</p>
                    </div>
                </div>
            </div>

            <div class="chat-msg right-msg">
                <div class="chat-msg-img" style="background-image: url(https://image.flaticon.com/icons/svg/145/145867.svg)"></div>

                <div class="chat-msg-bubble">
                    <div class="chat-msg-info">
                        <div class="chat-msg-info-name">UserLogged</div>
                        <div class="chat-msg-info-time">hora 00:00</div>
                    </div>

                    <div class="chat-msg-text">
                        <p>Mensaje</p>
                    </div>
                </div>
            </div>
        </main>

        <form class="chat-inputarea">
            <input type="text" class="chat-inputarea__input" placeholder="Enter your message...">
            <button type="submit" class="chat-inputarea__send">Enviar</button>
        </form>
    </section>
</div>