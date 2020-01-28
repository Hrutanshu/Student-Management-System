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
        include('dbcon.php');
        include('admin/header.php');
        $id = $_SESSION['uid'];
        $sql = "SELECT * FROM student WHERE id = '$id';";
        $sql1 = "SELECT * FROM marks where id = '$id';";
        $run = mysqli_query($con, $sql);
        $run1 = mysqli_query($con, $sql1);
        if(mysqli_num_rows($run) > 0 && mysqli_num_rows($run1) > 0) {
          $data = mysqli_fetch_assoc($run);
          $data1 = mysqli_fetch_assoc($run1);
          ?>
          <div>
          <h4><a href="logout.php" style="float:right; margin-right:30px; color:white; font-size:20px;">Logout</a></h4>
          </div>
          <br>
          <center><h1>HI <?php echo $data['name']; ?></h1></center>
          <table border="1" style="width:50%; margin-top:20px;" align="center">
            <tr>
              <th colspan="3">Student Detail</th>
            </tr>
            <tr>
              <td rowspan="5" align="center"><img src="dataimg/<?php echo $data['image']; ?>" style="max-height:150px; max-width:120px;" /></td>
              <th align="left">Name</th>
              <td><?php echo $data['name']; ?></td>
            </tr>
            <tr>
              <th align="left">Standerd</th>
              <td><?php echo $data['standerd']; ?></td>
            </tr>
            <tr>
              <th align="left">Parents Contact No</th>
              <td><?php echo $data['pcont']; ?></td>
            </tr>
            <tr>
              <th align="left">City</th>
              <td><?php echo $data['city']; ?></td>
            </tr>
            <tr>
              <th align="left">E-mail</th>
              <td><?php echo $data['email']; ?></td>
            </tr>
          </table>
          <br>
          <table border="1" style="margin-top:20px;" align="center">
            <tr>
              <th colspan="2">Student Marks</th>
            </tr>
            <tr>
              <th align="left">Maths</th>
              <td><?php echo $data1['maths']; ?></td>
            </tr>
            <tr>
              <th align="left">Physics</th>
              <td><?php echo $data1['physics']; ?></td>
            </tr>
            <tr>
              <th align="left">Chemistry</th>
              <td><?php echo $data1['chemistry']; ?></td>
            </tr>
            <tr>
              <th align="left">english</th>
              <td><?php echo $data1['english']; ?></td>
            </tr>
            <tr>
              <th align="left">Hindi</th>
              <td><?php echo $data1['hindi']; ?></td>
            </tr>
          </table>
          <br>
          <center><b><font color="red">
          <?php
          $sum = $data1['maths'] + $data1['physics'] + $data1['chemistry'] + $data1['english'] + $data1['hindi'];
          $percent = $sum / 5;
          echo nl2br("Total marks obtained ".$sum." out of 500\n");
          echo "Percentage Scored = ".$percent."%";
          ?>
        </font>
        </center>
          <br>
          <br>
          <a class ="link" href="updatestudentdetails.php?sid=<?php echo $data['id']; ?>">Edit Details</a>
          <a class = "link" href="changestudentpassword.php?sid=<?php echo $data['id']; ?>" style="float:right;">Change Password</a>
          <?php
        }
        else {
          echo "<script>alert('No students found.');</script>";
        }
?>
