<?php
include('./components/header.php');
include('./src/Booking.php');
$book = new booking($connection);
$mybook = $book->get($_SESSION['userid']);

$cname = array();
$start_date = array();
$end_date = array();
$cdid = array();
$amount = array();
while($mybookings = mysqli_fetch_assoc($mybook)){
    $cdid[] = $mybookings['cdid'];
    $cname[] = $mybookings['cname'];
    $start_date[] = $mybookings['start_date'];
    $end_date[] = $mybookings['end_date'];
    $amount[] = $mybookings['amount'];
    
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
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Amount</th>
                            <th>Update</th>
                            <th>Delete</th>

                        </tr>
                       
                           
                        
                        <?php
                            foreach($cname as $key => $ima){
                            ?>
                             <tr>
                                <!-- <div class="color-options"> -->
                                    <td><?=$ima?></td>
                                    <td><?=$start_date[$key]?></td>
                               
                                
                                    <td><?=$end_date[$key]?></td>
                                    
                             
                                    <td><?=$amount[$key]?></td>
                                    <!-- <input type="submit" class="btn btn-primary" >
                                
                              
                                    <button class="btn btn-primary" type="save">Update</button> -->
                                    
                                    <td><a href="http://localhost:8888/phpbasics/update.php?cdid=<?=$cdid[$key]?>"><button class="btn btn-success">Update</button></a></td>
                                    <td><a href="http://localhost:8888/phpbasics/delete.php?cdid=<?=$cdid[$key]?>"><button class="btn btn-success">Delete</button></a></td>
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