<?php 

//  empty
function val_empty($input){
    if(!empty($input)){
        return true ;
    }else{
        return false ;
    }
}
//   max
function val_max($input , $len){
    if(strlen($input) < $len ){
        return true ;
    }else{
        return false ;
    }
}

//   min
function val_min($input , $len){
    if(strlen($input) > $len){
        return true ;
    }else{
        return false ;
    }
}

function val_email($email){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true ;
    }
    return false ;
}