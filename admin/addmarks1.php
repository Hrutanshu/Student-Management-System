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
  include('../dbcon.php');
  $sid = $_GET['sid'];
  $sql = "SELECT id, name FROM marks WHERE id = '$sid'";
  $run = mysqli_query($con, $sql);
  $data = mysqli_fetch_assoc($run);
  $id =  $data['id'];
  $name =  $data['name'];
  ?>
  <br><br><font color="red">
  <table align="center">
    <tr>
      <th align="left">Student Id:</th>
      <td><?php echo $id; ?></td>
    </tr>
    <tr>
      <th align="left">Student Name:</th>
      <td><?php echo $name; ?></td>
    </tr>
  </table>
</font>
  <form method="post" action="addmarks1.php" enctype="multipart/form-data">
  <table align="center" border="1" style="margin-top:40px;">
    <tr>
      <th>Maths</th>
      <td><input type="number" name="maths" placeholder="Enter marks" required></td>
    </tr>
    <tr>
      <th>Physics</th>
      <td><input type="number" name="physics" placeholder="Enter marks" required></td>
    </tr>
    <tr>
      <th>Chemistry</th>
      <td><input type="number" name="chemistry" placeholder="Enter marks" required></td>
    </tr>
    <tr>
      <th>English</th>
      <td><input type="number" name="english" placeholder="Enter marks" required></td>
    </tr>
    <tr>
      <th>Hindi</th>
      <td><input type="number" name="hindi" placeholder="Enter marks" required></td>
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
    $maths = isset($_POST['maths']) ? $_POST['maths'] : "";
    $physics = isset($_POST['physics']) ? $_POST['physics'] : "";
    $chemistry = isset($_POST['chemistry']) ? $_POST['chemistry'] : "";
    $english = isset($_POST['english']) ? $_POST['english'] : "";
    $hindi = isset($_POST['hindi']) ? $_POST['hindi'] : "";
    $qry = "UPDATE marks SET maths = '$maths', physics = '$physics', chemistry = '$chemistry', english = '$english', hindi = '$hindi';";
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
