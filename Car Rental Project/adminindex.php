<?php
include('./src/admin.php');
include('./components/header.php');
$admin = new admin($connection);
$adminv = $admin->get();
// print_r($adminv);



// print_r($color);
$number = array();
$is_avliable = array();
$id = array();
while($ubookings = mysqli_fetch_assoc($adminv)){
    $id[] = $ubookings['id'];
    $number[] = $ubookings['number'];
    $is_avliable[] = $ubookings['is_avliable'];
    
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
                            <th>Number</th>
                            <th>Is Available</th>
                            <th>Update</th>

                        </tr>
                       
                           
                        
                        <?php
                            foreach($number as $key => $ima){
                            ?>
                             <tr>
                                <!-- <div class="color-options"> -->
                                    <td><?=$ima?></td>
                               
                                
                                    <td><?=$is_avliable[$key]?></td>
                                    
                             
                                   
                                    <!-- <input type="submit" class="btn btn-primary" >
                                
                              
                                    <button class="btn btn-primary" type="save">Update</button> -->
                                    
                                    <td><a href="http://localhost:8888/phpbasics/carupdate.php?id=<?=$id[$key]?>"><button class="btn btn-success">Update</button></a></td>
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
