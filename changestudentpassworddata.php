<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<?php
include('dbcon.php');
$old = isset($_POST['pass1']) ? $_POST['pass1'] : "";
$new = isset($_POST['pass2']) ? $_POST['pass2'] : "";
$cnew = isset($_POST['pass3']) ? $_POST['pass3'] : "";
$id = isset($_POST['sid']) ? $_POST['sid'] : "";
$qry = "SELECT * FROM studentlogin WHERE id = '$id';";
$run = mysqli_query($con, $qry);
if($run) {
    $data = mysqli_fetch_assoc($run);
    if($old == $data['password']) {
      if($new == $cnew) {
        $qry1 = "UPDATE studentlogin SET password = '$new' WHERE id = '$id';";
        $run1 = mysqli_query($con, $qry1);
        if($run1) {
          ?>
          <script>
            alert('Data Updated succesfully');
            window.open('changestudentpassword.php?sid=<?php echo $id; ?>','_self');
          </script>
          <?php
        }
        else {
          ?>
          <script>
            alert('some unexpected error occured !!');
            window.open('changestudentpassword.php', '_self');
          </script>
          <?php
        }
      }
      else {
        ?>
        <script>
          alert('the passwords do not match !!');
          window.open('changestudentpassword.php', '_self');
        </script>
        <?php
      }
     }
    else {
      ?>
      <script>
        alert('incorrect password !!');
        window.open('changestudentpassword.php', '_self');
      </script>
      <?php
    }
}
else {
  ?>
  <script>
    alert('some error occured !!');
    window.open('function.php', '_self');
  </script>
  <?php
}
