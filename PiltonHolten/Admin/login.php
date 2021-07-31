<?php 
session_start();
include('includes/header.php');
?>
<head>
<title>Login</title>
</head>
<div class="navbar-light navigation-clean">
    <div class="container" style="text-align:center;"><img style="width: 50px;height: 50px;" src="assets/img/pilton%20image.jpg"><a class="navbar-brand" style="padding:0 5px 0;">Pilton Admin</a>
    </div>
</div>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Login Here!</h4>
                                    </div>
                                        <form class="user" action="logincode.php" method="POST">
                                            <div class="mb-3"><input class="form-control form-control-user" type="text" placeholder="Enter username..." name="username" required/></div>
                                            <div class="mb-3"><input class="form-control form-control-user" type="password" placeholder="Password" name="password" required/></div>
                                            <div class="mb-3">
                                                <?php
                                                    if(isset($_SESSION['status']) && $_SESSION['status'] !='')
                                                    {
                                                        echo '<h6 style="color: red;"> '.$_SESSION['status'].' </h6>';
                                                        unset($_SESSION['status']);
                                                    }
                                                ?>
                                            </div><button class="btn btn-primary d-block btn-user w-100" type="submit" name="LoggingInButton">Login</button>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>




<?php
include('includes/scripts.php');
include('includes/footer.php');
?>