<?php

include 'C:\xampp\htdocs\Project\MyCode\DemoProject\header_dir.php';

?>

<body>
<?php include 'connect_db.php'; ?><!-- Includes the page which holds code for database connectivity  -->

<br><br>
<div class="new_control_form_now">
<br><br>
<br><br>
<center><b><h1><p style="color:black;">Businesss Specific Control Catalogue<p></h2></b></center>
 <form name="test" method="POST">
<center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<table border="2"><tr><td>
<select name="taskOption" style="width: 300px;height: 50px;"> <!--Select business group from user input to match with database -->
<option value="Select your choice" disabled selected > Select your Business Area</option>
<?php while($row1=mysqli_fetch_array($result1)):;?>
<option value="<?php echo $row1[1]; ?>">
<?php echo $row1[1]; ?></option>
<?php endwhile; ?>
</select></td></tr>
  <tr>
  <td align="center">
  <input type="submit" name="submit" class="button" value="GO" onclick="hello();" style="height:40px;"></a></td></tr></table>
    </form><br><br><br>
    <font color=red>** Please fill Business Group </font>
    <?php

include 'C:\xampp\htdocs\Project\MyCode\DemoProject\footer.php';

?>
<script type="text/javascript">
function hello()

  
 <?php
 {
   //Only the business group is used as parameter to display data in the next page as the complete catalogue will contain data irrespective of the process area. 
  $_SESSION['buss_group']=$_POST['taskOption'];
  header("location:complete_catalogue_dir.php");
 }
 ?>

<?php
    include 'C:\xampp\htdocs\Project\MyCode\DemoProject\footer.php';
?>
