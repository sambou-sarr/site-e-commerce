<?php 
function est_connecter(){
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
    return !empty($_SESSION['connecter']);
}
?>
