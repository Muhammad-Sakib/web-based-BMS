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
    <title>Name</title>
    <link rel="stylesheet" href="profile.css">
</head>
<body>
    <!--background Animation-->
    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>
    <nav>
        <a href="home.php" class="link-default"><img src="icon/logo.png" alt="logo" style = "height: 100%; float: left;">
        <h2 class="nav-logo">Blood Management System</h2></a>
        <form>
            <input type="text" name="search" placeholder="Search blood...">
        </form> 
        <div class="nav-div">             
            <ul class="nav-list">
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
    
</body>
</html>

<?php
    session_start();
     $logged_user = $_SESSION['log_user'];
    $results= mysqli_query($conn, "SELECT * FROM donor_list WHERE Username = '$logged_user'");
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
                    <form action=''>
                        <label class='img-lbl' for='img'></label>
                        <input type='file' id='img' name='img' accept='image/'>
                        <input type='submit' id='upload-btn' value='Upload'>
                    </form>
                    <h3>".$res['Name']."<span>(".$res['BloodGroup'].")</span></h3>
                    <h5>".$res['Address']."</h5>
                    <input type='submit' id='call-btn' value='Edit Profile'>
                </div>
                <div class='right'>
                    <div class='detail detail1'><h3>Name:<span>".$res['Name']."</span></h3></div>
                    <div class='detail'><h3>Donation ability:<span>".$msg."</span></h3></div>
                    <div class='detail'><h3>Blood Group:<span>".$res['BloodGroup']."</span></h3></div>
                    <div class='detail'><h3>Age:<span>".$res['Age']."</span></h3></div>
                    <div class='detail'><h3>Gender:<span>".$res['Gender']."</span></h3></div>
                    <div class='detail'><h3>Phone:<span>".$res['Phone']."</span></h3></div>
                    <div class='detail'><h3>Address:<span>".$res['Address']."</span></h3></div>
                </div>";
    }
?>
