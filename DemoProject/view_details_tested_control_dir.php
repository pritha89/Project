<?php
include 'C:\xampp\htdocs\Project\MyCode\DemoProject\header_dir.php';
?>

<script src="http://localhost:8012/Project/MyCode/Scripts/download_control_table.js"></script> <!-- Code to download table to xls -->
<link href="http://localhost:8012/Project/MyCode/DemoProject/readmore.css" rel="stylesheet" /> <!--This is to include the file that holds the styling for the 'Read More' checkbox option in the page -->

<?php
    $business_group=$_GET['id'];
    $process=$_SESSION['process'];
    $effi_control=$_SESSION['effi_control'];
?>

<?php
    include 'connect_db.php'; //connect to database
?>


<div class="control_buttom_new">
<div class="control_buttom_right_excel" >  
<button id="btnExport" onclick="fnExcelReport_details();" class="button" style="height:70px;margin-top:5px;margin-right:10px;color:rgb(255, 248, 248)">EXPORT TABLE TO XLS</button>
</div> <!-- close div for control_buttom_right_excel -->   
<a href="view_summary_tested_control_dir.php"><img src="http://localhost:8012/Project/MyCode/images/back_button.png" style="float:left;height:40px;margin-left:20px;" title="Back to Group and Process Selection"> </a>                              
                                
<!-- Select all data under the business area and process grouped by codeid. 
Also if there are two data with same codeid, you pick the one with the latest execution date. -->   

<?php
    $res1=mysqli_query($connect,"SELECT * 
    FROM control_execute 
    WHERE (b_group LIKE '$business_group') and (process='$process')  and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute where b_group LIKE '$business_group' GROUP BY codeid));");
?>

<!-- The report details given below comes from the control_execute table. 
These are the data given by the user while testing a control. -->

 <table border="1" width="97%" id="Report_details">
 <tr>
    <td colspan="16" align="center" style="color:red;size:14;height:50px;"><b>REPORT DETAILS</b></td>
 </tr>
 
 <tr>   
    <th>Control Id</th>
 
    <th>Business Area</th>
 
    <th>Control Tester</th>
 
    <th>Samples Selected</th>
 
    <th>Perfect Samples</th>

    <th>Perfect Samples % </th>

    <th>Comment on Sampling</th>
 
    <th>Findings</th>
 
    <th>Efficiency</th>
 
    <th>Result</th>
 
    <th><font color="red" size="4" align="right">**</font>Reason for Failure</th>
 
    <th style='width:150px'><font color="red" size="4" align="right">**</font>Person(s) Responsible for Corrective Actions</th>
 
    <th style="width:100px;">Action</th>
 
    <th><font color="red" size="4" align="right">**</font>Expected Completion Date</th>
 
    <th><font color="red" size="4" align="right">**</font>Actual Date of Completion</th>
 
    <th><font color="red" size="4" align="right">**</font>Comments after Completion</th>

 </tr>


 <?php

  while($row1=$res1->fetch_assoc() )
  {   
        
    $perfect_sample_percent=($row1['sample_selected']/$row1['sample_size'])*100;
    echo "<tr><td valign='top';align='justify'>".$row1['codeid']."</td>";
    echo "<td valign='top';align='justify'>".$row1['b_group']."</td>";
    echo "<td valign='top';align='justify'>".$row1['user_email']."</td>";
    echo "<td valign='top';align='justify'>".$row1['sample_size']."</td>";
    echo "<td valign='top';align='justify'>".$row1['sample_selected']."</td>";
    echo "<td valign='top';align='justify'>".round($perfect_sample_percent,0)."</td>";
    echo "<td valign='top';align='justify'><input id='more' type='checkbox'>Read more..<div id='content'>".$row1['sample_comment']."</td>";
    echo "<td valign='top';align='justify' style='width:220px'><input id='more' type='checkbox'>Read more..<div id='content'>".$row1['finding']."</td>";
    echo "<td valign='top';align='justify'>".$row1['efficiency']."</td>";
    echo "<td valign='top';align='justify'>".$row1['result']."</td>";
    echo "<td valign='top';align='justify'>".$row1['fail_reason']."</td>";
    echo "<td style='width:150px' valign='top';align='justify'>".$row1['person_name']."<br>".$row1['person_name_one']."<br>".$row1['person_name_two']."</td>";
    echo "<td valign='top';align='justify'><input id='more' type='checkbox'>Read more..<div id='content'>".$row1['actions']."</td>";
    echo "<td valign='top';align='justify'>".$row1['Dateend']."</td>";
    echo "<td valign='top';align='justify'>".$row1['real_date']."</td>";
    echo "<td valign='top';align='justify'>".$row1['comments']."</td>";
    
 }
    ?>
</tr>

<?php
// The following session values are extracted from the previous page 'report_two_new.php'

    $fail_reason_inadeqt_design=$_SESSION['fail_inade']; // total no. of controls whose value in the fail_reason attribute is 'Inadequate/Inappropriate Discipline' 
    $fail_reason_lack_of_process=$_SESSION['fail_lack'];  // total no. of controls whose value in the fail_reason attribute is 'Lack of Process in Area'
    $fail_reason_unimplemented_process=$_SESSION['fail_unimplement']; // total no. of controls whose value in the fail_reason attribute is 'Unimplemented Process'
    $fail_control=$_SESSION['fail_control']; // the total no. of controls that failed amongst the tested controls in the specified business area and process group.
    $efficiency_incorr_design=$_SESSION['effi_incorr_control']; //total no. of controls whose value in the efficiency attribute is 'Incorrect Design of Control'
    $efficiency_appro_design=$_SESSION['effi_appro_control']; // total no. of controls whose value in the efficiency attribute is 'Appropriate Design of Control'

if($fail_control!=0)
{
    $fail_lack_of_process_percentage=(($fail_reason_lack_of_process/$fail_control)*100); //percentage of controls whose reason for failure was 'Lack of Process in area'
    $fail_inadeqt_design_percentage=(($fail_reason_inadeqt_design/$fail_control)*100); // percentage of controls whose reason for failure was 'Inadequate/Inappropriate Discipline'
    $fail_unimplemented_process_percentage=(($fail_reason_unimplemented_process/$fail_control)*100);  // percentage of controls whose reason for failure was 'Unimplemented Process'
      // total no. of controls whose value in the efficiency attribute is not null 

?>
<br><br><br><br>
<!-- A separate table is made to show which factor contributed how much to the failure of the controls. This is shown in percentage. -->
<tr>
    <td colspan="16" align="center" style="color:red;size:14;height:50px;"><b>REASONS FOR FAILURE</b></td>
</tr>
<tr>
    <td colspan="8" align="center" style="height:40px;"><font size="3"><b>REASON</b></font></td>
    <td colspan="8" align="center" style="height:40px;"><font size="3"><b>PERCENTAGE(%)</b></font></td>
</tr>
<tr>
    <td colspan="8" align="left" style="height:40px;">Inadequate/Inappropriate Discipline</td>
    <td colspan="8" align="center"><?php echo round($fail_inadeqt_design_percentage,0); ?></td></tr>
<tr>
    <td colspan="8" align="left" style="height:40px;">Lack of Process in area</td>
    <td colspan="8" align="center"><?php echo round($fail_lack_of_process_percentage,0); ?></td>
</tr>
<tr>
    <td colspan="8" align="left" style="height:40px;">Unimplemented Process</td>
    <td colspan="8" align="center"><?php echo round($fail_unimplemented_process_percentage,0); ?></td>
</tr>


<?php 
}  // End of fail table details
?>


<?php if($effi_control!=0)
{
    $percentage_effi_appro_design=(($efficiency_appro_design/$effi_control)*100); // percentage of controls with appropriate design of control
    $percentage_effi_incorr_design=(($efficiency_incorr_design/$effi_control)*100); // percentage of controls with incorrect design of control
?>
<br><br><br><br>
<!-- A separate table is made to show how many controls have efficient designs and how many has incorrect design. This is shown in percentage. -->
<tr>
    <td colspan="16" align="center" style="color:red;size:14;height:50px;"><b>EFFICIENCY OF CONTROL</b></td>
</tr>
<tr>
    <td colspan="8" align="center" style="height:40px;"><font size="3"><b>CONTROL NAME</b></font></td>
    <td colspan="8" align="center" style="height:40px;"><font size="3"><b>PERCENTAGE(%)</b></font></td>
</tr>
<tr>
    <td colspan="8" align="left" style="height:40px;">Appropriate Design of Control</td>
    <td colspan="8" align="center"><?php echo round($percentage_effi_appro_design,0); ?></td></tr>
<tr>
    <td colspan="8" align="left" style="height:40px;">Incorrect Design of Control</td>
    <td colspan="8" align="center"><?php echo round($percentage_effi_incorr_design,0); ?></td>
</tr>

<iframe id="txtArea1" style="display:none"></iframe>
</table>
<?php
}   // End of Efficiency table details
?> 
<br><br><font color="red" size="4" align="right">All ** marked fields are valid for only in case of Failed Controls.</font>

</div>
</div>
<br>
<br>

<?php
    include 'C:\xampp\htdocs\Project\MyCode\DemoProject\footer.php';
?>
