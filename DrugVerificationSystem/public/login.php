<?php 
session_start();
// database connection
require_once('C:\Users\Asamoah Gregory\Desktop\xamp\htdocs\DrugVerificationSystem\backend\database\dbcon.php');

// validating input details to make sure all fields are not empty
$email='';
$password1='';
$emailerr='';
$passerr='';
$login_Err='';
$user_err='';
if(isset($_POST['login'])){
  if(empty($_POST['email'])){
    $emailerr='email cannot be empty';
  }else{
    $email=test_input($_POST["email"]);
  }

  if(empty($_POST['password'])){
    $passerr='password cannot be empty';
  }else{
   $password1=  test_input($_POST["password"]);
  }  
  

  $select_User_query="SELECT email,`password` FROM `Drug_users` WHERE email='$email' ";
  $user_query=mysqli_query($con,$select_User_query);
  if(mysqli_num_rows($user_query) ===0){
    $user_err='invalid email or password';
    
  }else{
    $_SESSION["login"]=true;
    $_SESSION["username"]=$email;
    header("location: http://localhost/DrugVerificationSystem/public/Homepage/homepage.php");
  }

    
}

function test_input($data){
  $data=htmlspecialchars($data);
  $data=stripslashes($data);
  $data=trim($data);
  return $data;
}




?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body style="background-color: #E3DDDD;">
    <div class=" container-fluid">
       <!--This the log  link-->

        <div id="logo"> <a href="http://localhost/DrugVerificationSystem/public/Homepage/homepage.php" class="text-decoration-none fst-italic fw-bold"> <p class="text-success text-center">DRUG <span>CHECKER</span></p> </a> </div>
            <!--This the end ofthe logo link-->
          <h3 class="text-center">Sign in to your account</h3>
          <div class="d-flex justify-content-center">
            <form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
              
                <label for="Fullname" class="form-label">Email <br> <input type="email" name="email" id="" class="form-control"> <span style="color:red"> <?php echo $emailerr ?></span> </label> 
                     <br>
                <label for="Fullname" class="form-label"> Password<br> <input type="password" name="password" id="" class="form-control"> <span style="color:red"> <?php echo $passerr ?></span></label>
                 <br>
                 <button type="submit" class=" btn-success btn-lg w-100 " name="login">Login</button><span> <?php echo $login_Err ?></span>
                 <br>
                 <p>Forgotten Password?  <a href="" class=" text-success text-decoration-none">ResetHere</a></p>
                 <span style="color:red"> <?php echo $user_err ?> </span>
            </form>
          </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>   
</body>
</html>