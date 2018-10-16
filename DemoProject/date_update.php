<?php
include 'C:\xampp\htdocs\Project\MyCode\HTML\header_user.php';
?>

<!--Once the control has been tested and it is a fail control, 
the tester was required to provide a deadline within which the responsible person for the corrective actions needs perform the required task.
Once the corrective actions has been taken, the responsible person needs to log in back into the tool and fill the date when the action was taken.
Also he is allowed to make some comments about the corrective actions that were performed. 
However he will not be allowed to enter this page is the control was: (a) A pass control (b) Untested control (c) Tested by another tester.
If the date in this date field is never updated , it will be consider that the rectification actions are not performed and the control will be treated as an open control.-->


<!--The following divs can be found in style_overall.css-->
   
<div class="control_buttom_new"><br><br>
<div class="new_control_form_now">
<div class="cat_right">
<br> 
<a href="control_view.php">
    <img src="http://localhost:8012/Project/MyCode/images/back_button.png" style="float:left;height:40px;" title="Back to Group and Process Selection"> 
</a>                              

<br> <br> 
      
<?php
  include 'connect_db.php'; //connects to the database
  $user=$_SESSION['username']; //holds user email id
  if(isset($_GET['id']))
  {
      $myid=$_GET['id'];            
      $res=mysqli_query($connect,"select * from control_execute where codeid='$myid' and user_email='$user' and result='fail' ORDER BY execution_date DESC ");
      $row=mysqli_fetch_array($res);
  }
           
  if($row=="")
  {
      echo "<script type='text/javascript'>alert('The control was not executed by you or it was a passed control or it has not been executed yet!')</script>";
      echo "<meta http-equiv='refresh' content='0;url=control_view.php'>";
  }
  
  if(isset($_POST['real_date']))
  {             
   
      $completion_date=$_POST['real_date']; // date when the corrective actions were completed
      $comments=$_POST['comments']; // comments on the corrective actions
      $sql="update control_execute set real_date='$completion_date',comments='$comments' where codeid='$myid' and user_email='$user' and result='fail' ORDER BY execution_date DESC LIMIT 1 ";
      $res=mysqli_query($connect,$sql) or die("couldn't connect".mysqli_error($connect));
      echo "<script type='text/javascript'>alert('Data Updated!')</script>";
      echo "<meta http-equiv='refresh' content='0;url=control_view.php'>";
  }
?>

<form name="f_date" id="f_date" action="" method="POST">   
              
  <table border="2" style="margin-top:30px;" id="datashow" width="80%">
    <tr>
          <td><strong><font color="red">*</font>ACTUAL CLOSING DATE FOR ACTION :</strong></td>
          <td valign="top"><input type="date" id="real_date" name="real_date" value="<?php echo $row['Dateend']; ?>"  style="width:100%"></td>
    </tr> 

    <tr>
          <td><strong>COMMENTS :</strong></td>
          <td><input type="text" id="comments" name="comments" value="<?php echo $row['comments']; ?>" style="width:100%;height:150px;"></td>
    </tr> 
              
    <tr>
          <td colspan="2" align="center"><input type="submit" class="button" name="update" value="UPDATE" style="height:50px;"></td>
    </tr>
              
  </table> <!-- end of table 'execution' -->
     
           
<?php
    include 'C:\xampp\htdocs\Project\MyCode\HTML\footer.php';
?>



