<?php
    
    require_once __DIR__.'/Connection.php';
    
    session_start(); // Starting Session
    $error=''; // Variable To Store Error Message
    if (isset($_POST['login'])) {

        $email = $_POST["email"];
        $password = $_POST["password"];
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
        
        

        $stmt = $connect->prepare( "SELECT * FROM account WHERE emailAddress = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {               
                $userID= $row['idAccount'];
                $username = $row['username'];
                $hashedPassword = $row['password'];
            }
            
            if ($result->num_rows == 1 && password_verify($password, $hashedPassword)) {
                $_SESSION['iduser']=$userID; // Initializing Session
                $_SESSION['name']=$username; // Initializing Session
                header("location: homepage.html"); // Redirecting To Other Page
            } else {
               echo '<script type="text/javascript">alert("Invalid login.");</script>' ;
            }
        }
        else {
            echo '<script type="text/javascript">alert("Invalid login.");</script>' ;
        }
        
        $connect->close();
    }       
?>