<?php
include('./src/users.php');
include('./components/header.php');
include('./src/admin.php');


$message = null;

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $user_name = $_POST['username'];
    $pass = $_POST['password'];
    
    


    $user = new users($connection);
    $response= $user->login($user_name, $pass);
    $admin = new admin($connection);
    $readmin = $admin->login($user_name,$pass);
    // print_r($readmin);
    if ($response["success"]===true) {
      // print_r($response);
      $_SESSION['userid'] = $response["userid"];
        $_SESSION['car_user'] = $user_name;
        header('location:index.php');
    }
    else if($readmin["success"] === true){
      $_SESSION['adminid'] = $response["adminid"];
      $_SESSION['admin'] = $user_name;
      header('location:adminindex.php');
    }
    else{
        $message = "Wrong Username Or Password";
        // $message = $admin;
    }
}


?>




    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;900&display=swap');

input {
  caret-color: red;
}

/* body {
  margin: 0;
  width: 100vw;
  height: 100vh;
  background: #ecf0f3;
  display: flex;
  align-items: center;
  text-align: center;
  justify-content: center;
  place-items: center;
  overflow: hidden;
  font-family: poppins;
} */

.container {
  position: relative;
  width: 350px;
  height: 500px;
  border-radius: 20px;
  padding: 40px;
  box-sizing: border-box;
  background: #ecf0f3;
  box-shadow: 14px 14px 20px #cbced1, -14px -14px 20px white;
}

.brand-logo {
  height: 100px;
  width: 100px;
  
  margin: auto;
  border-radius: 50%;
  box-sizing: border-box;
  box-shadow: 7px 7px 10px #cbced1, -7px -7px 10px white;
}

.brand-title {
  margin-top: 10px;
  font-weight: 900;
  font-size: 1.8rem;
  color: #1DA1F2;
  letter-spacing: 1px;
}

.inputs {
  text-align: left;
  margin-top: 30px;
}

label, input, button {
  display: block;
  width: 100%;
  padding: 0;
  border: none;
  outline: none;
  box-sizing: border-box;
}

label {
  margin-bottom: 4px;
}

label:nth-of-type(2) {
  margin-top: 12px;
}

input::placeholder {
  color: gray;
}

input {
  background: #ecf0f3;
  padding: 10px;
  padding-left: 20px;
  height: 50px;
  font-size: 14px;
  border-radius: 50px;
  box-shadow: inset 6px 6px 6px #cbced1, inset -6px -6px 6px white;
}

button {
  color: white;
  margin-top: 20px;
  background: #1DA1F2;
  height: 40px;
  border-radius: 20px;
  cursor: pointer;
  font-weight: 900;
  box-shadow: 6px 6px 6px #cbced1, -6px -6px 6px white;
  transition: 0.5s;
}

button:hover {
  box-shadow: none;
}

/* a {
  position: absolute;
  font-size: 8px;
  bottom: 4px;
  right: 4px;
  text-decoration: none;
  color: black;
  background: yellow;
  border-radius: 10px;
  padding: 2px;
}

h1 {
  position: absolute;
  top: 0;
  left: 0;
} */
    </style>

    <div class="container">
        
        <div class="brand-title">Login User</div>
        
        <div class="inputs">
            <form action="" method="post">
            UserName<input type="text" name="username" placeholder="Enter UserName">
            Password<input type="password" name="password" placeholder="Enter Password">
            <button type="submit">LOGIN</button><br>


            <?php

            if ($message !== null){

            ?>

            <div class="alert alert-success">
              <?php

              echo $message;

            ?>


            </div>
            <?php

            }
            ?>
            <a href="Register.php">Create New Account</a>
        </form>
        </div>
        <!-- <a href="https://twitter.com/prathkum">MADE BY PRATHAM</a> -->
      </div>
    
</body>
</html>

<?php 
include('./components/footer.php');
?>