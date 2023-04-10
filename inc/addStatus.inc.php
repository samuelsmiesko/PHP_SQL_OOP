<?php
class addStatus extends User{

    private $InputData;
    public static $fields = ['uploadStatus'];
    private $errors = [];
    public $text;

    public function __construct($post_data){
        $this->InputData = $post_data;

      }

    public function validateStatus(){

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
        
        $val = trim($this->InputData['uploadStatus']);
        $a=array();

        $line = new dbh($_POST);
        $conn = ($line->connect());
        $Name = $_SESSION['user_name'];
        $Text = mysqli_real_escape_string($conn, $val);
        
        
		    $sql = "INSERT INTO statuses(Text, Autor) VALUES('$Text','$Name')";

        if(mysqli_query($conn, $sql)){
            
            header('Location: add.php');
            
        }

    }

    public function showStatus(){
        
        $sql = "SELECT Autor, id, Text FROM statuses";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;
        
        if($numRows > 0){
            while($row = $result->fetch_assoc()){
                $status[] = $row;
                
                
            }
            return $status;
        }
        
        
    }

    
    function __destruct() {
        return "Destroying " . __CLASS__ . "\n";
    }
}
 

?>