<?php
class uploadText extends User{

    private $InputData;
    public static $fields = ['upload'];
    private $errors = [];
    public $text;

    public function __construct($post_data){
        $this->InputData = $post_data;

      }

    public function validateText(){

        foreach(self::$fields as $field){
          if(!array_key_exists($field, $this->InputData)){
            trigger_error("'$field' is not present in the data");
            return;
          }
        }
    
        $this->upText();
        return $this->errors;
      }

    public function upText(){
        
        $val = trim($this->InputData['upload']);
        $line = new dbh($_POST);
        $conn = ($line->connect());
        
        $id = $_SESSION['id'];
        $Text = mysqli_real_escape_string($conn, $val);

        
		    $sql = "UPDATE datas SET ProfileText='$Text' WHERE id='$id'";
        
        if(mysqli_query($conn, $sql)){
            
          mysqli_close($conn);
            
        }
    }

    public function showText(){
        
    
      $id = $_SESSION['id'];
      $line = new dbh($_POST);
      $conn = ($line->connect());
        
      $id = $_SESSION['id'];

    
      $sql = "SELECT ProfileText FROM datas WHERE id = '$id'";
      
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      return $row['ProfileText'];
      
      $conn->close();

    } 

    function __destruct() {
        return "Destroying " . __CLASS__ . "\n";
    }
}

    

?>