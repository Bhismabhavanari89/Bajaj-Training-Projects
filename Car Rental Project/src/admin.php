<?php

// include('./src/connection.php');


class admin {


    public $conne = null;

   function __construct($connection){

        $this->conne = $connection;
   }
   public function login($user_name,$pass){
    $query = "select * from admin where name='$user_name' and password = '$pass'";
        $result = mysqli_query($this->conne->getconnection(), $query);
    if(mysqli_num_rows($result)===1){
            $row = mysqli_fetch_assoc($result);
            //print_r($row);
            return array("success" => true, "adminid" => $row['id']);
    }
    else{
            return array("success"=>false);
    }
    
   }
   public function get(){
    $query = "select * from cars_detail where is_avliable=0";

        if ($response=mysqli_query($this->conne->getconnection(),$query)){

            return $response;
        }
   }
   public function view($id){
    $query = "select * from cars_detail where id=$id";

        if ($response=mysqli_query($this->conne->getconnection(),$query)){

            return $response;
        }
   }
   public function update($id,$is_ava){

    $query = "update cars_detail set is_avliable=$is_ava  where id = $id ";
    if ($response=mysqli_query($this->conne->getconnection(),$query)){

        return $response;
    }
    }
    
    public function booked(){
        $query = "select * from cars_detail cd,bookings b,users u where is_avliable=0 and cd.id = b.cdid and b.uid = u.id";
    
            if ($response=mysqli_query($this->conne->getconnection(),$query)){
    
                return $response;
            }
       }
   
}



?>