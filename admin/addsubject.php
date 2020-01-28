<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<?php
  session_start();
  if(isset($_SESSION['uid'])) {

  }
  else {
    header('location: ../login.php');
  }
?>
<?php
  include('header.php');
  include('titlehead.php');
?>
<form method="post" action="addsubject.php" enctype="multipart/form-data">
  <table align="center" border="1" style="width:70%; margin-top:40px;">
    <tr>
      <th>Subject Id</th>
      <td><input type="text" name="subid" placeholder="Enter Id" required></td>
    </tr>
    <tr>
      <th>Subject Name</th>
      <td><input type="text" name="subname" placeholder="Enter Subject Name" required></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="submit" value="Submit"></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
  if(isset($_POST['submit'])) {
    include('../dbcon.php');
    $subid = isset($_POST['subid']) ? $_POST['subid'] : "";
    $subname = isset($_POST['subname']) ? $_POST['subname'] : "";
    $qry = "INSERT INTO subjects(subid, subname) VALUES ('$subid', '$subname')";
    $run = mysqli_query($con, $qry);
    if($run) {
      ?>
      <script>
        alert('Data inserted succesfully');
      </script>
      <?php
    }
  }
?>
