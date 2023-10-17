<?php
session_start();
require_once (realpath(dirname(__FILE__) . '/../Config/config.php'));
//process_data.php

if(isset($_POST["name"]))
{


    $success = '';

    $name = $_POST["name"];

    $email = $_POST["email"];

    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    $website = $_POST["website"];

    $picture = $_POST["picture"];

    $gender = $_POST["gender"];

    $terms = $_POST["terms"];

    $password_hash = password_hash($_POST['password'],PASSWORD_DEFAULT);

    $name_error = '';
    $email_error = '';
    $password_error = '';
    $confirm_password_error = '';
    $website_error = '';
    $picture_error = '';
    $gender_error = '';
    $terms_error = '';

    if(empty($name))
    {
        $name_error = 'Name is Required';
    }

    if(empty($email))
    {
        $email_error = 'Email is Required';
    }
    else
    {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $email_error = 'Email is invalid';
        }
    }
    if (empty($password))
    {
        $password_error = 'Password is Required';
    }
    else
    {
        if (strlen($_POST['password']) == 8)
        {
            $password_error = 'Password must be 8 letters';
        }
    }

    if (!$confirm_password == $password)
    {
        $password_error = 'Password is Not Match';
    }

    if(empty($website))
    {
        $website_error = 'Website is Required';
    }
    else
    {
        if(!filter_var($website, FILTER_VALIDATE_URL))
        {
            $website_error = 'Invalid Website Url';
        }
    }

    // pic validate

    require __DIR__ . '/../Helper/helper.php';

    //----------
    if($gender == false )
    {
        $gender_error = 'Please Select your gender';
    }

    if(empty($terms))
    {
        $terms_error = 'Terms is required';
    }

    if($name_error == '' && $email_error == ''&& $password_error == '' && $confirm_password_error == '' && $website_error == '' && $picture_error == '' && $gender_error == '' && $terms_error == '')
    {
        //put insert data code here

        $data = array(
            ':name'			=>	$name,
            ':email'		=>	$email,
            ':password'		=>	$password,
            ':website'		=>	$website,
            ':picture'		=>	$picture,
            ':gender'		=>	$gender,
            ':terms'		=>	$terms
        );

        $conn =  require __DIR__ . '/../Config/config.php';

    $checkTable = "CREATE TABLE IF NOT EXISTS `users` (
        `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        `name` VARCHAR(225) NOT NULL,
        `email` VARCHAR(225),
        `password` VARCHAR(225) NOT NULL,
        `gender` integer(50) NOT NULL,
        `website` text(225)  NULL,
        `picture` text(225)  NULL,
        `reg_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";
        if(!$conn->query($checkTable))
        {
            echo "Table creation failed: (" . $conn->errno . ") " . $conn->error;
        }
        $mysqli = "INSERT INTO users (name, email, password, website, picture, gender) 
		VALUES (?,?,?,?,?,?)";

        if ($mysqli)
        {
            $lastId = mysqli_insert_id($conn);
            $_SESSION['Token'] = $lastId;
        }
        else
        {
            $success = "Pls try again";
        }

        $stmt = $conn->stmt_init();
        if (!$stmt->prepare($mysqli))
        {
            die('SQL error :' . $conn->error);
        }
        $stmt->bind_param("ssssss",
            $name,$email,$password_hash,$website,$picture,$gender
        );
//        $token = $stmt->mysqli_stmt_insert_id($conn);
//        $_SESSION['Token'] = rand(0000000.99999999);
//        if ($conn->query($mysqli) === TRUE) {
//            $latest_id = $conn->insert_id;
//           $_SESSION['Token']=$latest_id;
//        }

        $stmt->execute();


        $success ='<div class="alert alert-success">Data Saved</div>';

    }

    $output = array(
        'success'		=>	$success,
        'name_error'	=>	$name_error,
        'email_error'	=>	$email_error,
        'password_error'	=>	$password_error,
        'confirm_password_error'	=>	$confirm_password_error,
        'website_error'	=>	$website_error,
        'picture_error'	=>	$picture_error,
        'gender_error'	=>	$gender_error,
        'terms_error'	=>	$terms_error
    );

    echo json_encode($output);

}

?>
