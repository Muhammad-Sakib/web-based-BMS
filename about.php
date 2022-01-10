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
    <title>About</title>
    <link rel="stylesheet" href="about.css">
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
                    <li><a href="home.php">Home</a></li>
                    <li><a href="signup.php">Be a Donor</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="about.html" class="active">About</a></li>
                </ul>
            </div>
        </nav>
        <span id="invalid-input"></span>
        <div class="about">
            <div>
                <h2>About us</h2>
                <p>Blood Bank Management System is a management system that is developed to manage blood donating system online. This Blood Bank Management System is a web-based system that will make it easier to donate blood or find blood for the people. This website is free to use.</p>
            </div>
            <div>
                <h2>Developers</h2>
                <div class="dev-card">
                    <img src="images/sakib.png" alt="developer photo">
                    <h3>Muhammad Sakib</h3>
                    <h5>Co-Founder of BMS & Web Developer</h5>
                    <p>Currently studing BSc. in CSE at Green University of Bangladesh.</p>
                </div>
                <div class="dev-card">
                    <img src="images/sharif.jpg" alt="developer photo">
                    <h3>Muhammad Ahsan Sharif</h3>
                    <h5>Co-Founder of BMS & Web Developer</h5>
                    <p>Currently studing BSc. in CSE at Green University of Bangladesh.</p>
                </div>
            </div>
        </div>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST")
{   
    if(isset($_POST['search'])){
    $b = $_POST['search'];
    if($b == "O+" || $b == "o+" || $b == "O-" || $b == "o-" || $b == "A+" || $b == "a+" || $b == "A-" || $b == "a-" || $b == "B+" || $b == "b+" ||  $b == "B-" || $b == "b-" || $b == "AB+" || $b == "ab+" || $b == "Ab+" || $b == "aB+" || $b == "AB-" || $b == "ab-" || $b == "Ab-" || $b == "aB-"){
        session_start();
        $results= mysqli_query($conn, "SELECT * FROM donor_list WHERE BloodGroup = '".$_POST['search']."'");
        $_SESSION['bg'] = $_POST['search'];
        header("location: result.php");
        exit;
    }
    else{
        echo "<script>document.getElementById('invalid-input').innerHTML='*Input valid blood group'</script>";
    }
  }
}
?>