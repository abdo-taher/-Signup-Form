<?php
require __DIR__ . '/../Config/Authenticate.php';
$error = isset($_GET['error'] ) ? $_GET['error'] : '';
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <title>Signup Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body style="background-color: #152733">

<div class="form-body">
    <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h3>Login , Continue</h3>
                    <p>Fill in the data below.</p>
                    <p><?php echo $error?></p>
                    <form id="sample_form" class="requires-validation" action="../Controller/loginCheck.php" method="post" novalidate>
                        <div class="col-md-12">
                            <input class="form-control form_data" type="email" name="email" id="email" placeholder="E-mail Address" required>
                            <div class="valid-feedback">Email field is valid!</div>
                            <div id="email_error" class="invalid-feedback">Email field cannot be blank!</div>
                        </div>
                        <div class="col-md-12">
                            <input class="form-control form_data" type="password" name="password" id="password" placeholder="Password" required>
                            <div class="valid-feedback">Password field is valid!</div>
                            <div id="email_error" class="invalid-feedback">Password field cannot be blank!</div>
                        </div><br>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                            <label class="form-check-label">I confirm that all data are correct</label>
                            <div class="invalid-feedback">Please confirm that the entered data are all correct!</div>
                        </div>
                        <label class="form-check-label">I Don't have Email <a href="?action=Register">SignUp Now </a> </label>
                        <div class="form-button mt-3">
                            <button id="submit" type="submit"  class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--<script src="../assets/js/login_valdation.js"></script>-->
<script src="../assets/js/style.js"></script>

</body>
</html>

