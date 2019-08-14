<?php
namespace aitsyd;
class Database{
    protected $connection;
    public function __construct(){
        $this -> connection = mysqli_connect('localhost', 'user', 'password', 'data2');
    }
}
?>