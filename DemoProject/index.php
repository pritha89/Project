
    <head>
    <title>Welcome to Control Monitor Application</title>
         <link href="http://localhost:8012/Project/MyCode/Stylesheets/style_main.css" rel="stylesheet" />
        <!-- The main styling page for the input form consisting of username and password. -->
         <style>
   body  {
    
    
   }
  
</style> 
 
    </head>
    <center><body style="background-image: url('http://localhost:8012/Project/MyCode/images/background_pic.jpg');background-repeat: no-repeat;
    background-size:100%;" > <br><br><br><br><br><br>
    
    <?php
    if($_POST)
    {
     $hostname="localhost"; 
     $username="root";
     $password=""; // No password has been set for database connectivity
     $databaseName="test"; // Test is the name of the database in which the tables have been stored.

     $username1=$_POST['Username1']; //The email id entered by the user in the textbox is stored in this variable
     $password1=$_POST['Password1'];//The password entered by the user is stored in this variable
     
     
     $connect=mysqli_connect($hostname,$username,$password,$databaseName); // A connection is established between the form and the database
     $query_login_buser= "select * from table1 where buser_email='$username1' and buser_pass='$password1'"; //Data is selected from table1 if the email entered by the user matches with the field 'buser_email' and the password matches with 'buser_pass'.This 'Table1' consists data only for business users.
     $query_login_director= "select * from table2 where duser_email='$username1' and duser_pass='$password1'"; //Data is selected from table2 if the email entered by the user matches with the field 'duser_email' and the password matches with 'duser_pass'.This 'Table2' consists data only for control directors.
     $query_gdpr= "select * from gdpr where buser_email='$username1'"; //Data is selected from gdpr if the email entered by the user matches with the field 'buser_email' .
     $result_login_director= mysqli_query($connect,$query_login_director); // Resultant row from table2 is stored
     $result_login_buser= mysqli_query($connect,$query_login_buser);// Resultant row from table1 is stored
     $result_gdpr= mysqli_query($connect,$query_gdpr);// Resultant row from gdpr is stored

     
     if(mysqli_num_rows($result_login_buser)==1) // If the result from the select statement is not null
     {
         session_start(); //start session to save data which will be used in later pages
         $user=$row['buser_name']; //The user email extracted from table1 is stored here.
         $us_id=$row['id'];//The user id extracted from table1 is stored here. This is a unique value.
         $bussiness_group=$row['b_group'];//The business area of the user extracted from table1 is stored here.

         $_SESSION['test']='true'; // If the database is found
         $_SESSION['username']=$username1; // Save the email id of the logged in user in a session to be forwarded in other pages.
         $_SESSION['u_id']=$us_id;// Save the user id of the logged in user in a session to be forwarded in other pages.
         $em=$_SESSION['username']; // Upload the session value to a variable
         $_SESSION['business']=$bussiness_group;// Save the business area of the logged in user in a session to be forwarded in other pages.
        
         header('location:control_select.php');// User is redirected to control_select.php
     }
     else if(mysqli_num_rows($result_login_director)==1)  // If the result from the select statement is not null
     {
        session_start(); //start session to save data which will be used in later pages
         $bussiness_group=$row['b_group'];//The user business area extracted from table2 is stored here.
         $_SESSION['test']='true';// If the database is found
         $_SESSION['username']=$username1;// Save the email id of the logged in user in a session to be forwarded in other pages.
         header('location:control_select_dir.php');// User is redirected to control_select_dir.php

     }
     else
     {
        echo "<script type='text/javascript'>alert('Unauthorised User!')</script>";// If the user email is not found in either table1 or table2 the user is invalid as his records couldn't be found in the system
     }
    }
    ?>
      
      
      <div class="header_main_image">
      <center> 
    </div>
                   
    <center>
                  
     
         <!--The following section is used to design the form containing simply two text boxes and a button. A post method is used to transfer data   -->                   
    <div class="header_main_admin">
    
        <form id="accesspanel" action="" method="POST">
        <h1 id="litheader"><p class="a">WELCOME TO CONTROLS MONITOR</a></h1>
        <div class="inset">
        <input id='username' class='text'   type="text" name="Username1" placeholder='Please put your email id here' value="">
        <input id='password' class='pass'  type="password" name="Password1"placeholder='Your preferred password' value="">
        <div style="text-align: center;">
        </div>
        <input class="loginLoginValue" type="hidden" name="service" value="login" />
        </div>
        <p class="p-container">
          <input type="submit" name="Login" id="go" value="LOG ME IN" onclick="login();" 
          <?php
        
         $gdpr_date = date('Y-m-d'); // The date when the user logs in is saved for gdpr reporting.
         $_SESSION['gdpr_date']=$gdpr_date; 
        
      ?>
          
          
          >
        </p>
        </form>
    </div>
    
    </center>  
      
    </div>  
    </div>
          
    </body>
</html>
<style>
p.a {
    font-family: Arial Black;
}
</style>

<!--The following javascript function is called to insert the date into the database, when the user logs into the tool. The function is called when the user clicks on submit  -->

<script type="text/javascript">
function login()
<?php
{
    if(mysqli_num_rows($result_login_buser)==1) // If the result from the select statement is not null
    {
       if(mysqli_num_rows($result_gdpr)==null) // If this user email is not existing in the table gdpr, only then the user is added
       {
     $query_insert= "insert into gdpr(buser_email,b_group,log_in) values ('$username1','$bussiness_group','$gdpr_date')";
     $result_insert= mysqli_query($connect,$query_insert);
       }
    }
    else if(mysqli_num_rows($result_login_director)==1)
    {  if(mysqli_num_rows($result_gdpr)==null)
        {
        $query_insert= "insert into gdpr(buser_email,b_group,log_in) values ('$username1','$bussiness_group','$gdpr_date')";
        $result_insert= mysqli_query($connect,$query_insert);
        }
    }
}
?>
</script>

<?php
    include 'C:\xampp\htdocs\Project\MyCode\HTML\footer.php';
?>

