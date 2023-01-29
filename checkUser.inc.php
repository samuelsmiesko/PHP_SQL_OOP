<?php
class CheckUser extends User{

    private $InputData;
    private $errors = [];
    public static $fields = ['email', 'password'];

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
        $data = $this->getAllUsers();
        $line = $data[1]['email'];
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
            
            $x+=1;
            array_push($a,$val);
            if($checkEmail===$val){
              echo $checkEmail . "</br>" . $val; 
              echo 'email checked';
              if($checkPass===$val2){
                
                header('Location: add.php');
              }else{
                $this->addError('password', 'password does not match email');
              }
            }    
        }
        
        if(!in_array($val, $a)) {
          $this->addError('Email', "doesn't exist");
        }
      }
 
    private function addError($key, $val){
        $this->errors[$key] = $val;
      }
}

    

?>