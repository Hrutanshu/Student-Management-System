<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<?php
$id = $_REQUEST['sid'];
include('../dbcon.php');
$qry = "DELETE FROM student WHERE id = '$id';";
$qry1 = "DELETE FROM marks WHERE id = '$id';";
$run = mysqli_query($con, $qry);
$run1 = mysqli_query($con, $qry1);
if($run && $run1) {
  ?>
  <script>
    alert('Data Deleted succesfully');
    window.open('deletestudent.php','_self');
  </script>
  <?php
}
?>
