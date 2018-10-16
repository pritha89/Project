<?php
include 'C:\xampp\htdocs\Project\MyCode\DemoProject\header_dir.php';
?>


<br>
<?php include 'connect_db.php';  //connects to database ?>
<br><br>
<div class="new_control_form_now">
<br><br>

<center><b><h1><p style="color:black;">&nbsp;&nbsp;&nbsp;Business Specific Open Controls<p></h2></b></center>

<form name="f_OpenControls" method="POST">
<center>
<table border="2"><tr><td>
<select name="taskOption" style="width: 300px;height: 50px;">
<option value="Select your choice" disabled selected > Select your Business Area</option>
<?php 
// sql code corresponding to result1 can be found in connect_db.php. Control Directors can choose to view any business area. 
while($row1=mysqli_fetch_array($result1)):;
?>
<option value="<?php echo $row1[1]; ?>">
<?php echo $row1[1]; ?></option>
<?php endwhile; ?>
</select></td></tr>
<tr><td>

<select name="taskOption1" style="width: 300px;height: 50px;">
<option value="Select your choice" disabled selected> Select your Process</option>
<?php 
// sql code corresponding to result3 can be found in connect_db.php. user selects the process name here.
while($row2=mysqli_fetch_array($result3)):;?>
<option value="<?php echo $row2[1]; ?>">
<?php echo $row2[1]; ?></option>
<?php endwhile; ?>
</select></td></tr>
<tr>
<td align="center">
<input type="submit" name="submit" class="button" value="GO" onclick="fn_openControls();" style="height:40px;"></a></td></tr></table>

    
    </form><br>
    <font color=white size="5">** Please fill in BOTH Business Group and Process </font>
    
<script type="text/javascript">
function fn_openControls()
  
 <?php
 {
  $_SESSION['buss_group']=$_POST['taskOption']; //business area to which the user selected from above dropdown
  $_SESSION['process']=$_POST['taskOption1'];  //The process name which user selected from the above dropdown list
  $usernm= $_SESSION['username']; // User's email id 
  header("location:view_open_controls_report_dir.php"); // user is redirected to show details of untested controls and open controls(controls which the testers have not completed)
 }
?>

</script>

<?php
    include 'C:\xampp\htdocs\Project\MyCode\DemoProject\footer.php';
?>
