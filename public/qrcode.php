<?php  
# making connections to the database and phpqrcode
include_once "C:/Users/ASAMOAH GREGORY/Desktop/xamp/htdocs/DrugVerificationSystem/phpqrcode/qrlib.php";
require_once("C:\Users\ASAMOAH GREGORY/Desktop/xamp/htdocs/DrugVerificationSystem/backend/database/dbcon.php");




$sql="SELECT * FROM  drug ";
                if(!$sql){
                    echo mysqli_error($con);
                }
               $query= mysqli_query($con,$sql);
               if(mysqli_num_rows($query)>0){
                while($results=mysqli_fetch_assoc($query)){
                    $name= $results["name"].$results["manu_date"].$results["expiry_date"].$results["verification"];
                    echo QRcode::png($name);                             
                }                                                                                               
               }else{                                                                              
                echo "NO drug found in the databse";
               }



  

?>