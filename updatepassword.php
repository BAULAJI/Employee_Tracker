<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Password</title>
  <!-- /* <style>
    #form {
      background: rgba(130, 112, 250, 0.952);
      margin-top: 180px;
      width: 180px;
      height: 160px;
      border-radius: 1rem;
      box-shadow: 0rem 0rem 7rem 1rem #796F79;
      padding: 50px;
      border: 2px solid yellow;


    }

    #but {

      border-radius: 15px;
      border: 1px solid #09e783;
      padding: 14px;
      margin-left: 20px;
      background-color: white;
      font-size: 15px;
      margin-top: 40px;

    }
    label{
      padding: 30px;
      display: flex;
    }

    body {
      background-image: url("images/background_template.jpg");
    }

    #but:hover {
      background-color: forestgreen;
      color: white;
    }
  </style> */ -->
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
        #but{
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
       #but:hover{
        transition: 0.4s;
        background-color: darkblue;
       }
        input[type="text"]{
            border-left: none;
            border-right: none;
            border-top: none;
            border-bottom: 1px solid black;
            border-radius: 24px;
            width: 40%;
        }
        input[type="password"]{
            border-left: none;
            border-right: none;
            border-top: none;
            border-bottom: 1px solid black;
            border-radius: 24px;
            width: 40%;
        }
        
        input[type="text"]:hover{
            background-color: rgb(192, 190, 190);
            transition: 0.4s;
        }
        input[type="password"]:hover{
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
  <?php
  session_start();
  $gmail = $_SESSION['gmail'];

  echo "<center>
  <h1>Update Password</h1> 
  <form method='post' id='form' enctype='multipart/form-data'>
        
    
    <input type='password' name='pass' placeholder='Enter a New Password' required><br><br>

    <button id='but' name='Submit' autocomplete='off'>Submit</button>

      </form></center>";



  if (isset($_POST['Submit'])) {

    $newpass = $_POST['pass'];
    $con = mysqli_connect("localhost", "root", "", "eservice");
    $sql = "update employeeinformation set Password='$newpass' where Email='$gmail'";
    $result = mysqli_query($con, $sql);
    echo"<script>alert('Password Successfully Changed')</script>";
  }


  ?>
</body>

</html>