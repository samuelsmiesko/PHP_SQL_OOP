<?php
    
    $servername = "localhost";
    $username = "1Admin";
    $password = "54321admins";
    $dbname = "mydata";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if(isset($_POST['info'])){
        $info = $_POST['info'];
        $sql = "UPDATE statuses SET Likes = Likes+1 WHERE id='$info'";
            
        $result = mysqli_query($conn,$sql);

        
    }
       
    function test_input($data){
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }
    

?>