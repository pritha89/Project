<?php
include 'C:\xampp\htdocs\Project\MyCode\HTML\header_user.php';
?>

<link href="http://localhost:8012/Project/MyCode/Stylesheets/introstyle.css" rel="stylesheet" />

<br>
<?php include 'connect_db.php'; ?>
<br><br>

<div class="new_control_form_now"><br><br>
    <a href="intro.php">
       <img src="http://localhost:8012/Project/MyCode/images/back_button.png" style="float:left;height:50px;" title="Back to Process Selection"> 
    </a>

    <form name="f_introLink2" method="post" >
    <center><br><br><br><br><br><br><br>

    <div class="intro_img">
       <img src="http://localhost:8012/Project/MyCode/images/intro_31.jpg" height="350px" width="380px;">
    </div>

    <div class="intro_text">
        <table border="none" style="border:none;border-collapse:separate;border-spacing:1em;" >
           <tr>
                <th style="border:none" height="40p;"><font color="red" align="center" family:"Arial Black" size="4">KEY CONTROL EXECUTION AND TESTING.</th>
           </tr>
       
           <tr>
                <td style="border:none" align='justify'>--Controls are activities which happen in the business process by the persons utilizing the process for their normal, everyday work. Controls are usually performed/executed as part of the normal work. Sometimes controls are automated i.e. a system performs necessary controls.</td>
           </tr>

           <tr>
                <td style="border:none" align='justify'>--Control testing is done by an other, impartial person not involved in the actual business process or execution of the process itself. This person who checks/tests if the controls were done properly in the first place is looking for an evidence which verifies that the control has actually taken place in the process correctly or not.</td>
           </tr>

           <tr>
                <td style="border:none" align='justify'>--This evidence needs to be available in a documented format so that the tester or anybody else can draw the same conclusion on the correct/incorrect execution.</td>
           </tr>

           <tr>
                <td style="border:none" align='justify'>--In Metsä, there is Internal Controls –tool (“ISTO”) developed to provide the platform for the relevant steps of Internal Controls.</td>
            </tr>
        </table>
    </div>

</div>

<?php
    include 'C:\xampp\htdocs\Project\MyCode\HTML\footer.php';
?>