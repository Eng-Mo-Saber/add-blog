<?php 


$con = mysqli_connect('localhost' , 'root' , '' ,'blogs') ;

try {
    if(!$con){
    header('location: ./view/maintenance.php');
    exit ;
    }
} catch (Exception $ex) {
    header('location: ./view/maintenance.php');
    exit ;
}