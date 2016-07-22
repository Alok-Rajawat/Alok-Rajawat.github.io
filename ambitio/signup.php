<?php
 require_once 'dbconnect.php';
 if($_POST)
 {
  $user_name = $_POST['user_name'];
  $user_email = $_POST['user_email'];
  $user_password = $_POST['password'];  
  try
  {   
   $sth = $dbh->prepare("SELECT * FROM logindata WHERE email=:email");
   $sth->execute(array(":email"=>$user_email));
   $count = $sth->rowCount();   
   if($count==0){    
   $sth = $dbh->prepare("INSERT INTO logindata(username,email,pass) VALUES(:uname, :email, :pass)");
   $sth->bindParam(":uname",$user_name);
   $sth->bindParam(":email",$user_email);
   $sth->bindParam(":pass",$user_password);   
    if(!$sth->execute())
    {
     echo "3";  
     exit;
    }
    else
    {
     echo "2";
     exit;
    }   
   }
   else{    
    echo "1"; 
    exit;
   }    
  }
  catch(PDOException $e){
       echo $e->getMessage();
  }
 }
 else 
  { echo "No Post";}
?>