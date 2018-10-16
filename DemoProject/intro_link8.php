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
     
     <form name="f_introLink8" method="post" >
        <center><br><br><br><br><br><br><br>

        <div class="intro_img">
           <img src="http://localhost:8012/Project/MyCode/images/intro11.jpeg" height="400px" width="420px;">
        </div>

        <div class="intro_text">
        
           <table border="none" style="border:none;border-collapse:separate;border-spacing:1em;" >
    
             <tr>
                 <th style="border:none" height="40p;"><font color="red" align="center" family:"Arial Black" size="4">READYMADE INTERNAL CONTROLS REPORT.</th>
             </tr>

             <tr>
                 <td style="border:none" align='justify'>--Internal Controls ready made reports include: </td>
             </tr>

             <tr>
                 <td style="border:none" align='justify'> (a) Pass/Fail statistics per each BA or Group function.</td>
             </tr>

             <tr>
                 <td style="border:none" align='justify'> (b) Statistics if controls has not been executed, there are disciplinary issues in executing the controls/process as agreed or controls are only partially/wrongly completed.</td>
             </tr>

             <tr>
                 <td style="border:none" align='justify'> (c) Comments if controls design is wrong; control is not fulfilling its purpose to manage risk identified or control design does not work as planned.</td>
             </tr>

             <tr>
                 <td style="border:none" align='justify'>--How is the information used?</td>
             </tr>

             <tr>
                 <td style="border:none" align='justify'> (a) Internal Controls team informs CFO Group on quarterly basis on the results and issue areas. External auditors also get Internal Controls report when requested.</td>
             </tr>

             <tr>
                 <td style="border:none" align='justify'> (b) BA user communicates BA findings and results internally as appropriate in his/her organization in order to give transparency on controls efficiency and potential actions needs.</td>
             </tr>
       
          </table>

        </div> 

     </form>

</div> 

<?php
    include 'C:\xampp\htdocs\Project\MyCode\HTML\footer.php';
?>