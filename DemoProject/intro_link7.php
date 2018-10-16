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

    <form name="f_introLink7" method="post" >
       <center><br><br><br><br><br><br><br>

      <table border="none" style="border:none;border-collapse:separate;border-spacing:1em;" >

         <tr>
             <th style="border:none"><font color="red" align="center" family:"Arial Black" size="4">INTERNAL CONTROLS REPORTING WORKFLOW.</th>
         </tr>

         <tr>
             <td style="border:none" align='justify'><img src="http://internalcontrolstool.metsagroup.com:8012/images/work.png" height="400px" width="950px"></td>
         </tr>

      </table>

    </form>

</div>

<?php
    include 'C:\xampp\htdocs\Project\MyCode\HTML\footer.php';
?>