<?php
include('./components/header.php');
include('./src/admin.php');
$book = new admin($connection);
$mybook = $book->booked();

$cnumber = array();
$start_date = array();
$end_date = array();
// $cdid = array();
$amount = array();
$username = array();
while($mybookings = mysqli_fetch_assoc($mybook)){
    // $cdid[] = $mybookings['id'];
    $cnumber[] = $mybookings['number'];
    $start_date[] = $mybookings['start_date'];
    $end_date[] = $mybookings['end_date'];
    $amount[] = $mybookings['amount'];
    $username[] = $mybookings['name'];
    
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
                            <th>Car Number</th>
                            <th>User Name</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Amount</th>
                            

                        </tr>
                       
                           
                        
                        <?php
                            foreach($cnumber as $key => $ima){
                            ?>
                             <tr>
                                <!-- <div class="color-options"> -->
                                    <td><?=$ima?></td>
                                    <td><?=$username[$key]?></td>
                                    <td><?=$start_date[$key]?></td>
                               
                                
                                    <td><?=$end_date[$key]?></td>
                                    
                             
                                    <td><?=$amount[$key]?></td>
                                    <!-- <input type="submit" class="btn btn-primary" >
                                
                              
                                    <button class="btn btn-primary" type="save">Update</button> -->
                                    
                                     <!-- </div> -->
                                </tr>
                                <?php
                                    }
                                ?>
                               
                        <p><?php
                            
                        ?></p>
                        </table>
                <!-- </div> -->
            <!-- </div>     -->
               
        </div>

    </section>