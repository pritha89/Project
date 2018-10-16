<?php
include 'C:\xampp\htdocs\Project\MyCode\DemoProject\header_dir.php';
?>
<!-- The user email is entered and the corresponding business profile is selected.display
The user is redirected to edit_user.php-->
    
<div class="control_buttom_new"><br><br>
<div class="new_control_form_now">
<div class="cat_right">
<br> 
<a href="maintain.php">
    <img src="http://localhost:8012/Project/MyCode/images/back_button.png" style="float:left;height:40px;" title="Back to Group and Process Selection"> 
</a>          

<form name="f_edit_user_details" id="f_update" action="" method="POST">   
<center><br><br><br>

<table border='1' width="70%">

  <tr>
   <td style="font-family:Arial; height:40px;"><b>Enter Email Id
   </td>
   <td><input type="text" name="user_email" value="" style="height:40px; width:100%">
   </td>
  </tr>

  <tr>
    <td><b>Enter User Profile</td>
    <td>
      <select name="user_profile" style="width:100%;height:40px;" >
         <option value="Select your choice" disabled selected> Select the new user's profile</option>
         <option value="Business User">Business User</option>
         <option value="Control Director">Control Director</option>
      </select>
    </td>
  </tr>

  <tr>
     <td colspan="2" align="center"><input type="submit" class="button" name="btn1" value="SUBMIT" style="height:40px;" onclick="edituser();">
     </td>
  </tr>

</table>
</form>

<script type="text/javascript">
       
       function edituser()
       <?php
        {   
            $email=$_POST['user_email']; // Save user email id
            $user_profile=$_POST['user_profile']; // Save user business profile
            if($email=="" || $user_profile=="")
            {
                echo "<script type='text/javascript'>alert('Please enter user details!')</script>";
            }
            else
            {
            $_SESSION['user_email']=$email; // Upload in session to be forwarded to next page
            $_SESSION['user_profile']=$user_profile; // same as above
            header("location:edit_user.php");
            }
        }
       ?>
       
</script>

<?php
    include 'C:\xampp\htdocs\Project\MyCode\DemoProject\footer.php';
?>


        
           
           
           
           
           
             
           