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
  include('header.php');
  include('dbcon.php');
  $sid = $_GET['sid'];
  $sql = "SELECT * FROM student WHERE id = '$sid'";
  $run = mysqli_query($con, $sql);
  $data = mysqli_fetch_assoc($run);
?>
<br>
<br>
<form method="post" action="updatestudentdata.php" enctype="multipart/form-data">
  <table align="center" border="1" style="width:70%; margin-top:40px;">
    <tr>
      <th>Full Name</th>
      <td><input type="text" name="name" value = <?php echo $data['name']; ?> required></td>
    </tr>
    <tr>
      <th>City</th>
      <td><input type="text" name="city" value = <?php echo $data['city']; ?> required></td>
    </tr>
    <tr>
      <th>Parents Contact No</th>
      <td><input type="text" name="pcon" value = <?php echo $data['pcont']; ?> required></td>
    </tr>
    <tr>
      <th>Standerd</th>
      <td><input type="number" name="std" value = <?php echo $data['standerd']; ?> required></td>
    </tr>
    <tr>
      <th>E-mail</th>
      <td><input type="text" name="email" value = <?php echo $data['email']; ?> required></td>
    </tr>
    <tr>
      <th>Image</th>
      <td><input type="file" name="simg" required></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
        <input type="hidden" name="sid" value="<?php echo $data['id']; ?>" />
        <input type="submit" name="submit" value="Submit"></td>
    </tr>
  </table>
</form>
