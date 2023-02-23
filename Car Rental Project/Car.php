<?php
include('./src/car.php');
include('./components/header.php');


$car = new Car($connection);
$cars = $car->get($_GET['id']);


$name = null;
$brand = null;
$price = null;
$discount = null;


$image = array();
$color = array();
$number = array();
$count = 0;
$cdids = array();


while($cardetail = mysqli_fetch_assoc($cars)){

    if($count==0){
        $brand = $cardetail['brand'];
        $name = $cardetail['name'];
        $price = $cardetail['rent_price'];
        $discount = $cardetail['dcnt_per'];
        $count = 1;
    }
    $image[] = $cardetail['image'];
    $color[] = $cardetail['color'];
    $numbers[] = $cardetail['number'];
    $cdids[] = $cardetail['id'];
}


?>

    <section class="main-container">

        <div class="main-container-child">
            <div class="container-section">
                <div class="big-car-img">
                    <img id = "big-img" src="<?=$image[0]?>" alt="car">
                </div>

                <div class="img-options">
                        <?php
                            foreach($image as $key => $ima){
                            ?>
                                <div class="img-option">
                                    <img onclick="<?php $_SESSION['cid'] = $id[$key]; ?>changeimage(this.src,'<?=$numbers[$key]?>','<?=$color[$key]?>',<?=$cdids[$key]?>)"src="<?=$ima?>" alt="car">
                                    
                                </div>
                                <?php
                                    }
                                ?>
                </div>

                <div class="color-options">
               
                <?php
                                    foreach($color as $key=>$col){
                                    ?>
                    <div style="cursor: pointer;" onclick="changeimage('<?=$image[$key]?>','<?=$numbers[$key]?>','<?=$color[$key]?>',<?=$cdids[$key]?>)" class="color-option">
                        <p id="col" style="background-color: <?=$color[0]?>;"></p>
                    </div>

                    <?php
                                    }
                                    ?>
                   
                </div>

            </div>
            <div class="container-section">
                <h1><?=$brand?> <?=$name?></h1>
                <h2><i class="fa-solid fa-indian-rupee-sign">  </i> <?=$price?></h2>
                <p>Available</p>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                </p>
                <h2 id='number'><?=$numbers[0]?></h2>
                <a id='booking' href="http://localhost:8888/phpbasics/bookings.php?cid=<?=$cdids[0]?>">
                <button class="btn btn-primary">Book Now</button>
                </a>
            </div>
        </div>

    </section>



<?php
include('components/footer.php');
?>