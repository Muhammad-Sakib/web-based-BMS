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
    <title>Online Blood Management System</title>
    <link rel="stylesheet" href="home.css">
</head>
<body onload="typeWriter()">
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
                    <li><a href="home.php" class="active">Home</a></li>
                    <li><a href="signup.php">Be a Donor</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="about.php">About</a></li>
                </ul>
            </div>
        </nav>
        <div class="search-sec">
            <div class="slogan-sec">
                <img src="icon/blood-drop.png" alt="blood icon">
                <h1>SAVE LIVES.</h1>
                <h1>DONATE BLOOD.</h1>
            </div>
            <div class="search-btn">
                <form method="POST">
                <h1>SEARCH FOR BLOOD</h1>
                <input type="text" name="search" id="search-input">
                <button type="submit" id="sub-btn">Search</button>
                <h3 id="invalid-input"></h3>
                </form>
            </div>
        </div>
    <script src="home.js"></script>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST")
{   
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
?>