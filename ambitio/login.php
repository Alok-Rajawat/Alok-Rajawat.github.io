<?php
  require_once 'dbconnect.php';
  if($_POST)
  {
    $user_name = $_POST['user_name'];
    $user_password = $_POST['password'];
  
  try
  { 
  
   $sth = $dbh->prepare("SELECT * FROM logindata WHERE username=:user AND pass=:pswd");
   $sth->execute(array(":email"=>$user_name,":pswd"=>$user_password));
   $count = $sth->rowCount();
   
    if($count==0){
      echo "0";
    }
    else
      echo "1";
  }
  catch(PDOException $e){
       echo $e->getMessage();
  }
 }

?>