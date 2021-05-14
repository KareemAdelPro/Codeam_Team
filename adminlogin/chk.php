<?php

session_start();
$admins = array("kareemadelasdf" ,"asdf");
iF($_SERVER['REQUEST_METHOD'] == 'POST'){
   $user = $_POST['username'];

   if(in_array($user ,$admins)){

       $_SESSION['user'] =$user;
       echo '<center><h1><br>مرحبا<br><h1></center>' .$_SESSION['user'] . '<center><h1><br>  سوف يتم تحويلك تلقائيا الى صفحة الادمن</h></center>';
       header('REFRESH:2;URL=control.php');
   } else {
       echo'<center><h1>للأسف انت لست ادمن <h1></center>';
       header('REFRESH:1;URL=loginadmin.php');
       
   }
  

} else {
   ECHO"<center><h1> لا يمكنك الدخول هذه الصفحه مخصصه للأدمن فقط </h1></center>";
   header('REFRESH:1;URL=loginadmin.php');
}




?>