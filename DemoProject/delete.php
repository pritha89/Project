<?php
include 'C:\xampp\htdocs\Project\MyCode\DemoProject\header_dir.php';
?>

<!-- Here the system checks if the user email is a valid email id. 
If the user is a valid user, the system checks if's the user is a business user or a control director.
If the user is a business user he is deleted from 'table1' or if he is a control director he is deleted from 'table2'. 
Once the user is deleted successfully, the user is redirected to 'maintain.php' -->

<br>

<br>
 <div class="new_control_form_now">
    <br> 
        <a href="maintain.php">
           <img src="http://localhost:8012/Project/MyCode/images/back_button.png" style="float:left;height:40px;" title="Back to Group and Process Selection"> 
        </a>                              
    
    <form name="delete_user" method="POST" action="">
    
    <center><br><br><br>
    
    <table border='1' width="70%">

     <tr>
       
         <td style="font-family:Arial; height:40px;"><b>Enter Email Id
         </td>

         <td><input type="text" name="user_email" value="" style="height:40px; width:100%">
         </td>
         
     </tr>

     <tr>
      
         <td><b>Enter User Profile
         </td>

         <td> 
         <!-- There are only two types of users. Either they are control directors or business users. -->
              <select name="user_profile" style="width:100%;height:40px;" > 
                 <option value="Select your choice" disabled selected> Select the new user's profile</option>
                 <option value="Business User">Business User</option>
                 <option value="Control Director">Control Director</option>
              </select>
         </td>
         
     </tr>

     <tr>
         <td colspan="2" align="center"><input type="submit" class="button" name="btn1" value="SUBMIT" style="height:40px;">
         </td>
     </tr>

    </table>
    
    </form>

<?php

include 'connect_db.php';
 
if(isset($_POST['user_email'])) // If the textbox containing user email is not empty, we next match it with the business profile of the user
{
    
    $email=$_POST['user_email'];
    $user_profile=$_POST['user_profile'];
    if($user_profile=="Business User") 
    { 
        $sql="delete from table1 where buser_email='$email'";  
        $res=mysqli_query($connect,$sql) or die("couldn't connect".mysqli_error($connect));
        echo "<script type='text/javascript'>alert('Data Deleted!')</script>";
        echo "<meta http-equiv='refresh' content='0;url=maintain.php'>";
    }
    else if($user=="Control Director")
    {
        $sql="delete from table2 where duser_email='$email'";
        $res=mysqli_query($connect,$sql) or die("couldn't connect".mysqli_error($connect));
        echo "<script type='text/javascript'>alert('Data Deleted!')</script>";
        echo "<meta http-equiv='refresh' content='0;url=maintain.php'>";
    }

}

?>

<?php
    include 'C:\xampp\htdocs\Project\MyCode\DemoProject\footer.php';
?>
