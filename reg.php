<?php
 $fname2=$_POST['fname2'];
 $email=$_POST['email'];
 $psword2=$_POST['psword2'];

 //Database connection
 $con = new mysqli('localhost','root','','register');
 if($con -> connect_error){
   die('Connection Failed : '.$con->connect_error);
 }else{
   $stmt=$con->prepare("insert into regstore(firstname,email,password) values(?, ?, ?)");
   $stmt->bind_param("sss",$fname2, $email, $psword2);
   $stmt->execute();
   echo "registration successfull..";
   //header("Location:mainpage.html");
   exit;
   $stmt->close();
   $con->close();
 }
?>
