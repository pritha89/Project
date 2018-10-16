
<?php
include 'header_dir.php';
?>

<?php
   include "connect_db.php"; // conencts to database
?>

<?php
// The sql query finds all passed controls amongst the tested controls, in the business area 'Home Decor' from control_execute table.
  $res1=mysqli_query($connect,"SELECT *  
  FROM control_execute 
  WHERE (result='pass') and(b_group='Home Decor') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute GROUP BY codeid));");
  $pass_control_Home_Decor=0;
  while($row1=$res1->fetch_assoc() )
  {    
     $pass_control_Home_Decor++; // sum of passed controls in Home Decor
  }
  
  $res1=mysqli_query($connect,"SELECT *  
  FROM control_execute 
  WHERE (result='fail') and(b_group='Home Decor') and (fail_reason='Unimplemented Process') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute GROUP BY codeid));");
  $Home_Decor_fail_reason_unimplmnt_process=0;
  while($row1=$res1->fetch_assoc() )
  {    
    $Home_Decor_fail_reason_unimplmnt_process++; // sum of unimplemented processes in Home Decor
  }

  $res1=mysqli_query($connect,"SELECT *  
  FROM control_execute 
  WHERE (result='fail') and(b_group='Home Decor') and (fail_reason='Inadequate/Inappropriate Discipline') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute GROUP BY codeid));");
  $Home_Decor_fail_reason_inappro_discipline=0;
  while($row1=$res1->fetch_assoc() )
  {    
    $Home_Decor_fail_reason_inappro_discipline++; // sum of Inadequate/Inappropriate Discipline processes in Home Decor
  }

  $res1=mysqli_query($connect,"SELECT *  
  FROM control_execute 
  WHERE (result='fail') and(b_group='Home Decor') and (fail_reason='Lack of Process in Area') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute GROUP BY codeid));");
  $Home_Decor_fail_reason_lackof_process=0;
  while($row1=$res1->fetch_assoc() )
  {    
    $Home_Decor_fail_reason_lackof_process++; // sum of Lack of Process in Area processes in Home Decor
  }

?>


<?php
// The sql query finds all passed controls amongst the tested controls, in the business area 'Kitchen Appliance' from control_execute table.
  $res=mysqli_query($connect,"SELECT *  
  FROM control_execute 
  WHERE (result='pass') and(b_group='Kitchen Appliance') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute GROUP BY codeid ));");
  $pass_control_Kitchen_Appliance=0;
  while($row=$res->fetch_assoc() )
  {   
     $pass_control_Kitchen_Appliance++; // sum of passed controls in Kitchen_Appliance
  }

  $res1=mysqli_query($connect,"SELECT *  
  FROM control_execute 
  WHERE (result='fail') and(b_group='Kitchen Appliance') and (fail_reason='Unimplemented Process') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute GROUP BY codeid));");
  $Kitchen_Appliance_fail_reason_unimplmnt_process=0;
  while($row1=$res1->fetch_assoc() )
  {    
    $Kitchen_Appliance_fail_reason_unimplmnt_process++; // sum of unimplemented processes in Kitchen_Appliance
  }

  $res1=mysqli_query($connect,"SELECT *  
  FROM control_execute 
  WHERE (result='fail') and(b_group='Kitchen Appliance') and (fail_reason='Inadequate/Inappropriate Discipline') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute GROUP BY codeid));");
  $Kitchen_Appliance_fail_reason_inappro_discipline=0;
  while($row1=$res1->fetch_assoc() )
  {    
    $Kitchen_Appliance_fail_reason_inappro_discipline++; // sum of Inadequate/Inappropriate Discipline processes in Kitchen_Appliance
  }

  $res1=mysqli_query($connect,"SELECT *  
  FROM control_execute 
  WHERE (result='fail') and(b_group='Kitchen Appliance') and (fail_reason='Lack of Process in Area') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute GROUP BY codeid));");
  $Kitchen_Appliance_fail_reason_lackof_process=0;
  while($row1=$res1->fetch_assoc() )
  {    
    $Kitchen_Appliance_fail_reason_lackof_process++; // sum of Lack of Process in Area processes in wod
  }

?>

<?php
// The sql query finds all passed controls amongst the tested controls, in the business area 'Furnitures' from control_execute table.
  $res=mysqli_query($connect,"SELECT *  
  FROM control_execute 
  WHERE (result='pass') and(b_group='Furnitures') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute GROUP BY codeid ));");
  $pass_control_Furnitures=0;
  while($row=$res->fetch_assoc() )
  {   
     $pass_control_Furnitures++; // sum of passed controls in Furnitures
  }

  $res1=mysqli_query($connect,"SELECT *  
  FROM control_execute 
  WHERE (result='fail') and(b_group='Furnitures') and (fail_reason='Unimplemented Process') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute GROUP BY codeid));");
  $Furnitures_fail_reason_unimplmnt_process=0;
  while($row1=$res1->fetch_assoc() )
  {    
    $Furnitures_fail_reason_unimplmnt_process++; // sum of unimplemented processes in Furnitures
  }

  $res1=mysqli_query($connect,"SELECT *  
  FROM control_execute 
  WHERE (result='fail') and(b_group='Furnitures') and (fail_reason='Inadequate/Inappropriate Discipline') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute GROUP BY codeid));");
  $Furnitures_fail_reason_inappro_discipline=0;
  while($row1=$res1->fetch_assoc() )
  {    
    $Furnitures_fail_reason_inappro_discipline++; // sum of Inadequate/Inappropriate Discipline processes in Furnitures
  }

  $res1=mysqli_query($connect,"SELECT *  
  FROM control_execute 
  WHERE (result='fail') and(b_group='Furnitures') and (fail_reason='Lack of Process in Area') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute GROUP BY codeid));");
  $Furnitures_fail_reason_lackof_process=0;
  while($row1=$res1->fetch_assoc() )
  {    
    $Furnitures_fail_reason_lackof_process++; // sum of Lack of Process in Area processes in Furnitures
  }

?>

<?php
// The sql query finds all passed controls amongst the tested controls, in the business area 'Tissue' from control_execute table.
  $res=mysqli_query($connect,"SELECT *  
  FROM control_execute 
  WHERE (result='pass') and(b_group='Tissue') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute GROUP BY codeid ));");
  $pass_control_tissue=0;
  while($row=$res->fetch_assoc() )
  {   
     $pass_control_tissue++; // sum of passed controls in tissue
  }

  $res1=mysqli_query($connect,"SELECT *  
  FROM control_execute 
  WHERE (result='fail') and(b_group='Tissue') and (fail_reason='Unimplemented Process') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute GROUP BY codeid));");
  $tissue_fail_reason_unimplmnt_process=0;
  while($row1=$res1->fetch_assoc() )
  {    
    $tissue_fail_reason_unimplmnt_process++; // sum of unimplemented processes in tissue
  }

  $res1=mysqli_query($connect,"SELECT *  
  FROM control_execute 
  WHERE (result='fail') and(b_group='Tissue') and (fail_reason='Inadequate/Inappropriate Discipline') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute GROUP BY codeid));");
  $tissue_fail_reason_inappro_discipline=0;
  while($row1=$res1->fetch_assoc() )
  {    
    $tissue_fail_reason_inappro_discipline++; // sum of Inadequate/Inappropriate Discipline processes in tissue
  }

  $res1=mysqli_query($connect,"SELECT *  
  FROM control_execute 
  WHERE (result='fail') and(b_group='Tissue') and (fail_reason='Lack of Process in Area') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute GROUP BY codeid));");
  $tissue_fail_reason_lackof_process=0;
  while($row1=$res1->fetch_assoc() )
  {    
    $tissue_fail_reason_lackof_process++; // sum of Lack of Process in Area processes in tissue
  }

?>

<?php
// The sql query finds all passed controls amongst the tested controls, in the business area 'Forest' from control_execute table.
  $res=mysqli_query($connect,"SELECT *  
  FROM control_execute 
  WHERE (result='pass') and(b_group='Forest') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute GROUP BY codeid ));");
  $pass_control_forest=0;
  while($row=$res->fetch_assoc() )
 {   
     $pass_control_forest++; // sum of passed controls in forest
    
 }

  $res1=mysqli_query($connect,"SELECT *  
  FROM control_execute 
  WHERE (result='fail') and(b_group='Forest') and (fail_reason='Unimplemented Process') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute GROUP BY codeid));");
  $forest_fail_reason_unimplmnt_process=0;
  while($row1=$res1->fetch_assoc() )
  {    
    $forest_fail_reason_unimplmnt_process++; // sum of unimplemented processes in Home Decor
  }

  $res1=mysqli_query($connect,"SELECT *  
  FROM control_execute 
  WHERE (result='fail') and(b_group='Forest') and (fail_reason='Inadequate/Inappropriate Discipline') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute GROUP BY codeid));");
  $forest_fail_reason_inappro_discipline=0;
  while($row1=$res1->fetch_assoc() )
  {    
    $forest_fail_reason_inappro_discipline++; // sum of Inadequate/Inappropriate Discipline processes in Home Decor
  }

  $res1=mysqli_query($connect,"SELECT *  
  FROM control_execute 
  WHERE (result='fail') and(b_group='Forest') and (fail_reason='Lack of Process in Area') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute GROUP BY codeid));");
  $forest_fail_reason_lackof_process=0;
  while($row1=$res1->fetch_assoc() )
  {    
    $forest_fail_reason_lackof_process++; // sum of Lack of Process in Area processes in Home Decor
  }

?>

<?php
// The sql query finds all passed controls amongst the tested controls, in the business area 'Accounting Services' from control_execute table.
  $res=mysqli_query($connect,"SELECT *  
  FROM control_execute 
  WHERE (result='pass') and(b_group='Accounting Services') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute GROUP BY codeid ));");
  $pass_control_account=0;
  while($row=$res->fetch_assoc() )
  {   
     $pass_control_account++; // sum of passed controls in accounting services
  }
  
  $res1=mysqli_query($connect,"SELECT *  
  FROM control_execute 
  WHERE (result='fail') and(b_group='Accounting Services') and (fail_reason='Unimplemented Process') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute GROUP BY codeid));");
  $account_fail_reason_unimplmnt_process=0;
  while($row1=$res1->fetch_assoc() )
  {    
    $account_fail_reason_unimplmnt_process++; // sum of unimplemented processes in Accounting Services
  }

  $res1=mysqli_query($connect,"SELECT *  
  FROM control_execute 
  WHERE (result='fail') and(b_group='Accounting Services') and (fail_reason='Inadequate/Inappropriate Discipline') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute GROUP BY codeid));");
  $account_fail_reason_inappro_discipline=0;
  while($row1=$res1->fetch_assoc() )
  {    
    $account_fail_reason_inappro_discipline++; // sum of Inadequate/Inappropriate Discipline processes in Accounting Services
  }

  $res1=mysqli_query($connect,"SELECT *  
  FROM control_execute 
  WHERE (result='fail') and(b_group='Accounting Services') and (fail_reason='Lack of Process in Area') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute GROUP BY codeid));");
  $account_fail_reason_lackof_process=0;
  while($row1=$res1->fetch_assoc() )
  {    
    $account_fail_reason_lackof_process++; // sum of Lack of Process in Area processes in Accounting Services
  }
?>

<?php
// The sql query finds all passed controls amongst the tested controls, in the business area 'Finance' from control_execute table.
  $res=mysqli_query($connect,"SELECT *  
  FROM control_execute 
  WHERE (result='pass') and(b_group='Finance') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute GROUP BY codeid ));");
  $pass_control_finance=0;
  while($row=$res->fetch_assoc() )
  {   
     $pass_control_finance++; // sum of passed controls in finance
  }
 
  $res1=mysqli_query($connect,"SELECT *  
  FROM control_execute 
  WHERE (result='fail') and(b_group='Finance') and (fail_reason='Unimplemented Process') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute GROUP BY codeid));");
  $finance_fail_reason_unimplmnt_process=0;
  while($row1=$res1->fetch_assoc() )
  {    
    $finance_fail_reason_unimplmnt_process++; // sum of unimplemented processes in Finance
  }

  $res1=mysqli_query($connect,"SELECT *  
  FROM control_execute 
  WHERE (result='fail') and(b_group='Finance') and (fail_reason='Inadequate/Inappropriate Discipline') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute GROUP BY codeid));");
  $finance_fail_reason_inappro_discipline=0;
  while($row1=$res1->fetch_assoc() )
  {    
    $finance_fail_reason_inappro_discipline++; // sum of Inadequate/Inappropriate Discipline processes in Finance
  }

  $res1=mysqli_query($connect,"SELECT *  
  FROM control_execute 
  WHERE (result='fail') and(b_group='Finance') and (fail_reason='Lack of Process in Area') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute GROUP BY codeid));");
  $finance_fail_reason_lackof_process=0;
  while($row1=$res1->fetch_assoc() )
  {    
    $finance_fail_reason_lackof_process++; // sum of Lack of Process in Area processes in Finance
  }
?>

<?php
// The sql query finds controls amongst the tested controls, belonging to business area 'Home Decor' from control_execute table.
  $res1=mysqli_query($connect,"SELECT *  FROM control_execute WHERE (b_group='Home Decor') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute GROUP BY codeid ));");
  $control_Home_Decor=0;
  while($row1=$res1->fetch_assoc() )
  {    
     $control_Home_Decor++;  // sum of total tested controls in Home Decor
  }
  
?>

<?php
// The sql query finds controls amongst the tested controls, belonging to business area 'Kitchen_Appliance' from control_execute table.
  $res1=mysqli_query($connect,"SELECT *  FROM control_execute WHERE (b_group='Kitchen Appliance') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute GROUP BY codeid ));");
  $control_Kitchen_Appliance=0;
  while($row1=$res1->fetch_assoc() )
  {    
     $control_Kitchen_Appliance++; //sum of total tested controls in Kitchen_Appliance
  }
  
?>

<?php
// The sql query finds controls amongst the tested controls, belonging to business area 'Furnitures' from control_execute table.
  $res1=mysqli_query($connect,"SELECT *  FROM control_execute WHERE (b_group='Furnitures') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute GROUP BY codeid ));");
  $control_Furnitures=0;
  while($row1=$res1->fetch_assoc() )
  {    
     $control_Furnitures++;   //sum of total tested controls in Furnitures
  }
  
?>

<?php
// The sql query finds controls amongst the tested controls, belonging to business area 'Forest' from control_execute table.
  $res1=mysqli_query($connect,"SELECT *  FROM control_execute WHERE (b_group='Forest') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute GROUP BY codeid ));");
  $control_forest=0;
  while($row1=$res1->fetch_assoc() )
  {    
     $control_forest++;  //sum of total tested controls in forest
  }
 
?>

<?php
// The sql query finds controls amongst the tested controls, belonging to business area 'Tissue' from control_execute table.
  $res1=mysqli_query($connect,"SELECT *  FROM control_execute WHERE (b_group='Tissue') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute GROUP BY codeid ));");
  $control_tissue=0;
  while($row1=$res1->fetch_assoc() )
  {    
     $control_tissue++;  //sum of total tested controls in tissue
  }
  
?>

<?php
// The sql query finds controls amongst the tested controls, belonging to business area 'Accounting Services' from control_execute table.
  $res1=mysqli_query($connect,"SELECT *  FROM control_execute WHERE (b_group='Accounting Services') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute GROUP BY codeid ));");
  $control_account=0;
  while($row1=$res1->fetch_assoc() )
  {    
     $control_account++;  //sum of total tested controls in accounting services
  }

?>

<?php
// The sql query finds controls amongst the tested controls, belonging to business area 'Finance' from control_execute table.
  $res1=mysqli_query($connect,"SELECT *  FROM control_execute WHERE (b_group='Finance') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute GROUP BY codeid ));");
  $control_finance=0;
  while($row1=$res1->fetch_assoc() )
  {    
     $control_finance++;  //sum of total tested controls in finance
  }
  
?>

<?php
$failed_control_Home_Decor=($control_Home_Decor-$pass_control_Home_Decor);
$failed_control_Kitchen_Appliance=($control_Kitchen_Appliance-$pass_control_Kitchen_Appliance);
$failed_control_Furnitures=($control_Furnitures-$pass_control_Furnitures);
$failed_control_forest=($control_forest-$pass_control_forest);
$failed_control_tissue=($control_tissue-$pass_control_tissue);
$failed_control_account=($control_account-$pass_control_account);
$failed_control_finance=($control_finance-$pass_control_finance);

?>

<?php
// The following section calculates the success percent of each business area by finding the ratio of total tested controls to total passed controls from control_execute table
if($control_Kitchen_Appliance!="")
{
   $success_Kitchen_Appliance=(($pass_control_Kitchen_Appliance/$control_Kitchen_Appliance)*100);
   $failure_Kitchen_Appliance=(($failed_control_Kitchen_Appliance/$control_Kitchen_Appliance)*100);
   $Kitchen_Appliance_fail_percentage_unimplmnt_process=(($Kitchen_Appliance_fail_reason_unimplmnt_process/$failed_control_Kitchen_Appliance)*100);
   $Kitchen_Appliance_fail_percentage_inappro_discipline=(($Kitchen_Appliance_fail_reason_inappro_discipline/$failed_control_Kitchen_Appliance)*100);
   $Kitchen_Appliance_fail_percentage_lackof_process=(($Kitchen_Appliance_fail_reason_lackof_process/$failed_control_Kitchen_Appliance)*100);
}

if($control_Home_Decor!="")
{
   $success_Home_Decor=(($pass_control_Home_Decor/$control_Home_Decor)*100);
   $failure_Home_Decor=(($failed_control_Home_Decor/$control_Home_Decor)*100);
   $Home_Decor_fail_percentage_unimplmnt_process=(($Home_Decor_fail_reason_unimplmnt_process/$failed_control_Home_Decor)*100);
   $Home_Decor_fail_percentage_inappro_discipline=(($Home_Decor_fail_reason_inappro_discipline/$failed_control_Home_Decor)*100);
   $Home_Decor_fail_percentage_lackof_process=(($Home_Decor_fail_reason_lackof_process/$failed_control_Home_Decor)*100);
}

if($control_Furnitures!="")
{
   $success_Furnitures=(($pass_control_Furnitures/$control_Furnitures)*100);
   $failure_Furnitures=(($failed_control_Furnitures/$control_Furnitures)*100);
   
   $Furnitures_fail_percentage_unimplmnt_process=(($Furnitures_fail_reason_unimplmnt_process/$failed_control_Furnitures)*100);
   $Furnitures_fail_percentage_inappro_discipline=(($Furnitures_fail_reason_inappro_discipline/$failed_control_Furnitures)*100);
   $Furnitures_fail_percentage_lackof_process=(($Furnitures_fail_reason_lackof_process/$failed_control_Furnitures)*100);
   
}

if($control_forest!="")
{
   $success_forest=(($pass_control_forest/$control_forest)*100);
   $failure_forest=(($failed_control_forest/$control_forest)*100);
   $forest_fail_percentage_unimplmnt_process=(($forest_fail_reason_unimplmnt_process/$failed_control_forest)*100);
   $forest_fail_percentage_inappro_discipline=(($forest_fail_reason_inappro_discipline/$failed_control_forest)*100);
   $forest_fail_percentage_lackof_process=(($forest_fail_reason_lackof_process/$failed_control_forest)*100);
}

if($control_tissue!="")
{
   $success_tissue=(($pass_control_tissue/$control_tissue)*100);
   $failure_tissue=(($failed_control_tissue/$control_tissue)*100);
   $tissue_fail_percentage_unimplmnt_process=(($tissue_fail_reason_unimplmnt_process/$failed_control_tissue)*100);
   $tissue_fail_percentage_inappro_discipline=(($tissue_fail_reason_inappro_discipline/$failed_control_tissue)*100);
   $tissue_fail_percentage_lackof_process=(($tissue_fail_reason_lackof_process/$failed_control_tissue)*100);
}

if($control_account!="")
{
   $success_account=(($pass_control_account/$control_account)*100);
   $failure_account=(($failed_control_account/$control_account)*100);
   $account_fail_percentage_unimplmnt_process=(($account_fail_reason_unimplmnt_process/$failed_control_account)*100);
   $account_fail_percentage_inappro_discipline=(($account_fail_reason_inappro_discipline/$failed_control_account)*100);
   $account_fail_percentage_lackof_process=(($account_fail_reason_lackof_process/$failed_control_account)*100);
}

if($control_finance!="")
{
   $success_finance=(($pass_control_finance/$control_finance)*100);
   $failure_finance=(($failed_control_finance/$control_finance)*100);
   $finance_fail_percentage_unimplmnt_process=(($finance_fail_reason_unimplmnt_process/$failed_control_finance)*100);
   $finance_fail_percentage_inappro_discipline=(($finance_fail_reason_inappro_discipline/$failed_control_finance)*100);
   $finance_fail_percentage_lackof_process=(($finance_fail_reason_lackof_process/$failed_control_finance)*100);
}

?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart_Kitchen_Appliance);
      google.charts.setOnLoadCallback(drawChart_Kitchen_Appliance_failure_reasons);
      google.charts.setOnLoadCallback(drawChart_Home_Decor);
      google.charts.setOnLoadCallback(drawChart_Home_Decor_failure_reasons);
      google.charts.setOnLoadCallback(drawChart_Furnitures);
      google.charts.setOnLoadCallback(drawChart_Furnitures_failure_reasons);
      google.charts.setOnLoadCallback(drawChart_forest);
      google.charts.setOnLoadCallback(drawChart_forest_failure_reasons);
      google.charts.setOnLoadCallback(drawChart_finance);
      google.charts.setOnLoadCallback(drawChart_finance_failure_reasons);
      google.charts.setOnLoadCallback(drawChart_tissue);
      google.charts.setOnLoadCallback(drawChart_tissue_failure_reasons);
      google.charts.setOnLoadCallback(drawChart_account);
      google.charts.setOnLoadCallback(drawChart_account_failure_reasons);

      function drawChart_Kitchen_Appliance() 
      { 

         // The success percentage for each business area calculated above is now represented in a pie chart using google charts
         var data = google.visualization.arrayToDataTable([
         ['Success percentage of Tested Kitchen_Appliance Controls','Failure percentage of Tested Home Decor Controls',],
          <?php
                if($control_Kitchen_Appliance!="")
               {
                   echo "['Success percentage of Tested Kitchen_Appliance Controls',".round($success_Kitchen_Appliance,0).",],";
                   echo "['Failure percentage of Tested Kitchen_Appliance Controls',".round($failure_Kitchen_Appliance,0).",],";
               }
          ?>
         ]);

         var options = 
        {
          title: 'Kitchen_Appliance REPORTS FOR TESTED CONTROLS(IN PERCENTAGE)',
          slices: {0: {color: 'rgb(83, 212, 50)'}, 1:{color: 'rgb(231, 45, 20)'}},
          is3D: true
        };

         var chart = new google.visualization.PieChart(document.getElementById('piechart_Kitchen_Appliance'));
         chart.draw(data, options);
    }  // End ofdrawChart_Kitchen_Appliance() 



      function drawChart_Kitchen_Appliance_failure_reasons() 
    { 
   
       // The success percentage for each business area calculated above is now represented in a pie chart using google charts
       var data = google.visualization.arrayToDataTable([
       ['b_group','success',],
       <?php
             if($control_Kitchen_Appliance!="")
             {
                 echo "['Failure due to Unimplemented Process of Tested Kitchen_Appliance Controls',".round($Kitchen_Appliance_fail_percentage_unimplmnt_process,0).",],";
                 echo "['Failure due to Lack Of Process of Tested Kitchen_Appliance Controls',".round($Kitchen_Appliance_fail_percentage_lackof_process,0).",],";
                 echo "['Failure due to Inappropriate Disciple of Tested Kitchen_Appliance Controls',".round($Kitchen_Appliance_fail_percentage_inappro_discipline,0).",],";
             }
       ?>
         ]);

         var options = 
        {
           title: 'Kitchen_Appliance CONTROLS FAILURE REPORTS FOR TESTED CONTROLS(IN PERCENTAGE)',
           slices: {0: {color: 'rgb(253, 224, 57)'}, 1:{color: 'rgb(253, 136, 57)'}, 2:{color: 'rgb(153, 60, 145)'}},
           is3D: true
        };

          var chart = new google.visualization.PieChart(document.getElementById('piechart_Kitchen_Appliance_failure'));
          chart.draw(data, options);
    }


    function drawChart_Home_Decor() 
   { 
     
     // The success percentage for each business area calculated above is now represented in a pie chart using google charts
     var data = google.visualization.arrayToDataTable([
     ['b_group','success',],
     <?php
           if($control_Home_Decor!="")
           {
               echo "['Success percentage of Tested Home_Decor Controls',".round($success_Home_Decor,0).",],";
               echo "['Failure percentage of Tested Home_Decor Controls',".round($failure_Home_Decor,0).",],";
           }
      ?>
        ]);

       var options = 
      {
         title: 'Home_Decor REPORTS FOR TESTED CONTROLS(IN PERCENTAGE)',
         slices: {0: {color: 'rgb(83, 212, 50)'}, 1:{color: 'rgb(231, 45, 20)'}},
         
         is3D: true
      };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_Home_Decor'));
        chart.draw(data, options);
  }


    function drawChart_Home_Decor_failure_reasons() 
   { 

     // The success percentage for each business area calculated above is now represented in a pie chart using google charts
     var data = google.visualization.arrayToDataTable([
     ['b_group','success',],
     <?php
           if($control_Home_Decor!="")
           {
               echo "['Failure due to Unimplemented Process of Tested Home_Decor Controls',".round($Home_Decor_fail_percentage_unimplmnt_process,0).",],";
               echo "['Failure due to Lack Of Process of Tested Home_Decor Controls',".round($Home_Decor_fail_percentage_lackof_process,0).",],";
               echo "['Failure due to Inappropriate Disciple of Tested Home_Decor Controls',".round($Home_Decor_fail_percentage_inappro_discipline,0).",],";
           }
      ?>
       ]);

        var options = 
       {
           title: 'Home_Decor CONTROLS FAILURE REPORTS FOR TESTED CONTROLS(IN PERCENTAGE)',
           slices: {0: {color: 'rgb(253, 224, 57)'}, 1:{color: 'rgb(253, 136, 57)'}, 2:{color: 'rgb(153, 60, 145)'}},
           is3D: true
       };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_Home_Decor_failure'));
        chart.draw(data, options);
  }

 
    function drawChart_Furnitures()
    { 

       // The success percentage for each business area calculated above is now represented in a pie chart using google charts
       var data = google.visualization.arrayToDataTable([
       ['b_group','success',],
       <?php
           if($control_Furnitures!="")
          {
             echo "['Success percentage of Tested Furnitures Controls',".round($success_Furnitures,0).",],";
             echo "['Failure percentage of Tested Furnitures Controls',".round($failure_Furnitures,0).",],";
          }
      ?>
      ]);

       var options = 
      {
         title: 'Furnitures REPORTS FOR TESTED CONTROLS(IN PERCENTAGE)',
         slices: {0: {color: 'rgb(83, 212, 50)'}, 1:{color: 'rgb(231, 45, 20)'}},
         is3D: true
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart_Furnitures'));
      chart.draw(data, options);
    }


    function drawChart_Furnitures_failure_reasons()
    { 

       // The success percentage for each business area calculated above is now represented in a pie chart using google charts
       var data = google.visualization.arrayToDataTable([
       ['b_group','success',],
       <?php
         if($control_Furnitures!="")
         {
           echo "['Failure due to Unimplemented Process of Tested Furnitures Controls',".round($Furnitures_fail_percentage_unimplmnt_process,0).",],";
           echo "['Failure due to Lack Of Process of Tested Furnitures Controls',".round($Furnitures_fail_percentage_lackof_process,0).",],";
           echo "['Failure due to Inappropriate Disciple of Tested Furnitures Controls',".round($Furnitures_fail_percentage_inappro_discipline,0).",],";
         }
        ?>
        ]);

       var options = 
       {
         title: 'Furnitures CONTROLS FAILURE REPORTS FOR TESTED CONTROLS(IN PERCENTAGE)',
         slices: {0: {color: 'rgb(253, 224, 57)'}, 1:{color: 'rgb(253, 136, 57)'}, 2:{color: 'rgb(153, 60, 145)'}},
         is3D: true
       };

         var chart = new google.visualization.PieChart(document.getElementById('piechart_Furnitures_failure'));
         chart.draw(data, options);
    }


    function drawChart_forest()
    { 
    
       // The success percentage for each business area calculated above is now represented in a pie chart using google charts
       var data = google.visualization.arrayToDataTable([
       ['b_group','success',],
       <?php
         if($control_forest!="")
         {
           echo "['Success percentage of Tested Forest Controls',".round($success_forest,0).",],";
           echo "['Failure percentage of Tested Forest Controls',".round($failure_forest,0).",],";
         }
       ?>
       ]);

       var options = 
       {
         title: 'FOREST REPORTS FOR TESTED CONTROLS(IN PERCENTAGE)',
         slices: {0: {color: 'rgb(83, 212, 50)'}, 1:{color: 'rgb(231, 45, 20)'}},
         is3D: true
       };

         var chart = new google.visualization.PieChart(document.getElementById('piechart_forest'));
         chart.draw(data, options);
    }

 
    function drawChart_forest_failure_reasons() 
    { 

       // The success percentage for each business area calculated above is now represented in a pie chart using google charts
       var data = google.visualization.arrayToDataTable([
       ['b_group','success',],
       <?php
        if($control_forest!="")
        {
          echo "['Failure due to Unimplemented Process of Tested Forest Controls',".round($forest_fail_percentage_unimplmnt_process,0).",],";
          echo "['Failure due to Lack Of Process of Tested Forest Controls',".round($forest_fail_percentage_lackof_process,0).",],";
          echo "['Failure due to Inappropriate Disciple of Tested Forest Controls',".round($forest_fail_percentage_inappro_discipline,0).",],";
        }
       ?>
       ]);

       var options = 
       {
         title: 'FOREST CONTROLS FAILURE REPORTS FOR TESTED CONTROLS(IN PERCENTAGE)',
         slices: {0: {color: 'rgb(253, 224, 57)'}, 1:{color: 'rgb(253, 136, 57)'}, 2:{color: 'rgb(153, 60, 145)'}},
         is3D: true
       };

         var chart = new google.visualization.PieChart(document.getElementById('piechart_forest_failure'));
         chart.draw(data, options);
    }


    function drawChart_finance()
    { 

       // The success percentage for each business area calculated above is now represented in a pie chart using google charts
       var data = google.visualization.arrayToDataTable([
       ['Success percentage of Tested Finance Controls','Failure percentage of Tested Home_Decor Controls',],
       <?php
       if($control_finance!="")
       {
          echo "['Success percentage of Tested Finance Controls',".round($success_finance,0).",],";
          echo "['Failure percentage of Tested Finance Controls',".round($failure_finance,0).",],";
       } 
       ?>
       ]);

       var options = 
       {
         title: 'FINANCE REPORTS FOR TESTED CONTROLS(IN PERCENTAGE)',
         slices: {0: {color: 'rgb(83, 212, 50)'}, 1:{color: 'rgb(231, 45, 20)'}},
         is3D: true
       };

         var chart = new google.visualization.PieChart(document.getElementById('piechart_finance'));
         chart.draw(data, options);
    }


    function drawChart_finance_failure_reasons()
    { 

      // The success percentage for each business area calculated above is now represented in a pie chart using google charts
      var data = google.visualization.arrayToDataTable([
      ['b_group','success',],
      <?php
      if($control_finance!="")
      {
        echo "['Failure due to Unimplemented Process of Tested Finance Controls',".round($finance_fail_percentage_unimplmnt_process,0).",],";
        echo "['Failure due to Lack Of Process of Tested Finance Controls',".round($finance_fail_percentage_lackof_process,0).",],";
        echo "['Failure due to Inappropriate Disciple of Tested Finance Controls',".round($finance_fail_percentage_inappro_discipline,0).",],";
      }
      ?>
      ]);

      var options = 
     {
        title: 'FINANCE CONTROLS FAILURE REPORTS FOR TESTED CONTROLS(IN PERCENTAGE)',
        slices: {0: {color: 'rgb(253, 224, 57)'}, 1:{color: 'rgb(253, 136, 57)'}, 2:{color: 'rgb(153, 60, 145)'}},
        is3D: true
     };

       var chart = new google.visualization.PieChart(document.getElementById('piechart_finance_failure'));
       chart.draw(data, options);
   }


    function drawChart_tissue() 
    { 

      // The success percentage for each business area calculated above is now represented in a pie chart using google charts
      var data = google.visualization.arrayToDataTable([
      ['Success percentage of Tested Tissue Controls','Failure percentage of Tested Tissue Controls',],
      <?php
      if($control_tissue!="")
      {
        echo "['Success percentage of Tested Tissue Controls',".round($success_tissue,0).",],";
        echo "['Failure percentage of Tested Tissue Controls',".round($failure_tissue,0).",],";
      }
      ?>
      ]);

      var options = 
     {
        title: 'TISSUE REPORTS FOR TESTED CONTROLS(IN PERCENTAGE)',
        slices: {0: {color: 'rgb(83, 212, 50)'}, 1:{color: 'rgb(231, 45, 20)'}},
        is3D: true
     };

       var chart = new google.visualization.PieChart(document.getElementById('piechart_tissue'));
       chart.draw(data, options);
   }


   function drawChart_tissue_failure_reasons() 
   { 

      // The success percentage for each business area calculated above is now represented in a pie chart using google charts
      var data = google.visualization.arrayToDataTable([
      ['b_group','success',],
      <?php
      if($control_tissue!="")
      {
        echo "['Failure due to Unimplemented Process of Tested Tissue Controls',".round($tissue_fail_percentage_unimplmnt_process,0).",],";
        echo "['Failure due to Lack Of Process of Tested Tissue Controls',".round($tissue_fail_percentage_lackof_process,0).",],";
        echo "['Failure due to Inappropriate Disciple of Tested Tissue Controls',".round($tissue_fail_percentage_inappro_discipline,0).",],";
      }
      ?>
      ]);

      var options = 
      {
         title: 'TISSUE CONTROLS FAILURE REPORTS FOR TESTED CONTROLS(IN PERCENTAGE)',
         slices: {0: {color: 'rgb(253, 224, 57)'}, 1:{color: 'rgb(253, 136, 57)'}, 2:{color: 'rgb(153, 60, 145)'}},
         is3D: true
      };

     var chart = new google.visualization.PieChart(document.getElementById('piechart_tissue_failure'));
     chart.draw(data, options);
   }


   function drawChart_account()
   { 

      // The success percentage for each business area calculated above is now represented in a pie chart using google charts
      var data = google.visualization.arrayToDataTable([
      ['Success percentage of Tested Account Controls','Failure percentage of Tested Account Controls',],
      <?php
      if($control_account!="")
      {
        echo "['Success percentage of Tested Account Controls',".round($success_account,0).",],";
        echo "['Failure percentage of Tested Account Controls',".round($failure_account,0).",],";
      }
      ?>
      ]);

      var options = 
      {
       title: 'ACCOUNT REPORTS FOR TESTED CONTROLS(IN PERCENTAGE)',
       slices: {0: {color: 'rgb(83, 212, 50)'}, 1:{color: 'rgb(231, 45, 20)'}},
       is3D: true
       };

       var chart = new google.visualization.PieChart(document.getElementById('piechart_account'));
       chart.draw(data, options);
   }


   function drawChart_account_failure_reasons() 
   { 

      // The success percentage for each business area calculated above is now represented in a pie chart using google charts
      var data = google.visualization.arrayToDataTable([
      ['b_group','success',],
      <?php
      if($control_account!="")
      {
        echo "['Failure due to Unimplemented Process of Tested Account Services Controls',".round($account_fail_percentage_unimplmnt_process,0).",],";
        echo "['Failure due to Lack Of Process of Tested Account Services Controls',".round($account_fail_percentage_lackof_process,0).",],";
        echo "['Failure due to Inappropriate Disciple of Tested Account Services Controls',".round($account_fail_percentage_inappro_discipline,0).",],";
      }
      ?>
      ]);

     var options = 
     {
     title: 'ACCOUNTING SERVICES CONTROLS FAILURE REPORTS FOR TESTED CONTROLS(IN PERCENTAGE)',
     slices: {0: {color: 'rgb(253, 224, 57)'}, 1:{color: 'rgb(253, 136, 57)'}, 2:{color: 'rgb(153, 60, 145)'}},
     is3D: true
     };

     var chart = new google.visualization.PieChart(document.getElementById('piechart_account_failure'));
     chart.draw(data, options);
  }

</script>
 
<br><br>

<table>
<tr>
    <td><div id="piechart_Kitchen_Appliance" style="width: 800px; height: 500px;"></div> </td>
    <td><div id="piechart_Kitchen_Appliance_failure" style="width: 800px; height: 500px;"></div></td>
 </tr>

  <tr><td><div id="piechart_Home_Decor" style="width: 800px; height: 500px;"></div></td>
      <td><div id="piechart_Home_Decor_failure" style="width: 800px; height: 500px;"></div></td>
  </tr>
  
  <tr><td><div id="piechart_Furnitures" style="width: 800px; height: 500px;"></div></td>
      <td><div id="piechart_Furnitures_failure" style="width: 800px; height: 500px;"></div></td>
  </tr>

  <tr><td><div id="piechart_forest" style="width: 800px; height: 500px;"></div></td>
      <td><div id="piechart_forest_failure" style="width: 800px; height: 500px;"></div></td>
  </tr>

  <tr><td><div id="piechart_finance" style="width: 800px; height: 500px;"></div></td>
      <td><div id="piechart_finance_failure" style="width: 800px; height: 500px;"></div></td>
  </tr>

  <tr><td><div id="piechart_tissue" style="width: 800px; height: 500px;"></div></td>
      <td><div id="piechart_tissue_failure" style="width: 800px; height: 500px;"></div></td>
  </tr>

  <tr><td><div id="piechart_account" style="width: 800px; height: 500px;"></div></td>
      <td><div id="piechart_account_failure" style="width: 800px; height: 500px;"></div></td>
  </tr>
  </table>

  <br><br><br><br>

  <?php
    include 'C:\xampp\htdocs\Project\MyCode\HTML\footer.php';
  ?>




