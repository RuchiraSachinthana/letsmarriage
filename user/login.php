<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login'])) 
  {
    $mobno=$_POST['mobno'];
    $password=md5($_POST['password']);
    $sql ="SELECT ID FROM tbluser WHERE MobileNumber=:mobno and Password=:password";
    $query=$dbh->prepare($sql);
    $query->bindParam(':mobno',$mobno,PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
{
foreach ($results as $result) {
$_SESSION['omrsuid']=$result->ID;
}


$_SESSION['login']=$_POST['mobno'];
echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
} else{
echo "<script>alert('Invalid Details');</script>";
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Marriage Registration System||Sign in page</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-theme15.css">
</head>
<body>
    <div class="form-body">
        <div class="website-logo">
            <a href="../index.php">
                <div class="">
                    <img src="https://cdn.pixabay.com/photo/2016/11/07/13/04/yoga-1805784_960_720.png" alt="">
                </div>
            </a>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <h3>Get more things done with Loggin platform.</h3>
                   
                    <p><br><br>
                        Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.</p>
                        <img src="images/graphic1.svg" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <div class="page-links">
                            <a href="login.php" class="active">Login</a><a href="register.php">Register</a>
                        </div>
                        <form action="" method="post">
                        <input type="text" class="form-control" placeholder="Mobile Number" required="true" name="mobno" maxlength="10" pattern="[0-9]+" >
                        <input type="password" class="form-control" placeholder="Password" name="password" required="true" value="">
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn" name="login">Login</button> <a href="forgot-password.php">Forget password?</a>
                               <br><br> <a href="register.php">Not registered yet Click here for registration </a>
                            </div>
                            

                        </form>
                        <div class="other-links">
                            <span>Or login with</span><a href="#"><i class="fab fa-facebook-f"></i></a><a href="#"><i class="fab fa-google"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<script src="lib/jquery/jquery.js"></script>
    <script src="lib/popper.js/popper.js"></script>
    <script src="lib/bootstrap/bootstrap.js"></script>
    <script src="lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>

    <script src="js/amanda.js"></script>
</body>
</html>