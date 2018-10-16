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

    <form name="f_introLink9" method="post" >
       <center><br><br><br><br><br><br><br>

       <div class="intro_img">
           <img src="http://localhost:8012/Project/MyCode/images/intro6.jpg" height="320px" width="450px;">
       </div>

       <div class="intro_text">

           <table border="none" style="border:none;border-collapse:separate;border-spacing:1em;" >
              <tr>
                  <th style="border:none" height="40p;"><font color="red" align="center" family:"Arial Black" size="4">THANK YOU !!</th>
              </tr>

              <tr>
                   <td style="border:none" align='justify'>--Thank you, for more information please contact Internal Controls team in Group Finance</td>
              </tr>
           </table>
        
      </div>

    </form>

</div>

<?php
    include 'C:\xampp\htdocs\Project\MyCode\HTML\footer.php';
?>