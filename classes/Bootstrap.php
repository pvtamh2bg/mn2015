<?php
// https://localhost/mn172?module=user&action = login

class Bootstrap{
    private $_module = 'home';
    public function __construct(){
        if( isset($_GET['module']) ){
            $this->_module = $_GET['module'];
            if( file_exists(CNS_INCLUDES.'modules/'.$this->_module.'.php')){
                require_once CNS_INCLUDES.'modules/'.$this->_module.'.php';
            }else{
               require_once CNS_DIR.'404.php';
            }
        }else{
            require_once CNS_INCLUDES.'modules/'.$this->_module.'.php';
        }
    }
}