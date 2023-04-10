<?php

require('/xampp/htdocs/dashboard/opp/inc/dbh.inc.php'); 
require('/xampp/htdocs/dashboard/opp/inc/user.inc.php');    
require('/xampp/htdocs/dashboard/opp/inc/checkUser.inc.php'); 
require('/xampp/htdocs/dashboard/opp/inc/uploadText.inc.php'); 
require('/xampp/htdocs/dashboard/opp/inc/image.inc.php'); 
require('/xampp/htdocs/dashboard/opp/inc/addStatus.inc.php'); 
require_once('./inc/uploadfile.php');

$errors = [];
$Text = '';

$class = new addStatus($_POST);
$status = $class->showStatus();
//print_r($status) ;

if(isset($_SESSION["user_name"])){

    $vis = 'visible';
    $class = new ImageUpload($_POST);
    $foto = $class->getPhoto();
    $src = "Myfiles/" .  $foto ;

    $class = new ImageUpload($_POST);
    $photo = $class->getPhoto();
    
    if(isset($_POST['UploadStatus'])){
        
        $checks = new addStatus($_POST);
        $checks->validateStatus();     
        header('Location: add.php');
          
    }
}else{
    
    $src = "templates/img/empty.jpg";
    $CookieDis = 'd-none';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.fa {
font-size: 100%;
cursor: pointer;
user-select: none;
}

.fa:hover {
color: blue;
}
</style>
</head>
<body>
<?php include('templates/header.php'); ?>
<?php if(isset($_SESSION["user_name"])){ ?>
    <div class="container pt-4">
        <div class="mt-4 p-4 bg-primary text-white ">
            <h4 class="ms-4">Add status</h4> 
        </div>
        <div class="p-4 bg-light text-dark">
            <div class=" form-group">
                <form  method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
                    <textarea class="form-control" type="submit" name="uploadStatus" rows="5" id="comment" values=""></textarea>
                    <div class="d-flex justify-content-center">
                        <input type="submit" name="UploadStatus" class="mt-2 btn btn-danger" value="Upload status"></input>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="overflow-auto" >
        <?php foreach($status as  $val) { ?>
        <div class="container pt-4 statuses">
            <div class="mt-5 p-4 bg-primary text-white ">
                <div class="container d-flex float-left">
                    <img src="<?php  echo $src ?>" class="rounded" alt="profile photo" style="width:120px; margin-top: -75px; object-fit: cover; border: 5px solid #b4b4b4;">
                    <h4 class="ms-4 "><?php echo $val["Autor"]; ?></h4> 
                    <div class="ms-4 btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-light"><i class="fa fa-thumbs-up"></i></button>
                        <button type="button" class="btn btn-danger"><i  class="fa fa-thumbs-down"></i></button>
                    </div>
                </div>
            </div>
            <div class="p-4 bg-light text-dark">
                <p class="container mt-3"><?php echo $val["Text"]; ?></p> 
                <p class="container mt-3 text-primary">Expire</p>
                <div class="d-flex container flaot">
                    <div class="d-flex ms-4 my-auto">
                            <div class="fa fa-thumbs-up text-primary">
                            </div>
                            <div class="ms-2 text-primary ">
                                Likes
                            </div>
                    </div>
                    <div class="d-flex ms-4 my-auto">
                            <div class="fa fa-thumbs-down text-danger">
                            </div>
                            <div class="ms-2 text-primary ">
                                Dislikes
                            </div>
                    </div>
                </div>
            </div>
        </div>
        
        <?php } ?>            
    </div>
<?php } ?>      
</body>   
<?php include('templates/footer.php'); ?>
</html>