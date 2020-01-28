<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<?php
include('dbcon.php');
$name = isset($_POST['name']) ? $_POST['name'] : "";
$city = isset($_POST['city']) ? $_POST['city'] : "";
$pcon = isset($_POST['pcon']) ? $_POST['pcon'] : "";
$std = isset($_POST['std']) ? $_POST['std'] : "";
$id = isset($_POST['sid']) ? $_POST['sid'] : "";
$email = isset($_POST['email']) ? $_POST['email'] : "";
$imagename = $_FILES['simg']['name'];
$tempname = $_FILES['simg']['tmp_name'];
move_uploaded_file($tempname, "../dataimg/$imagename");
$qry = "UPDATE student SET name = '$name', city = '$city', pcont = '$pcon', standerd = '$std', email = '$email', image = '$imagename' WHERE id = '$id';";
$run = mysqli_query($con, $qry);
if($run) {
  ?>
  <script>
    alert('Data Updated succesfully');
    window.open('updatestudentdetails.php?sid=<?php echo $id; ?>','_self');
  </script>
  <?php
}
?>
