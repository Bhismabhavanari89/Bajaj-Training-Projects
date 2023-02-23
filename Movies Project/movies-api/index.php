<?php
// include('./src/Connection.php');
// include('./src/controllers/MovieController.php');
// include('./src/gateways/MovieGateWay.php');
// include('./src/controllers/ReviewController.php');
// include('./src/gateways/ReviewGateWay.php');
spl_autoload_register(function($class_name){
   
    $path = null;

    // echo $class_name;
    // $path = './src/'.$class_name . '.php';
    if(str_contains($class_name,"Controller")){

        // echo $class_name;
        
        $path =  'src/controllers/'.$class_name . '.php';

        // echo $path;
        
    }
    else if(str_contains($class_name,"GateWay")){
        $path ='./src/gateways/'.$class_name . '.php';
       
    }
    else{
        $path = './src/'.$class_name . '.php';
        //echo $path;
    }
    // echo $path."<br>";
    include($path);
});

// spl_autoload_register(function($class_name){
//     include './src/controllers/'.$class_name . '.php';
    
// });
// spl_autoload_register(function($class_name){
//     include './src/gateways/'.$class_name . '.php';
    
// });


set_exception_handler("ErrorHandler::handleExpection");


$urlParts = explode("/",$_SERVER['REQUEST_URI']);
$id = $urlParts[3] ?? null;

// print_r($urlParts[3]);
$connection = new Connection();
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods:GET,POST,PUT,DELETE,OPTIONS");
header("Access-Control-Allow-Headers:*");
header('Content-Type:application/json;charset=UTF-8');
if($urlParts[2]==="movies"){
    $movieGateway = new MovieGateWay($connection);

    $response = $movieGateway->index();
    $movieController = new MovieController($movieGateway);
    $movieController->handleRequest($_SERVER['REQUEST_METHOD'],$id);
}
else if($urlParts[2]==="reviews"){
    $reviewgateway = new ReviewGateWay($connection);
    $reviewController = new ReviewController($reviewgateway);
    $reviewController->handleRequest($_SERVER['REQUEST_METHOD'],$id);
}

// echo json_encode($response);  

?>