<?php
include 'C:\xampp\htdocs\Project\MyCode\DemoProject\header_dir.php';
?>

<script src="http://internalcontrolstool.metsagroup.com:8012/Scripts/download_control_table.js"></script>
<link href="http://internalcontrolstool.metsagroup.com:8012/DemoProject/sty.css" rel="stylesheet" />
    
   
    <body>
<br>
<?php include 'connect_db.php'; // connect to database?>
<br><br>
<div class="new_control_form_now"><br><br>
<form name="test" method="post" >
<center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<table border="2">
<tr><td><select id="maintain" name="maintain" style="width: 300px;height: 50px;">
<option value="Select your choice" disabled selected> Select your option</option>
<option value="incomplete_controls">Incompleted Controls</option>
<option value="business_area_reports">Business Area Reports</option>


</select>
</td></tr><tr>
<td colspan="2" align="center">
<input type="submit" name="submit" class="button" value="GO" onclick="hello();" style="height:40px;"></a></td></tr></table>


<script type="text/javascript">
function hello()
<?php
{  
    $a=$_POST['maintain'];
    if($a=="incomplete_controls") // can view untested or expired controls
    {
        
        header("location:select_open_controls_report_dir.php"); 
    }
    else if($a=="business_area_reports") // can view tested controls results based on business arae and process selection
    {
        
        header("location:select_tested_control_reports_dir.php"); 
    }
    
}
?>
</script>

<?php
    include 'C:\xampp\htdocs\Project\MyCode\DemoProject\footer.php';
?>

