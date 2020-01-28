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
<form method="post" action="addmarks.php" enctype="multipart/form-data">
  <table align="center" border="1" style="width:70%; margin-top:40px;">
    <tr>
      <th>Enter Standard</th>
      <td><input type="number" name="standerd" placeholder="Enter Standard" required="required" /></td>
      <th>Enter Student Name</th>
      <td><input type="text" name="stuname" placeholder="Enter Student Name" required="required" /></td>
      <td colspan="2"><input type = "submit" name="submit" value="Search" /></td>
    </tr>
  </form>
  </table>
  <table align="center" width="80%" border="1" style="margin-top:10px;">
    <tr>
      <th>Id</th>
      <th>Image</th>
      <th>Name</th>
      <th>Parents Contact No</th>
      <th>E-mail</th>
      <th>Edit</th>
    </tr>
<?php
    if(isset($_POST['submit'])) {
        include('../dbcon.php');
        $standerd = $_POST['standerd'];
        $name = $_POST['stuname'];
        $qry = "SELECT * FROM student WHERE standerd = '$standerd' AND name LIKE '%$name%'";
        $run = mysqli_query($con, $qry);
        if(mysqli_num_rows($run) < 1) {
          echo "No records Found";
        }
        else {
          while($data = mysqli_fetch_assoc($run)) {
            ?>
            <tr>
              <td><?php echo $data['id']; ?></td>
              <td><img src="../dataimg/<?php echo $data['image']; ?>" style="max-width:100px;" /></td>
              <td><?php echo $data['name']; ?></td>
              <td><?php echo $data['pcont']; ?></td>
              <td><?php echo $data['email']; ?></td>
              <td><a href="addmarks1.php?sid=<?php echo $data['id']; ?> ">Add Marks</a></td>
            </tr>
            <?php
          }
        }
      }
?>
