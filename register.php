
<?php
@ob_start();
session_start();
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Register</title>
      <link rel="stylesheet" href="style/style_login.css"> 
</head>

<body>
<form action="register.php" method="post">
  <div class="box">
      <h1 id="logintoregister">Register</h1>
      <div class="group">      
      <input class="inputMaterial" name="ten" type="text" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Tên</label>
      </div>
      <div class="group">      
      <input class="inputMaterial" name="chucvu" type="text" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Chức vụ</label>
      </div>
    <div class="group">      
      <input class="inputMaterial" name="txtuser" type="text" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Username</label>
      </div>
	  <div class="group">      
      <input class="inputMaterial" name="txtpass" type="password" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Password</label>
      </div>
	  <div class="group">      
      <input class="inputMaterial" name="txtconfirmpass" type="password" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Confirm Password</label>
      </div>
      <div class="group">      
      <input class="inputMaterial" name="bomon" type="text" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Bộ Môn</label>
      </div>
      <div class="group">      
      <input class="inputMaterial" name="vien" type="text" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Viện</label>
      </div>
      <div class="group">      
      <input class="inputMaterial" name="truong" type="text" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Trường</label>
      </div>
      <div class="group">      
      <input class="inputMaterial" name="diachi" type="text" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Địa chỉ</label>
      </div>
	  <div class="group">      
      <input class="inputMaterial" name="email" type="text" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Email</label>
      </div>
  <button id="buttonlogintoregister" type="submit" name="register">Register</button>
</form>
      <p id="plogintoregister">Have an account?</p><p id="textchange"><a href="login.php">Login</a></p>
    </div>
</form>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>

</body>
</html>
<?php
if(isset($_POST['register'])){
  if($_POST['txtpass'] != $_POST['txtconfirmpass']){
    echo "<h3 align='center' style='color:#ff0000;'>Confirm pass error!!!</h3>";
  }else{
    $ten=trim($_POST['ten']);
    $chucvu=trim($_POST['chucvu']);
    $bomon=trim($_POST['bomon']);
    $vien=trim($_POST['vien']);
    $truong=trim($_POST['truong']);
    $email=trim($_POST['email']);
    $diachi=trim($_POST['diachi']);
    $u=trim($_POST['txtuser']);
    $p=trim($_POST['txtpass']);
    $m=trim($_POST['txtconfirmpass']);
  }
  if($u && $p){
    //require("../includes/config.php");
    $link = mysqli_connect("localhost", "root", "", "web");
    $check_user = "select * from tt_gv where username='$u'";
    $result_check = mysqli_query($link, $check_user);
    $rowcount=mysqli_num_rows($result_check);
    if ($rowcount != 0){
      echo "<h3 align='center' style='color:#ff0000;'>Account already in use!!!</h3>";
    }else{
      $query="insert into tt_gv (ten, chucvu, username, password, bomon, vien, truong, email, diachi) values ('$ten','$chucvu','$u', '$p', '$bomon', '$vien', '$truong', '$email', '$diachi')";
    $result = mysqli_query($link, $query);
    if($result){
      echo "<h3 align='center' style='color:#ff0000;'>Successfully!!!</h3>";
      mysqli_free_result($result);
      mysqli_close($link);
      exit();
    }else{
      echo "<h3 align='center' style='color:#ff0000;'>Error. Please try again!</h3>";
    }
    }
  }
}
// $link = mysqli_connect("localhost", "root", "1234", "SINHVIEN");

// /* check connection */
// if (mysqli_connect_errno()) {
//     printf("Connect failed: %s\n", mysqli_connect_error());
//     exit();
// }

// $query = "SELECT * FROM ACCOUNT ";
// $result = mysqli_query($link, $query);

// /* numeric array */
// //$row = mysqli_fetch_array($result, MYSQLI_NUM);
// //printf ("%s (%s)\n", $row[0], $row[1]);

// /* associative array */
// $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
// printf ("%s (%s)\n", $row["USERNAME"], $row["PASSWORD"]);

// /* associative and numeric array */
// //$row = mysqli_fetch_array($result, MYSQLI_BOTH);
// //printf ("%s (%s)\n", $row[0], $row["USERNAME"]);

// /* free result set */
// mysqli_free_result($result);

// /* close connection */
// mysqli_close($link);
?>