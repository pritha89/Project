<!DOCTYPE html>
<head>
<!-- ANGULARJS APIS -->
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
<!-- JQUERY API-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<link href="http://localhost:8012/Project/MyCode/Stylesheets/style_overall.css" rel="stylesheet" />
<link href="http://localhost:8012/Project/MyCode/Stylesheets/menu_style.css" rel="stylesheet" />
<link href="http://localhost:8012/Project/MyCode/Stylesheets/new_control_style.css" rel="stylesheet" /> 
</head>
<center>
              
<div class="main_container">
<br>


<div class="header_main_admin">
           WELCOME......<?php 
           session_start();
            echo $_SESSION['username']; 
           ?> ! &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
          <a href="logout.php"><input type="submit" class="button" value="LOG OUT" style="height:40px;width:80px;margin-right:10px;color:rgb(255, 248, 248);"></a>    
             
</div> <!-- close div for header_main_admin-->   


<ul class="menu cf" >
<li><a href="http://localhost:8012/Project/MyCode/DemoProject/maintain.php">MAINTAIN</a>
</li>


<li>
  <a href="">CONTROL CATALOGUES</a>
  <ul class="submenu">
      <li><a href="http://localhost:8012/Project/MyCode/DemoProject/complete_catalogue_select.php">COMPLETE CATALOGUE</a></li>
      <li><a href="http://localhost:8012/Project/MyCode/DemoProject/control_select_dir.php">PROCESS SPECIFIC </a></li>
  </ul>				
</li>


<li>
   <a href="">REPORTS</a>
   <ul class="submenu">
      <li><a href="http://localhost:8012/Project/MyCode/DemoProject/reports.php">CONTROL REPORTS</a></li>
      <li><a href="http://localhost:8012/Project/MyCode/DemoProject/gdpr.php">GDPR REPORTS</a></li>
    </ul>			
</li>
</ul> <!-- End of menu bar -->
