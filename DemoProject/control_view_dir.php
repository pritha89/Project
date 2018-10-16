<?php
include 'C:\xampp\htdocs\Project\MyCode\DemoProject\header_dir.php';
?>
<!-- Including header_dir.php page, is done to include all the files and texts in that page without rewriting them over again -->

<link href="http://localhost:8012/Project/MyCode/HTML/readmore.css" rel="stylesheet" /> 
<!--This is to include the file that holds the styling for the 'Read More' checkbox option in the page -->

<body>
<br>
<?php include 'connect_db.php'; // Connecting to a database?> 

<br><br>

<div class="control_buttom_new"><br><!--The following link is to take the user back to the selection page , where he can select the business group and process area again-->

                             
                                      
<br> 
                                     
    <?php
           
      $business_group=$_SESSION['buss_group'];  // Saving the business group in a session
      $process=$_SESSION['process']; // Saving the process area in a session
      
      echo "<center><br><br><br><table border='1' style='width:100%'>
      <tr>
        <th></th>
        <th></th>  
        <th></th>
        <th>Control Id</th>     
        <th>Sub-Process</th>
        <th>Risk</th>
        <th>Control Point </th>
        <th>Objective </th>
        <th>Control Activity</th>
        <th>Evidence</th>
        <th>Owner</th>
        <th>Frequency</th>
        <th>Status</th>
      </tr>";  

      while($row=$result2->fetch_assoc()) // sql query corresponding to result2 can be found in connect_db.php
      {
        if($business_group==$row["b_group"] && $process==$row["process"]) // If the value of business name and process area entered by the user matches with the b_group and process fileds in the control table.
        { // The values from the rows in the control table is saved in variables.
            $codeid=$row["codeid"];
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

    ?>  

    <td valign="top"><a href="update_control.php?id=<?php echo $codeid;?>"><input type="submit" class="button" name="Edit" value="EDIT" style="width:70px;height:45px;font-size:14px;color:rgb(255, 248, 248);"></a></td> 
    <td valign="top"><a href="control_monitor.php?id=<?php echo $codeid;?>"><input type="submit" class="button" name="View" value="VIEW" style="width:70px;height:45px;font-size:14px;color:rgb(255, 248, 248)"></a></td>
    <td valign="top">
      <a href="control_monitor.php?id=<?php echo $codeid;?>"><input type="submit" class="button" value="UPDATE" id="btnHome" 
   
       style="width:80px;height:45px;font-size:14px;color:rgb(255, 248, 248);hover(background:black)" /></a></td>
       
   
    
  
    <td valign='top';align='justify'><a href="control_catalogue_dir.php?id=<?php echo $codeid;?> <?php $date_clicked = date('Y-m-d');
     $_SESSION['dateoftesting']=$date_clicked; ?>"><?php echo $codeid ?></a></td>
    <?php
    echo "<td valign='top';align='justify' >".$subprocess."</td>";
    echo "<td valign='top';align='justify'><input id='more' type='checkbox'>Read More..<div id='content'>" .$risk."</td>";
    echo "<td valign='top';align='justify'><input id='more' type='checkbox'>Read More..<div id='content'>" .$pointname."</td>";
    echo "<td valign='top';align='justify'><input id='more' type='checkbox'>Read More..<div id='content'>" .$objective."</td>";
    echo "<td valign='top';align='justify'><input id='more' type='checkbox'>Read More..<div id='content'>" .$control_activity."</td>";
    echo "<td valign='top';align='justify'><input id='more' type='checkbox'>Read More...<div id='content'>" .$evidence."</td>";
    echo "<td valign='top';align='justify'>" .$owner."</td>";
    echo "<td valign='top';align='justify'>" .$row["freq"]." ".$row["twice_start"]." ".$row["twice_end"]." ".$row["Yearly_select"]."</td>";

    if($row["status"]=="Last Tested")
    {
      echo "<td bgcolor='green' valign='top';align='justify'><font color='white'>" .$row["status"]." ".$row["execution_date"]."</font></td>";
    }
      else
    {
      echo "<td bgcolor='#FF0000' valign='top';align='justify'><font color='white'>" .$row["status"]." ".$row["execution_date"]."</font></td>";
    }
    
    echo "</tr>";
    }  // End of if
          
    } // end of while
       echo "</table>";

    ?>
    
</div>

<br><br>

<?php
include 'C:\xampp\htdocs\Project\MyCode\HTML\footer.php';
?>
        
