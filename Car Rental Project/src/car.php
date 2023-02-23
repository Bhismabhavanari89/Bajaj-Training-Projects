<?php

// include('connection.php');
  class car {


    private $connection = null;

    public function __construct($connection){

        $this->connection = $connection;

    }

    public function index (){

        $query = 'select * from cars_shop';
        
        if ($result=mysqli_query($this->connection->getconnection(),$query)){

            return $result;
        }
    }

    public function get($id){

        $query = "select * from cars_shop cs, cars_detail cd where cs.id=cd.cid and cs.id=$id";

        if ($response=mysqli_query($this->connection->getconnection(),$query)){

            return $response;
        }
    }
    public function getSingleCarDetails($id){

        $query = "select * from cars_detail cd, cars_shop ca where cd.id=$id and cd.cid = ca.id";

        if ($response=mysqli_query($this->connection->getconnection(),$query)){

            return $response;
        }
    }
    public function unavailable($num){
        $query = "update cars_detail set is_avliable=0 where number = '$num'";
        if ($result=mysqli_query($this->connection->getconnection(), $query)){
            // echo $response;

            return $result;
        }
        
    }
    public function getallcars(){

        $query = "select * from cars_shop cs, cars_detail cd where cs.id=cd.cid";

        if ($response=mysqli_query($this->connection->getconnection(),$query)){

            return $response;
        }
    }
    
    
    
  }


?>