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
  <form method="post" action="addstudent.php" enctype="multipart/form-data">
    <table align="center" border="1" style="width:70%; margin-top:40px;">
      <tr>
        <th>Full Name</th>
        <td><input type="text" name="name" placeholder="Enter Full Name" required></td>
      </tr>
      <tr>
        <th>City</th>
        <td><input type="text" name="city" placeholder="Enter City" required></td>
      </tr>
      <tr>
        <th>Parents Contact No</th>
        <td><input type="text" name="pcon" placeholder="Enter the Contact Number of Parents" required></td>
      </tr>
      <tr>
        <th>Standerd</th>
        <td><input type="number" name="std" placeholder="Enter Standerd" required></td>
      </tr>
      <tr>
        <th>E-mail</th>
        <td><input type="text" name="email" placeholder="Enter E-mail" required></td>
      </tr>
      <tr>
        <th>Image</th>
        <td><input type="file" name="simg" required></td>
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
    $name = isset($_POST['name']) ? $_POST['name'] : "";
    $city = isset($_POST['city']) ? $_POST['city'] : "";
    $pcon = isset($_POST['pcon']) ? $_POST['pcon'] : "";
    $std = isset($_POST['std']) ? $_POST['std'] : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $imagename = $_FILES['simg']['name'];
    $tempname = $_FILES['simg']['tmp_name'];
    move_uploaded_file($tempname, "../dataimg/$imagename");
    $qry = "INSERT INTO student(id, name, city, pcont, standerd, email, image) VALUES(NULL, '$name', '$city', '$pcon', '$std', '$email', '$imagename')";
    $qry1 = "INSERT INTO marks(id, name) VALUES (NULL, '$name')";
    $qry2 = "INSERT INTO studentlogin(id, password) VALUES (NULL, '');";
    $run = mysqli_query($con, $qry);
    $run1 = mysqli_query($con, $qry1);
    $run2 = mysqli_query($con, $qry2);
    if($run && $run1 && $run2) {
      ?>
      <script>
        alert('Data inserted succesfully');
      </script>
      <?php
    }
  }

?>
