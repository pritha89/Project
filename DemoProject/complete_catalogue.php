<?php
include 'C:\xampp\htdocs\Project\MyCode\HTML\header_user.php';
?>

<script src="http://localhost:8012/Project/MyCode/Scripts/download_control_table.js"></script> <!-- This is to download the table to xls -->

<div class="control_buttom_new">
 <div class="control_buttom_right_excel" >  
    <button id="btnExport" onclick="fnExcel_Catalogue();" class="button" style="height:70px;margin-top:5px;margin-right:10px;color:rgb(255, 248, 248)">EXPORT TABLE TO XLS</button>
 </div> <!-- close div for control_buttom_right_excel -->   

<?php include 'connect_db.php'; ?>
<br><br>

<?php

 $username=$_SESSION['username'];
 $query_login_buser= "select * from table1 where buser_email='$username'";
 $result_login_buser= mysqli_query($connect,$query_login_buser);
 while($row=$result_login_buser->fetch_assoc())
 {
    $business_group=$row['b_group'];
 }
   // Extract all rows of data corresponding to the business group to which the user belongs.
 $query_login_bgroup= "select * from controls where b_group='$business_group'";
 $result_login_bgroup= mysqli_query($connect,$query_login_bgroup);?>
 <center>
 <br><br><br>
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
                $twice_start=$row["twice_start"];
                $twice_end=$row["twice_end"];
                $Yearly_select=$row["Yearly_select"];
                
                echo "<tr>";
                   echo "<td valign='top';align='justify' >" .$codeid."</td>";
                   echo "<td valign='top';align='justify' >" .$process."</td>";
                   echo "<td valign='top';align='justify' >" .$subprocess."</td>";
                   echo "<td valign='top';align='justify'>" .$risk."</td>";
                   echo "<td valign='top';align='justify'>" .$pointname."</td>";
                   echo "<td valign='top';align='justify'>" .$objective."</td>";
                   echo "<td valign='top';align='justify'>" .$control_activity."</td>";
                   echo "<td valign='top';align='justify'>" .$evidence."</td>";
                   echo "<td valign='top';align='justify'>" .$owner."</td>";
                   echo "<td valign='top';align='justify'>" .$row["freq"]." ".$row["twice_start"]." ".$row["twice_end"]." ".$row["Yearly_select"]."</td>";
            }
               echo "<iframe id='txtArea1' style='display:none'></iframe>";
               echo "</tr>";
        ?>
     </table>

     <?php
        include 'C:\xampp\htdocs\Project\MyCode\HTML\footer.php';
     ?>

