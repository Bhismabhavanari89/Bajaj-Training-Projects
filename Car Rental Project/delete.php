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
    
    $delete = $book->delete($cdid);
    if($delete){
        ?>
        <script> alert('Your Delete is successful'); 
    window.location="http://localhost:8888/phpbasics/mybookings.php";
    </script>
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
               
               <h1>Delete Booking Details</h1>

                <div>
                <p></p>
                <p>Start Date: <?=$carDetails['start_date']?></p>
                </div>

                <div>
                <p>End Date: <?=$carDetails['end_date']?></p>
                </div>
                
                <button onclick="deletebooking()" type="save" class="btn btn-primary">Delete Booking</button>
              
               

            </div>
        </div>
        </form>
    </section>
    



<?php
include('./components/footer.php');
?>
