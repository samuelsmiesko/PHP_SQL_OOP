<?php
class User extends Dbh{

    public function getAllUsers(){
        $sql = "SELECT email, password, name, id FROM datas";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;
        
        if($numRows > 0){
            while($row = $result->fetch_assoc()){
                $data[] = $row;
                //echo  $row["id"]. " id: " . $row["name"]. " name " . $row["email"]. " email" . $row["password"]. " email " . "<br>";
                
            }
        }
        return $data;
        return $result;
        
    }

}

?>