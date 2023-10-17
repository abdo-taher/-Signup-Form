<?php
require __DIR__ . '/../Config/RedirectIfAuth.php';

$action = isset($_GET['action'] ) ? $_GET['action'] : '';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initinal-scale=1.0">
    <title>Welcome Page</title>
    <style>

        body,
        html {
            height: 100%;
            margin: 0;
        }

        .bg {
            background-image: url("https://images.unsplash.com/photo-1541462608143-67571c6738dd");
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        div>#overlay-header {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .center {
            min-height: 100%;
            /* Fallback for browsers do NOT support vh unit */
            min-height: 100vh;
            /* These two lines are counted as one :-)       */
            margin: 0;
            display: flex;
            align-items: center;
        }

        .spinner-border {
            width: 3rem;
            height: 3rem;
        }

        .foot-message {
            position: fixed;
            left: 50%;
            bottom: 20px;
            transform: translate(-50%, -50%);
            margin: 0 auto;
        }

    </style>
</head>
<body class="main-bg" onload="script();">
<div class="bg">
    <div id="overlay-header">
        <div class="text-center center">
            <div class="container">
                <div class="row spinner-border text-light" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
    </div>
    <div class="foot-message">
        <p class="text-white">Welcome
            <?php

            if ($action == 'welcome1'){
                echo "MR";
            }else{
                echo "MIS";
            }

            ?>
            <a class="text-warning" href="http://gate.test">You are being redirected to Site</p>
    </div>
</div>

<script>
    function script(){
        setTimeout(function(){
            window.location.href = ("http://gate.test/?action=profile");
        }, 5000);
    }

</script>
</body>
</html>
