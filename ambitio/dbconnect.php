<?php
  $dbhost='localhost';
  $dbuser='root';
  $dbpass='';
  $dbname='ambitio';  
  try{
    $dbh=new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbuser,$dbpass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  }
  catch(PDOException $e){
    echo $e->getMessage();
  }  
?>