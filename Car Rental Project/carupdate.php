<?php
include('./components/header.php');
include('./src/admin.php');
$book = new admin($connection);
$mybook = $book->view($_GET['id']);
// print_r($mybook);
$carDetails = mysqli_fetch_assoc($mybook);
// print_r($carDetails);
// print_r($carDetails);
// $carDetails = mysqli_fetch_assoc($response);
if($_SERVER["REQUEST_METHOD"] === "POST"){
    
    $id = $_GET['id'];
    $is_avliable = $_POST['ava'];
    
    $update = $book->update($id,$is_avliable);
    // echo $id;
    // echo $update;
    
    if($update){
        ?>
        <script> alert('Your Update is successful'); 
    window.location="http://localhost:8888/PHPBASICS/adminindex.php";
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
                 


                    <h4><?=$carDetails['number']?></h4>
                    <!-- <h3>Your Booked Details</h3> -->
                    
                </div>
            </div>

            <div class="booking-section">
               
               <h1>Update Car</h1>

                

                <div>
                <p>Availability</p>
                <input value = 1 type="number" name="ava"/>
                </div>
                <button  type="save" class="btn btn-primary">Update Car</button>
              
               

            </div>
        </div>
        </form>
    </section>
    



<?php
include('./components/footer.php');
?>
