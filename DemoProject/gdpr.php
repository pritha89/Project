<?php
include 'C:\xampp\htdocs\Project\MyCode\DemoProject\header_dir.php';
?>

<script src="http://localhost:8012/Project/MyCode/Scripts/download_control_table.js"></script>

    
<div class="control_buttom_new">
   <div class="control_buttom_right_excel" >  
      <button id="btnExport" onclick="fnExcel_Catalogue();" class="button" style="height:70px;margin-top:5px;margin-right:10px;color:rgb(255, 248, 248)">EXPORT TABLE TO XLS</button>
   </div> <!-- close div for control_buttom_right_excel -->   
   
   <br><br> 
    <div id="table_wrapper">
    <br>
    
    <?php
       include 'connect_db.php';
       echo "<center><br><br><br>";
       echo "<table border='1' style='width:80%' id='Reports_Catalogue'>
             <tr>
                <th style='height:50px'>USER EMAIL</th>
                <th style='height:50px'>FIRST LOG IN DATE</th>
             </tr>"; 
       echo "<tr>"; 

       while($row=$result13->fetch_assoc()) // sql query corresponding to result13 can be found in connect_db.php
      {
        echo "<td style='height:40px;' valign='top';align='justify'>" .$row['buser_email']."</td>";
        echo "<td valign='top';align='justify'>" .$row['log_in']."</td>";
        echo "<iframe id='txtArea1' style='display:none'></iframe>";
        echo "</tr>";
      }

        echo "</table>";
    ?>
    <br> 
    <font color="Red" size="4" align="right">User Records from last 36 months</font>

<?php
    include 'C:\xampp\htdocs\Project\MyCode\DemoProject\footer.php';
?>
