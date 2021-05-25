<?php
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    //$password = $_POST['password'];
   // $number = $_POST['number'];

    // Database connection
    $conn = new mysqli('localhost','root','','hospital');
    if($conn->connect_error){
        echo "$conn->connect_error";
        die("Connection Failed : ". $conn->connect_error);
    } else {
        $stmt = $conn->prepare("insert into contactform(firstname, lastname, email, phone, message) values(?, ?, ?, ?, ?)");
        $stmt->bind_param("sssis", $firstname, $lastname, $email, $phone, $message);
        $execval = $stmt->execute();
        echo $execval;
       echo " successfully send ...";
        header('location:index.html');
        $stmt->close();
        $conn->close();
    }
?>
