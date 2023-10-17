<?php
require __DIR__ . '/../Config/Authenticate.php';
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
                    <h3>Signup Form</h3>
                    <p>Validation  by php native.</p>
                    <form id="sample_form" enctype="multipart/form-data">
                        <span id="message"></span>
                        <div class="col-md-12">
                            <input class="form-control form_data" type="text" name="name" id="name" placeholder="Full Name" >
                            <div id="name_error"  class="error"></div>
                        </div>

                        <div class="col-md-12">
                            <input class="form-control form_data" type="email" name="email" id="email" placeholder="E-mail Address" >
                            <div id="email_error"  class="error"></div>
                        </div>

                        <div class="col-md-12">
                            <input class="form-control form_data" type="password" name="password" id="password" placeholder="Password" >
                            <div id="password_error"  class="error"></div>
                        </div>
                        <div class="col-md-12">
                            <input class="form-control form_data" type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" >
                            <div id="confirm_password_error"  class="error"></div>
                        </div>

                        <div class="col-md-12">
                            <input class="form-control form_data" type="text" name="website" id="website" placeholder="Your Website" >
                            <div id="website_error"  class="error"></div>
                        </div><br>

                        <div class="col-md-12">
                            <input class="form-control form_data" type="file" name="picture" id="picture" >
                            <div id="picture_error"  class="error"></div>
                        </div>

                        <div class="col-md-12 mt-3">
                                <select class="form-select mt-3 form_data" name="gender" id="gender" >
                                    <option selected disabled value="">Gender</option>
                                    <option value="1">Male (MR)</option>
                                    <option value="2">Female (MIS)</option>
                                </select>
                            <div id="gender_error"  class="error"></div>
                        </div><br>

                        <div class="form-check">
                            <input class="form-check-input form_data" name="terms" type="checkbox"  id="terms" >
                            <label class="form-check-label">I accept terms & condition</label>
                            <div id="terms_error" class="error"></div>
                        </div>


                        <div class="form-button mt-3">
                            <button type="button" name="submit" id="submit" class="btn btn-primary" onclick="save_data(); return false;">Submit</button>
                            <button  class="btn btn-outline-light" onclick="reset();return false;">Resat</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../assets/js/register_valdation.js"></script>
<!--<script src="../assets/js/style.js"></script>-->

</body>
</html>

