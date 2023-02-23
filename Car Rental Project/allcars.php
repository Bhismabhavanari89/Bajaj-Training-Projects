<?php
include('./components/header.php');
include('./src/car.php');
$book = new car($connection);
$mybook = $book->getallcars();


$carname = array();
$carbrand = array();
$rent_price = array();
$discount = array();
$cnumber = array();
$isava = array();
while($mybookings = mysqli_fetch_assoc($mybook)){
    // print_r($mybookings);
    $carname[] = $mybookings['name'];
    $carbrand[] = $mybookings['brand'];
    $rent_price[] = $mybookings['rent_price'];
    $discount[] = $mybookings['dcnt_per'];
    $isava[] = $mybookings['Is_Avaliable'];
    $cnumber[] = $mybookings['number'];
    
}

?>

<section class="main-container">

        <div class="main-container-child">
            <!-- <div class="container-section"> -->
                
            
                <!-- <div class="img-options"> -->
                    <!-- <div class="color-options">
                        <p>Car Id</p>
                        <p>Start Date</p>
                        <p>End Date</p>
                        <p>Amount</p>
                    </div> -->
                    
                        <table style="width:100%">
                        <tr>
                            <th>Car Name</th>
                            <th>Car Brand</th>
                            <th>Car Number</th>
                            <th>Rent Price</th>
                            <th>Discount</th>
                            <th>Availability</th>
                            

                        </tr>
                       
                           
                        
                        <?php
                            foreach($carname as $key => $ima){
                            ?>
                             <tr>
                                <!-- <div class="color-options"> -->
                                    <td><?=$ima?></td>
                                    <td><?=$carbrand[$key]?></td>
                                    <td><?=$cnumber[$key]?></td>
                                    <td><?=$rent_price[$key]?></td>
                                    <td><?=$discount[$key]?></td>
                                    <td><?=$isava[$key]?></td>
                                    <!-- <input type="submit" class="btn btn-primary" >
                                
                              
                                    <button class="btn btn-primary" type="save">Update</button> -->
                                    
                                     <!-- </div> -->
                                </tr>
                                <?php
                                    }
                                ?>
                               
                        
                        </table>
                <!-- </div> -->
            <!-- </div>     -->
               
        </div>

    </section>