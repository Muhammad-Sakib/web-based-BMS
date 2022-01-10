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
    <title>Become a Blood Donor</title>
    <link rel="stylesheet" href="signup.css">
    <script src="./signup.js"></script>
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
                    <li><a href="signup.php" class="active">Be a Donor</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="about.php">About</a></li>
                </ul>
            </div>
        </nav>
        <div class="reg-sec">
            <span id="invalid-input"></span>
            <div class="slogan-sec">
                <img src="icon/blood-drop.png" alt="blood icon">
                <h1>Become a Hero</h1>
                <h1>DONATE BLOOD.</h1>
            </div>
            <form class="login-form" method="POST" id="nameform">
                <h1>Become a Blood Hero</h1>
                <div id="login-f-div">
                    <div class="reg-f-left">
                        <input type="text" name="name" maxlength="20" placeholder="Name" class="check" id="name">
                        <input type="text" name="phone" maxlength="14" placeholder="Phone Number" class="check">
                        <input type="text" name="age" maxlength="2" placeholder="Your Age" class="check">
                        <input type="text" name="bloodG" minlength="2" maxlength="3" placeholder="Blood group Ex. O+" class="check">
                    </div>
                    <div class="reg-f-right">
                        <label class="lbl1" for="sex">Sex:</label>
                        <input type="radio" name="gender" value="male" id="gender_male">Male
                        <input type="radio" name="gender" value="female" id="gender_female">Female
                        
                        <input type="text" name="address" maxlength="25" placeholder="Your address" class="check">
        
                        <label class="lbl2" for="date">Last Blood Donation:</label><br>
                        <input type="text" name="lastDon" minlength="2" maxlength="3" placeholder="Ex. '0' days ago" class="check">
                    </div>
                </div>
                <div id="user-name">
                    <input type="text" name="uname" minlength="5" maxlength="20" placeholder="Username" class="check2">
                    <input type="password" name="Pword" minlength="6" placeholder="Password" class="check2">
                </div>
                <div>
                    <button type="button" id="reg-btn" onclick="nxt()" form="nameform">Next</button>
                    <span id="alert-text"></span>
                </div>
            </form>
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
          header("location: result.php?");
          exit;
      }
      else{
          echo "<script>document.getElementById('invalid-input').innerHTML='*Input valid blood group'</script>";
      }
    }
    else{
      $n = $_POST['name'];
      $ph = $_POST['phone'];
      $age = $_POST['age'];
      $blood = $_POST['bloodG'];
      $sex = $_POST['gender'];
      $addr = $_POST['address'];
      $lastD = $_POST['lastDon'];
      $username = $_POST['uname'];
      $pwd = $_POST['Pword'];
      $select = mysqli_query($conn, "SELECT * FROM donor_list WHERE Username = '".$_POST['uname']."'");
      if(mysqli_num_rows($select)) {
          echo "<script>document.getElementById('alert-text').innerHTML='*Try another username'</script>";
      }
      else {
        if ($n!="" && $ph!="" && $age!="" && $blood!="" && $sex!="" && $addr!="" && $lastD!="" && $username!="" && $pwd!="")
        {
          $query= "insert into donor_list values ('$n','$ph','$age','$blood','$sex','$addr','$lastD','$username','$pwd')";
          $data=mysqli_query($conn,$query);
          if($data)
          {
            header("location: login.php?message=Registration Complete!");
            exit;
          }
        }
        else 
        {
          echo "Data inserted failed";
        }
      } 
    }

}
?>

