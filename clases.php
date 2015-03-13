<?php
class conexbd {
    private $hostname="localhost";
    private $username="root";
    private $pass="";
    private $db="promocion";
    private $conn;
            
    function __construct(){
        $this->conectar();
    }

    function conectar(){
        $this->conn = mysql_connect($this->hostname, $this->username, $this->pass);
        mysql_set_charset('utf8');
        if ($this->conn){
            mysql_select_db($this->db, $this->conn);
            
        }else{    
            echo ("no se pudo conectar" . mysql_error());
        }
    }

    function consultar($consulta){
        $rs=mysql_query($consulta, $this->conn);
        if(!$rs){ 
            echo 'MySQL Error: ' . mysql_error();
            exit;
        }
        return $rs;
        mysql_close($this->conn);
    }
    
}
?>