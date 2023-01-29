<?php

    

class Users {

    public $name = '';
    public $email = '';
    public $password = '';
    public $password2 = '';
    public $errors = array('name' => '', 'email' => '', 'password' => '', 'password2' => '');
    
    public static function checkUser(){
        include('config/db_connect.php');
        if(isset($_POST['submit'])){

            //$_SESSION['name'] = $_POST['name'];

            if(empty($_POST['email'])){
                $errors['email'] = 'An email is required';
                echo 'no email';
            } else{
                $email = $_POST['email'];
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $errors['email'] = 'Email must be a valid email address';
                }
            }
            
            if(empty($_POST['password'])){
                $errors['password'] = 'Password is required';
                
            } else{
                $password = $_POST['password'];
                if(!preg_match('/^(?=.*\d).{8,}$/', $password)){
                    $errors['password'] = 'Password must have at least eight characters, at least one letter, one number and one special character:';
                
                    if($_POST['password']!=$_POST['password2']){
                        $errors['password'] = "Passwords don't match";
                    }    
                }
            }
            
            if(array_filter($errors)){
                //echo 'errors in form';
            }else{

                $email = mysqli_real_escape_string($conn, $_POST['email']);
                $name = mysqli_real_escape_string($conn, $_POST['name']);
                $password = mysqli_real_escape_string($conn, $_POST['password']);

                // create sql
                $sql = "INSERT INTO datas(name,email,password) VALUES('$name','$email','$password')";

                // save to db and check
                if(mysqli_query($conn, $sql)){
                    // success
                    header('Location: index.php');
                } else {
                    echo 'query error: '. mysqli_error($conn);
                }

                if(array_filter($errors)){
                    //echo 'errors in form';
                }else{
                    header('Location: add.php');
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

    <?php include('templates/header.php'); ?>

    <form class="container mt-4" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" name="email" class="form-control" id="email" value="<?php echo htmlspecialchars($email) ?>">
            <div class="container text-danger">
                <?php echo $errors['email']; ?>
            </div>
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" name="password" class="form-control" id="pwd" value="<?php echo htmlspecialchars($password) ?>">
            <div class="container text-danger">
                <?php echo $errors['password']; ?>
            </div>
        </div>
        <div class="form-group">
            <label for="pwd">Confirm password:</label>
            <input type="password" name="password2" class="form-control" id="pwd">
            <div class="container text-danger">
                <?php echo $errors['password']; ?>
            </div>
        </div>
        <div class="form-group">
            <label for="nick">Enter your nick:</label>
            <input type="name" name="name" class="form-control" id="nick" value="<?php echo htmlspecialchars($name) ?>">
            <div class="container text-danger">
                <?php echo $errors['name']; ?>
            </div>
        </div>
        
        <button type="submit" name="submit" value="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
    
    <?php include('templates/footer.php'); ?>
    
</html>