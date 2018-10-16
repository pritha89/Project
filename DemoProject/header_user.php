<!DOCTYPE html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
<!-- This section contains jquery apis-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<link href="http://localhost:8012/Project/MyCode/Stylesheets/style_overall.css" rel="stylesheet" />
<link href="http://localhost:8012/Project/MyCode/Stylesheets/menu_style.css" rel="stylesheet" />
<link href="http://localhost:8012/Project/MyCode/Stylesheets/new_control_style.css" rel="stylesheet"  />
</head>
<center>
                                
<div class="main_container"><br>

<!-- This div contains the metsä logo on the top-left corner of every page-->
<div class="header_main_image">
    <img src="http://localhost:8012/Project/MyCode/images/metsa_slogan_make_the_most_of_vert_PRIMARY_COLOR_CMYK__office.jpg" height="100px" width="190px">
</div> <!-- close div for header_main_image-->

<!-- This div contains the 'Welcome..user email-id' on the top-right corner of every page and the LogOut button-->
<div class="header_main_admin">
    WELCOME......<?php 
    session_start();
    echo $_SESSION['username']; 
    ?> ! &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
   <a href="logout.php"><input type="submit" class="button" value="LOG OUT" style="height:40px;width:80px;margin-right:10px;color:rgb(255, 248, 248);"></a>     
</div> <!-- close div for header_main_admin-->     

<!-- This section contains menu bar which is fixed for all pages. This section is used to view controls, test controls and view results. -->        
<ul class="menu cf" >


  <li><a href="http://localhost:8012/Project/MyCode/HTML/intro.php">INTRODUCTION</a></li>

  <li>
    <a href="">CONTROL CATALOGUES</a>
      <ul class="submenu">
         <li><a href="http://localhost:8012/Project/MyCode/HTML/complete_catalogue.php">COMPLETE CATALOGUE</a></li>
         <li><a href="http://localhost:8012/Project/MyCode/HTML/control_select.php">PROCESS SPECIFIC </a></li>
      </ul>			
  </li>

  
  <li><a href="">REPORTS</a>
    <ul class="submenu">
      <li><a href="http://localhost:8012/Project/MyCode/HTML/reports_user.php">CONTROL REPORTS</a></li>
      
    </ul>			
  </li>
  
</ul> <!-- End of menu bar -->