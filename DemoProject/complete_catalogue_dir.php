<?php
include 'C:\xampp\htdocs\Project\MyCode\DemoProject\header_dir.php';
?>

<script src="http://localhost:8012/Project/MyCode/Scripts/download_control_table.js"></script> 
<!-- This is to download the table to xls -->

<div class="control_buttom_new">
<a href="complete_catalogue_select.php">
  <img src="http://localhost:8012/Project/MyCode/images/back_button.png" style="float:left;height:40px;" title="Back to Group and Process Selection"> 
</a>                              

<br><br><!--The back button takes the user back to the business area selection page-->


<div class="control_buttom_right_excel" >  
  <button id="btnExport" onclick="fnExcel_Catalogue();" class="button" style="height:70px;margin-top:5px;margin-right:10px;color:rgb(255, 248, 248)">EXPORT TABLE TO XLS</button>
</div> <!-- close div for control_buttom_right_excel -->   

<?php include 'connect_db.php'; ?>
<br><br>

<?php
    $business_group=$_SESSION['buss_group'];
    // Extract all rows of data corresponding to the business group selected by the user.
    $query_login_bgroup= "select * from demo_project_controls where b_group='$business_group'";
    $result_login_bgroup= mysqli_query($connect,$query_login_bgroup);
?>

<center><br><br><br>
     
     <table border="2" width="99%" align="center" id="Reports_Catalogue">
        <tr>
        <th>Control Id</th>
        <th>Process</th>
        <th>Sub-Process</th>
        <th>Risk</th>
        <th>Control Point </th>
        <th>Objective </th>
        <th>Control Activity</th>
        <th>Evidence</th>
        <th>Owner</th>
        <th>Frequency</th>
        </tr>

      <?php
        
        while($row=$result_login_bgroup->fetch_assoc())
        {
          $codeid=$row["codeid"];
          $process=$row["process"];
          $subprocess=$row["subprocess"];
          $risk=$row["risk"];
          $pointname=$row["pointname"];
          $objective=$row["objective"];
          $control_activity=$row["control_activity"];
          $evidence=$row["evidence"];
          $owner=$row["owner"];
          $freq=$row["freq"];
          $twiceayear_startdate=$row["twice_start"];
          $twiceayear_enddate=$row["twice_end"];
          $Yearly_date=$row["Yearly_select"];
          echo "<tr>";
             echo "<td valign='top';align='justify'>" .$codeid."</td>";
             echo "<td valign='top';align='justify'>" .$process."</td>";
             echo "<td valign='top';align='justify'>" .$subprocess."</td>";
             echo "<td valign='top';align='justify'>" .$risk."</td>";
             echo "<td valign='top';align='justify'>" .$pointname."</td>";
             echo "<td valign='top';align='justify'>" .$objective."</td>";
             echo "<td valign='top';align='justify'>" .$control_activity."</td>";
             echo "<td valign='top';align='justify'>" .$evidence."</td>";
             echo "<td valign='top';align='justify'>" .$owner."</td>";
             echo "<td valign='top';align='justify'>" .$freq." ".$twiceayear_startdate." ".$twiceayear_enddate." ".$Yearly_date."</td>";
        }
          echo "<iframe id='txtArea1' style='display:none'></iframe>";
          echo "</tr>";
        
      ?>

     </table>
    <br><br><br>

    <?php
    include 'C:\xampp\htdocs\Project\MyCode\DemoProject\footer.php';
    ?>
