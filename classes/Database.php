<?php
class Database{
    private $_dbhost;
    private $_dbuser;
    private $_dbpasswd;
    private $_dbname;

    public static $_instance = null;
    private $con = null;
    private $result = null;

    public function __construct( ){
        $this->_dbhost = Configs::get('mysql/host');
        $this->_dbuser = Configs::get('mysql/user');
        $this->_dbpasswd= Configs::get('mysql/password');
        $this->_dbname = Configs::get('mysql/dbname');
        @$this->con = @mysqli_connect($this->_dbhost, $this->_dbuser, $this->_dbpasswd, $this->_dbname);
        if( ! $this->con ){
            @die( 'Database connect error! please, see again informaiton about database config of you!'.mysqli_error( $this->con));
        }
    }
    public function __destruct(){
        if( $this->con )
        mysqli_close( $this->con );
    }
    /*
     * getInstance function
     * return obj
     */
    public static function getInstance(){
        if( ! self::$_instance ){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function executeQuery( $sql ){
        $this->result = mysqli_query( $this->con, $sql );
        return $this;
    }

    public function num_rows(){
       $rows = ( $this->result ) ? mysqli_num_rows( $this->result ) : 0;
       return $rows;
    }

    public function fetch(){
      $data = ( $this->num_rows() !== 0 ) ? mysqli_fetch_assoc( $this->result ) : 0;
      return $data;
    }

    public function fetchAll(){
        $data = [];
        if( $this->num_rows() !== 0 ){
            while( $rows = mysqli_fetch_assoc( $this->result ) ){
                $data[] = $rows;
            }
        }
        return $data;
    }

    public function getResult(){
        return $this->result;
    }

    public function affectedRow(){
       if( $this->con ) return mysqli_affected_rows( $this->con );
       return 0;
    }
}