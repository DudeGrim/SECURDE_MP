<?php
    
        
    /*client calls this*/
    /*new user's are inserted here*/

    require_once 'Connection.php';
    
    $error=''; // Variable To Store Error Message
    if (isset($_POST['register'])) {
        // set parameters and execute
        $username = $_POST["username"];
        $firstName = $_POST["firstName"];
        $middleInitial = $_POST["middleInitial"];
        $lastName = $_POST["lastName"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $passwordConfirm = $_POST["passwordConfirm"];
        $options = array('cost' => 12);
//        echo $username; // echo $firstName; // 
        //echo $middleInitial; // echo $lastName; // echo $password;
        

        if(isset($username) == TRUE && isset($email) == TRUE && isset($password) == TRUE && isset($passwordConfirm) == TRUE &&
          isset($firstName) == TRUE && isset($middleInitial) == TRUE && isset($lastName) == TRUE){
          
            if(strcmp($password,$passwordConfirm)==0){
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT, $options);
                
                register($username, $email, $hashedPassword, $firstName, $middleInitial, $lastName, 1);
              
                
            }
            else{
             $error = "Confirm password again!";
             echo $error;
            }
            
         }
        else{
             $error = "ALL fields required!";
             echo $error;
        }
         
    }

    function register($username, $email, $password, $firstName, $middleInitial, $lastName, $accountType){

        /*get connection from database*/
        $connect = new DBConnection();
        $connect = $connect->getInstance();

        /*prepared statement*/
        $stmt = $connect->prepare("INSERT INTO `account`(`username`, `emailAddress`, `password`, `firstName`, `middleInitial`, `lastName`, `accountType`) VALUES (?,?,?,?,?,?,?)");
        // echo $middleInitial;

        $stmt->bind_param("ssssssi", $username, $email, $password, $firstName, $middleInitial, $lastName, $accountType);         
            
         if($stmt->execute() == TRUE) {

            $userID = $connect->insert_id;

            //echo "New user added successfully";
            /*return userID*/
            $_SESSION['iduser']=$userID; // Initializing Session
            $_SESSION['username']=$username; // Initializing Session
            
            //header("location: ../HTML/login.html"); // Redirecting To Other Page
        } else {
            echo $connect->error;
        }

        $stmt->close();
        $connect->close();
        

    }
       
?>