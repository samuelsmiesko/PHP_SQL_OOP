<?php

class ImageUpload extends User{

   public function MoveFile(){
      $fileName = $_FILES['fileToUpload']['name'];

      $line = new dbh($_POST);
      $conn = ($line->connect());

      $id = $_SESSION['id'];
      $Name = mysqli_real_escape_string($conn, $fileName);


      $sql = "UPDATE datas SET NameImage='$Name' WHERE id='$id'";

      if(mysqli_query($conn, $sql)){

          mysqli_close($conn);

      }
      
   }

   public function getPhoto(){

      
      $line = new dbh($_POST);
      $conn = ($line->connect());
        
      $sql = "SELECT name,NameImage FROM datas ";
      
      $result = $conn->query($sql);
      
      $numRows = $result->num_rows;
      
      if($numRows > 0){
            while($row = $result->fetch_assoc()){
                $data[] = $row;
                

                
            }
        }

      return $data;
      $conn->close();
      
   }


}
?>