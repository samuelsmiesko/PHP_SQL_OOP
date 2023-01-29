<?php 
 require('/xampp/htdocs/dashboard/opp/dbh.inc.php'); 
 require('/xampp/htdocs/dashboard/opp/user.inc.php');    
 require('/xampp/htdocs/dashboard/opp/viewuser.inc.php'); 
 require('/xampp/htdocs/dashboard/opp/checkUser.inc.php'); 

 $errors = [];

if(isset($_POST['submit'])){
     
    $checks = new CheckUser($_POST);
    $errors = $checks->validateForm();
      
}


?>

<!DOCTYPE html>
<html lang="en">

    <?php include('templates/header.php'); ?>

    <form class="container mt-4" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" name="email" class="form-control" id="email" value="<?php if (isset($_POST['email'])) echo htmlspecialchars($_POST['email']);?>">
            <div class="container text-danger">
                
                <?php if (isset($errors['email'])) echo htmlspecialchars($errors['email']); ?>
            </div>
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" name="password" class="form-control" id="pwd" value="<?php if (isset($_POST['password'])) echo htmlspecialchars($_POST['password']);?>">
            <div class="container text-danger">
                
                <?php if (isset($errors['password'])) echo htmlspecialchars($errors['password']); ?>
            </div>
        </div>        
        <button type="submit" name="submit" value="submit" class="btn btn-success mt-3">Submit</button>
    </form>
    
    <?php include('templates/footer.php'); ?>
    
</html>




