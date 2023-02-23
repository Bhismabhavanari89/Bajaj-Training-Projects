<?php


class connection {


    private $conn = null;

    public function __construct(){

        $this->conn = mysqli_connect("localhost", "root", "root", "cars");
        
    }

    public function getconnection(){

        return $this->conn;
        
    }
}

?>