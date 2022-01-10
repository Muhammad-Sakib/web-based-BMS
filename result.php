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
    <title>Search Result</title>
    <link rel="stylesheet" href="result.css">
</head>
<body>
    <!--background Animation-->
    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>
    <nav>
        <a href="home.php" class="link-default"><img src="icon/logo.png" alt="logo" style = "height: 100%; float: left;">
        <h2 class="nav-logo">Blood Management System</h2></a>
        <div class="nav-div">             
            <ul class="nav-list">
                <li><h1 id="header-text"></h1></li>
            </ul>
        </div>
    </nav>
</body>
</html>
<?php
    session_start();
     $blood_group=$_SESSION['bg'];
     $results= mysqli_query($conn, "SELECT * FROM donor_list WHERE BloodGroup = '$blood_group'");
    if (mysqli_num_rows($results)) {
        echo "<script>document.getElementById('header-text').innerHTML='(".mysqli_num_rows($results).")blood donor founds...'</script>";
            foreach ($results as $row) {
            echo "<div class='card'>
                    <img src='icon/pro_pic.jpg' alt='profile picture' class='pro-img'>
                    <h3>". $row['Name'] ."<span>(". $row['BloodGroup'] .")</span></h3>
                    <h4>". $row['Address'] ."</h4>
                    <form method='POST'>
                    <input type='submit' id='view-btn' name='".$row['Username']."'value='View Profile'>
                    </form>
                    </div>";
        }
    } 
    else { 
        echo "<script>document.getElementById('header-text').innerHTML='No blood donor found...'</script>"; 
    }
?>
<?php
 if($_SERVER['REQUEST_METHOD'] == "POST"){

            foreach($results as $name)
            {
                if(isset($_POST[$name['Username']]))
                {
                    $_SESSION['clicked_user'] = $name['Username'];
                    $URL="search_profile.php";
                    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
                    exit();
                }
            }
 }
?>