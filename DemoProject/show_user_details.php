<?php
include 'C:\xampp\htdocs\Project\MyCode\DemoProject\header_dir.php';
?>

<?php
include 'connect_db.php'; // connects to database
?>
<br><br>

<div class="control_buttom_new"><br>
<a href="maintain.php"><img src="http://localhost:8012/Project/MyCode/images/back_button.png" style="float:left;height:40px;margin-left:20px;" title="Back to Maintain Operation Selection"> </a>                              
                                  
<br> 
<center><br><br><br>

<table border='1' style='width:90%'>
  <tr>
      <th colspan="6" align="center" height="40px">BUSINESS USER DETAILS</th>
  </tr>
 
  <tr height='35x'>
      <th>USER ID</th>
      <th>FIRST NAME</th>
      <th>LAST NAME</th>
      <th>USER PASSWORD</th>
      <th>USER EMAIL ID</th>
      <th>BUSINESS GROUP</th>
  </tr>
  
  <tr>
    <?php
        while($row=$result9->fetch_assoc()) // sql query corresponding to result9 can be found in connect_db.php. It contains business user details.
        {
          echo "<td valign='top';align='justify' height='30px' >" .$row['id']."</td>";
          echo "<td valign='top';align='justify' height='30px' >" .$row['buser_name']."</td>";
          echo "<td valign='top';align='justify' height='30px'>" .$row['buser_lname']."</td>";
          echo "<td valign='top';align='justify' height='30px'>" .$row['buser_pass']."</td>";
          echo "<td valign='top';align='justify' height='30px'>" .$row['buser_email']."</td>";
          echo "<td valign='top';align='justify' height='30px'>" .$row['b_group']."</td>";
          echo "</tr>";
        }
        echo "</table>";
    ?>
    
    <br><br><br>

    <center><br><br><br>
    
    <table border='1' style='width:90%'>
    
      <tr>
          <th colspan="6" align="center" height="40px">CONTROL DIRECTORS DETAILS</th>
      </tr>
               
      <tr height='35x'>
          <th>USER ID</th>
          <th>FIRST NAME</th>
          <th>LAST NAME</th>
          <th>USER PASSWORD</th>
          <th>USER EMAIL ID</th>
          <th>BUSINESS GROUP</th>
      </tr>
      
      <tr>
        <?php
          while($row=$result14->fetch_assoc()) // sql query corresponding to result14 can be found in connect_db.php. It contains control director details.
          {
            echo "<td valign='top';align='justify' height='30px' >" .$row['id']."</td>";
            echo "<td valign='top';align='justify' height='30px' >" .$row['duser_name']."</td>";
            echo "<td valign='top';align='justify' height='30px'>" .$row['duser_lname']."</td>";
            echo "<td valign='top';align='justify' height='30px'>" .$row['duser_pass']."</td>";
            echo "<td valign='top';align='justify' height='30px'>" .$row['duser_email']."</td>";
            echo "<td valign='top';align='justify' height='30px'>" .$row['b_group']."</td>";
            echo "</tr>";
          }
            echo "</table>";
        ?>
        
<?php
    include 'C:\xampp\htdocs\Project\MyCode\HTML\footer.php';
?>
