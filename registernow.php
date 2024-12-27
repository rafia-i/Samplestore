<?php
require_once('DBConnect.php');

if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];


    //sql quiery for inserting value
    $sql="INSERT INTO customer VALUES ('$username','$password')";

    //execute this query
    $result = mysqli_query($conn, $sql);


    //check if insertion was successful
    if(mysqli_affected_rows($conn) > 0){
        echo"Welcoming our New customer!";
        header("Location:home.php");
    }else{
        echo"Insertion failed";
    }
}

?>