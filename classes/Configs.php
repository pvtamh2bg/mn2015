<?php

class Configs {

    public static function get( $path ){
        if( $path !== ''){
            $config = $GLOBALS['config'];
            $paths = explode('/', $path);

            foreach( $paths as $bit ){
                if( isset($config[$bit]) ){
                    $config = $config[$bit];
                }
            }
            return $config;
        }
        return false;
    }
}