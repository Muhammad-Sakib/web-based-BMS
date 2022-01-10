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
    <title>Donor Profile</title>
    <link rel="stylesheet" href="search_profile.css?v=<?php echo time(); ?>">
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
                <li><a href="home.php">Home</a></li>
                <li><a href="signup.php">Be a Donor</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="about.php">About</a></li>
            </ul>
        </div>
    </nav>
</body>
</html>

<?php
    session_start();
     $show_user = $_SESSION['clicked_user'];
    $results= mysqli_query($conn, "SELECT * FROM donor_list WHERE Username = '$show_user'");
    foreach($results as $res){
        $days_left = 60-$res['LastDonation'];
        $msg = "";
        if($days_left>0)
        {
            $msg = " Unavailable(".$days_left."days left)";
            // echo "<script>document.getElementById('check').style.color = 'red';</script>"; 
        }
        else{
            $msg = " Available";
        }
        echo "<div class='left'>
                    <img src='icon/pro_pic.jpg' alt='profile picture' id='pic' style='height: 170px; width: 170px; margin: 20px auto 10px auto;'>
                    <h3>".$res['Name']."<span>(".$res['BloodGroup'].")</span></h3>
                    <h4 style='color: rgb(136, 136, 136); margin: 5px 0px 10px 0px;'>".$res['Address']."</h4>
                    <button type='submit' id='call-btn'>Call</button>
                </div>
                <div class='right'>
                    <div class='detail detail1'><h3>Name:<span style='color: green;'>".$res['Name']."</span></h3></div>
                    <div class='detail'><h3>Donation ability:<span style='color: green;' id='check'>".$msg."</h3></div>
                    <div class='detail'><h3>Blood Group:<span style='color: green;'>".$res['BloodGroup']."</span></h3></div>
                    <div class='detail'><h3>Age:<span style='color: green;'>".$res['Age']."</span></h3></div>
                    <div class='detail'><h3>Gender:<span style='color: green;'>".$res['Gender']."</span></h3></div>
                    <div class='detail'><h3>Phone:<span style='color: green;'>".$res['Phone']."</span></h3></div>
                    <div class='detail'><h3>Address:<span style='color: green;'>".$res['Address']."</span></h3></div>
                </div>";
    }
?>
