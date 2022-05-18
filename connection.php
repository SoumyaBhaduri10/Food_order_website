<?php

$host="localhost";
$username="root";
$password="";
$database="register";
$con=new mysqli($host,$username,$password,$database);

if(isset($_POST['submit'])){
 $username= $_POST['username'];  
 $number= $_POST['number'];
 $order= $_POST['order'];  
 $add= $_POST['add'];
 $count= $_POST['count'];  

 addUser($username,$number,$order,$add,$count);
}
  
  

function  addUser($username,$number,$order,$add,$count){
    $sql="INSERT INTO `details`(`id`, `username`, `number`, `order`, `add`, `count`) VALUES (null,?,?,?,?,?)";
    $st= $GLOBALS['con']->prepare($sql);
    $st->bind_param("sssss",$username,$number,$order,$add,$count);
    // if($con->query($sql))
    if($st->execute())
    {
        echo "Your order is placed🤩🤑🤑!!";
        // return true;
    }
    else{
        echo $GLOBALS['con']->error;
        // return false;
    }
  }

?>