<?php
$connect=mysqli_connect("localhost","root","","test");
$data=json_decode(file_get_contents("php://input"));
if(count($data)>0)
{
    $codeid=mysqli_real_escape_string($connect,$data->codeid);
    $pointname=mysqli_real_escape_string($connect,$data->pointname);
    $owner=mysqli_real_escape_string($connect,$data->owner);
    $b_group=mysqli_real_escape_string($connect,$data->b_group);
    $process=mysqli_real_escape_string($connect,$data->process);
    $subprocess=mysqli_real_escape_string($connect,$data->subprocess);
    $risk=mysqli_real_escape_string($connect,$data->risk);
    $control_activity=mysqli_real_escape_string($connect,$data->control_activity);
    $objective=mysqli_real_escape_string($connect,$data->objective);
    $evidence=mysqli_real_escape_string($connect,$data->evidence);
    $freq=mysqli_real_escape_string($connect,$data->freq);
    $twice_start=mysqli_real_escape_string($connect,$data->twice_start);
     $twice_end=mysqli_real_escape_string($connect,$data->twice_end);
     $Yearly_start=mysqli_real_escape_string($connect,$data->Yearly_start);
    
    $query="Insert into demo_project_controls(codeid,b_group,process,subprocess,risk,pointname,objective,control_activity,evidence,owner,freq,twice_start,
    twice_end,
    Yearly_select,status) 
            values ('$codeid','$b_group','$process','$subprocess','$risk','$pointname','$objective','$control_activity','$evidence','$owner','$freq','$twice_start',
            '$twice_end',
            '$Yearly_start','Not Tested')";
    if(mysqli_query($connect,$query))
    {
       echo "Data Inserted";
    }
    else
    {
       echo "Error";
    }
    

}
?>
