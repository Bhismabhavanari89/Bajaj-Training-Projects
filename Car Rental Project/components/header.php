<?php
session_start();
include('./src/connection.php');
$connection = new connection();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="index.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Car Dekh</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        
        
        <?php
        if(isset($_SESSION['car_user'])){
          ?>
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
          <li class="nav-item">
          <a class="nav-link" href="mybookings.php">My Bookings</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>

          <?php
        }
        else if(isset($_SESSION['admin'])){
          ?>
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="adminindex.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="allcars.php">All Cars</a>
        </li>
          <li class="nav-item">
          <a class="nav-link" href="viewbookings.php">View Bookings</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>

          <?php
        }
        else{
          ?>
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
          <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
          <?php
        }
        ?>
       
        
      </ul>
    </div>
  </div>
</nav>
