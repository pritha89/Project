            
<?php
include 'C:\xampp\htdocs\Project\MyCode\DemoProject\header_dir.php';
?>
         
<br>

<?php include 'connect_db.php'; ?>
<br><br>    
  <!-- The loadBusinessArea() function calls the page load_business_group.php which is used to load the list of business area from the database-->                        
<div ng-app="myapp" ng-controller="usercontroller" ng-init="loadBusinessArea()">    
<div class="new_control_form_now">
<a href="maintain.php"><img src="http://localhost:8012/Project/MyCode/images/back_button.png" style="float:left;height:50px;" title="Back to Process Selection"> </a> 
<center>      

<form name="f_new_control" method="post" id="frmMyform_new_control" action="control_select_dir.php"><br><br>
       
<?php include 'connect_db.php'; // connects to database ?>  

<table border="2" style="border: 1px solid rgb(8, 8, 8);">    
            
    <tr>
        <th colspan="2" style="width: 600px;height: 30px; font-family:Arial;">NEW CONTROL DETAILS</th>
    </tr>
    
    <tr>
        <td style="font-family:Arial;"><b>*CONTROL ID : &nbsp </td>
        <td><input type="text" name="codeid" value="" style="width: 600px;height: 30px;" ng-model="codeid" class="form-control" ></td>
    </tr>
          
    <tr>
    <td style="font-family:Arial;"><b>*BUSINESS GROUP : &nbsp </td> 
        <td>
        <!-- The loadProcess loads the list of processes. The list of processes is not displayed untill the business area is selected-->
        <select name="business_group" ng-model="business_group" ng-change="loadProcess()" style="width: 600px;height: 30px;"> 
           <option value="" disabled selected>----------Select Group------</option>
           <option ng-repeat="business_group in business" value="{{business_group.group_name}}">{{business_group.group_name}}</option>
        </select>
        </td>
    </tr>
    
    <tr>
    <td style="font-family:Arial;"><b>*PROCESS AREA: &nbsp </td> 
        <td>
        <select name="process" ng-model="process"  style="width: 600px;height: 30px;">
             <option value="" disabled selected>----------Select Process------</option>
             <option ng-repeat="process in processes" value="{{process.process_name}}">{{process.process_name}}</option>
        </select>
        </td>
    </tr>
    
    <tr>
    <td style="font-family:Arial;"><b>*SUB PROCESS : &nbsp </td>
        <td><textarea id="subprocess" name="subprocess" ng-model="subprocess" rows="4" cols="80" style="width: 600px;"></textarea></td>
    </tr> 
    
    <tr>
    <td style="font-family:Arial;"><b>*RISK : &nbsp </td>
        <td><textarea rows="4" name="risk" ng-model="risk" cols="80" style="width: 600px;"></textarea></td>
    </tr>
    
    <tr>
    <td style="font-family:Arial;"><b>*CONTROL POINT NAME : &nbsp </td>
        <td><input  type="text" name="pointname" value="" style="width: 600px;height: 30px;" ng-model="pointname" class="form_control" ></td>
    </tr>
          
    <tr>
    <td style="font-family:Arial;"><b>*OBJECTIVE : &nbsp </td>
        <td><textarea id="objective" name="objective" ng-model="objective" rows="4" cols="80" style="width: 600px;"></textarea></td>
    </tr>
                    
    <tr>
    <td style="font-family:Arial;"><b>*CONTROL ACTIVITY : &nbsp </td>
        <td><textarea id="controlactivity" name="control_activity" ng-model="control_activity" rows="4" cols="80" name="comment" style="width: 600px;" required></textarea></td>
    </tr>
                   
    <tr>
    <td style="font-family:Arial;"><b>*EVIDENCE : &nbsp </td>
        <td><textarea id="evidence" name="evidence" ng-model="evidence" rows="4" cols="80" style="width: 600px;"></textarea></td>
    </tr>
    
    <tr>
    <td style="font-family:Arial;"><b>*TESTER : &nbsp </td>
        <td><input  type="text" name="owner" value="" style="width: 600px;height: 30px;" ng-model="owner" class="form_control"></td>
    </tr>
           
    <tr>
    <td style="font-family:Arial;"><b>*PERIOD (FREQUENCY) :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp</td>    
    <td><select id="freq" name="freq" ng-model="freq" style="width:600px;height: 30px;" onchange="showfreq();">
        <option value="" disabled selected>-----Select Frequency of Control Execution-----</option>
        <option value="Monthly">Monthly</option>
        <option value="Quarterly">Quarterly</option>
        <option value="Twice">Twice a Year</option>
        <option value="Yearly">Yearly</option>
        </select>
    </td>
    </tr>
    <!-- This div is required only if the frequency of execution is set either yearly or twice a year. -->            
    <div id="divTwiceorYearly">

    <!-- Id Twice_select is valid if the control needs to be tested twice a year. If this id is active, automatically Yearly_select is inactive.-->
     <tr id="Twice_select">
     <td style="font-family:Arial;"><b>*BY and BY  :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp</td>    
     <td style="font-family:Arial;">
         <select id="twice_start" name="twice_start" ng-model="twice_start" style="width: 295px;height: 30px;" >
         <option value="" disabled selected>Select </option>
         <?php while($row1=mysqli_fetch_array($result4)):;?>
         <option value="<?php echo $row1[1]; ?>">
         <?php echo $row1[1]; ?></option>
         <?php endwhile; ?>
         </select> 
                              
        <select id="twice_end" name="twice_end" ng-model="twice_end" style="width: 300px;height: 30px;" >
        <option value="" disabled selected>Select </option>
        <?php while($row1=mysqli_fetch_array($result5)):;?>
        <option value="<?php echo $row1[1]; ?>">
        <?php echo $row1[1]; ?></option>
        <?php endwhile; ?>
        </select> 
     </td>
    </tr>
    <!-- Id Yearly_select is valid if the control needs to be tested once a year. If this id is active, automatically Twice_select is inactive.-->
    <tr id="Yearly_select">
        <td style="font-family:Arial;"><b>*BY :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp</td>    
        <td><select id="Yearly_start" name="Yearly_start" ng-model="Yearly_start" style="width: 600px;height: 30px;" >
        <option value="" disabled selected>Select </option>
        <?php while($row1=mysqli_fetch_array($result6)):;?>
        <option value="<?php echo $row1[1]; ?>">
        <?php echo $row1[1]; ?></option>
        <?php endwhile; ?>
        </select></td>
    </tr>

    </div>  
    <tr>
        <td colspan="2" align="center"><input type="submit" class="button" name="btnInsert" class="btn btn_info"  ng-click="fnCreateControl()" value="ADD CONTROL" style="height:50px;" /></td>
        </tr></table> <br> <font color="white" size="5" align="right">All * marked fields are compulsory to fill.</font>
                    <br />
    </form>
    </div>               
    
<?php
include 'C:\xampp\htdocs\Project\MyCode\HTML\footer.php';
?>

<style type="text/css">
#divTwiceorYearly
{
    display: none; 
}
</style>

<script type="text/javascript">

// The showfreq() is used to hide/display rows based on what frequency of testing the user is setting for the controls. 
// If the user selects Twice, it means the control neeeds to be executed twice a year. So two months needs to be filled.
// If the user selects Yearly, it means the control neeeds to be executed once a year. So one month need to be filled.
function showfreq()
{
    var frequency=document.getElementById("freq").value;
    if(frequency=="Twice")
    {
        document.getElementById("Twice_select").style.display='';
        document.getElementById("Yearly_select").style.display='none';
    }
    else if (frequency=="Yearly")
    {
        document.getElementById("Twice_select").style.display='none';
        document.getElementById("Yearly_select").style.display='';
    }
    else
    {
        document.getElementById("Twice_select").style.display='none';
        document.getElementById("Yearly_select").style.display='none';
    }
};
 
function showHide(elem) 
{
    if(elem.selectedIndex != 0) 
    {
         //hide the divs
         for(var i=0; i < divsO.length; i++) 
         {
             divsO[i].style.display = 'none';
         }
        //unhide the selected div
        document.getElementById('div'+elem.value).style.display = 'block';
    }
}
 
window.onload=function() 
{
    //get the divs to show/hide
    divsO = document.getElementById("frmMyform_new_control").getElementsByTagName('div');
    document.getElementById("Twice_select").style.display='none';
        document.getElementById("Yearly_select").style.display='none';
}

</script>

<script>
 
                    var app=angular.module("myapp",[]);
                    app.controller("usercontroller",function($scope,$http){
                    $scope.loadBusinessArea=function()
                    {
                        $http.get("load_business_group.php")
                        .success(function(data)
                    {
                        $scope.business=data;
                    }) // End of function(data)
                    } // End of function loadBusinessArea
                    
                    $scope.loadProcess=function()
                    {
                        $http.post("load_process.php",{'group_name':$scope.business_group})
                        .success(function(data)
                    {
                        $scope.processes=data;
                    }) ; // End of function(data)
                   }; // End of function loadProcess
    
                    $scope.fnCreateControl=function()
                    {   
                        // The values of all the textbox fields have been saved to a variable and checked if they are empty. If they are empty an alert is generated.
                        // Once it is verified that all the textboxes contain data, they are inserted in to table controls.
                        // the newly inserted data can be viewed in control_view.php or control_view_dir.php
                               
                        var control_codeid=document.f_new_control.codeid.value;
                        var control_pointname=document.f_new_control.pointname.value;
                        var control_owner=document.f_new_control.owner.value;
                        var control_businessarea=document.f_new_control.business_group.value;
                        var control_process=document.f_new_control.process.value;
                        var control_subprocess=document.f_new_control.subprocess.value;
                        var control_risk=document.f_new_control.risk.value;
                        var control_activity=document.f_new_control.control_activity.value;
                        var control_evidence=document.f_new_control.evidence.value;
                        var control_frequency=document.f_new_control.freq.value;
    
                        if(control_codeid=="")
                        {
                             alert("Please fill in codeid");
                             document.f_new_control.codeid.focus();
                             return false;
                        }
                        
                        else if(control_pointname=="")
                        {
                             alert("Please fill in Control Point");
                             document.f_new_control.pointname.focus();
                             return false;  
                        }
                        
                        else if(control_businessarea=="")
                        {
                             alert("Please fill in Business Group");
                             document.f_new_control.business_group.focus();
                             return false;    
                        }
                        
                        else if(control_process=="")
                        {
                             alert("Please fill in Process");
                             document.f_new_control.process.focus();
                             return false;   
                        }
                               
                        else if(control_subprocess=="")
                        {
                             alert("Please fill in Sub-Process");
                             document.f_new_control.subprocess.focus();
                             return false;
                        }
                               
                        else if(control_risk=="")
                        {
                             alert("Please fill in Risk");
                             document.f_new_control.risk.focus();
                             return false;
                        }
                               
                        else if(control_activity=="")
                        {
                             alert("Please fill in Control Activity");
                             document.f_new_control.control_activity.focus();
                             return false; 
                        }
                            
                        else if(control_evidence=="")
                        {
                             alert("Please fill in Evidence");
                             document.f_new_control.evidence.focus();
                             return false;
                        }
                               
                        else if(control_frequency=="")
                        {
                             alert("Please fill in Frequency of Execution");
                             document.f_new_control.freq.focus();
                             return false;
                        }
                               
                        else if(control_owner=="")
                        {
                             alert("Please fill in owner");
                             document.f_new_control.owner.focus();
                             return false;
                        }
                               
                        else
                       {
                             $http.post(
                             "insert_new_control.php", // This page contains the mysql code to insert data into the tables
                              {
                                 'codeid':$scope.codeid, 
                                 'b_group':$scope.business_group,
                                 'process':$scope.process,
                                 'subprocess':$scope.subprocess,
                                 'risk':$scope.risk, 
                                 'pointname': $scope.pointname,
                                 'objective': $scope.objective,
                                 'control_activity': $scope.control_activity,
                                 'evidence':$scope.evidence, 
                                 'owner': $scope.owner,
                                 'freq': $scope.freq,
                                 'twice_start':$scope.twice_start,
                                 'twice_end':$scope.twice_end,
                                 'Yearly_start':$scope.Yearly_start
                             }
                             
                             ); // End of post
                              
                                  
                                  return true;
                      }; // End of else statement
                                
                    } // End of fnCreateControl
                    } // End of function($scope,$http)
                       
                    ); // End of controller
                   </script>
           
           
           
    