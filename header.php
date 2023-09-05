<?php
session_start();
if(!isset($_SESSION['uname'])){
    header('location:index.php');
}

include('dbcon.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
   
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Oswald:wght@200;300;400;500;600;700&family=Poppins:wght@600&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script> 
   
    <style>
            input[type="number"]::-webkit-outer-spin-button,
            input[type="number"]::-webkit-inner-spin-button {     /*   remove up down arrows for number type*/
                -webkit-appearance: none;
                margin: 0;
            }
        </style> 


</head>
<body>

<div>
    <div class="navigation">
        <ul style="padding:0;">    
            <li><a href="#">
                <span class="icon"><i class="fa-solid fa-earth-americas"></i></span>
                <span style="font-weight:bold;" class="title">SEPL</span>
                 </a>
            </li>
            <li id="dashboard"><a href="dashboard.php">
                <span class="icon"><i class="fa-solid fa-house"></i></span>
                <span class="title">Dashboard</span>
                </a>
            </li>
            <li id="position"><a href="position.php">
                <span class="icon"><i class="fa-solid fa-list-check"></i></span>
                <span class="title">Positions</span>
                 </a>
            </li>
            <li id="cv"><a href="cv.php">
                <span class="icon"><i class="fa-solid fa-file"></i></span>
                <span class="title">CV's</span>
                 </a>
            </li>
            <li><a href="logout.php" onclick="return confirm('Are you sure you want to log out?');">
                <span class="icon"><i class="fa-solid fa-right-from-bracket"></i></span>
                <span class="title">Logout</span>
                 </a>
            </li>
        </ul>
    </div>


   <!-- main -->
   <div class="abc">
    
        <div class="header" > 
            <div class="toggle">
                <i class="fa-solid fa-bars"></i>
            </div>
            <!-- search -->
           <div class="search">
                <label>
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Search here">  
                </label>
            </div> 
            <!-- userimage -->
            <div class="user">
                <img src="images/avtar.png" alt="">
                <div>
                    <h4><?php echo $_SESSION['uname']?></h4>
                    <small><?php echo $_SESSION['rights']?></small>
                </div>
            </div>   
        
        </div> 
     
<main>
