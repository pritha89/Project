<?php
include 'C:\xampp\htdocs\Project\MyCode\HTML\header_dir.php';
?>

    
    <div class="control_buttom_new"><br><br>
    <div class="new_control_form_now">
    <div class="cat_right">
    <br> 
    <a href="edit_select_user.php"><img src="http://localhost:8012/Project/MyCode/images/back_button.png" style="float:left;height:40px;" title="Back to Group and Process Selection"> </a>

<?php

include 'connect_db.php'; //connects to database

$user_email=$_SESSION['user_email']; // transfers session value of user email to a variable
$user_profile=$_SESSION['user_profile']; // transfers session value of business profile to a variable
if($user_profile=="Control Director") // If it's a control director data is selected from table2
{
    $res=mysqli_query($connect,"select * from table2 where duser_email='$user_email'");
    $row=mysqli_fetch_array($res);
}
else if($user_profile=="Business User") // If it's a control director data is selected from table1
{
    $res=mysqli_query($connect,"select * from table1 where buser_email='$user_email'");
    $row=mysqli_fetch_array($res);
}
if($user_profile=="Control Director") // The following section is to update data in table2
{
    if(isset($_POST['duser_email']))
   {
       $duser_name=$_POST['duser_name'];
       $duser_lname=$_POST['duser_lname'];
       $duser_pass=$_POST['duser_pass'];
       $duser_email=$_POST['duser_email'];
       $sql="update table2 set 
               duser_name='$duser_name',
               duser_lname='$duser_lname',
               duser_pass='$duser_pass',
               duser_email='$duser_email'
               where duser_email='$user_email'";
               $res=mysqli_query($connect,$sql) or die("couldn't connect".mysqli_error($connect));
               echo "<script type='text/javascript'>alert('User details updated!')</script>";
               echo "<meta http-equiv='refresh' content='0;url=edit_select_user.php'>";
   }
}

else if($user_profile=="Business User") // The following section is to update data in table1s
{
    if(isset($_POST['buser_email']))
   {
       $buser_name=$_POST['buser_name'];
       $buser_lname=$_POST['buser_lname'];
       $buser_pass=$_POST['buser_pass'];
       $buser_email=$_POST['buser_email'];
       $b_group=$_POST['b_group'];
       $sql="update table1 set 
               buser_name='$buser_name',
               buser_lname='$buser_lname',
               buser_pass='$buser_pass',
               buser_email='$buser_email',
               b_group='$b_group'
               where buser_email='$user_email'";
               $res=mysqli_query($connect,$sql) or die("couldn't connect".mysqli_error($connect));
               echo "<script type='text/javascript'>alert('User details updated!')</script>";
               echo "<meta http-equiv='refresh' content='0;url=edit_select_user.php'>";
   }
}
?>

<form name="f_edit_user" action="" method="POST">
<center><br><br><br><table border='1' width="90%">
<?php
if($user_profile=="Control Director") // Field available to be updated for Control Director
{  
?>
    <tr>
        <td colspan='2' align='center' style='width: 600px;height: 30px; font-family:Arial;'><b>EDIT USER DETAILS</b></td>
    </tr>

    <tr>
        <td><b>FIRST NAME :</b></td>
        <td valign='top';align='justify';><input type="text" name="duser_name" value="<?php echo $row['duser_name']; ?>" style='width:100%;height:30px;'></td>
    </tr>
    
    <tr>
        <td><b>LAST NAME :</b></td>
        <td valign='top';align='justify';><input type="text" name="duser_lname" value="<?php echo $row['duser_lname']; ?>" style='width:100%;height:30px;'></td>
    </tr>
    
    <tr>
        <td><b>PASSWORD :</b></td>
        <td valign='top';align='justify';><input type="text" name='duser_pass' value="<?php echo $row['duser_pass']; ?>" style='width:100%;height:30px;'></td>
    </tr>
    
    <tr>
        <td><b>USER EMAIL</b></td>
        <td valign='top';align='justify';><input type='text' name='duser_email' value="<?php echo $row['duser_email']; ?>" style='width:100%;height:30px;'></td>
    </tr>
        
<?php
}
else if($user_profile=="Business User")
{ // Field available to be updated for Business Users
?>
    <tr>
        <td colspan='2' align='center' style='width: 600px;height: 30px; font-family:Arial;'><b>EDIT USER DETAILS</b></td>
    </tr>  

    <tr>
        <td><b>FIRST NAME :</b></td>
        <td valign='top';align='justify';><input type="text" name="buser_name" value="<?php echo $row['buser_name']; ?>" style='width:100%;height:30px;'></td>
    </tr>

    <tr>
        <td><b>LAST NAME :</b></td>
        <td valign='top';align='justify';><input type="text" name="buser_lname" value="<?php echo $row['buser_lname']; ?>" style='width:100%;height:30px;'></td>
    </tr>

    <tr>
        <td><b>PASSWORD :</b></td>
        <td valign='top';align='justify';><input type="text" name='buser_pass' value="<?php echo $row['buser_pass']; ?>" style='width:100%;height:30px;'></td>
    </tr>

    <tr>
        <td><b>USER EMAIL</b></td>
        <td valign='top';align='justify';><input type='text' name='buser_email' value="<?php echo $row['buser_email']; ?>" style='width:100%;height:30px;'></td>
    </tr>

    <tr>
        <td><b>BUSINESS AREA</b></td>
        <td valign='top';align='justify';><input type='text' name='b_group' value="<?php echo $row['b_group']; ?>" style='width:100%;height:30px;'></td>
    </tr>

<?php
}
?>
    <tr>
        <td colspan="2" align="center"><input type="submit" class="button" name="update" value="update" style="height:50px;"></td>
    </tr>
        
    <br>

</table>

</form>

<?php
    include 'C:\xampp\htdocs\Project\MyCode\HTML\footer.php';
?>
