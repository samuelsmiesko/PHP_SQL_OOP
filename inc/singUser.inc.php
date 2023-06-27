<?php

class singUser extends User{

    private $InputData;
    private $errors = [];
    public static $fields = ['email', 'password', 'name'];

    public function __construct($post_data){
        $this->InputData = $post_data;
      }

    public function validateForm(){

        foreach(self::$fields as $field){
          if(!array_key_exists($field, $this->InputData)){
            trigger_error("'$field' is not present in the data");
            return;
          }
        }
    
        $this->validateUsername();
        return $this->errors;
      }

    public function validateUsername(){

        $val = trim($this->InputData['email']);
        $val2 = trim($this->InputData['password']);
        $val3 = trim($this->InputData['name']);
        
        $a=array();

        if(empty($val)){
          $this->addError('email', 'email cannot be empty');
        }

        if(empty($val2)){
            $this->addError('password', 'password cannot be empty');
          }

        if(!preg_match('/^(?=.*\d).{8,}$/', $val2)){
            $this->addError('password', 'Password must have at least eight characters, at least one letter, one number and one special character:');
        }

        if(empty($val3)){
            $this->addError('name', 'name cannot be empty');
          }

        $line = new dbh($_POST);
        $conn = ($line->connect());
        print_r($conn);

        $email = mysqli_real_escape_string($conn, $val);
        $name = mysqli_real_escape_string($conn, $val3);
        $password = mysqli_real_escape_string($conn, $val2);

 
		    $sql = "INSERT INTO datas(name,email,password,NameImage) VALUES('$name','$email','$password','empty.jpg')";

        if(mysqli_query($conn, $sql)){
            
            header('Location: add.php');
            
        }
        
        if(!in_array($val, $a)) {
          $this->addError('Email', "doesn't exist");
        }
      }

    private function addError($key, $val){
        $this->errors[$key] = $val;
      }

    function __destruct() {
        return "Destroying " . __CLASS__ . "\n";
    }
}

    

?>