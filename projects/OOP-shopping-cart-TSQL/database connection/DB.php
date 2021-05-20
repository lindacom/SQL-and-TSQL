<?php
// an interface specifies what methods a class should implement

interface DB
{
    public function connect($host, $username = '', $password);
    public function query($query);
}
?>















