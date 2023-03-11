<?php

class ImageUpload extends User{

   public function MoveFile(){
      $fileName = $_FILES['fileToUpload']['name'];
      //$tempName = $_FILES['fileToUpload']['tmp_name'];

   //    if(isset($fileName)){

   //       if(!empty($fileName)){
   //          $location = "Myfiles/";
   //          if(move_uploaded_file($tempName, $location.$fileName)){
   //             return;
   //          }

   //       }
   //   }

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

      $id = $_SESSION['id'];
      $line = new dbh($_POST);
      $conn = ($line->connect());
        
      $id = $_SESSION['id'];

    
      $sql = "SELECT NameImage FROM datas WHERE id = '$id'";
      
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      return $row['NameImage'];
      
      $conn->close();
   }
}
?>