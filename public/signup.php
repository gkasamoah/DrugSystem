<?php 
 require_once('C:\Users\Asamoah Gregory\Desktop\xamp\htdocs\DrugVerificationSystem\backend\database\dbcon.php');
 $fullname=$_POST["name"];
 $table_Email=$_POST["email"];
 $table_Password=$_POST["password"];

 



$name='';
$email='';
$password='';
$nameErr='';
$emailErr='';
$passwordErr='';

if(isset($_POST["submit"])){
  if(empty($_POST["name"])){
    $nameErr= 'Name cannot be empty';
  }else{
    $name=test_input($_POST["name"]);
     if(!preg_match("/^[a-zA-Z-' ]*$/",$name)){
     $nameErr='only alphabets and spaces are allowed';
    }
  }


   if(empty($_POST["email"])){
    $emailErr= 'Email cannot be empty';
  }else{
    $email=test_input($_POST["email"]);
    if(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL))
    {
      $emailErr="Invalid email format";
    }
  }

   if(empty($_POST["password"])){
    $passwordErr= 'password cannot be empty';
  }else{
    $password=test_input($_POST["password"]);
  }
  //checking to see if an account exist for an email then we tell the user else the code should insert the user informations into the database

  $select_User_query="SELECT email from `DrugSystem_Users`";
  $email_query= mysqli_query($con,$select_User_query);
  if(mysqli_num_rows($email_query)==1){
    echo "account exist";
  }
  else{

  $sql= "INSERT INTO `DrugSystem_Users`(`fullname`,`email`,`password`) VALUES('$fullname','$table_Email','$table_Email')";
 $query2=mysqli_query($con,$sql);
 if(!$query2){
  echo mysqli_error($con);
 }
}

  
}

function test_input($data){
  $data=htmlspecialchars($data);
  $data=stripslashes($data);
  $data=trim($data);
  return $data;
}

?>


<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="http:\\localhost\DrugVerificationSystem\public\verification.css">
</head>
<body>

  <h2 style="text-align: center; color:blue;">Signup Here</h2>

<div style="display: flex; justify-content:center;padding:1em" >
<form action="signup.php" method="post">
<label for="name">Name <br> <input type="text" name="name" id="name" class=" form-control">  <span class="error"> <?php echo $nameErr ?></span> </label> 
<br>
<label for="name">email <br><input type="email" name="email" id="email">  <span class="error"> <?php echo $emailErr?></span> </label>
<br>
<label for="name">Password <br> <input type="password" name="password" id="password">  <span class="error"> <?php echo $passwordErr ?></span>   </label>
<br>

<input type="submit" value="Submit" name="submit">
<p>Already have an account <a href="login.php" style="color: green;">login Here</a></p>

</form>
</div>

</body>
</html>
