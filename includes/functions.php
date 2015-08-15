<?php
function checkRole(){
    if( !Session::exist('level')){
        header('location:index.php?module=login');
        exit();
    }
}