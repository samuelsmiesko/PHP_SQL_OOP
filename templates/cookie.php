<?php

$cookie_name = "user_cookie";
$cookie_value = "user_value";
$CookieDis = '';

if((!isset($_COOKIE[$cookie_name]))){
    
    if(isset($_POST['buttonCookie1'])) {
        $CookieDis = 'd-none';
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    }

    if(isset($_POST['buttonCookie2'])) {
        $CookieDis = 'd-none';
    }
}else{
    $CookieDis = 'd-none';
    
}
    


?>
<html>
    <head>
    <style>
        .box {
            background:grey;
            position:fixed;
            opacity: 0.5;
            top:0px;
            right:0px;
            bottom:0px;
            left:0px;
            left:0px;
            z-index: 1;
            }
        .cookieText{
            z-index: 2;
            position:fixed;
            bottom:0px;
            background-image: linear-gradient(to right, blue , #789);
            color: white;
        }
    </style>
    </head>
<body>
    <div class="cookiePage">    
        <div class="box <?php echo $CookieDis ?>">
        </div>    
        <div class="container-fluid p-3 text-center cookieText <?php echo $CookieDis ?>">
                <h2>Our use of cookies</h2>
                <p>We use necessary cookies to make our site work. We'd also like to set analytics cookies that help us make improvements by measuring how you use the site. These will be set only if you accept.
                For more detailed information about the cookies we use, see our Cookies page.</p>
                <div class="container-fluid p-3">
                    <form method="post">
                        <input type="submit" name="buttonCookie1" type="button" class="btn btn-light m-2 w-25 <?php echo $CookieDis ?>" value="Accept all the cookies"></input>
                        <input type="submit" name="buttonCookie2" type="button" class="btn btn-primary m-2 w-25 <?php echo $CookieDis ?>" value="Decline all the cookies"></input>
                    </form>
                </div>
        </div>
    </div>    

</body>
</html>