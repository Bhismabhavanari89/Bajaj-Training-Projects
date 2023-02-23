<?php
include('./components/header.php');
include('./src/car.php');
include('./src/Booking.php');
if(!isset($_SESSION['car_user'])){
    header('location:login.php');
}
$car = new car($connection);
$response = $car->getSingleCarDetails($_GET['cid']);
$carDetails = mysqli_fetch_assoc($response);

// print_r($carDetails);
$booking = new booking($connection);


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $cid = $_GET['cid'];
    $uid = $_SESSION['userid'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $carnumber = $carDetails['number'];
    $cname = $carDetails['name'];
    //echo $carnumber;
    //echo $cname;
   
    $enddt = date_create($end_date);
    $startdt = date_create($start_date);
    //echo $enddt;
    $days = date_diff($enddt, $startdt)->days === 0 ? 1 : date_diff($enddt, $startdt)->days;
    
    $amount = $days * $carDetails['rent_price'];
    $disc_price = ($carddetail['disc_price'] / 100) * $amount;
    $amount = $amount - $disc_price;
    
    $respo = $booking->create($cid, $uid,$cname ,$start_date, $end_date, $amount);
    // print_r($respo);
    //$response = $booking->create($cid, $uid, $start_date, $end_date, $amount);
    if ($respo) {
        $bookconfirm = $car->unavailable($carnumber);

       //echo $carnumber;
        if ($bookconfirm) {
            ?>
            <script> alert('Your booking is successful'); 
        window.location="http://localhost:8888/phpbasics/index.php";
        </script>
        <?php
        }
      

        

    }
}
?>



<section class="main-container">
<form method="post">
        <div class="main-container-child">
            <div class="booking-section">
                <div class="booking-section-img">
                    <img src="<?=$carDetails['image']?>" alt="car">
                </div>
                <div class="booking-details">
                    <h1><?=$carDetails['brand']?> <?=$carDetails['name']?></h1>

                    <h2>Rs <?=$carDetails['rent_price']?></h2>

                    <h4><?=$carDetails['number']?></h4>

                    <p><?=$carDetails['is_avliable']?"Available":"Unavailable" ?></p>
                </div>
            </div>

            <div class="booking-section">
               <?php
               if ($carDetails['is_avliable']) {

                   ?>
               <h1>Fill Booking Details</h1>

                <div>
                <p>Start Date</p>
                <input type="date" id="start_date"min="<?= date('Y-m-d') ?>" name="start_date"/>
                </div>

                <div>
                <p>End Date</p>
                <input type="date" id="end_date" onchange ="calculatePrice(<?= $carDetails['rent_price'] ?>,<?= $carDetails['dcnt_per'] ?>)" name="end_date"/>
                </div>

                <h2>To Be Paid : <h3 id = "price"><?=$carDetails['rent_price']?></h3> </h2>
                 (<?=$carDetails['dcnt_per']?>% discount)

               

                <button  type="save" class="btn btn-primary">Confirm Booking</button>
               <?php
               }
               else{
                ?>
                <h1>Unavailable</h1>
                <?php
               }
               ?>
               

            </div>
        </div>
        </form>
    </section>
    



<?php
include('./components/footer.php');
?>