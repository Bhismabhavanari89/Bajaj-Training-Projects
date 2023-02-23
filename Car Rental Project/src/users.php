<?php

// include('./src/connection.php');


class users {


    public $conne = null;

   function __construct($connection){

        $this->conne = $connection;
   }

   public function create ($name, $user_name, $email, $pass, $contact){

    $query = "insert into users(name, username, email, password,contact) values ('$name','$user_name','$email','$pass','$contact')";

    if ($result=mysqli_query($this->conne->getconnection(), $query)){
        return $result;
            
            
    }
    else{

       
        // echo "problem";
        print_r($query);
            
    }
   }
   public function login($user_name,$pass){
    $query = "select * from users where username='$user_name' and password = '$pass'";
        $result = mysqli_query($this->conne->getconnection(), $query);
    if(mysqli_num_rows($result)===1){
            $row = mysqli_fetch_assoc($result);
            //print_r($row);
            return array("success" => true, "userid" => $row['ID']);
    }
    else{
            return array("success"=>false);
    }
    
   }
   public function get($id){
    $query = "select * from cars_detail where id=$id";

        if ($response=mysqli_query($this->conne->getconnection(),$query)){

            return $response;
        }
   }
   

   
}



?>