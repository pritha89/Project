<?php
include 'C:\xampp\htdocs\Project\MyCode\DemoProject\header_dir.php';
?>

<body>
<br>

<?php 
// Includes the page which holds code for database connectivity  
include 'connect_db.php'; 
?>  
<br><br>
<div class="new_control_form_now">
<br><br>
<center><b><h1><p style="color:black;">Process Specific Control Catalogue<p></h1></b></center>
<form name="test" method="POST">
<center><br>
<table border="2">
<tr>
<td>
<select name="taskOption" style="width: 300px;height: 50px;"> 
<option value="Select your choice" disabled selected > Select your Business Area</option>
<?php 
// sql query corresponding to result1 can be found in connect_db.php
while($row1=mysqli_fetch_array($result1)):;?>
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
// sql query corresponding to result3 can be found in connect_db.php
while($row2=mysqli_fetch_array($result3)):;
?>
<option value="<?php echo $row2[1]; ?>">
<?php echo $row2[1]; ?></option>
<?php endwhile; ?>
</select></td></tr>
<tr>
<td align="center">
<input type="submit" name="submit" class="button" value="GO" onclick="hello();" style="height:40px;"></a></td></tr></table>

    </form><br><br><br>
    <font color="white" size="5">** Please fill in BOTH Business Group and Process </font>
    <?php

include 'C:\xampp\htdocs\Project\MyCode\DemoProject\footer.php';

?>

<script type="text/javascript">

function hello()
// On function call the process name and business area is stored in session and is matched with table 'controls' in the database to display data in next page
  
 <?php
 {
  $_SESSION['buss_group']=$_POST['taskOption']; // saves business area in session
  $_SESSION['process']=$_POST['taskOption1']; // saves process name in session
  
  $usernm= $_SESSION['username'];
  
  header("location:control_view_dir.php");   // user redirected to view the results of his selection
    
 }
    ?>

</script>

<?php
    include 'C:\xampp\htdocs\Project\MyCode\DemoProject\footer.php';
?>
