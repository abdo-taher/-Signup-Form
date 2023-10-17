<?php
session_start();
$conn =  require __DIR__ . '/../Config/config.php';
if (isset($_POST['email']) && isset($_POST['password'])) {

     $email = $_POST['email'];

    $pass = $_POST['password'];

         $sql = "SELECT * FROM users WHERE email='$email' AND password='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['email'] === $email && $row['password'] === $pass) {

                echo "Logged in!";

                $_SESSION['Token'] = $row['id'];

                header("Location: http://gate.test/?action=profile");

                exit();

            }else{

                header("Location: http://gate.test/?action=login");

                exit();

            }

        }else{

            header("Location: http://gate.test/?action=login");

            exit();

        }



}else{

    header("Location: http://gate.test/?action=Register");

    exit();

}