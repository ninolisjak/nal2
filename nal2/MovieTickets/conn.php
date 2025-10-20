<?php
class connec
{
    public $username="root";
    public $password="";
    public $server_name="localhost";
    public $db_name="dsr";

    public $conn;
    function __construct(){
        $this->conn=new mysqli($this->server_name,$this->username,$this->password,$this->db_name);
        if($this->conn->connect_error)
        {
            die("connection failed");
        }
        
    }
    function select_all($table_name)
    {
        
        $sql="SELECT * FROM $table_name";
        $resut = $this->conn->query($sql);
        return $resut;
    }
    function select_movie($table_name,$date)
    {
        
        $sql="SELECT * FROM $table_name where rel_date < $date";
        $resut = $this->conn->query($sql);
        return $resut;
    }
    function select($table_name,$id){
        $sql= "SELECT * FROM $table_name where id=$id";
        $result = $this->conn->query($sql);
        return $result;
    }
    function insert($query,$msg)
    {
        if($this->conn->query($query)===true)
        {
            echo '<script> alert("'.$msg.'");</script>';
        }
        else
        {
            echo '<script> alert("'.$this->conn->error.'");</script>';
        }
    }
    function insertmsg($query)
    {
        if($this->conn->query($query)===true)
        {
            echo '<script> alert("We will contact you soon!");</script>';
        }
        else
        {
            echo '<script> alert("'.$this->conn->error.'");</script>';
        }
    }
    function select_login($table_name,$email){
        $sql= "SELECT * FROM $table_name where email ='$email'";
        $result = $this->conn->query($sql);
        return $result;
    }
    function update($query,$msg)
    {
        if($this->conn->query($query)===true)
        {
            echo '<script> alert("'.$msg.'");</script>';
        }
        else
        {
            echo '<script> alert("'.$this->conn->error.'");</script>';
        }
    }
    function delete($table_name,$id)
    {
        $query="Delete from $table_name WHERE id='$id'";
        if($this->conn->query($query)===true)
        {
            echo '<script> alert("Movie deleted");</script>';
        }
        else
        {
            echo '<script> alert("'.$this->conn->error.'");</script>';
        }
    }
    function insertmovie($query)
    {
        if($this->conn->query($query)===true)
        {
            echo '<script> alert("Uspesno dodan");</script>';
        }
        else
        {
            echo '<script> alert("'.$this->conn->error.'");</script>';
        }
    }
}

?>