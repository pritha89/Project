<?php
include 'C:\xampp\htdocs\Project\MyCode\DemoProject\header_dir.php';
?>

<script src="http://localhost:8012/Project/MyCode/Scripts/download_control_table.js"></script>
<!-- The above file javascript file contains codes required to save or download the table to xls --> 
   
    <div class="control_buttom_new"><br><br>
    <div class="new_control_form_now">
    <div class="cat_right">
    <br> 
       <a href="control_view_dir.php"> 
           <img src="http://localhost:8012/Project/MyCode/images/back_button.png" style="float:left;height:40px;" title="Back to Group and Process Selection"> 
       </a>           

    <form name="f_update" id="f_update" action="" method="POST">   
        <br> <br> 
        
        <div id="table_wrapper"> <!-- This is the starting point from where the data will be downloaded to xls -->
           
           <?php
           include 'connect_db.php'; // connection to database
           
           if(isset($_GET['id']))  // If a valid control id is detected, details corresponding to that control id are extracted from controls table.
           {
               $getcodeid=$_GET['id'];
               
               $res=mysqli_query($connect,"select * from demo_project_controls where codeid='$getcodeid'");
               $row=mysqli_fetch_array($res);
             
           } // Each attriute is then saved in a variable and then updated in the controls table with the new value.
           // Once data is updated the view is seen in control_view.php or control_view_dir.php.
           if(isset($_POST['subprocess'])) 
           {
               $codeid=$_POST['codeid'];
               $subprocess=$_POST['subprocess'];
               $risk=$_POST['risk'];
               $pointname=$_POST['pointname'];
               $objective=$_POST['objective'];
               $control_activity=$_POST['control_activity'];
               $evidence=$_POST['evidence'];
               $owner=$_POST['owner'];
               $freq=$_POST['freq'];
               $twiceayear_startdate=$_POST['twice_start'];
               $twiceayear_enddate=$_POST['twice_end'];
               $Yearly_select=$_POST['Yearly_select'];
               $sql="update demo_project_controls set 
               subprocess='$subprocess',
               risk='$risk',
               pointname='$pointname',
               objective='$objective',
               control_activity='$control_activity',
               evidence='$evidence',
               owner='$owner',
               freq='$freq',
               twice_start='$twiceayear_startdate',
               twice_end='$twiceayear_enddate',
               Yearly_select='$Yearly_select'
               where codeid='$codeid'";
               $res=mysqli_query($connect,$sql) or die("couldn't connect".mysqli_error($connect));
               echo "<script type='text/javascript'>alert('Data Updated!')</script>";
               echo "<meta http-equiv='refresh' content='0;url=control_view_dir.php'>";
           }
        ?>

       <!-- The data is extracted from the controls table corresponding to a codeid.
       This data is then displayed in the value field of the textboxes to be edited. -->

      
        <center><br><br><br>
        
        <table border='1' width="90%">
             <tr>
                 <td colspan='2' align='center' style='width: 600px;height: 30px; font-family:Arial;'><b>UPDATE CONTROL</b></td>
             </tr>  

             <tr>
                 <td><b>CODEID</b></td>
                 <td valign='top';align='justify';><input type="text" name="codeid" value="<?php echo $row['codeid']; ?>" style='width:100%;height:30px;'></td>
             </tr>

             <tr>
                 <td><b>SUBPROCESS</b></td>
                 <td valign='top';align='justify';><input type="text" name="subprocess" value="<?php echo $row['subprocess']; ?>" style='width:100%;height:30px;'></td>
             </tr>

             <tr>
                 <td><b>RISK</b></td>
                 <td valign='top';align='justify';><input type="text" name='risk' value="<?php echo $row['risk']; ?>" style='width:100%;height:30px;'></td>
             </tr>

             <tr>
                 <td><b>CONTROL POINT</b></td>
                 <td valign='top';align='justify';><input type='text' name='pointname' value="<?php echo $row['pointname']; ?>" style='width:100%;height:30px;'></td>
             </tr>
            
             <tr>
                 <td><b>OBJECTIVE</b></td>
                 <td valign='top';align='justify';><input type='text' name='objective' value="<?php echo $row['objective']; ?>" style='width:100%;height:30px;'></td>
             </tr>

             <tr>
                 <td><b>CONTROL ACTIVITY</b></td>
                 <td valign='top';align='justify';><input type='text' name='control_activity' value="<?php echo $row['control_activity']; ?>" style='width:100%;height:30px;'></td>
             </tr>

             <tr>
                 <td><b>EVIDENCE</b></td>
                 <td valign='top';align='justify';><input type='text' name='evidence' value="<?php echo $row['evidence']; ?>"  style='width:100%;height:30px;'></td>
             </tr>
              
             <tr>
                 <td><b>OWNER</b></td>
                 <td valign='top';align='justify';><input type='text' name='owner' value="<?php echo $row['owner']; ?>"  style='width:100%;height:30px;'></td>
             </tr>
         
             <tr>
                 <td><b>FREQUENCY</b></td>
                 <td valign='top';align='justify';><input type='text' name='freq' value="<?php echo $row['freq']; ?>" style='width:100%;height:30px;'></td>
             </tr>
         
             <tr>
                 <td><b>BY and BY(for twice a year)</b></td>
                 <td valign='top';align='justify';><input type='text' name='twice_start' value="<?php echo $row['twice_start']; ?>" style='width:49%;height:30px;'>&nbsp;&nbsp;<input type='text' name='twice_end' value="<?php echo $row['twice_end']; ?>" style='width:49.5%;height:30px;'></td>
             </tr>
        
             <tr>
                 <td><b>BY(for once a year)</b></td>
                 <td valign='top';align='justify';><input type='text' name='Yearly_select' value="<?php echo $row['Yearly_select']; ?>" style='width:100%;height:30px;'></td>
             </tr>
         
             <tr>
                 <td colspan="2" align="center"><input type="submit" class="button" name="update" value="update" style="height:50px;"></td>
             </tr>
        
        </table>
        </form>

<?php
    include 'C:\xampp\htdocs\Project\MyCode\DemoProject\footer.php';
?>

 