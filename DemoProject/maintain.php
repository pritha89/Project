<?php
// This page is available only to control directors
include 'C:\xampp\htdocs\Project\MyCode\DemoProject\header_dir.php';
?>
<body>
<br>

<?php include 'connect_db.php'; ?>
<br><br>

<div class="new_control_form_now"><br><br>

<form name="f_maintain_records" method="post" >

<center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<table border="2">
     <tr>
         <td>
            <select id="maintain" name="maintain" style="width: 300px;height: 50px;">
               <option value="Select your choice" disabled selected> Select your option</option>
               <option value="new_control">Create New Control</option>
               <option value="new_user">Create New User</option>
               <option value="show_user_list">Show User Details</option> 
               <option value="edit_user">Edit User Details</option>
               <option value="delete_user">Delete User</option>
            </select>
         </td>
     </tr>
     
     <tr>
         <td colspan="2" align="center">
             <input type="submit" name="submit" class="button" value="GO" onclick="fn_record_maintainance();" style="height:40px;"></a>
         </td>
     </tr>
</table>


<script type="text/javascript">
function fn_record_maintainance()
<?php
{
    $record_maintain=$_POST['maintain']; // The value of the above dropdown selection is stored in the variable
    if($record_maintain=="new_control") // If the user wants to enter new controls 
    { 
        header("location:new_control.php"); 
    }
    else if($record_maintain=="new_user") // If the user wants to create new user 
    {
        header("location:new_user.php"); 
    }
    else if($record_maintain=="delete_user") // If the user wants to delete existing user
    {
        header("location:delete.php"); 
    }
    else if($record_maintain=="edit_user") // If the user wants to edit existing user details
    {
       header("location:edit_select_user.php"); 
    }
    else if($record_maintain=="show_user_list") // If the user wants to view details of all users (both control directors and business users)
    {
       header("location:show_user_details.php"); 
    }
}
?>
</script>

<?php
    include 'C:\xampp\htdocs\Project\MyCode\DemoProject\footer.php';
?>
