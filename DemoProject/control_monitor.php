
<?php
include 'C:\xampp\htdocs\Project\MyCode\DemoProject\header_dir.php';
?>

<link href="http://localhost:8012/Project/MyCode/DemoProject/readmore.css" rel="stylesheet" /> 
<!--This is to include the file that holds the styling for the 'Read More' checkbox option in the page -->

<?php
$codeid=$_GET['id']; 
?> 

<a href="control_view_dir.php"><img src="http://localhost:8012/Project/MyCode/images/back_button.png" style="float:left;height:40px;" title="Back to Group and Process Selection"> </a>                              
  
<br><br>

<div class="view_data">
    
 <!--The sole purpose of this page is to display all the execution details that have been made corresponding to one particle control id. 
 The control id is passed to this page from control_view_dir.php page and all the evaluated data provided by users corresponding to that control are displayed. 
 The meanings of the fields in this page are provided in documentation.
 This facility is provided only to the control directors.
 The parameter which is passed to the function is control id -->

<?php
if($codeid!=" ")
{
    display($codeid);
}

function display($display_details_of_codeid)
{
    include 'connect_db.php'; // connects to database
    
?>
    <center><table border='1' width="100%">
    
    <th style='width:90px'>Control Id</th>
    
    <th>Control Tester</th>

    <th>Samples Selected</th>

    <th>Perfect Samples</th>

    <th>Perfect Samples % </th>

    <th>Comment on Sampling</th>

    <th>Findings</th>

    <th>Efficiency</th>
    
    <th>Result</th>

    <th><font color="red" size="4" align="right">**</font>Reason for Failure</th>
    
    <th><font color="red" size="4" align="right">**</font>Person(s) Responsible for Corrective Actions</th>

    <th style='width:250px'>Action</th>
    
    <th><font color="red" size="4" align="right">**</font>Expected Completion Date</th>

    <th><font color="red" size="4" align="right">**</font>Actual Date of Completion</th>

    <th><font color="red" size="4" align="right">**</font>Comments after Completion</th>

    <th>Date of Control Testing</th>
    
    </tr>

    <?php 
    // sql query corresponding to result7 can be found in connect_db.php
    while($row=$result_monitor_control->fetch_assoc())
    {
        if($display_details_of_codeid==$row["codeid"]) // match the codeid in the parameter of the function with the codeid in the table control_execute.
        {

        $x=($row['sample_selected']/$row['sample_size'])*100; // Percentage of perfect samples for each case

        echo "<td valign='top';align='justify';>" .$row["codeid"]."</td>";

        echo "<td valign='top';align='justify';>" .$row["user_email"]."</td>";
   
        echo "<td valign='top';align='justify';>" .$row["sample_size"]."</td>";

        echo "<td valign='top';align='justify';>" .$row["sample_selected"]."</td>";

        echo "<td valign='top';align='justify';>" .round($x,0)."</td>";

        echo "<td valign='top';align='justify';><input id='more' type='checkbox'>Read more..<div id='content'>" .$row['sample_comment']."</td>";

        echo "<td valign='top';align='justify' style='width:220px';><input id='more' type='checkbox'>Read more..<div id='content'>" .$row["finding"]."</td>";
        
        echo "<td valign='top';align='justify';>" .$row["efficiency"]."</td>";

        echo "<td valign='top';align='justify';>" .$row["result"]."</td>";

        echo "<td valign='top';align='justify';>" .$row["fail_reason"]."</td>";
        
        echo "<td valign='top';align='justify' style='width:150px'>" .$row["person_name"]."<br>".$row["person_name_one"]."<br>".$row["person_name_two"]."</td>";
         
        echo "<td valign='top';align='justify';><input id='more' type='checkbox'>Read more..<div id='content'>" .$row["actions"]."</td>";

        echo "<td valign='top';align='justify';>" .$row["Dateend"]."</td>";

        echo "<td valign='top';align='justify';>" .$row["real_date"]."</td>";

        echo "<td valign='top';align='justify';>" .$row["comments"]."</td>";

        echo "<td valign='top';align='justify';>" .$row["execution_date"]."</td>";

        echo "</tr>";
        }
       
    }
    echo "</table>";
   
}
?> <br><br><font color="red" size="4" align="right">All ** marked fields are valid for only in case of Failed Controls.</font></div>

<?php
include 'C:\xampp\htdocs\Project\MyCode\DemoProject\footer.php';
?>
