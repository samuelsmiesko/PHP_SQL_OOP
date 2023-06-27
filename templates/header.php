<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>




<?php



if(isset($_SESSION["user_name"])){
    
    $result = 'warning';
    $sign = 'out';
    $able = 'disabled';
    $name = $_SESSION["user_name"];
    $class = new ImageUpload($_POST);
    $data = $class->getPhoto();
    $visiblity = '';
    
}else{
    $result = 'white';
    $sign = 'in';
    $able = '';
    $name = 'Guest';
    $src = "templates/img/empty.jpg";
    $visiblity = 'disabled';
}


?>
<head>
    <title>New add</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
    </style>
    
</head>
<body>  
    <?php include('templates/cookie.php'); ?> 
    <nav class="navbar navbar-expand-sm bg-primary navbar-dark ">

        <div class="container-fluid ">
            <!-- Links -->
            <ul class="navbar-nav">
            <div class="dropdown  d-block d-sm-none">
                <button type="button" class="btn btn-primary dropdown-toggle " data-bs-toggle="dropdown">
                    Dropdown button
                </button>
                <ul class="z-1 position-absolute dropdown-menu">
                    <li><a class="dropdown-item" href="/dashboard/opp/add.php">Add</a></li>
                    <li><a class="dropdown-item <?php echo $visiblity ?>" href="/dashboard/opp/signup.php">Sign up</a></li>
                    <li><a class="dropdown-item <?php echo $able ?>" href="/dashboard/opp/signup.php">Sign <?php echo htmlspecialchars($sign); ?></a></li>
                </ul>
            </div>
        <div class="collapse navbar-collapse" id="#navbarSupportedContent">
            <li class="nav-item">
            <a class="nav-link <?php echo $visiblity ?>" href="/dashboard/opp/add.php">Add</a>
            </li>
            <li class="nav-item">
            <a class="nav-link <?php echo $able ?>" href="/dashboard/opp/signup.php">Sign up</a>
            </li>
            <li class="nav-item">
            <a class="nav-link " href="/dashboard/opp/signin.php">Sign <?php echo htmlspecialchars($sign); ?></a>
            </li>
        </div>
    </ul>
    
    <ul class="navbar-nav d-flex float-left">
        <li class="text-center ms-4   list-unstyled">
            <a class="nav-link" href="/dashboard/opp/profile.php">
                    <?php if (isset($data )){ ?>
                        <?php foreach($data as $key=>$value){ ?>
                            
                                <?php if($name==($value["name"])){?>
                                    <img src="<?php echo "Myfiles/" . $value["NameImage"]; ?>" class="rounded" alt="profile photo" style="width:30px;  object-fit: cover; border: 2px solid #b4b4b4;">
                                <?php    
                                } ?>  
        
                        <?php } ?>
                    <?php } ?>
                <!-- <img src="<?php  echo $src ?>" style="width:30px" class=" rounded mx-auto d-block" alt="img"> -->
            </a>
        </li>
        <li class="nav-item ms-2  d-flex list-unstyled">
            <a class="nav-link text-<?php echo $result ?>">Hello <?php echo htmlspecialchars($name); ?></a>
        </li>
    </ul>
    
    </div>

    

    </nav>

        

