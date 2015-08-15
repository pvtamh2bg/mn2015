<?php
require_once 'Config.php';
function __autoload( $class ){
    require_once $class.'.php';
}