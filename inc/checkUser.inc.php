<?php
class CheckUser extends User{

    private $InputData;
    private $errors = [];
    public static $fields = ['email', 'password'];
    public $name;
    public $checkName;

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

    public function get_name(){
      return $this->name;
    }

  
    public function validateUsername(){

        $val = trim($this->InputData['email']);
        $val2 = trim($this->InputData['password']);
        
        $data = $this->getAllUsers();
        
        $a=array();

        
        if(empty($val)){
          $this->addError('email', 'email cannot be empty');
        }

        $data = new User($_POST);
        $line = ($data->getAllUsers());
        $x = 0;

        while($x <= count($line)-1) {
            
            $checkEmail = $line[$x]['email'];
            $checkPass = $line[$x]['password'];
            
            
            
            array_push($a,$checkEmail);
            if($checkEmail===$val){
              
              if($checkPass===$val2){
                
                $checkName = $line[$x]['name'];
                $checkId = $line[$x]['id'];
                $_SESSION['user_name'] = $checkName;
                $_SESSION['id'] = $checkId;
                header('Location: add.php');
              }else{
                $this->addError('password', 'password does not match email');
               
              }
            } 
            $x+=1;   
        }
        
        if(!in_array($val, $a)) {
          $this->addError('email', "Email doesn't exist");
        }

        return $val;
        return $val2;
      }

    public function deleteUser(){

      $id = $_SESSION['id'];
      $sql = "DELETE FROM datas WHERE id=$id";
      $result = $this->connect()->query($sql);
      return $result;
      header('Location: signup.php');
    }

    private function addError($key, $val){
        $this->errors[$key] = $val;
      }

    function __destruct() {
        return "Destroying " . __CLASS__ . "\n";
    }
}

    

?>