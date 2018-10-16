<?php
include 'C:\xampp\htdocs\Project\MyCode\DemoProject\header_dir.php';
?>

<script src="http://localhost:8012/Project/MyCode/Scripts/download_control_table.js"></script>
<body>

<div class="control_buttom_new">
<div class="control_buttom_right_excel" >  
<button id="btnExport" onclick="fnExcelReport();" class="button" style="height:70px;margin-top:5px;margin-right:10px;color:rgb(255, 248, 248)">EXPORT TABLE TO XLS</button>
</div> <!-- close div for control_buttom_right_excel -->   
    
<a href="select_tested_control_reports_dir.php"><img src="http://localhost:8012/Project/MyCode/images/back_button.png" style="float:left;height:40px;margin-left:20px;" title="Back to Group and Process Selection"> </a>                              
                                      
<br><br><br>
                                           
<?php    
     $business_area=$_SESSION['buss_group']; // Business Area is saved in a variable
     $process=$_SESSION['process'];   // Process name is saved in a variable
     include 'connect_db.php';         // connects to the database
?>
      
<?php
 // The total no of controls are calculated from the table 'controls' under the selected business area and process name.
  $res2=mysqli_query($connect,"select * from demo_project_controls where (b_group='$business_area') and (process='$process')  GROUP BY codeid");
  $total_ctrls=0; // initialization of variable
  while($row2=$res2->fetch_assoc())
  {   
     $total_ctrls++; // Counts the total controls in the selected business area and process, present at the table 'controls'
  }

/* Latest tested control are chosen from 'control_execute' table under the selected business area and process. The controls are grouped by codeid.
 Suppose the control RE200 is tested 5 times in the last five month. The result of the latest test(most recent) of this RE200 is chosen amongst the five. */

$res1=mysqli_query($connect,"SELECT `execution_date`, `codeid`,`result`,`sample_size`,`sample_selected`
FROM control_execute 
WHERE (b_group LIKE '$business_area') and (process='$process') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute where b_group LIKE '$business_area' GROUP BY codeid));");

     $tested_ctrls=0; 
     $sample_chosen=0;
     $perfect_samples=0;

while($row1=$res1->fetch_assoc() )
{   
     $tested_ctrls++; // Counts the total controls under consideration
     $sample_chosen=$sample_chosen+$row1['sample_size']; // adds up the values in the column 'sample_size' of the selected controls
     $perfect_samples=$perfect_samples+$row1['sample_selected']; // adds up the values in the column 'sample_selected' of the selected controls
}


// Latest tested 'PASSED' control are chosen from 'control_execute' table under the selected business area and process. The controls are grouped by codeid.
$res1=mysqli_query($connect,"SELECT *  
FROM control_execute 
WHERE (b_group LIKE '$business_area') and (process='$process') and (result='pass') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute where b_group LIKE '$business_area' GROUP BY codeid));");
$pass_control=0; //initialization of variable.
while($row1=$res1->fetch_assoc() )
{   
     $pass_control++;  // counts the total no of controls that passed amongst the tested controls in the specified business area and process group.  
}


// Latest tested 'FAILED' control are chosen from 'control_execute' table under the selected business area and process. The controls are grouped by codeid.
$res1=mysqli_query($connect,"SELECT *  
FROM control_execute 
WHERE (b_group LIKE '$business_area') and (process='$process') and (result='fail') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute where b_group LIKE '$business_area' GROUP BY codeid));");
$fail_control=0; //initialization of variable.
while($row1=$res1->fetch_assoc() )
{   
     $fail_control++;   // counts the total no of controls that failed amongst the tested controls in the specified business area and process group. 
}
$_SESSION['fail_control']=$fail_control; // The summed up value is stored in a session.


// Latest tested control are chosen from 'control_execute' table under the selected business area and process where the value of the 'efficiency' attribute is 'Appropriate Design of Control'. The controls are grouped by codeid.
$res1=mysqli_query($connect,"SELECT *  
FROM control_execute 
WHERE (b_group LIKE '$business_area') and (process='$process') and (efficiency='Appropriate Design of Control') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute where b_group LIKE '$business_area' GROUP BY codeid));");
$efficiency_appro_design=0; //initialization of variable.
while($row1=$res1->fetch_assoc() )
{   
     $efficiency_appro_design++; // Counts total controls whose value in the efficiency attribute is 'Appropriate Design of Control'    
}
$_SESSION['effi_appro_control']=$efficiency_appro_design; // The summed up value is stored in a session.


// Latest tested control are chosen from 'control_execute' table under the selected business area and process where the value of the 'efficiency' attribute is 'Incorrect Design of Control'. The controls are grouped by codeid.
$res1=mysqli_query($connect,"SELECT *  
FROM control_execute 
WHERE (b_group LIKE '$business_area') and (process='$process') and (efficiency='Incorrect Design of Control') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute where b_group LIKE '$business_area' GROUP BY codeid));");
$efficiency_incorr_design=0; //initialization of variable.
while($row1=$res1->fetch_assoc() )
{   
     $efficiency_incorr_design++;    // Counts total controls whose value in the efficiency attribute is 'Incorrect Design of Control'  
}
$_SESSION['effi_incorr_control']=$efficiency_incorr_design; // The summed up value is stored in a session.


// Latest tested control are chosen from 'control_execute' table under the selected business area and process where the value of the 'fail_reason' attribute is 'Inadequate/Inappropriate Discipline'. The controls are grouped by codeid.
$res2=mysqli_query($connect,"SELECT *  
FROM control_execute 
WHERE (b_group LIKE '$business_area') and (process='$process') and (fail_reason='Inadequate/Inappropriate Discipline') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute where b_group LIKE '$business_area' GROUP BY codeid));");
$fail_reason_inadeqt_design=0; //initialization of variable.
while($row2=$res2->fetch_assoc() )
{   
     $fail_reason_inadeqt_design++;     // Counts total controls whose value in the fail_reason attribute is 'Inadequate/Inappropriate Discipline' 
}
$_SESSION['fail_inade']=$fail_reason_inadeqt_design;  // The summed up value is stored in a session.


// Latest tested control are chosen from 'control_execute' table under the selected business area and process where the value of the 'fail_reason' attribute is 'Lack of Process in Area'. The controls are grouped by codeid.
$res2=mysqli_query($connect,"SELECT *  
FROM control_execute 
WHERE (b_group LIKE '$business_area') and (process='$process') and (fail_reason='Lack of Process in Area') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute where b_group LIKE '$business_area' GROUP BY codeid));");
$fail_reason_lack_of_process=0; //initialization of variable.
while($row2=$res2->fetch_assoc() )
{   
     $fail_reason_lack_of_process++;      // Counts total controls whose value in the fail_reason attribute is 'Lack of Process in Area' 
}
$_SESSION['fail_lack']=$fail_reason_lack_of_process; // The summed up value is stored in a session.



// Latest tested control are chosen from 'control_execute' table under the selected business area and process where the value of the 'efficiency' attribute is not null. The controls are grouped by codeid.
$res1=mysqli_query($connect,"SELECT *  
FROM control_execute 
WHERE (b_group LIKE '$business_area') and (process='$process') and (efficiency!='') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute where b_group LIKE '$business_area' GROUP BY codeid));");
$effi_control=0; //initialization of variable.
while($row1=$res1->fetch_assoc() )
{   
     $effi_control++;       // Counts total controls whose value in the efficiency attribute is not null 
}
 $_SESSION['effi_control']=$effi_control; // The summed up value is stored in a session.


// Latest tested control are chosen from 'control_execute' table under the selected business area and process where the value of the 'fail_reason' attribute is 'Unimplemented Process'. The controls are grouped by codeid.
$res2=mysqli_query($connect,"SELECT *  
FROM control_execute 
WHERE (b_group LIKE '$business_area') and (process='$process') and (fail_reason='Unimplemented Process') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute where b_group LIKE '$business_area' GROUP BY codeid));");
$fail_reason_unimplemented_process=0; //initialization of variable.
while($row2=$res2->fetch_assoc() )
{   
     $fail_reason_unimplemented_process++;   // Counts total controls whose value in the fail_reason attribute is 'Unimplemented Process' 
}
$_SESSION['fail_unimplement']=$fail_reason_unimplemented_process; // The summed up value is stored in a session.

/* If there are no controls present in the table 'controls' under the selected business area and process or if none of the controls in the selected area have been tested,
 the user is redirected to the page where is asked to re make the choices of business area or process. */

// If  $total_ctrls=0, means there are no controls under this selection in the table 'controls'
// If $tested_ctrls==0, means there are no controls under this selection that has been tested yet. So there are no results for this selection in the 'control_execute' table.

 if( $total_ctrls==0|| $tested_ctrls==0) 
{
     echo "<script type='text/javascript'>alert('No controls executed yet!')</script>";
     echo "<meta http-equiv='refresh' content='0;url=select_tested_control_reports_dir.php'>"; 
}
else
{
     $execution_score=(($tested_ctrls/ $total_ctrls)*100); // percentage of the tested controls to the total controls present
     $execution_pass=(($pass_control/$tested_ctrls)*100);  // percentage of passed controls amongst the tested controls
     $not_executed_controls=( $total_ctrls-$tested_ctrls); // No of not tested controls in the controls table
     $sample_percentage=(($perfect_samples/$sample_chosen)*100); // percentage of perfect samples amongst the selected samples in the chosen business area and process group
     $failed_controls=$tested_ctrls-$pass_control;
}
?>

<br><br>

<table border="2" width="90%" align="center" id="Reports">
<tr height="50px;">
  <th></th>
  <th>BUSINESS AREA</th>
  <th>PROCESS</th>
  <th>TOTAL NO OF CONTROLS</th>
  <th>NO OF CONTROLS TESTED</th>
  <th width="130px;">TESTING %</th>
  <th width="130px;">CONTROL SUCCESS %</th>
  <th>PERFECT SAMPLES %</th>
  <th>PASSED TESTS</th>
  <th>FAILED TESTS</th>
  <th>CONTROLS NOT TESTED</th>
</tr>
<tr>
  <td align="center"><a href="view_details_tested_control_dir.php?id=<?php echo $business_area;?>">
     <input type="submit" name="check" value="DETAILS" class="button" style="height:80px;color:rgb(255, 248, 248);width:80px;"></a>
  </td>

<?php

  echo "<td align='center'>$business_area</td>";
  echo "<td align='center'>$process </td>";
  echo "<td align='center'> $total_ctrls</td>";  //Total no of controls in'controls' table
  echo "<td align='center'>$tested_ctrls</td>";  //Total no of control in'control_execute' table

  if($execution_score<=60)
     echo "<td align='center' style='background-color:red'>".round($execution_score,0)."</td>"; //% of controls executed out of total controls 
  else if ($execution_score>=61 && $execution_score<=90)
     echo "<td align='center' style='background-color:yellow'>".round($execution_score,0)."</td>"; //% of controls executed out of total controls 
  else if ($execution_score>=91)
     echo "<td align='center' style='background-color:green'>".round($execution_score,0)."</td>"; //% of controls executed out of total controls 
  if($execution_pass<=49)
     echo "<td align='center' style='background-color:red' >".round($execution_pass,0)."</td>";  //% of controls that passed after execution
  else if($execution_pass>=50 && $execution_pass<=79)
     echo "<td align='center' style='background-color:yellow' >".round($execution_pass,0)."</td>";  //% of controls that passed after execution
  else if($execution_pass>=80)
     echo "<td align='center' style='background-color:green' >".round($execution_pass,0)."</td>";  //% of controls that passed after execution
  if($sample_percentage<=49)
     echo "<td align='center' style='background-color:red' >".round($sample_percentage,0)."</td>";  //% of successful samples
  else if($sample_percentage>=50 && $sample_percentage<=79)
     echo "<td align='center' style='background-color:yellow' >".round($sample_percentage,0)."</td>";  //% of successful samples
  else if($sample_percentage>=80)
     echo "<td align='center' style='background-color:green' >".round($sample_percentage,0)."</td>";  //% of successful samples

  echo "<td align='center'>".$pass_control."</td>";  //No of controls that passed
  echo "<td align='center'>".$failed_controls."</td>";  //No of controls executed out of total controls
  echo "<td align='center' style='background-color:red'>".$not_executed_controls."</td>";  //No of controls not executed out of total controls


?>
</tr>

<br><br><br>

<tr>
     <td colspan="11" align="center" style="color:red;size:14;height:50px;"><b>REASONS FOR FAILURE</b></td>
</tr>
<tr>
     <td colspan="6" align="center" style="height:40px;"><font size="3"><b>REASON</b></font></td>
     <td colspan="5" align="center" style="height:40px;"><font size="3"><b>NUMBER OF CASES</b></font></td>
</tr>
<tr>
     <td colspan="6" align="left" style="height:40px;">Inadequate/Inappropriate Discipline</td>
     <td colspan="5" align="center"><?php echo round($fail_reason_inadeqt_design,0); // Displays the numeric value of the no of cases where the raason for failure was 'Inadequate/Inappropriate Discipline' ?></td></tr>
<tr>
     <td colspan="6" align="left" style="height:40px;">Lack of Process in area</td>
     <td colspan="5" align="center"><?php echo round($fail_reason_lack_of_process,0); // Displays the numeric value of the no of cases where the raason for failure was 'lack of Process in Area'?></td>
</tr>
<tr>
     <td colspan="6" align="left" style="height:40px;">Unimplemented Process</td>
     <td colspan="5" align="center"><?php echo round($fail_reason_unimplemented_process,0); // Displays the numeric value of the no of cases where the raason for failure was 'unimplemented process'?></td>
</tr>

<br><br><br><br>
<tr>
     <td colspan="11" align="center" style="color:red;size:14;height:50px;"><b>EFFICIENCY OF CONTROL</b></td>
</tr>
<tr>
     <td colspan="6" align="center" style="height:40px;"><font size="3"><b>CONTROL NAME</b></font></td>
     <td colspan="5" align="center" style="height:40px;"><font size="3"><b>NUMBER OF CASES</b></font></td>
</tr>
<tr>
     <td colspan="6" align="left" style="height:40px;">Appropriate Design of Control</td>
     <td colspan="5" align="center"><?php echo round($efficiency_appro_design,0); // Displays the numeric value of the no of cases where the efficiency of the control was considered 'Appropriate' ?></td></tr>
<tr>
     <td colspan="6" align="left" style="height:40px;">Incorrect Design of Control</td>
     <td colspan="5" align="center"><?php echo round($efficiency_incorr_design,0); // Displays the numeric value of the no of cases where the efficiency of the control was considered 'Incorrect'?></td>
</tr>
<iframe id="txtArea1" style="display:none"></iframe>
</table>

<?php
    include 'C:\xampp\htdocs\Project\MyCode\DemoProject\footer.php';
?>
