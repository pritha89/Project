<?php
include 'C:\xampp\htdocs\Project\MyCode\DemoProject\header_dir.php';
?>

<body>
<br>
<?php include 'connect_db.php'; // connects to database?>
<br><br>
<div class="new_control_form_now">
<br><br>

<center><b><h1><p style="color:black;">Business Specific Report<p></h2></b></center>


<form name="f_select_tested_controls" method="POST">
<center>
<br>
<table border="2">
<tr>
<td>
<select name="taskOption" style="width: 300px;height: 50px;">
  <option value="Select your choice" disabled selected> Select your Business Area</option>
  <?php 
  //The sql query of result1 can be found in connect_db.php.
  // result1 contains the list of business areas.
  while($row1=mysqli_fetch_array($result1)):; //
  ?>
  <option value="<?php echo $row1[1]; ?>">
  <?php echo $row1[1]; ?></option>
  <?php endwhile; ?>
</select>
</td>
</tr>

<tr>
<td>
<select name="taskOption1" style="width: 300px;height: 50px;">
  <option value="Select your choice" disabled selected> Select your Process</option>
  <?php 
  //The sql query of result3 can be found in connect_db.php.
  // result1 contains the list of process names.
  while($row2=mysqli_fetch_array($result3)):;
  ?>
  <option value="<?php echo $row2[1]; ?>">
  <?php echo $row2[1]; ?></option>
  <?php endwhile; ?>
</select>
</td>
</tr>

<tr>
<td colspan="2" align="center">
<input type="submit" name="submit" class="button" value="GO" onclick="fn_selectTestedControls();" style="height:40px;"></a></td></tr></table>
</form><br><br><br>
<font color=white size="5">** Please fill in BOTH Business Group and Process </font>
    
    


<script type="text/javascript">
function fn_selectTestedControls()
 <?php
 {
    // taskOption:contains name of business area.
    // taskOption1:contains names of processes.
    $_SESSION['buss_group']=$_POST['taskOption'];
    $_SESSION['process']=$_POST['taskOption1'];
    $usernm=$_SESSION['username'];
    // user is redirected to show the mathematical representaion of result(controls tested) in the provided business area and process.
    header("location:view_summary_tested_control_dir.php");
 }
 ?>

</script>

<?php
    include 'C:\xampp\htdocs\Project\MyCode\DemoProject\footer.php';
?>
