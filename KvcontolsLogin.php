<?php

if (isset($_POST["save"])) {

  $username = $_POST["un"];
  $password = $_POST["pw"];

  $con = mysqli_connect("localhost","root","","eservice");
  $query = "select*from employeeinformation where Email='$username' and Password='$password'";
  $result = mysqli_query($con, $query);
  $c = mysqli_num_rows($result);
  if ($c > 0) {
   
    if ($username == 'adminkvcontrols@gmail.com'  &&  $password == '9999') {
        session_start();
        $_SESSION['user'] = $username;
        echo "<script>
            window.location.assign('adminaccess.php');
            alert('Logged In as a ADMIN!');
            </script>";
      } else {
        session_start();
        $_SESSION['user'] = $username;
        echo "<script>
            window.location.assign('employeeup.php');
            alert('Logged In!');
            </script>";
      }

    }
 else {
    echo "<script>alert('check the entered details')</script>";
  }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body{
            width: 1000px;
            margin: 0;
            margin-left: auto;
            margin-right: auto;
            background-image: url(https://www.mixedinamerica.org/wp-content/uploads/2018/08/image-background-color-5.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            padding-bottom: 50px;
        }
        form{
            padding: 20px;
            padding-top: 90px;
            margin-left: auto;
            margin-right: auto;
        }
        input[type=submit]{
         background-color: #0056ff;
         padding-top: 12px;
         padding-bottom: 12px;
         padding-left: 24px;
         padding-right: 24px;
         font-size:15px;
         color:white;
         border: none;
         border-radius: 24px;
       }
       input[type=submit]:hover{
        transition: 0.4s;
        background-color: darkblue;
       }
        input[type="password"]{
            border-left: none;
            border-right: none;
            border-top: none;
            border-bottom: 1px solid black;
            border-radius: 24px;
            width: 40%;
        }
        input[type="email"]{
            border-left: none;
            border-right: none;
            border-top: none;
            border-bottom: 1px solid black;
            border-radius: 24px;
            width: 40%;
        }
        
        input[type="password"]:hover{
            background-color: rgb(192, 190, 190);
            transition: 0.4s;
        }
        input[type="email"]:hover{
            background-color: rgb(192, 190, 190);
            transition: 0.4s;
        }
        input{
            padding: 20px;
        }
        span{
            padding: 3px;
        }
        a{
            text-decoration: none;
        }
      
    </style>
</head>
<body>
    <br>
    <br>
   
    <center><form method="post">
        <center><h1>Sign In</h1></center>
        <br>
       <input type="email" placeholder="Email" name="un" required><br><br>
       <input type="password" placeholder="Password" name="pw" required><br><br>
       <input type="submit" value="Login" name="save" onclick="login()"><br><br>
       <span><a href="employeeregister.php">Create an Account?</a> </span>
       <span><a href="passwordchange.php" style="padding: 10px;">Forget Password?</a></span>
        </form></center>
    </fieldset>
       
</body>
</html>