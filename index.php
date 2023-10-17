<?php

require_once ('Controller/UserConrtoller.php');

$user = new UserController();

//  getting action

$action = isset($_GET['action'] ) ? $_GET['action'] : '';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gate</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

    <?php
        if ($action == 'login'){
            return  $user->LoginForm();
        }elseif ($action == 'Register'){
            return  $user->registerForm();
        }elseif ($action == 'welcome1' || $action == 'welcome2' ){
            return  $user->welcome();
        }elseif ($action == 'profile'){
            return  $user->profile();
        }
    ?>

    <script>

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

