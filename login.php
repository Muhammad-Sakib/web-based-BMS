<?php
include("connection.php");
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
     <!--background Animation-->
     <div class="bg"></div>
     <div class="bg bg2"></div>
     <div class="bg bg3"></div>
     <nav>
        <a href="home.php" class="link-default"><img src="icon/logo.png" alt="logo" style = "height: 100%; float: left;">
        <h2 class="nav-logo">Blood Management System</h2></a>
        <form method="POST">
                <input type="text" name="search" placeholder="Search blood...">
        </form> 
        <div class="nav-div">             
            <ul class="nav-list">
                    <li><a href="home.php" >Home</a></li>
                    <li><a href="signup.php">Be a Donor</a></li>
                    <li><a href="login.php" class="active">Login</a></li>
                    <li><a href="about.php">About</a></li>
            </ul>
        </div>
    </nav>
    <span id="invalid-input"></span>
    <h1 class="name-h">Online Blood Management System</h1>
    <form class="login-form" method="POST">
        <h1>Go! Blood Hero.</h1>
        <input type="text" placeholder="Username" class="input-c" name="Uname">
        <input type="text" placeholder="Password" class="input-c" name="pwd">
        <input type="submit" name="btn" value="Login" class="btn">
        <span id="wrong-pass"></span>
    </form>
    
</body>
</html>
<?php
$msg=$_GET['message'];
if($msg !=""){
    echo "<script>alert('$msg')</script>";
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST")
{   session_start();
    if(isset($_POST['btn']))
    {
        $username = $_POST['Uname'];
        $passwd = $_POST['pwd'];
        $user= mysqli_query($conn, "SELECT * FROM donor_list WHERE Username = '$username'");
        $pass= mysqli_query($conn, "SELECT * FROM donor_list WHERE Pass_word = '$passwd'");
        if(mysqli_num_rows($user) == 1 && mysqli_num_rows($pass) >0){
            $_SESSION['log_user'] = $username;
            header("location: profile.php");
        }
        else{
            echo "<script>document.getElementById('wrong-pass').innerHTML='*Enter Correct Username and Password*'</script>";
        }
    }
    elseif(isset($_POST['search'])){
            $b = $_POST['search'];
            if($b == "O+" || $b == "o+" || $b == "O-" || $b == "o-" || $b == "A+" || $b == "a+" || $b == "A-" || $b == "a-" || $b == "B+" || $b == "b+" ||  $b == "B-" || $b == "b-" || $b == "AB+" || $b == "ab+" || $b == "Ab+" || $b == "aB+" || $b == "AB-" || $b == "ab-" || $b == "Ab-" || $b == "aB-"){
                session_start();
                $results= mysqli_query($conn, "SELECT * FROM donor_list WHERE BloodGroup = '".$_POST['search']."'");
                $_SESSION['bg'] = $_POST['search'];
                header("location: result.php?");
                exit;
            }
            else{
                echo "<script>document.getElementById('invalid-input').innerHTML='*Input valid blood group'</script>";
            }
    }
}
?>