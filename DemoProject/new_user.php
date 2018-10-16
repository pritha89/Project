
<?php
include 'C:\xampp\htdocs\Project\MyCode\DemoProject\header_dir.php';
include 'connect_db.php';      
?>

<html>
<br>
<body><br><br> 
<div class="new_control_form_now">

<a href="maintain.php">
     <img src="http://localhost:8012/Project/MyCode/images/back_button.png" style="float:left;height:50px;" title="Back to Process Selection">
</a> 
<br>
 <!-- To create a new user, the user must be classifies as either a control director or business user. -->   

<form name="f_newuser" id="f_newuser" method="post" action=""> 

<table border="2" style="width:70%">
<tr>
     <td><b>Select User Profile</td>
     <td>
         <select name="user" style="width:100%;height:30px;" >
             <option value="Select your choice" disabled selected> Select the new user's profile</option>
             <option value="Business User">Business User</option>
             <option value="Control Director">Control Director</option>
         </select>
     </td>
</tr>
<tr>
     <td style="width:400px;"><b>Enter User's First Name: </td>
     <td><input type="text" name="new_username"  value="" style="width:100%;height:30px;"></td>
</tr>

<tr>
     <td><b>Enter User's Last Name: </td>
     <td><input type="text" name="new_userlastname"  value="" style="width:100%;height:30px;"></td>
</tr>

<tr>
     <td><b>Enter Password: </td>
     <td><input type="text" name="new_userpass"  value="" style="width:100%;height:30px;"></td>
</tr>

<tr>
     <td><b>Enter Email Id: </td>
     <td><input type="text" name="new_useremail"  value="" style="width:100%;height:30px;"></td>
</tr>

<tr>
     <td><b>Enter Businesss Area: <br><font color="red" align="right"> (Fill in ONLY for Business Users NOT for Control Directors .) </font> </td>
     <td>
         <select name="taskOption" style="width:100%;height:30px;">
            <option value="Select your choice" disabled selected>---Select your Business Area---</option>
            <?php while($row1=mysqli_fetch_array($result1)):; // sql query corresponding to result1 can be found in connect_db.php?>
            <option value="<?php echo $row1[1]; ?>">
            <?php echo $row1[1]; ?></option>
            <?php endwhile; ?>
         </select>
     </td>
</tr>

<tr>
     <td colspan="2" align="center">
         <input type="submit" class="button" value="CREATE" name="create" style="width:15%;height:50px;" onclick="insertnewuser();">
     </td>
</tr>

</table>
</form>
</div>


<script type="text/javascript">

function insertnewuser()
<?php
{
    // The values from the text boxes are stored in variables. 
    // If the user is a control director his business group is not required.
    // Two separate tables are maintained for business user and control directors.
    // If it's a business user the data is saved in Table1
    // If it's a control director data is saved in Table2
    // For business users Business Group is a must but for control directors it's optional
    // Only control directors can create new users.
    
        $user=$_POST["user"];
        $new_username=$_POST["new_username"];
        $new_userlastname=$_POST["new_userlastname"];
        $new_userpass=$_POST["new_userpass"];
        $new_useremail=$_POST["new_useremail"];
        $new_bgroup=$_POST["taskOption"];
       
        if($user=="Business User")
       {
           $sql="insert into table1(buser_name,buser_lname,buser_pass,buser_email,b_group) values
                 ('$new_username','$new_userlastname','$new_userpass','$new_useremail','$new_bgroup')";
                 $res=mysqli_query($connect,$sql) or die("couldn't connect".mysqli_error($connect));
           echo "<script type='text/javascript'>alert('User Created!')</script>";
           echo "<meta http-equiv='refresh' content='0;url=control_select_dir.php'>";
               
       } // End of if statement

       else
      {     
           if($user=="Control Director")
        {
            $sql="insert into table2(duser_name,duser_lname,duser_pass,duser_email,b_group) values
                   ('$new_username','$new_userlastname','$new_userpass','$new_useremail','$new_bgroup')";
                   $res=mysqli_query($connect,$sql) or die("couldn't connect".mysqli_error($connect));
            echo "<script type='text/javascript'>alert('User Created!')</script>";
            echo "<meta http-equiv='refresh' content='0;url=control_select_dir.php'>";
        }
      } // End of else statement
} // End of insertnewuser() function
?>

</script>

<?php
    include 'C:\xampp\htdocs\Project\MyCode\HTML\footer.php';
?>

