<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<?php
  session_start();
  if(isset($_SESSION['uid'])) {

  }
  else {
    header('location:index.php');
  }
?>
<?php
  include('admin/header.php');
  include('header1.php');
  include('dbcon.php');
  $sid = $_GET['sid'];
  $sql = "SELECT * FROM studentlogin WHERE id = '$sid';";
  $run = mysqli_query($con, $sql);
  $data = mysqli_fetch_assoc($run);
?>
<br>
<br>
<form method="post" action="changestudentpassworddata.php" enctype="multipart/form-data">
  <table align="center" border ="1" style="margin-top:40px;">
    <tr>
      <th align="left">Enter Old Password</th>
      <td><input type="password" name="pass1" required></td>
    </tr>
    <tr>
      <th ="center">Enter New Password</th>
      <td><input type="password" name="pass2" required></td>
    </tr>
    <tr>
      <th align="center">Confirm Password</th>
      <td><input type="password" name="pass3" required></td>
    </tr>
    <tr>
      <th colspan="2" align="center">
        <input type="hidden" name="sid" value="<?php echo $data['id']; ?>" />
        <input type="submit" name="submit" value="Submit">
      </th>
    </tr>
  </table>
</form>
