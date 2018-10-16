<?php
$connect=mysqli_connect("localhost","root","","test");
$output=array();
$query="select * from demo_business_areas";
$result=mysqli_query($connect,$query);
while($row=mysqli_fetch_array($result))
{
    $output[]=$row;
}
echo json_encode($output);

?>
