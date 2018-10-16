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

      <form name="f_introLink4" method="post" >
         <center><br><br><br><br><br><br><br>

       <div class="intro_img">
             <img src="http://localhost:8012/Project/MyCode/images/intro7.jpg" height="350px" width="420px;">
       </div>

       <div class="intro_text">
      
          <table border="none" style="border:none;border-collapse:separate;border-spacing:1em;" >
          
            <tr>
                <th style="border:none" height="40p;"><font color="red" align="center" family:"Arial Black" size="4">HOW TO TEST A CONTROL ?</th>
            </tr>
    
            <tr>
                <td style="border:none" align='justify'>--If you are a person nominated to test certain, chosen controls in your Business Area or function, you will be logging into a Internal Controls tool on an agreed interval (monthly, quarterly, bi-annually etc.). </td>
            </tr>

            <tr>
                <td style="border:none" align='justify'>--You will perform a test of a control as described in the Control Catalogue located in Metsä Internal Controls -tool. This tool is stored to Metsä Finance page: http://internalcontrolstool.metsagroup.com:8012/HTML/</td>
            </tr>
    
            <tr>
                <td style="border:none" align='justify'>--Tool gives you a predefined, easy system interface to test and report the controls assigned to you. Internal Controls –tool is intuitive and it shows you e.g. that failed controls need to be given a name of a person who takes actions to fix the reason for failure.</td>
            </tr>

            <tr>
                <td style="border:none" align='justify'>--Once your have done the testing as described in the tool, you may need to come back to the tool...</td>
            </tr>

            <tr>
                <td style="border:none" align='justify'> (a) Only when it is time to test a control again </td>
            </tr>

            <tr>
                <td style="border:none" align='justify'> (b) If there were failed controls, to close the action period given for solving the failure.</td>
            </tr>
         
          </table>

      </div>

     </form>

</div>

<?php
    include 'C:\xampp\htdocs\Project\MyCode\HTML\footer.php';
?>