<?php

$hostname="localhost";
$username="root";
$password="";
$databaseName="test";

$connect=mysqli_connect($hostname,$username,$password,$databaseName);
$data=json_decode(file_get_contents("php://input"));
 if(count(data)>0)
 {   
     $codeid=mysqli_real_escape_string($connect,$data->codeid);
     $user_email=mysqli_real_escape_string($connect,$data->user_email);
     $execute_date=mysqli_real_escape_string($connect,$data->execute_date);
     $sample_size=mysqli_real_escape_string($connect,$data->sample_size);
     $sample_selected=mysqli_real_escape_string($connect,$data->sample_selected);
     $sample_comment=mysqli_real_escape_string($connect,$data->sample_comment);
     $finding=mysqli_real_escape_string($connect,$data->finding);
     $efficiency=mysqli_real_escape_string($connect,$data->efficiency);
     $result=mysqli_real_escape_string($connect,$data->result);
     $fail_reason=mysqli_real_escape_string($connect,$data->fail_reason);
     $person_name=mysqli_real_escape_string($connect,$data->person_name);
     $person_name_one=mysqli_real_escape_string($connect,$data->person_name_one);
     $person_name_two=mysqli_real_escape_string($connect,$data->person_name_two);
     $actions=mysqli_real_escape_string($connect,$data->actions);
     $Dateend=mysqli_real_escape_string($connect,$data->Dateend);
     $b_group=mysqli_real_escape_string($connect,$data->b_group);
     $process=mysqli_real_escape_string($connect,$data->process);
    
   
     $query="insert into control_execute
            (
              codeid,
              b_group,
              process,
              user_email,
              sample_size,
              sample_selected,
              sample_comment,
              finding,
              efficiency,
              result,
              fail_reason,
              person_name,
              person_name_one,
              person_name_two,
              actions,
              Dateend,execution_date) values 
              (
                  '$codeid',
                  '$b_group',
                  '$process',
                  '$user_email',
                  '$sample_size',
                  '$sample_selected',
                  '$sample_comment',
                  '$finding',
                  '$efficiency',
                  '$result',
                  '$fail_reason',
                  '$person_name',
                  '$person_name_one',
                  '$person_name_two',
                  '$actions',
                  '$Dateend'+ interval 1 day, 
                  '$execute_date'
            )";
    
            $query1="update demo_project_controls set status='Last Tested',execution_date='$execute_date' where codeid='$codeid' ORDER BY execution_date DESC LIMIT 1";
            
     if(mysqli_query($connect,$query) && mysqli_query($connect,$query1))
     {
         echo "Data inserted..";
     }

     else
     {
         echo "Error";
     }
 }

 ?>



