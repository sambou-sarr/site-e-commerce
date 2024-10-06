<?php 
$to="";
$subject="";
$message="";
$header ="";
if(mail($to,$subject,$message,$header)){
   echo 'ok';
}else{
    echo 'non';
}