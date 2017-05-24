<?php
session_start();
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
      <link rel="stylesheet" href="style/style_login.css">
</head>

<body>
<form action="login.php" method="post">
  <div class="box">
      <h1 id="logintoregister">Login</h1>
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
  <button id="buttonlogintoregister" type="submit" name="login">Login</button>
</form>
      <p id="plogintoregister">Don't have an account?</p><p><a href="register.php"> Register</a></p>
    </div>
</form>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>

</body>
</html>
<?php
if(isset($_POST['login'])){
  if($_POST['txtuser'] == NULL or $_POST['txtpass'] == NULL){
    echo "<h3 align='center' style='color:#ff0000;'>Please enter your username and pasword!!!</h3>";
  }else{
    $u=$_POST['txtuser'];
    $p=$_POST['txtpass'];
  }
  if($u && $p){
    //require("../includes/config.php");
    $link = mysqli_connect("localhost", "root", "", "web");
    $query="select * from tt_gv where username='$u' and password='$p'";
    $result = mysqli_query($link, $query);
    if(mysqli_num_rows($result) == 0){
      echo "<h3 align='center' style='color:#ff0000;'>Wrong username or password. Please try again!</h3>";
    }else{
      $_SESSION['check'] = 'ok';
      $_SESSION['username'] = $u;
      $_SESSION['timeout'] = time();
      header("location:index.php");
      mysqli_free_result($result);
      mysqli_close($link);
      exit();
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