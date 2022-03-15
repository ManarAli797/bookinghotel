<?php

if($_SERVER['REQUEST_METHOD']=="POST"){

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'booking_room';


$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($conn, "utf8");

if (! $conn) {
    die('Connection failed: ' . $conn->connect_error);
}



if(isset($_POST['sent'])){
    
    $sql = "INSERT INTO info_booking (city,hotel,check_on,check_off,num_adults,num_child,num_room,user,email) 
    VALUES ('".$_POST["city"]."','".$_POST["hotel"]."','".$_POST["check_on"]."',
    '".$_POST["check_off"]."','".$_POST["num_adults"]."','".$_POST["num_child"]."',
    '".$_POST["num_room"]."','".$_POST["user"]."','".$_POST["email"]."')";

    if(mysqli_query($conn, $sql) === TRUE){
        echo "<script>alert('sent info'); </script>";
        echo "  تم الارسال بنجاح  <a href='../index.html'> العودة الى الصفحة الرئيسية </a>";
    } else {
        echo "<script> alert('error'); </script>";
        echo " حاول مرة اخرى <a href='../index.html'> العودة الى الصفحة الرئيسية </a>";
        //header('location:../index.html');
    }


}

if(isset($_POST['remove'])){
    $username = $_POST["username"];
    $email = $_POST["gmail"];

    $sqlremove = " DELETE FROM info_booking WHERE user = '$username' AND email =  '$email'";

    if(mysqli_query($conn, $sqlremove) === TRUE){
        echo "<script> alert('remove info'); </script>";
        echo "  تم الحذف بنجاح  <a href='../index.html'> العودة الى الصفحة الرئيسية </a>";
        //header('location:../index.html');
    } else {
        echo "<script> alert('error'); </script>";
        echo " حاول مرة اخرى <a href='../index.html'> العودة الى الصفحة الرئيسية </a>";
        //header('location:../index.html');
    }
    
}

mysqli_close($conn);

}
else
echo" Error: You can't Brwose This Page Directly ";

?>