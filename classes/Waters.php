<?php
class Waters extends Database
{

    private $_db = null;

    public function __construct()
    {
        $this->_db = self::getInstance();
    }

    public function addWater( $masv, $soluong = '1', $description){
        $createdid = Session::get('iduser');
        if( $masv && $soluong){
            $sql = "INSERT INTO water( masv, soluong, description, created, createdid) VALUES ('$masv', '$soluong', '$description', now(), '$createdid')";
            $this->_db->executeQuery($sql);
            if( $this->_db->affectedRow() !== 0){
                return true;
            }
        }
        return false;
    }

    public function memberFinal(){
        $sql = "SELECT water.created, description,soluong,firstname, lastname FROM thanhvien INNER JOIN water ON thanhvien.masv = water.masv ORDER BY water.created DESC";
        $member =   $this->_db->executeQuery($sql)->fetch();
        return $member;
    }
    public function listMemberlastest(){
        $sql = "SELECT water.created, description,soluong,firstname, lastname FROM thanhvien INNER JOIN water ON thanhvien.masv = water.masv ORDER BY water.created DESC LIMIT 7";
        $member =   $this->_db->executeQuery($sql)->fetchAll();
        return $member;
    }
}

