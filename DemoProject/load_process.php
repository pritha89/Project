<?php
$connect=mysqli_connect("localhost","root","","test");
$output=array();
$data=json_decode(file_get_contents("php://input"));
$query="select * from demo_process where group_name='".$data->group_name."'" ;
$result=mysqli_query($connect,$query);
while($row=mysqli_fetch_array($result))
{
    $output[]=$row;
}
echo json_encode($output);

?>
