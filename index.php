<?php 

include $_SERVER["DOCUMENT_ROOT"].'/backend/config.php';
$loggedin = 'no'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/main.css">
    <title>Revolutionary Chatting</title>
</head>
<body>
    <center><br><br><br><br><br><br><div style="border: yellow thin solid; width: 800px;">

    <h1>Welcome to Revolutionary.</h1>
    <h3>This is just a simple open source PHP chat room type thing.</h3>
    <h3>If you would like to enter the chat room click here</h3>
    <h3>↓</h3>
    <button id="myButton">Join Chat Room</button>
    <p>By clicking Join Chat Room you abide by our <a href="tos.html">terms of service</a> and <a href="privacy.html">privacy policy</a>.</p>
    <br>
    </div></center>
        <div id="myPopup" class="popup">
            <div class="popup-content">
                <center>
                <h1 style="color: red">
                    MAKE SURE BEFORE EXITING THE TAB YOU PRESS THE LEAVE CHAT ROOM BUTTON!
                </h1>
                <img src="bil.png" width="400">
                <form action="/chatroom1/account.php">
                <button id="closePopup" type="submit">
                    Confirm
                </button>
                </form>
            </center>
            </div>
        </div>
        <script>
            myButton.addEventListener(
                "click",
                function () {
                    myPopup.classList.add("show");
                }
            );
            closePopup.addEventListener(
                "click",
                function () {
                    myPopup.classList.remove(
                        "show"
                    );
                }
            );
            window.addEventListener(
                "click",
                function (event) {
                    if (event.target == myPopup) {
                        myPopup.classList.remove(
                            "show"
                        );
                    }
                }
            );
        </script>
        <style>
            .popup {
                position: fixed;
                z-index: 1;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: auto;
                background-color: rgba(
                    0,
                    0,
                    0,
                    0.4
                );
                display: none;
            }
            .popup-content {
                background-color: black;
                margin: 10% auto;
                padding: 20px;
                border: 1px solid yellow;
                width: 30%;
                font-weight: bolder;
            }
            .popup-content button {
                display: block;
                margin: 0 auto;
            }
            .show {
                display: block;
            }
        </style>
</body>
</html>