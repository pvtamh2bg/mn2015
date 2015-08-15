<?php
date_default_timezone_set ( 'Asia/Ho_Chi_Minh' );
$GLOBALS['config'] = array(
    'mysql'=>array(
        'host'      => 'localhost',
        'user'      => 'root',
        'password'  => '',
        'dbname'    => 'managerwater172'
    )
);
// includes dir
define('CNS_DIR', dirname( __FILE__).'/');
define( 'CNS_INCLUDES', CNS_DIR.'includes/' );
