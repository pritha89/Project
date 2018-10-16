<?php
// This page is available only to control directors
include 'C:\xampp\htdocs\Project\MyCode\HTML\header_dir.php';
?>

<br><br>
<div class="new_control_form_now">
<br><br>
<?php
   include "connect_db.php"; // conencts to database
?>

<?php
// The sql query finds all passed controls amongst the tested controls, in the business area 'Board' from control_execute table.
  $res1=mysqli_query($connect,"SELECT *  
  FROM control_execute 
  WHERE (result='pass') and(b_group='Board') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute GROUP BY codeid));");
  $pass_control_board=0;
  while($row1=$res1->fetch_assoc() )
  {    
     $pass_control_board++; // sum of passed controls in board
  }
  echo "</tr></table>";
?>


<?php
// The sql query finds all passed controls amongst the tested controls, in the business area 'Wood' from control_execute table.
  $res=mysqli_query($connect,"SELECT *  
  FROM control_execute 
  WHERE (result='pass') and(b_group='Wood') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute GROUP BY codeid ));");
  $pass_control_wood=0;
  while($row=$res->fetch_assoc() )
  {   
     $pass_control_wood++; // sum of passed controls in wood
  }
  echo "</tr></table>";
?>

<?php
// The sql query finds all passed controls amongst the tested controls, in the business area 'Fibre' from control_execute table.
  $res=mysqli_query($connect,"SELECT *  
  FROM control_execute 
  WHERE (result='pass') and(b_group='Fibre') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute GROUP BY codeid ));");
  $pass_control_fibre=0;
  while($row=$res->fetch_assoc() )
  {   
     $pass_control_fibre++; // sum of passed controls in fibre
  }
 echo "</tr></table>";
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
 echo "</tr></table>";
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
 echo "</tr></table>";
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
  echo "</tr></table>";
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
  echo "</tr></table>";
?>

<?php
// The sql query finds controls amongst the tested controls, belonging to business area 'Board' from control_execute table.
  $res1=mysqli_query($connect,"SELECT *  FROM control_execute WHERE (b_group='Board') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute GROUP BY codeid ));");
  $control_board=0;
  while($row1=$res1->fetch_assoc() )
  {    
     $control_board++;  // sum of total tested controls in board
  }
  echo "</tr></table>";
?>

<?php
// The sql query finds controls amongst the tested controls, belonging to business area 'Wood' from control_execute table.
  $res1=mysqli_query($connect,"SELECT *  FROM control_execute WHERE (b_group='Wood') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute GROUP BY codeid ));");
  $control_wood=0;
  while($row1=$res1->fetch_assoc() )
  {    
     $control_wood++; //sum of total tested controls in wood
  }
  echo "</tr></table>";
?>

<?php
// The sql query finds controls amongst the tested controls, belonging to business area 'Fibre' from control_execute table.
  $res1=mysqli_query($connect,"SELECT *  FROM control_execute WHERE (b_group='Fibre') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute GROUP BY codeid ));");
  $control_fibre=0;
  while($row1=$res1->fetch_assoc() )
  {    
     $control_fibre++;   //sum of total tested controls in fibre
  }
  echo "</tr></table>";
?>

<?php
// The sql query finds controls amongst the tested controls, belonging to business area 'Forest' from control_execute table.
  $res1=mysqli_query($connect,"SELECT *  FROM control_execute WHERE (b_group='Forest') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute GROUP BY codeid ));");
  $control_forest=0;
  while($row1=$res1->fetch_assoc() )
  {    
     $control_forest++;  //sum of total tested controls in forest
  }
  echo "</tr></table>";
?>

<?php
// The sql query finds controls amongst the tested controls, belonging to business area 'Tissue' from control_execute table.
  $res1=mysqli_query($connect,"SELECT *  FROM control_execute WHERE (b_group='Tissue') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute GROUP BY codeid ));");
  $control_tissue=0;
  while($row1=$res1->fetch_assoc() )
  {    
     $control_tissue++;  //sum of total tested controls in tissue
  }
  echo "</tr></table>";
?>

<?php
// The sql query finds controls amongst the tested controls, belonging to business area 'Accounting Services' from control_execute table.
  $res1=mysqli_query($connect,"SELECT *  FROM control_execute WHERE (b_group='Accounting Services') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute GROUP BY codeid ));");
  $control_account=0;
  while($row1=$res1->fetch_assoc() )
  {    
     $control_account++;  //sum of total tested controls in accounting services
  }
  echo "</tr></table>";
?>

<?php
// The sql query finds controls amongst the tested controls, belonging to business area 'Finance' from control_execute table.
  $res1=mysqli_query($connect,"SELECT *  FROM control_execute WHERE (b_group='Finance') and (`execution_date` in (SELECT MAX(`execution_date`) from control_execute GROUP BY codeid ));");
  $control_finance=0;
  while($row1=$res1->fetch_assoc() )
  {    
     $control_finance++;  //sum of total tested controls in finance
  }
  echo "</tr></table>";
?>

<?php
// The following section calculates the success percent of each business area by finding the ratio of total tested controls to total passed controls from control_execute table
if($control_wood!="")
{
   $success_wood=(($pass_control_wood/$control_wood)*100);
}
if($control_board!="")
{
   $success_board=(($pass_control_board/$control_board)*100);
}
if($control_fibre!="")
{
   $success_fibre=(($pass_control_fibre/$control_fibre)*100);
}
if($control_forest!="")
{
   $success_forest=(($pass_control_forest/$control_forest)*100);
}
if($control_tissue!="")
{
   $success_tissue=(($pass_control_tissue/$control_tissue)*100);
}
if($control_account!="")
{
   $success_account=(($pass_control_account/$control_account)*100);
}
if($control_finance!="")
{
   $success_finance=(($pass_control_finance/$control_finance)*100);
}

?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() { 

         // The success percentage for each business area calculated above is now represented in a pie chart using google charts
          var data = google.visualization.arrayToDataTable([
          ['b_group','success',],
          <?php

            if($control_wood!="")
            {
               echo "['Wood',".round($success_wood,0).",],";
            }
            if($control_board!="")
            {
               echo "['Board',".round($success_board,0).",],";
            }
           if($control_fibre!="")
            {
               echo "['Fibre',".round($success_fibre,0).",],"; 
            }
           if($control_forest!="")
           {
               echo "['Forest',".round($success_forest,0).",],";
           }
           if($control_tissue!="")
           {
               echo "['Tissue',".round($success_tissue,0).",],";
           }
           if($control_account!="")
           {
               echo "['Accounting Services',".round($success_account,0).",],";
           }  
           if($control_finance!="")
           {
               echo "['Finance',".round($success_finance,0).",],";
           }

          ?>

          ]);

          var options = 
          {
          title: 'GROUP SUCCESS REPORTS FOR TESTED CONTROLS(IN PERCENTAGE)',
          is3D: true
          };

          var chart = new google.visualization.PieChart(document.getElementById('piechart'));
          chart.draw(data, options);
          }
    
    </script>
 
  <br><br><br><br>
    
  <div id="piechart" style="width: 800px; height: 500px;"></div>
    
  <?php
    include 'C:\xampp\htdocs\Project\MyCode\HTML\footer.php';
  ?>




