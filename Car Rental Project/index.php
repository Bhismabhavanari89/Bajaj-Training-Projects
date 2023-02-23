<?php
include('./components/header.php');
include('./src/car.php');
$car = new car($connection);
$cars = $car->index();

?>





<!-- cars  -->

<section class="main-container">
  
  <div class="main-container-child">
<?php
  if($cars){
    while($row=mysqli_fetch_assoc($cars)){
?>
      <div class="car">
        
          <div class="car-img">
            <a href="http://localhost:8888/phpbasics/Car.php?id=<?=$row['id']?>">
            <img src="<?=$row['image_url']?>" alt="car">
        </a>
          </div>
        

        
        
          <div class="car-details">
              <h1><?=$row['brand']?> <?=$row['name']?></h1>
              
              <h2><i class="fa-solid fa-indian-rupee-sign"></i> <?=$row['rent_price']?> </h2>

              <h2><?=$row['dcnt_per']?>% OFF</h2>

              <h2>Available</h2>
              

          </div>

          

      </div>
<?php
    }
  }
  ?>
  </div>

</section>

<?php


include('./components/footer.php');
?>
