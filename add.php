



<?php
  

require('/xampp/htdocs/dashboard/opp/inc/dbh.inc.php'); 
require('/xampp/htdocs/dashboard/opp/inc/user.inc.php');    
require('/xampp/htdocs/dashboard/opp/inc/checkUser.inc.php'); 
require('/xampp/htdocs/dashboard/opp/inc/uploadText.inc.php'); 
require('/xampp/htdocs/dashboard/opp/inc/image.inc.php'); 
require('/xampp/htdocs/dashboard/opp/inc/addStatus.inc.php'); 


$errors = [];
$Text = '';

$class = new addStatus($_POST);
$status = $class->showStatus();
$class = new User($_POST);
$data = $class->getAllUsers();



if(isset($_SESSION["user_name"])){
    
    $vis = 'visible';
    $class = new ImageUpload($_POST);
    $data = $class->getPhoto();
      
    if(isset($_POST['UploadStatus'])){
        
        $checks = new addStatus($_POST);
        $checks->validateStatus();      

          
    }   




}else{
    
    $src = "templates/img/empty.jpg";
    $CookieDis = 'd-none';
    $height = '100%';
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> 
<script type="text/javascript">
        
                 
        $(document).ready(function(){
            $(".AddLike").click(function(e){
                
                var info = $(this).attr('id');
                
                $.ajax({
                    type: "POST",
                    data: {info:info,},
                    url: "suggestions.php",
                    cache: false,
                    success: function(data){
                        
                        $("#test").html(data);
                        location.reload("#test");
                        },
                    
                });
                
             });

            });

        $(document).ready(function(){
            $(".AddDislike").click(function(e){
                
                var info = $(this).attr('id');
                
                $.ajax({
                    type: "POST",
                    data: {info:info,},
                    url: "suggestions2.php",
                    cache: false,
                    success: function(data){
                        
                        $("#test").html(data);
                        location.reload("#test");
                        },
                    
                });
                
             });
        });     
            
        
        
</script>
<body >
<?php include('templates/header.php'); ?>
    <?php if(isset($_SESSION["user_name"])): ?>
        <div class="container pt-4">
            <div class="mt-4 p-4 bg-primary text-white ">
                <h4 class="ms-4">Add status</h4> 
            </div>
            <div class="p-4 bg-light text-dark">
                <div class=" form-group">
                    <form  method="post" id="frmBox" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data" >
                        <textarea class="form-control" type="submit" name="uploadStatus" rows="5" id="comment" values=""></textarea>
                        <div class="d-flex justify-content-center">
                            <input type="submit" name="UploadStatus" class="mt-2 btn btn-danger" value="Upload status"></input>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="overflow-auto status" >
            
            <?php foreach(array_reverse($status) as  $val) { ?>
                
            <div  class="container pt-4 statuses" >
                <div class="mt-5 p-4 bg-primary text-white ">
                    <div class="container d-flex float-left">
                        <?php foreach($data as $key=>$value){ ?>
                                <?php if($val["Autor"]==($value["name"])){?>
                                    <img src="<?php echo "Myfiles/" . $value["NameImage"]; ?>" class="rounded" alt="profile photo" style="width:120px; margin-top: -75px; object-fit: cover; border: 5px solid #b4b4b4;">
                                <?php    
                                } ?>  
                        <?php } ?>
                        <h4 class="ms-4 "><?php echo $val["Autor"]; ?></h4> 
                        <div id="postData"></div>
                        <form  name="likeDislike" action="" method="POST" enctype="multipart/form-data" id="myform">
                            <div class="ms-4 btn-group " role="group" aria-label="Basic example">
                                <button id="<?php echo $val["id"]; ?>" type="button" name="AddLike" class="btn btn-light AddLike" ><i class="fa fa-thumbs-up" ></i></button>
                                <button id="<?php echo $val["id"]; ?>" type="button" name="AddDislike" class="btn btn-danger AddDislike" ><i  class="fa fa-thumbs-down" ></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="p-4 bg-light text-dark">
                    <p class="container mt-3"><?php echo $val["Text"]; ?></p> 
                    <p class="container mt-3 text-primary">Expire</p>
                    <div class="d-flex container float">
                        <div class="d-flex ms-4 my-auto" id="test">
                                <div class="fa fa-thumbs-up text-primary">
                                </div>
                                <div class="d-flex ms-4 my-auto" id="test" >
                                    <p><?php echo $val["Likes"]; ?></p>
                                </div>
                                <div id="likeButton"   class="ms-2 text-primary " >
                                    Likes
                                </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            
            <?php } ?>  
             
        </div>
    <?php else : ?>
        <div class="container pt-4 d-flex justify-content-center" style="height:100%; ">
    
            <img class="card-img-top" src="Myfiles/300.webp" alt="Card image">
        </div> 
    <?php endif; ?>   
    
    
</body>   
<?php include('templates/footer.php'); ?>
</html>