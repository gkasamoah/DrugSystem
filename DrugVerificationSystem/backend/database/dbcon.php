<?php 
$username='gkasamoah';
$host= 'localhost';
$database='drugverification';
$password='';
$port=4000;
// connecting to the database using the mysqli api
$con=mysqli_connect($host,$username,'',$database,$port);

if($con){
    echo '';
 
}else{
    
    echo "Failed to connect";
}




?> 