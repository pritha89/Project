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
    <form name="f_introLink1" method="post" >
    <center><br><br><br><br><br><br><br>
 
    <div class="intro_img">
       <img src="http://localhost:8012/Project/MyCode/images/intro2.jpg" height="350px;">
    </div>

    <div class="intro_text">
       <table border="none" style="border:none;border-collapse:separate;border-spacing:1em;" >
          <tr>
             <th style="border:none" height="40p;"><font color="red" align="center" family:"Arial Black" size="4">WHAT IS A CONTROL CATALOGUE ?</th>
          </tr>

          <tr>
             <td style="border:none" align='justify'>--Control catalogue lists and describes Business Area or Function own Key Controls in detail. Catalogue also explains the risk what the control is expected to mitigate. It is also described by whom, where, how and when the control is performed and by whom the control is tested. Control evidence, i.e. documentation that controls have been performed, is separately described.</td>
          </tr>

          <tr>
             <td style="border:none" align='justify'>--Control Catalogue is typically stored in the company intranet (in excels or Internal Controls tools etc.) in order it to be available for all who need it.</td>
          </tr>

          <tr>
             <td style="border:none" align='justify'>--Control Catalogue is also shared with external auditors if requested to give transparency on management practices in use.</td>
          </tr>
    </div>
</div>

<?php
    include 'C:\xampp\htdocs\Project\MyCode\HTML\footer.php';
?>