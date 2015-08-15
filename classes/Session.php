<?php
class Session{
    public static  function exist( $name ){
        return ( isset($_SESSION[$name]) ) ? true : false;
    }

    public static function set( $name, $value ){
        $_SESSION[$name] = $value;
    }

    public static function get( $name ){
        return ( self::exist($name) ) ? $_SESSION[$name] : '';
    }

    public static function delete( $name ){
        if( self::exist( $name )){
            unset( $_SESSION[$name]);
        }
    }
    // Session flash only exist once
    public static function flashSession( $name, $string = null ){
        if( self::exist( $name ) ){
           $session = self::get($name);
            self::delete( $name );
           return $session;
        }else{
            self::set( $name, $string );
        }
    }
}