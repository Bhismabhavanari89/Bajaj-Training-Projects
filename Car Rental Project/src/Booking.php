<?php

// include('./src/connection.php');



class booking{

private $connection = null;
  
public function __construct($conn){

        $this->connection = $conn;
}
public function create($cid,$uid,$cname,$start_date,$end_date,$amount){

    $query = "Insert into bookings(cdid, uid,cname, start_date, end_date, amount) values ($cid,$uid,'$cname','$start_date','$end_date',$amount)";
    if ($response=mysqli_query($this->connection->getconnection(),$query)){

        return $response;
    }

}
public function get($id){

    $query = "select * from bookings where uid=$id";

    if ($response=mysqli_query($this->connection->getconnection(),$query)){

        return $response;
    }
}
public function view($id){

    $query = "select * from bookings b,cars_detail cd where cdid=$id and b.cdid = cd.id";

    if ($response=mysqli_query($this->connection->getconnection(),$query)){

        return $response;
    }
}
public function update($cdid,$start_date,$end_date,$amount){

    $query = "update bookings set start_date='$start_date', end_date = '$end_date', amount = $amount where cdid = $cdid";
    if ($response=mysqli_query($this->connection->getconnection(),$query)){

        return $response;
    }
}


public function delete($cdid){

    $query = "delete from bookings where cdid = $cdid";
    $qu = "update cars_detail set is_avliable=1 where id = $cdid";
    if ($response=mysqli_query($this->connection->getconnection(),$query)  ){
        if($res = mysqli_query($this->connection->getconnection(),$qu)){

        return $response;
        }
    }
}

}

?>