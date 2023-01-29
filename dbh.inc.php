<?php 
Class dbh {

  private $servername;
  private $username;
  private $password;
  private $dbname;

  protected function connect(){
    $this->servername = "localhost";
    $this->username = "1Admin";
    $this->password = "54321admins";
    $this->dbname = "mydata";

    $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

    return $conn;
  }
}


?>