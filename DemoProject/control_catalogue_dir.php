<?php
include 'C:\xampp\htdocs\Project\MyCode\DemoProject\header_dir.php';
?>

<head>
<title></title>

</head>
<body>



<br><br><br>
<div class="new_control_form_now">
<a href="control_view_dir.php"><img src="http://localhost:8012/Project/MyCode/images/back_button.png" style="float:left;height:30px;" title="Back to Process Selection"></a> 
<br>
    <div class="cat_right">
            
        <div ng-app="myapp1" ng-controller="mycontroller">  
    
        <form name="f_controltesting" method="post" id="frmMyformtesting" action=""><br><br>
  
            <?php
             $codeid_for_testing=$_GET['id']; //Get the code id the control who's data you want to extract.
             $user=$_SESSION['username']; // Extract user email id from session.
             $date_of_testing=$_SESSION['dateoftesting']; // Extract execution date from session.
             
             $rest = substr($codeid_for_testing, -3, 1); // Extract the first 3 characters of the codeid. This is used to judge the business area to which the codeid belongs.
             
            ?> 

            <?php

$conn=new mysqli("localhost","root","","test") or die("error");
$res=mysqli_query($conn,"select * from control_execute where codeid='$codeid_for_testing' ORDER BY execution_date DESC");
$res1=mysqli_query($conn,"select * from demo_project_controls where codeid='$codeid_for_testing'"); 


$row=mysqli_fetch_array($res);
$row1=mysqli_fetch_array($res1);
$codeid=$row['codeid'];
$testdate=$row['execution_date'];
$frequency=$row1['freq'];
$status_of_testing=$row1['status'];
$u=$row['user_email'];
$monthly_testing = date('Y-m-d', strtotime($testdate. ' + 25 days')); // Varibale store 30 days from the day the control is executed. 
$quarterly_testing= date('Y-m-d', strtotime($testdate. ' + 75days'));  // Varibale store 90 days from the day the control is executed.
$twice_a_year_testing= date('Y-m-d', strtotime($testdate. ' + 180days'));  // Varibale store 180 days from the day the control is executed.
$yearly_testing= date('Y-m-d', strtotime($testdate. ' + 365days'));  // Varibale store 365 days from the day the control is executed.
$current_date= date('Y-m-d');  // Current date when is control is executed.

// Here the frequency set in the controls table is matched with the value in variable p. 
//If it monthly and the last executed date is less than 30 days the control will not be executed.
if($frequency=="Monthly") 
{
   if($codeid!="")
   {
     if($monthly_testing>$current_date)
    {  
       
       echo "<script type='text/javascript'>alert('Next earliest execution date: $monthly_testing ! ')</script>";
       echo "<meta http-equiv='refresh' content='0;url=control_view_dir.php'>";
    }
    else
    {
    display($codeid_for_testing);
    }
   }

else
    
    if($codeid_for_testing!=" ")
    {
    display($codeid_for_testing);
    }
   
}
// Here the frequency set in the controls table is matched with the value in variable p. 
//If it quarterly and the last executed date is less than 90 days the control will not be executed.

else
if($frequency=="Quarterly") 
{
   if($codeid!="")
   {
     if($quarterly_testing>$current_date)
    {  
       
       echo "<script type='text/javascript'>alert('Next earliest execution date: $quarterly_testing ! ')</script>";
       echo "<meta http-equiv='refresh' content='0;url=control_view_dir.php'>";
    }
    else
    {
    display($codeid_for_testing);
    }
   }

else
    
    if($codeid_for_testing!=" ")
    {
    display($codeid_for_testing);
    }
   
}

// Here the frequency set in the controls table is matched with the value in variable p. 
//If it twice a year and the last executed date is less than 180 days the control will not be executed.

else if($frequency=="Twice") 
{
   if($codeid!="")
   {
     if($twice_a_year_testing>$current_date)
    {  
       
       echo "<script type='text/javascript'>alert('Next earliest execution date: $twice_a_year_testing ! ')</script>";
       echo "<meta http-equiv='refresh' content='0;url=control_view_dir.php'>";
    }
    else
    {
    display($codeid_for_testing);
    }
   }

else
    
    if($codeid_for_testing!=" ")
    {
    display($codeid_for_testing);
    }
   
}

// Here the frequency set in the controls table is matched with the value in variable p. 
//If it yearly and the last executed date is less than 365 days the control will not be executed.
else if($frequency=="Yearly") 
{
   if($codeid!="")
   {
     if($yearly_testing>$current_date)
    {  
       
       echo "<script type='text/javascript'>alert('Next earliest execution date: $yearly_testing ! ')</script>";
       echo "<meta http-equiv='refresh' content='0;url=control_view_dir.php'>";
    }
    else
    {
    display($codeid_for_testing);
    }
   }

else
    
    if($codeid_for_testing!=" ")
    {
    display($codeid_for_testing);
    }
   
}
$conn->close();


function display($codeid_details)
{
    include 'connect_db.php'; ?>
    <table border='1' style="width:80%" >
    
   
    <th style="width:80px;">Control Id</th>
    
    <th style="width:250px">Control Activity & Evidence</th>
    
    <th style="width:100px">Frequency</th>
   
    </tr>

    <!--Codeid, evidence and frequency is displayed to the user for his convenience, so he can relate to the data while executing the control -->
    <?php 
    while($row=$result2->fetch_assoc())
    {
        if($codeid_details==$row["codeid"])
    
        {
        echo "<td valign='top';align='justify';>"  .$row["codeid"]."</td>";

       
        
         echo "<td valign='top';align='justify';>"  .$row["evidence"]."</td>";
        
        
 
         echo "<td valign='top';align='justify';>"  .$row["freq"]." ".$row["twice_start"]." ".$row["twice_end"]." ".$row["Yearly_select"]."</td>";
 

        echo "</tr>";
        }
    }
    echo "</table>";
}   // End of function display  
?>              

<!--The following table contain fields that the user needs to fill in to evaluate the controls. 
If the control fails a hidden panel is displayed which contains a set of questions to why the control fails and who can solve the issue. 
For passed control a separate hidden panel opens. 
The user is not allowed to move forward till he replies to all the fields in the table.
Details of each of the fields in the table has been given in the documentation.-->

                
                 <input type="hidden" name="execute_date" ng-model="execute_date" ng-init="execute_date='<?php echo $date_of_testing; ?>'" style="width:100%;height:30px;" >
                <input type="hidden" name="user_email" ng-model="user_email" ng-init="user_email='<?php echo $user; ?>'" style="width:100%;height:30px;" >
                
                <?php include 'connect_db.php'; ?>
        
        <table border="2" style="margin-top:30px;" id="datashow" width="80%">
                <tr>
                    <td style="width:400px;"><strong>*BUSINESS AREA  :</td>
                    <td>
                       <select id="business_area" name="taskOption" ng-model="business_area" style="width:100%;height: 40px;"> 
                        <option value="Select your choice" disabled selected > Select your Business Area</option>
                        <?php 
                          // sql query corresponding to result1 can be found in connect_db.php
                         while($row1=mysqli_fetch_array($result1)):;?>
                         <option value="<?php echo $row1[1]; ?>">
                         <?php echo $row1[1]; ?></option>
                         <?php endwhile; ?>
                     </select>
                   </td>
               </tr>
               <td style="width:400px;"><strong>*CONTROL ID:</strong></td>
               <td><input type="text" name="codeid" ng-model="codeid" style="width:99.5%;height:40px;" placeholder='Please control id here' ></td></tr>
               <tr>
                   <td style="width:400px;"><strong>*PROCESS  :</td>
                   <td>
                       <select id="process" name="taskOption1" ng-model="process" style="width:100%;height: 40px;">
                         <option value="Select your choice" disabled selected> Select your Process</option>
                            <?php 
                               // sql query corresponding to result3 can be found in connect_db.php
                               while($row2=mysqli_fetch_array($result3)):;
                            ?>
                            <option value="<?php echo $row2[1]; ?>">
                            <?php echo $row2[1]; ?></option>
                            <?php endwhile; ?>
                       </select></td>
              </tr>
              
              <tr>
               
              </tr>
                <tr>
                <td style="width:400px;"><strong>*SAMPLE SELECTED  :</strong></td> 
                <td><select id="sample_size" name="sample_size" ng-model="sample_size" style="width:100%;height: 40px;">
                   <option value="Select your choice" disabled selected> Select your Sample Size</option>
                   <?php while($row1=mysqli_fetch_array($result11)):;?>
                   <option value="<?php echo $row1[0]; ?>">
                   <?php echo $row1[0]; ?></option>
                   <?php endwhile; ?>
                   </select></td>
                  </tr>

                  <tr>
                <td style="width:400px;"><strong>*CORRECT SAMPLES  :</strong><br><font color="red" align="right"> (No. of perfectly correct samples) </font></td> 
                <td><select id="sample_selected" name="sample_selected" ng-model="sample_selected" style="width:100%;height: 40px;">
                   <option value="Select your choice" disabled selected> Select no of Sample Selected</option>
                   <?php while($row1=mysqli_fetch_array($result12)):;?>
                   <option value="<?php echo $row1[0]; ?>">
                   <?php echo $row1[0]; ?></option>
                   <?php endwhile; ?>
                   </select></td>
                  </tr>   

                    <tr>
                <td style="width:400px;"><strong>COMMENTS ON SAMPLING  :</strong><br><font color="red" align="right"> (E.g. mention the names the customers tested or other details identifying the samples) </font></td> 
                <td><textarea id="sample_comment" name="sample_comment" ng-model="sample_comment" rows="4" cols="80" style="width:99.5%"></textarea></td>
               </tr>       
  
                <tr>
                    <td><strong>*PASS/FAIL  :</strong><br><font color="red" align="right">(Pass=Everything in sample executed correctly) </font></td> 
                    <td><select id="result" name="result" ng-model="result" style="width:100%;height: 40px;" onchange="showHide(this)">
                            <option value="" disabled>-----Select an option-----</option>
                            <option value="fail" style="background:red;color:white;">fail</option>
                            <option value="pass" style="background:rgb(143, 212, 0);color:white;">pass</option>
                        </select>
                    </td>
               </tr>
 
              
        </table> <!-- end of table 'datashow' -->
             
                    
                        
                 
            <br><br>

               <!-- the following divfail opens only in case someone selects the result in the above result field to be fail.  -->
    <div id="divfail"> 
                   
        <table id="execution" border="2" width="80%">
             <tr>
                    <td><strong>*DESCRIPTION & FINDINGS : </strong>&nbsp <br><font color="red" align="right"> (Please provide details of execution) </font></td>
                    <td><textarea id="finding1" name="finding1" ng-model="finding1" rows="4" cols="80" style="width:99.5%"></textarea></td>
             </tr>
   
             <tr>
                    <td><strong>*DESIGN OF CONTROL :&nbsp</strong><br><font color="red" align="right"> (Is Control measuring/revealing the assumed risk ?) </font></td>    
                    <td><select id="efficiency1" name="efficiency1" ng-model="efficiency1" style="width:100%;height: 40px;">
                    <option value="" disabled selected>-----Select Design of Control -----</option>
                    <option value="Incorrect Design of Control">Incorrect Design of Control</option>
                    <option value="Appropriate Design of Control">Appropriate Design of Control</option>
                        </select>
                    </td>
             </tr>
                 
             <tr>
                    <td><strong>*REASON FOR FAILURE :&nbsp</strong><br><font color="red" align="right"> (Why the control failed ?) </font></td>    
                    <td><select id="fail_reason" name="fail_reason" ng-model="fail_reason" style="width:100%;height: 40px;">
                            <option value="" disabled selected>-----Select Reason For Failure -----</option>
                            <option value="Inadequate/Inappropriate Discipline">Inadequate/Inappropriate Discipline</option>
                            <option value="Lack of Process in Area">Lack of process in the Area</option>
                            <option value="Unimplemented Process">Unimplemented Process</option>
                           
                        </select>
                    </td>
             </tr>
             
             <tr>
                    <td style="width:400px;"><strong>*PERSON FOR CORRECTIVE ACTIONS :</strong><br><font color="red" align="right">(Please provide e-mail id ) </font></td>    
                    <td>
                        <input type="text" name="person_name" ng-model="person_name" style="width:99.5%;height: 40px;" placeholder='Please put second email id' >
                        <input type="text" name="person_name_one" ng-model="person_name_one" style="width:99.5%;height: 40px;" placeholder='Please put second email id(optional)' >
                        <input type="text" name="person_name_two" ng-model="person_name_two" style="width:99.5%;height: 40px;" placeholder='Please put third email id(optional)' >
                   </td>
             </tr>
              
             <tr>
                   <td><strong>*ACTIONS REQUIRED  :</strong><br><font color="red" align="right"> (Please describe the corrective actions expected) </font></td> 
                   <td><textarea id="actions" name="actions" ng-model="actions" rows="4" cols="70" style="width:99.5%"></textarea></td>
             </tr>
              
             <tr>
                 <td><strong>*PLANNED CLOSING DATE FOR ACTION :</strong><br><font color="red" align="right"> (Please enter date in yy-mm-dd format.E.g:2010-06-06) </font></td>
                 <td><input type="date" id="Dateend" name="Dateend" ng-model="Dateend" style="width:99.5%;height: 40px;"></td>
             </tr> 
    
             <tr>
                  <td colspan="2" align="center"><input type="button" name="btn111" class="button" value="SUBMIT" ng-click="insertdatafail();" style="color:black;text-align:center;height:50px;"></td>
             </tr>
              
        </table> <!-- end of table 'execution' -->
     
    </div> <!-- End of divfail -->
   
    <!-- the following divpass opens only in case someone selects the result in the above result field to be pass.  -->
    <div id="divpass"> 
    
       <table id="pass" border="2" width="80%">
       <tr>
       <td><strong>*DESCRIPTION & FINDINGS : </strong>&nbsp <br><font color="red" align="right"> (Please provide details of execution) </font></td>
       <td><textarea id="finding" name="finding" ng-model="finding" rows="4" cols="80" style="width:99.5%"></textarea></td>
</tr>
   
       
             <tr>
                 <td><strong>*DESIGN OF CONTROL  :&nbsp</strong><br><font color="red" align="right"> (How well the control reveals/mitigates the risk) </font></td>    
                 <td><select id="efficiency" name="efficiency" ng-model="efficiency" style="width:100%;height: 40px;">
                        <option value="" disabled selected>-----Select Design of Control -----</option>
                        <option value="Incorrect Design of Control">Incorrect Design of Control</option>
                        <option value="Appropriate Design of Control">Appropriate Design of Control</option>
                     </select>
                </td>
            </tr>

        
             <tr>
                 <td colspan="2" align="center">
                 <input type="button" name="btn110" class="button" value="SUBMIT" ng-click="insertdatapass();" style="color:black;text-align:center;height:50px;" ></td></tr></table>
    
    </div>  <!-- End of divpass -->
      
    </form> <!-- End of form 'frmMyform' -->
    <br>
    </div>  <!-- End of myController -->
    </div>  <!-- End of div cat_right -->
    </div>  <!-- End of div new_control_form _now-->
   
    <?php
    include 'C:\xampp\htdocs\Project\MyCode\DemoProject\footer.php';
    ?>
</body>
</DemoProject>

<style type="text/css">

  #divfail,#divpass
  {
    display: none;
  }

</style>

<script type="text/javascript">

function showHide(elem)
{
    if(elem.selectedIndex != 0) {
         //hide the divs
         for(var i=0; i < divsO.length; i++) {
             divsO[i].style.display = 'none';
        }
        //unhide the selected div
        document.getElementById('div'+elem.value).style.display = 'block';
    }
}
 
window.onload=function() 
{
    //get the divs to show/hide
    divsO = document.getElementById("frmMyformtesting").getElementsByTagName('div');
    document.getElementById("Twice_select").style.display='none';
        document.getElementById("Yearly_select").style.display='none';
}

</script>

<script>
var app=angular.module("myapp1",[]);
app.controller("mycontroller",function($scope,$http)
{                             
                           
                              $scope.insertdatapass=function()
                             {                         
                       
                               // values from all the above fields are saved in variables to validate. This function is called in case the control passes.
                               var control_test_findings=document.f_controltesting.finding.value;
                               var control_efficiency=document.f_controltesting.efficiency.value;
                               var control_result=document.f_controltesting.result.value;
                               var s_size=document.f_controltesting.sample_size.value;
                               var sa_selected=document.f_controltesting.sample_selected.value;
                               
                           
                               if(control_test_findings=="")
                               {
                                   alert("Please fill in your Findings");
                                   document.f_controltesting.finding.focus();
                                   return false;
                                
                                   
                               }  //End of if for 'control_test_findings'

                               else if(s_size=="")
                               {
                                   alert("Please fill in your Sample Size");
                                   document.f_controltesting.sample_size.focus();
                                   return false;  
                               }  //End of if for 's_size'

                               else if(sa_selected=="")
                               {
                                   alert("Please fill in your Sample selected number");
                                   document.f_controltesting.sample_selected.focus();
                                   return false;
                               }  //End of if for 's_select'
                              
                               else if(control_efficiency=="")
                               {
                                   alert("Please fill efficiency of the control");
                                   document.f_controltesting.efficiency.focus();
                                   return false;
                               }  //End of if for 'control_efficiency'

                               else if(control_result=="")
                               {
                                   alert("Please fill in Control Result");
                                   document.f_controltesting.result.focus();
                                   return false;
                                
                                   
                               }  //End of if for 'control_result'
                               
                              else
                               {
                                $http.post(
                                    "insert_catalog_PASS.php",
                                     { 
                                         'codeid': $scope.codeid,
                                         'b_group': $scope.business_area,
                                         'process':$scope.process,
                                         'user_email':$scope.user_email,
                                         'execute_date':$scope.execute_date,
                                         'sample_size': $scope.sample_size,
                                         'sample_selected': $scope.sample_selected,
                                         'sample_comment':$scope.sample_comment,
                                         'finding': $scope.finding,
                                         'efficiency': $scope.efficiency,
                                         'result': $scope.result
                                     }   //End of insert query for for pass button
                                  ).success(function(data)
                                  { 
                                    
                                         window.location.href = "control_view_dir.php";
                                    
                                         $scope.codeid=null;
                                         $scope.b_group=null;
                                         $scope.process=null;
                                         $scope.user_email=null;
                                         $scope.execute_date=null;
                                         $scope.sample_size=null;
                                         $scope.sample_selected=null;
                                         $scope.sample_comment=null;
                                         $scope.finding=null;
                                         $scope.efficiency=null;
                                         $scope.result=null;
                                         $scope.twice_start=null;
                                         $scope.twice_end=null;
                                         $scope.Yearly_start=null;
                                   } //End of alert for successful entry
                                 ); //End of function(data)
                               } //End of else block.
                               
                            }; //End of insertdataone function().
                         
                                $scope.insertdatafail=function()
                                {                         
                                
                                 // values from all the above fields are saved in variables to validate. This function is called in case the control fails.
                                var control_test_findings=document.f_controltesting.finding1.value;
                                var control_efficiency=document.f_controltesting.efficiency1.value;
                                var control_result=document.f_controltesting.result.value;
                                var control_reson_for_failure=document.f_controltesting.fail_reason.value;
                                var person_responsible=document.f_controltesting.person_name.value;
                                var control_required_actions=document.f_controltesting.actions.value;
                                var control_expected_completion_date=document.f_controltesting.Dateend.value;
                                var s_size=document.f_controltesting.sample_size.value;
                                var sa_selected=document.f_controltesting.sample_selected.value;
                              
                                var atpos = person_responsible.indexOf("@");
                                var dotpos = person_responsible.lastIndexOf(".");
                                var regEx = /^\d{4}-\d{2}-\d{2}$/;

                                if(control_test_findings=="")
                                {
                                   alert("Please fill in your Findings");
                                   document.f_controltesting.finding1.focus();
                                   return false;
                                }  //End of if for 'control_test_findings'
                                
                                else if(s_size=="")
                                {
                                   alert("Please fill in your Sample Size");
                                   document.f_controltesting.sample_size.focus();
                                   return false;
                                }  //End of if for 'sample_size'

                                else if(sa_selected=="")
                                {
                                   alert("Please fill in your Sample Selected");
                                   document.f_controltesting.sample_selected.focus();
                                   return false; 
                                }  //End of if for 'sample_selected'
                              
                                else if(control_efficiency=="")
                                {
                                   alert("Please fill efficiency of the control");
                                   document.f_controltesting.efficiency1.focus();
                                   return false;
                                }  //End of if for 'control_efficiency'
                               
                                else if(control_result=="")
                                {
                                   alert("Please fill in Control Result");
                                   document.f_controltesting.result.focus();
                                   return false;
                                } //End of if for 'control_result'

                                else if(control_reson_for_failure=="")
                                {
                                   alert("Please fill in Fail Reason");
                                   document.f_controltesting.fail_reason.focus();
                                   return false;
                                } //End of if for 'control_reson_for_failure'
                             
                               else if(person_responsible=="")
                               {
                                   alert("Please fill in Email Id");
                                   document.f_controltesting.person_name.focus();
                                   return false;
                               } //End of if for 'person_responsible'

                               else if (atpos<1 || dotpos<atpos+2 || dotpos+2>=person_responsible.length) 
                               {
                                     alert("Not a valid e-mail address");
                                     return false;
                               } // Checking email id format
                               
                               else if(control_required_actions=="")
                               {
                                   alert("Please fill in Actions Required");
                                   document.f_controltesting.actions.focus();
                                   return false;
                               } //End of if for 'control_required_actions'

                               else if(control_expected_completion_date=="")
                               {
                                   alert("Please fill in your Closing Date");
                                   document.f_controltesting.Dateend.focus();
                                   return false;   
                               } //End of if for 'control_expected_completion_date'

                               else if(Date.parse(control_expected_completion_date)-Date.parse(new Date())<0) 
                               {
                                 alert("Please fill in later dates");
                               } // checking if old dates are being inserted

                               else if(!control_expected_completion_date.match(regEx)) 
                               {
                                 alert("Please fill in right date format");
                               } //  required to check date format only in cases the date is entered manually

                               else
                               {
                                   $http.post(
                                        "insert_catalog_FAIL.php",
                                        {  
                                             'codeid': $scope.codeid,
                                             'b_group': $scope.business_area,
                                             'process':$scope.process,
                                             'user_email':$scope.user_email,
                                             'execute_date':$scope.execute_date,
                                             'sample_size': $scope.sample_size,
                                             'sample_selected': $scope.sample_selected,
                                             'sample_comment':$scope.sample_comment,
                                             'finding': $scope.finding1,
                                             'efficiency': $scope.efficiency1,
                                             'result': $scope.result,
                                             'fail_reason':$scope.fail_reason,
                                             'person_name' :$scope.person_name,
                                             'person_name_one':$scope.person_name_one,
                                             'person_name_two': $scope.person_name_two,
                                             'actions' :$scope.actions,
                                             'Dateend' :$scope.Dateend   
                                        }   //End of insert query for for fail button
                                          ).success(function(data)
                                            { 
                                              
                                              window.location.href = "control_view_dir.php";
                                            
                                             $scope.codeid=null;
                                             $scope.b_group=null;
                                             $scope.process=null;
                                             $scope.user_email=null;
                                             $scope.execute_date=null;
                                             $scope.fail_reason=null;
                                             $scope.sample_size=null;
                                             $scope.sample_selected=null;
                                             $scope.sample_comment=null;
                                             $scope.finding1=null;
                                             $scope.efficiency1=null;
                                             $scope.result=null;
                                             $scope.person_name=null;
                                             $scope.person_name_one=null;
                                             $scope.person_name_two=null;
                                             $scope.actions=null;
                                             $scope.Dateend=null;
                                                    
                                            } 
                                            //End of alert for successful entry
                                            ); //End of function(data)
                                }  //End of else block
                               
                             };   // End of insertdatatwo function


    }  //End of mycontroller.
 );  //End of app.controller
</script>

<?php
  include 'C:\xampp\htdocs\Project\MyCode\DemoProject\footer.php';
?>

