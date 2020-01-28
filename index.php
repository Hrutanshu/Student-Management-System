<?php
  session_start();
  if(isset($_SESSION['uid'])) {
    header('location:function.php');
  }
?>
<!DOCTYPE HTML>
<html lang="en_US">
<head>
  <meta charset="utf-8">
  <title>Student Management System</title>
</head>
<body>
  <h3 align = "right" style = "margin-right:20px;"><a href = "login.php">Admin Login</a></h5>
  <font color="red"><h1 align = "center">Bavarian International School</h1></font>
  <center><img src="img/logo.png" height="250px" width="30%"></center>
  <br><h1 align="center">Student Login</h1>
  <form action="index.php" method = "post">
    <table align="center">
      <tr>
          <td>Id</td>
          <td><input type="text" name="id" required></td>
      </tr>
      <tr>
          <td>Password</td>
          <td><input type="password" name="pass" required></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input type="submit" name="login" value="Login"></td>
      </tr>
    </table>
</form>
</body>
</html>
<?php
include('dbcon.php');
if(isset($_POST['login'])) {
  $id = $_POST['id'];
  $password = $_POST['pass'];
  $qry = "SELECT * FROM studentlogin WHERE id = '$id' AND password = '$password'";
  $run = mysqli_query($con, $qry);
  $row = mysqli_num_rows($run);
  if($row < 1) {
    ?>
    <script>
      alert('username or password not match !!');
      window.open('index.php', '_self');
    </script>
    <?php
  }
  else {
    $data = mysqli_fetch_assoc($run);
    $id = $data['id'];
    $_SESSION['uid'] = $id;
    header('location:function.php');
  }
}

?>
