<?php
function rightAlert($msg, $color = "green", $font = "medium", $id = "message-content")
{
    echo '
        <style>
            .side-message {
                position: absolute;
                right: 10px;
                display: flex;
                flex-direction: column-reverse;
                bottom: 10px;
                border-radius: 5px;
                transition: all 1s ease-out;
            }

            .message-content {
                position: relative;
                right: 0;
                bottom: 0;
                min-width: 200px;
                max-width: 400px;
                border-radius: 5px;
                display: flex;
                align-items: center;
                padding: 10px;
                margin: 3px 0;
                font-size: large;
                background-color: rgba(101, 101, 101, 0.178);
                backdrop-filter: blur(5px);
                font-family: sans-serif;
                box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
            }

            .message-cont-btn {
                flex: 1;
                background-color: transparent;
                border: none;
                margin: 0 5px;
                cursor: pointer;
                align-self: center;
                font-size: large;
                color: rgb(199, 6, 6);
                background-color: rgba(255, 0, 0, 0.116);
                border-radius: 5px;
                padding: 5px 10px;
            }

            .message-cont-text {
                flex: 50;
                text-align: justify;
                margin: 0 10px;
                font-size:'.$font.';
            }

            .message-hide {
                right: -600px !important;
                transition: all 1s ease-out;
            }
        </style>
        
        <div style="overflow-x: hidden;">
            <section class="side-message" id="message-main">
                <div class="message-content" id="'.$id.'">
                    <button type="button" class="message-cont-btn" id="close-btn">
                        x
                    </button>
                    <div class="message-cont-text" style="color: ' . $color . ';">
                        ' . $msg . '
                    </div>
                </div>
            </section>
        </div>
        <script>
            let msgMain = document.getElementById("message-main");
            let messageContent = document.getElementById("'.$id.'");
            let closeBtn = document.getElementById("close-btn");

            closeBtn.addEventListener("click", () => {
                messageContent.classList.add("message-hide");
                setInterval(() => {
                    messageContent.style.display = "none";
                }, 1000);
            });
        </script>
    ';
}
