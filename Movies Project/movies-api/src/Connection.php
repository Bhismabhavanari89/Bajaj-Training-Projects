<?php

class Connection{
    private $connection = null;
    public function __construct(){
        $this->connection = new mysqli("localhost","root","root","movies_api");
        //mysqli_error($this->connection); for this we write this $this->connection->error
        //mysqli_query() for this we write this $this->connection->query();
        if(!$this->connection){
            echo $this->connection->error;
        }
    }
    public function getConnection(){
        return $this->connection;
    }

}

?>