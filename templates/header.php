<?php

if(isset($_SESSION["user_name"])){
    
    $result = 'warning';
    $sign = 'out';
    $able = 'disabled';
    $name = $_SESSION["user_name"];
    
}else{
    $result = 'white';
    $sign = 'in';
    $able = '';
    $name = 'Guest';
    
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

    <nav class="navbar navbar-expand-sm bg-primary navbar-dark ">

    <div class="container-fluid">
    <!-- Links -->
    <ul class="navbar-nav">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="#navbarSupportedContent">
            <li class="nav-item">
            <a class="nav-link" href="/dashboard/opp/add.php">Add</a>
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
            <a class="nav-link" href="/dashboard/opp/profile.php"><img src="templates/img/empty.jpg" style="width:30px" class=" rounded mx-auto d-block" alt="img"></a>
        </li>
        <li class="nav-item ms-2  d-flex list-unstyled">
            <a class="nav-link text-<?php echo $result ?>">Hello <?php echo htmlspecialchars($name); ?></a>
        </li>
    </ul>
    
    </div>

    

    </nav>
