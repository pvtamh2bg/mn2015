<?php
class Users extends Database{

    private $_db = null;
    protected $data;
    protected $isLogin;

    public function __construct(){
        $this->_db = self::getInstance();
    }

    public function findUser( $user = null ){
        if( $user ){
            $field = ( is_numeric( $user )) ? 'user_id' : 'username';
            $query = "SELECT * FROM users WHERE $field = '$user'";
            $data = $this->_db->executeQuery( $query )->fetch();
            if( $data ){
                $this->data = $data;
                return true;
            }
        }
        return false;
    }

    public function login( $username, $passwd ){
        if( $username && $passwd ){
            $user = $this->findUser($username);
            if( $user ){
                $data = $this->getData();
                if( $data['passwd'] === $passwd ){
                    $this->isLogin = true;
                    Session::set('uname', $data['fullname'] );
                    Session::set('level', $data['level']);
                    Session::set('iduser', $data['user_id']);
                    return true;
                }
            }
        }
        return false;
    }

    public function listAll(){
        $query = "SELECT * FROM users";
        $data = $this->_db->executeQuery($query)->fetchAll();
        return $data;
    }
    public function delUser( $id ){
        $id = (int)$id;
        if( $this->findUser( $id )){
            $sql = "DELETE FROM users WHERE user_id = '$id'";
            $this->_db->executeQuery($sql);
            return true;
        }
        return false;
    }

    public function insertUser( $username, $password, $email, $fullname, $level = '1'){
        if( $username && $password && $email && $fullname && $level ){
            if( !$this->findUser($username)){
                $sql = "INSERT INTO users( username, passwd, email, fullname, level, created ) VALUES ('$username', '$password', '$email', '$fullname', '$level', now())";
                $this->_db->executeQuery($sql);
                if( $this->_db->affectedRow() !== 0 ){
                    return true;
                }
            }
        }
        return false;
    }

    public function countUser(){
        $sql = "SELECT user_id FROM users";
        $this->_db->executeQuery($sql);
        return $this->_db->num_rows();
    }

    public function isLoginned(){
        return $this->isLogin;
    }

    public function getData(){
        return $this->data;
    }
}