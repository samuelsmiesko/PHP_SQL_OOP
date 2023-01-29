<?php
class ViewUser extends User{

    public $password;

    public function showAllUsers(){
       $datas = $this->getAllUsers();
       foreach ($datas as $data){

            $name = $data['name'];
            return $name;
            
       }
    }   

    public function showAllPasswords(){
        $datas = $this->getAllUsers();
        foreach ($datas as $data){
             $password = $data['password'];
             return $password;
        }
     }

     public function showAllEmails(){
        $datas = $this->getAllUsers();
        foreach ($datas as $data){
             $email = $data['email'];
             return $email;
        }
     }
}

?>