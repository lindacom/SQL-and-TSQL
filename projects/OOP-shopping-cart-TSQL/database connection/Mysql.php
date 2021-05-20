<?php

include ('./interfaces/DB.php');
?>

<?php

// implements the DB interface (contract).  This class must initialise connect and query methods of the interface.

class Mysql implements DB
{
    protected $db = null;

    public function connect($username ="", $password = "", $host = "localhost", $dbname = "PHPDatabase", $options = [])
    {
       // connection to sqlserver
   $this->db = new PDO("sqlsrv:Server={$host};Database={$dbname}", $username, $password);
    }

    public function query($query)
    {
        return $this->db->query($query);
    } 
}



    
?>



