<?php
    
    require_once __DIR__.'/Connection.php';
    
    session_start(); // Starting Session
    $error=''; // Variable To Store Error Message
    if (isset($_POST['login'])) {

        $email = $_POST["email"];
        $password = $_POST["password"];
        echo $email;
        echo $password;
        if(isset($email) == TRUE && isset($password) == TRUE){
            login($email, $password);
        }
        else{
             $error = "Username or Password is invalid";
        }
    }
    function login($email, $password){   
        /*Input: username, password
          Output: user object*/
        $connect = new DBConnection();
        $connect = $connect->getInstance();

        $sql = "SELECT * FROM account WHERE emailAddress = '$email' AND password = '$password'";
        $result = $connect->query($sql);

        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {               
                $userID= $row['iduser'];
                $username = $row['name'];
            }
        
            if ($result->num_rows == 1) {
                $_SESSION['iduser']=$userID; // Initializing Session
                $_SESSION['name']=$username; // Initializing Session
                header("location: homepage.html"); // Redirecting To Other Page
            } else {
                $error = "Username or Password is invalid";
            }
        }
        else {
            echo "Username or Password is invalid";
        }
        
        $connect->close();
    }       
?>