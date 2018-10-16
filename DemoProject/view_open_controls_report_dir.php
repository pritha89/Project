<?php
include 'C:\xampp\htdocs\Project\MyCode\DemoProject\header_dir.php';
?>
<script src="http://localhost:8012/Project/MyCode/Scripts/download_control_table.js"></script>

<?php
 $group=$_SESSION['buss_group']; // bsuiness group which the user selected in previous page 'select_open_controls_report_dir.php'
 $process=$_SESSION['process']; //process name which user selected in previous page 'select_open_controls_report_dir.php'
?>

<?php
include 'connect_db.php'; // connects to database
?>

<div class="control_buttom_new">

    <div class="control_buttom_right_excel" >  
        <button id="btnExport" onclick="fnExcelReport_open();" class="button" style="height:70px;margin-top:5px;margin-right:10px;color:rgb(255, 248, 248)">EXPORT TABLE TO XLS
        </button>
    </div> <!-- close div for control_buttom_right_excel -->   

    <a href="select_open_controls_report_dir.php">
        <img src="http://localhost:8012/Project/MyCode/images/back_button.png" style="float:left;height:40px;margin-left:20px;" title="Back to Group and Process Selection"> 
    </a>                              
                                  
    <br> <br> <br> <br> <br> <br>

    <?php
       $curr_date= date('Y-m-d'); // current date
       /* The following query is used to find all those failed tested controls in the control_execute table who's expected completion date has already expired, but the tester never came back to close the tested control.
       This means the tester never came back to fill in the date of completion in the 'date_update.php' page */

       $res1=mysqli_query($connect,"SELECT * 
                                    FROM control_execute 
                                    WHERE (b_group LIKE '$group') and (process='$process') and (Dateend<'$curr_date') and (result='fail') and (real_date='0000-00-00');");
    ?>

    <table border="1" width="90%" id="Open_Report">
         
         <tr>
             <td colspan="8" align="center" style="color:red;size:14;height:50px;"><b>LIST OF OPEN CONTROLS</b>
             </td>
         </tr>
 
         <tr>   
             <th>Control Id</th>
             <th>Business Area</th>
             <th>Process</th>
             <th>Control Tester</th>
             <th><font color="red" size="4" align="right">**</font>Person Responsible for Corrective Actions</th>
             <th style='width:250px'>Action</th>
             <th><font color="red" size="4" align="right">**</font>Expected Completion Date</th>
             <th><font color="red" size="4" align="right">**</font>Actual Date of Completion</th>
         </tr>

         <?php
             while($row1=$res1->fetch_assoc() )
            {   
              echo "<tr>";
                echo "<td>".$row1['codeid']."</td>";
                echo "<td>".$row1['b_group']."</td>";
                echo "<td>".$row1['process']."</td>";
                echo "<td>".$row1['user_email']."</td>";
                echo "<td>".$row1['person_name']."</td>";
                echo "<td>".$row1['actions']."</td>";
                echo "<td>".$row1['Dateend']."</td>";
                echo "<td>".$row1['real_date']."</td>";
            }
         ?>
         </tr>

         <tr>
             <td colspan="8" align="center">
                 <font color="red" size="3" align="right">All ** marked fields are valid for only in case of Failed Controls.</font>
             </td>
         </tr>

         <!-- The following section is used to display the list of controls in the selected process area to which the user belongs which are not tested yet. -->
         
         <tr>
             <td colspan="8" align="center" style="color:red;size:14;height:50px;"><b>UNTESTED CONTROLS</b>
             </td>
         </tr>
         <br><br>
         <tr>   
             <th>Control Id</th>
             <th>Business Area</th>
             <th>Process</th>
             <th>Risk</th>
             <th>Objective</th>
             <th>Control Activity</th>
             <th>Evidence</th>
             <th>Frequency</th>
         </tr>

         <?php
         // List of controls from the controls table which are not tested
         $res2=mysqli_query($connect,"select * from demo_project_controls where (b_group='$group') and (process='$process') and (status='Not Tested') and (execution_date='0000-00-00')");
         $unexecuted_control=0; // variable initialization
         while($row2=$res2->fetch_assoc())
        {   
          $unexecuted_control++; // summs up the total no of untested controls
          echo "<tr>";
            echo "<td valign='top'>".$row2['codeid']."</td>";
            echo "<td valign='top'>".$row2['b_group']."</td>";
            echo "<td valign='top'>".$row2['process']."</td>";
            echo "<td valign='top'>".$row2['risk']."</td>";
            echo "<td valign='top'>".$row2['objective']."</td>";
            echo "<td valign='top'>".$row2['control_activity']."</td>";
            echo "<td valign='top'>".$row2['evidence']."</td>";
            echo "<td valign='top'>".$row2['freq']."</td>";
        }
         ?>
         </tr>
         
         <iframe id="txtArea1" style="display:none"></iframe>
         
    </table>

<br>

<?php
    include 'C:\xampp\htdocs\Project\MyCode\DemoProject\footer.php';
?>


