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
?>
  <div class="admintitle" align="center">
    <h4><a href="logout.php" style="float:right; margin-right:30px; color:white; font-size:20px;">Logout</a></h4>
    <h1>Welcome to Admin Dashboard </h1>
  </div>
  <div class="dashboard" style="width:90%; height:50%;">
    <table style="width:50%; height:50%;" align = "center">
      <tr>
        <td>1.</td><td><a href="addstudent.php">Insert Student Details</a></td>
      </tr>
      <tr>
        <td>2.</td><td><a href="updatestudent.php">Update Student Details</a></td>
      </tr>
      <tr>
        <td>3.</td><td><a href="deletestudent.php">Delete Student Details</a></td>
      </tr>
      <tr>
        <td>4.</td><td><a href="addsubject.php">Add Subjects</a></td>
      </tr>
      <tr>
        <td>5.</td><td><a href="addmarks.php">Add Marks</a></td>
      </tr>
    </table>
</body>
</html>
