<?php
 $fname1=$_POST['fname1'];
 $psword1=$_POST['psword1'];

 //Database connection
 $con = new mysqli('localhost','root','','register');
 if($con -> connect_error)
 {
   die('Connection Failed : '.$con->connect_error);
 }
 else
 {
     $stmt=$con->prepare("select * from regstore where firstname = ?");
     $stmt->bind_param("s", $fname1);
     $stmt->execute();
     $stmt_result=$stmt->get_result();
     if($stmt_result->num_rows >0)
     {
         $data = $stmt_result->fetch_assoc();
         if($data['password'] === $psword1)
         {
           echo "<h2>valid User_id or Password</h2>";
           //header("Location:mainpage.html");
           //exit;
         }
         else{
           echo "<h2>Invalid User_id or Password</h2>";
         }
      }
      else
      {
          echo "<h2>Invalid User_id or Password</h2>";
      }
}
?>
