<?php
require __DIR__ . '/../Config/RedirectIfAuth.php';
$conn = require __DIR__ . '/../Config/config.php';
if ($_SESSION['Token'] >= 1){
    $select = "SELECT * FROM `users` WHERE `id` = {$_SESSION['Token']}  LIMIT 1";
}else{
    $select = "SELECT * FROM `users` WHERE `id` IS NOT NULL ORDER BY `id` DESC LIMIT 0,1";
}
$run = $conn->query($select);
$defult_pic = 'https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2261&q=80';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initinal-scale=1.0">
    <title>Welcome Page</title>
    <style>

        :root {
            --name: rgba(0,0,0,0.65);
            --dark: rgba(0,0,0,0.5);
            --gray: rgba(0,0,0,0.25);
            --primary: rgb(151, 243, 243);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            height: 100vh;
            display: grid;
            place-items: center;
        }

        .card {
            position: relative;
            width: 275px;
            height: 170px;
            border-radius: 1rem;
            background-color: white;
            box-shadow: 0 0 8px 1px rgba(0,0,0,0.1);
            transition: height 1s;

        &:hover {
             height: 300px;
         }

        &:hover .card-container {
             height: 200px;
         }

        &:hover::after {
             left: 57.5%;
             transform: scale(1.3) translate(-50%,-45%);
         }

        &::after {
             content: '';
             position: absolute;
             top: 0;
             left: 50%;
             transform-origin: center;
             transform: scale(1) translate(-50%,-40%);
             width: 125px;
             height: 125px;
             background-image: url(<?php
            while ($rows = $run->fetch_assoc()){
            
                if (!empty($rows['picture'])){echo "../assets/images/". $rows['picture'];}else{echo $defult_pic;
            
            } ?>);
             background-size: cover;
             border-radius: 1rem;
             box-shadow: 0 1px 7px rgba(0,0,0,0.2);
             transition: all 1.2s;
         }
        }

        .card-container {
            height: 70px;
            transform: translatey(100px);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1.75rem;
            font: 1rem helvetica, sans-serif;
            text-align: center;
            overflow: hidden;
            transition: height 1s;

        & .bio {
        & h2 {
              font-size: 1.1rem;
              color: var(--name);
              margin-bottom: 0.4rem;
          }

        & p {
              font-size: 0.75rem;
              color: var(--gray);
          }
        }

        & .data {
              display: flex;
              list-style-type: none;

        & li {
              width: 85px;
          }

        & li span {
              display: block;
          }

        & .count {
              font-size: 0.8rem;
              font-weight: 900;
              color: var(--dark);
              margin-bottom: 0.25rem;
          }

        & .type {
              font-size: 0.7rem;
              color: var(--gray);
          }
        }

        & .cta {
        & button {
              width: 100px;
              margin: 0 0.25rem;
              padding: 0.5rem 0;
              background-color: transparent;
              font-size: 0.9rem;
              font-weight: 900;
              border: 1px solid var(--gray);
              border-radius: 0.25rem;
              cursor: pointer;
          }

        & .follow {
              background-color: var(--primary);
              border-color: var(--primary);
              color: white;
          }

        & .message {
              color: var(--gray);
          }
        }
        }

    </style>
</head>
<body>
<main class='card'>
    <div class='card-container'>
        <div class='bio'>
            <h2><?php echo $rows['name'] ; ?></h2>
            <p>web developer</p>
        </div>
        <ul class='data'>
            <li>
                <span class='count'><?php echo  $rows['email'] ; ?></span>
                <span class='type'>Email</span>
            </li>
            <li>
                <span class='count'><? echo $rows['website'] ; ?></span>
                <span class='type'>website</span>
            </li>
        </ul>
        <div class='cta'>
            <button type="button" class='message' onclick="logout()">SignOut</button>
        </div>
    </div>
        <?php $conn->close(); } ?>
</main>
<button type="button" class='out'><a href="../Controller/logout.php">SignOut</a></button>

<script src="../assets/js/logout.js"></script>
</body>
</html>

