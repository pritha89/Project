<?php
include 'C:\xampp\htdocs\Project\MyCode\HTML\header_user.php';
?>

<link href="http://localhost:8012/Project/MyCode/Stylesheets/introstyle.css" rel="stylesheet" />

<br>
<?php include 'connect_db.php'; ?>
<br><br>

<div class="new_control_form_now"><br>

     <a href="intro.php">
         <img src="http://localhost:8012/Project/MyCode/images/back_button.png" style="float:left;height:50px;" title="Back to Process Selection">
     </a>

     <form name="f_introLink6" method="post" >
        <center><br><br><br><br><br><br><br>

         <div class="intro_img">
             <img src="http://localhost:8012/Project/MyCode/images/intro9.jpg" height="350px" width="420px;">
         </div>

         <div class="intro_text">

             <table border="none" style="border:none;border-collapse:separate;border-spacing:1em;" >
               
               <tr>
                     <th style="border:none" height="40p;"><font color="red" align="center" family:"Arial Black" size="4">MONTHLY INERNAL CONTROLS REPORTING ?</th>
               </tr>

               <tr>
                     <td style="border:none" align='justify'>--Internal Controls reporting is a process executed by Internal Controls team and the Internal Controls responsible in the Business Area/function. </td>
               </tr>

               <tr>
                     <td style="border:none" align='justify'>--These readily available reports in the Internal Controls –tool are based on the testing results recorded by Business Areas and functions who have tested their controls.</td>
               </tr>

               <tr>
                     <td style="border:none" align='justify'>--Failures/deviations on controls should have a follow up of corrective actions agreed. The reporting system enables consolidation and reporting of failed controls.</td>
               </tr>

               <tr>
                     <td style="border:none" align='justify'><font color="red" align="center" family:"Arial Black">--Reporting takes place via an Internal Controls -tool designed particularly for the purpose in Metsä.</font>In the tool there are pre-defined reports designed for the purpose http://internalcontrolstool.metsagroup.com:8012/HTML/</td>
               </tr>

               <tr>
                     <td style="border:none" align='justify'><font color="red" align="center" family:"Arial Black">What is a deviation we follow in reporting?</font></td>
               </tr>

               <tr>
                     <td style="border:none" align='justify'>--Any of the controls defined are not conducted in the process as agreed-> tester of operative controls finds deviations i.e. failures.</td>
               </tr>

               <tr>
                     <td style="border:none" align='justify'>--When Metsä Accounting Rules have not been followed or material uncorrected accounting errors remain after the closing-> tester of accounting controls finds deviations.</td>
               </tr>

               <tr>
                     <td style="border:none" align='justify'>--Numbers may be correct, but underlying issue is of repetitive nature or that error is likely to happen again.</td>
               </tr>

             </table>

         </div>

     </form>

</div>

<?php
    include 'C:\xampp\htdocs\Project\MyCode\HTML\footer.php';
?>