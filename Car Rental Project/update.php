<?php
include('./components/header.php');
include('./src/Booking.php');
$book = new booking($connection);
$mybook = $book->view($_GET['cdid']);
// print_r($mybook);
$carDetails = mysqli_fetch_assoc($mybook);

// print_r($carDetails);
// $carDetails = mysqli_fetch_assoc($response);
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $cdid = $_GET['cdid'];
    $uid = $_SESSION['userid'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $amount = $_POST['price'];
    echo $_POST['price'];
    $update = $book->update($cdid,$start_date,$end_date,$amount);
    // echo $update;
    if($update){
        ?>
        <!-- <script> alert('Your Update is successful'); 
    window.location="http://localhost:8888/phpbasics/mybookings.php";
    </script> -->
    <?php
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
                    <h1><?=$carDetails['cname']?></h1>


                    <h4><?=$carDetails['number']?></h4>
                    <!-- <h3>Your Booked Details</h3> -->
                    
                </div>
            </div>

            <div class="booking-section">
               
               <h1>Update Booking Details</h1>

                <div>
                <p>Start Date</p>
                <input type="date"  value="<?=$carDetails['start_date']?>"  id="start_date" min="<?= date('Y-m-d') ?>" name="start_date"/>
                </div>

                <div>
                <p>End Date</p>
                <input type="date"  onchange ="calculate(<?= $carDetails['amount'] ?>,'<?=$carDetails['end_date']?>')"   value="<?=$carDetails['end_date']?>" id="end_date" min="<?= date('Y-m-d') ?>" name="end_date"/>
                </div>
                <h2 id="pric">Before Update:<?=$carDetails['amount']?></h2>
                <h2>After Update<h3 id = "price"></h3> </h2>
                <button  type="save" class="btn btn-primary">Update Booking</button>
              
               

            </div>
        </div>
        </form>
    </section>
    



<?php
include('./components/footer.php');
?>
