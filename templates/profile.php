<?php

require('/xampp/htdocs/dashboard/opp/inc/dbh.inc.php'); 
require('/xampp/htdocs/dashboard/opp/inc/user.inc.php');    
require('/xampp/htdocs/dashboard/opp/inc/checkUser.inc.php'); 
require('/xampp/htdocs/dashboard/opp/inc/uploadText.inc.php'); 
require('/xampp/htdocs/dashboard/opp/inc/image.inc.php'); 
require_once('./inc/uploadfile.php');

$errors = [];
$Text = '';

if(isset($_SESSION["user_name"])){

    $vis = 'visible';
    $class = new uploadText($_POST);
    $info = $class->showText();
    $class = new ImageUpload($_POST);
    $foto = $class->getPhoto();
    $src = "./Myfiles/" .  $foto ;
    
    $class = new ImageUpload($_POST);
    $photo = $class->getPhoto();
    
    if(isset($_POST['submitDelete'])){
        
        $checks = new CheckUser($_POST);
        $checks->deleteUser();
        session_unset();
        header('Location: signup.php');
          
    }elseif(isset($_POST['UploadTextButton'])){
        
        $checks = new uploadText($_POST);
        $errors = $checks->validateText();
        header('Location: profile.php');

    }elseif(isset($_POST['UploadImageButton'])){

        $checks = new ImageUpload($_FILES);
        $checks->MoveFile();
    }
    
    
}else{
        $vis = 'invisible';
        $src = "templates/img/empty.jpg";
        $info = '';
    }
?>

<!DOCTYPE html>
<html lang="en">


    <?php include('templates/header.php'); ?>
    
    
    <form  method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
        <div class="d-flex justify-content-center ">
            <div class="card mt-4 col-md-8" >
                <div class="card-body">
                    <div class="d-flex">
                        <img class="card-img-top m-2" src="<?php  echo $src ?>" style="width:150px" alt="Card image">  
                        <!--  -->
                        <div class="d-grid">
                            <h4 class="pt-3 card-title"><?php echo htmlspecialchars($name); ?></h4>
                            <p class="card-text" ><?php  echo $info ?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control <?php echo $vis ?>" type="submit" name="upload" rows="5" id="comment" values="<?php if (isset($_POST['upload'])) echo htmlspecialchars($_POST['upload']);?>"></textarea>
                    </div>
                        <label class="form-label mt-3 <?php echo $vis ?>" >Upload image from directory</label>
                        <input type="file" class="form-control <?php echo $vis ?>" name="fileToUpload" />                       
                    <div class="row">
                        <div class="col-sm-12 col-md-8 btn-group mt-3 ">
                            <input type="submit" name="UploadImageButton" class="btn btn-success <?php echo $vis ?>" value="Upload image"></input>
                            <input type="submit" name="UploadTextButton" class="btn btn-info <?php echo $vis ?>" value="Upload text"></input>
                        </div>
                        <div class="col-sm-12 col-md-4 mt-3 ">
                            <input href="#" type="submit" name="submitDelete" class="btn btn-danger <?php echo $vis ?> " value="Remove profile"></input>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </form>
    
    </html>
    <?php include('templates/footer.php'); ?>
</html>