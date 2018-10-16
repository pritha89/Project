<?php

// connectivity to database
$hostname="localhost";
$username="root";
$password="";
$databaseName="test";

$connect=new mysqli($hostname,$username,$password,$databaseName);

$query= "select * from demo_business_areas"; // List of business area
$query2= "select * from demo_process_list"; // List of processes
$query1= "select * from demo_project_controls"; // Details of controls in all business area and processes combined
$query3= "select * from months"; // List of all 12 months in a year
$query4= "select * from control_execute"; // Details of tested controls
$query5= "select * from month_check";
$query6= "select * from table1"; // Details of business users
$r= date('Y-m-d'); // current date
$two_year_history = date('Y-m-d', strtotime($r. ' - 730 days')); // current date - 730 days (2 years)
$monitor="select * from control_execute where (execution_date >='$two_year_history') ";
$query7= "select * from control_execute GROUP BY b_group"; // Grouping of tested controls based on codeid
$query8="select * from samples"; // Number of samples to be selected from while control testing

$j = date('Y-m-d', strtotime($r. ' - 1095 days')); // current date - 1095 days (3 years)
$query9="select * from gdpr where (log_in >='$j') GROUP BY buser_email "; // List of users who logged into the tool in the last 365 days
$query10= "select * from table2"; // details on control directors



$result1= mysqli_query($connect,$query);
$result2= mysqli_query($connect,$query1);
$result3= mysqli_query($connect,$query2);
$result4= mysqli_query($connect,$query3);
$result5= mysqli_query($connect,$query3);
$result6= mysqli_query($connect,$query3);
$result7= mysqli_query($connect,$query4);
$result8= mysqli_query($connect,$query5);
$result9= mysqli_query($connect,$query6);
$result10= mysqli_query($connect,$query7);
$result11= mysqli_query($connect,$query8);
$result12= mysqli_query($connect,$query8);
$result13= mysqli_query($connect,$query9);
$result14= mysqli_query($connect,$query10);
$result_monitor_control=mysqli_query($connect,$monitor);




?>