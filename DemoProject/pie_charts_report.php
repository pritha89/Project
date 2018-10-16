<?php
include 'connect_db.php';
include 'header_user.php';
?>
<script src="http://localhost:8012/Project/MyCode/Scripts/download_control_table.js"></script> <!-- Code to download table to xls -->

<?php
  $business_group=$_SESSION['buss_group'];
?>

<div class="control_buttom_right_excel" >  
<button id="btnExport" onclick="fnExcelReport_details();" class="button" style="height:70px;margin-top:5px;margin-right:10px;color:rgb(255, 248, 248)">EXPORT TABLE TO XLS</button>
</div> <!-- close div for control_buttom_right_excel -->   

<?php
// The sql query finds all passed controls amongst the tested controls, in the business area $business_group from control_execute table.
$res1=mysqli_query($connect,"SELECT *  
FROM control_execute 
WHERE (result='pass') and(b_group='$business_group') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute GROUP BY codeid));");
$pass_control=0;
while($row1=$res1->fetch_assoc() )
{    
   $pass_control++; // sum of passed controls in board
}


$res1=mysqli_query($connect,"SELECT *  
FROM control_execute 
WHERE (result='fail') and(b_group='$business_group') and (fail_reason='Unimplemented Process') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute GROUP BY codeid));");
$fail_reason_unimplmnt_process=0;
while($row1=$res1->fetch_assoc() )
{    
  $fail_reason_unimplmnt_process++; // sum of unimplemented processes in board
}


$res1=mysqli_query($connect,"SELECT *  
FROM control_execute 
WHERE (result='fail') and(b_group='$business_group') and (fail_reason='Inadequate/Inappropriate Discipline') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute GROUP BY codeid));");
$fail_reason_inappro_discipline=0;
while($row1=$res1->fetch_assoc() )
{    
  $fail_reason_inappro_discipline++; // sum of Inadequate/Inappropriate Discipline processes in board
}


$res1=mysqli_query($connect,"SELECT *  
FROM control_execute 
WHERE (result='fail') and(b_group='$business_group') and (fail_reason='Lack of Process in Area') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute GROUP BY codeid));");
$fail_reason_lackof_process=0;
while($row1=$res1->fetch_assoc() )
{    
  $fail_reason_lackof_process++; // sum of Lack of Process in Area processes in board
}

?>

<?php
// The sql query finds controls amongst the tested controls, belonging to business area 'Fibre' from control_execute table.
  $res1=mysqli_query($connect,"SELECT *  FROM control_execute WHERE (b_group='$business_group') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute GROUP BY codeid ));");
  $control_tested=0;
  while($row1=$res1->fetch_assoc() )
  {    
    $control_tested++;   //sum of total tested controls in fibre
  }
  
?>

<?php
$failed_control=($control_tested-$pass_control);
?>


<?php
if($control_tested!="")
{
   $successful_tests=(($pass_control/$control_tested)*100);
   
   $failure_tests=(($failed_control/$control_tested)*100);
   
   $fail_percentage_unimplmnt_process=(($fail_reason_unimplmnt_process/$failed_control)*100);
   
   $fail_percentage_inappro_discipline=(($fail_reason_inappro_discipline/$failed_control)*100);
   
   $fail_percentage_lackof_process=(($fail_reason_lackof_process/$failed_control)*100);
  
}
?>


<html>
<head>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    google.charts.setOnLoadCallback(drawChart_failure_reasons);

    function drawChart() { 

// The success percentage for each business area calculated above is now represented in a pie chart using google charts
 var data = google.visualization.arrayToDataTable([
 ['b_group','success',],
 <?php

   
   if($control_tested!="")
   {
      echo "['Success percentage of Tested  Controls',".round($successful_tests,0).",],";
      echo "['Failure percentage of Tested  Controls',".round($failure_tests,0).",],";
   }
  
 ?>

 ]);

 var options = 
 {
 title: 'BUSINESS AREA REPORTS FOR LAST TESTED CONTROLS(IN PERCENTAGE)',
 slices: {0: {color: 'rgb(83, 212, 50)'}, 1:{color: 'rgb(231, 45, 20)'}},
 is3D: true
 };

 var chart = new google.visualization.PieChart(document.getElementById('piechart'));
 chart.draw(data, options);
 }


 function drawChart_failure_reasons() { 

// The success percentage for each business area calculated above is now represented in a pie chart using google charts
 var data = google.visualization.arrayToDataTable([
 ['b_group','success',],
 <?php

   
   if($control_tested!="")
   {
      echo "['Failure due to Unimplemented Process of Tested Controls',".round($fail_percentage_unimplmnt_process,0).",],";
      echo "['Failure due to Lack Of Process of Tested Controls',".round($fail_percentage_lackof_process,0).",],";
      echo "['Failure due to Inappropriate Disciple of Tested Controls',".round($fail_percentage_inappro_discipline,0).",],";

   }
  
 ?>

 ]);

 var options = 
 {
 title: 'FAILURE REASONS FOR LAST TESTED CONTROLS(IN PERCENTAGE)',
 slices: {0: {color: 'rgb(253, 224, 57)'}, 1:{color: 'rgb(253, 136, 57)'}, 2:{color: 'rgb(197, 87, 188)'}},
 is3D: true
 };

 var chart = new google.visualization.PieChart(document.getElementById('piechart_failure'));
 chart.draw(data, options);
 }

 </script>
 
  <br><br>
<table>
<tr><td><div id="piechart" style="width: 800px; height: 500px;" id="Report_details"></div></td>
      <td><div id="piechart_failure" style="width: 800px; height: 500px;"></div></td>
  </tr>
  <iframe id="txtArea1" style="display:none"></iframe>
  </table>
    <br><br><br><br>
