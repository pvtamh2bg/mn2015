<?php
class Members extends Database{

    private $_db = null;

    public function __construct(){
        $this->_db = self::getInstance();

    }

    public function findMember( $member = null ){
        if( $member ){
            $sql = "SELECT * FROM thanhvien WHERE masv = '$member'";
            $this->_db->executeQuery($sql);
            if( $this->_db->num_rows() !== 0 ){
                return true;
            }
            return false;
        }
    }

    public function listAll(){
        $sql = "SELECT * FROM thanhvien";
        $data = $this->_db->executeQuery($sql)->fetchAll();
        return $data;
    }

    public function insertMember( $masv, $firstname, $lastname, $mail, $class, $address){
        if( $masv && $firstname && $lastname && $mail && $class && $address){
            if( ! $this->findMember($masv) ){
                $sql =" INSERT INTO thanhvien( masv, firstname, lastname, email, class, address, created ) VALUES ('$masv', '$firstname', '$lastname', '$mail', '$class', '$address', now())";
                $this->_db->executeQuery($sql);
                if( $this->_db->affectedRow() !== 0) {
                    return true;
                }
            }
        }
        return false;
    }
    public function delMember( $id ){
        if( $this->findMember( $id )){
            $sql = "DELETE FROM thanhvien WHERE masv= '$id'";
            $this->_db->executeQuery($sql);
            return true;
        }
        return false;
    }

    public function getMemberByID( $masv ){
        $data = [];
        if( $masv) {
            $sql = "SELECT * FROM thanhvien WHERE masv = '$masv'";
            $data = $this->_db->executeQuery($sql)->fetch();
        }
        return $data;
    }

    public function editMember( $id, $masv, $firstname, $lastname, $mail, $class, $address ){
        if( $masv && $firstname && $lastname && $mail && $class && $address){
                $sql ="UPDATE thanhvien SET masv = '$masv', firstname = '$firstname', lastname = '$lastname', email = '$mail', class = '$class', updated = now() WHERE masv = '$id'";
                $this->_db->executeQuery($sql);
                if( $this->_db->affectedRow() !== 0) {
                    return true;
                }
        }
        return false;
    }
}
