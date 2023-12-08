<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Change</title>
    <!-- <style>
        #form {
            background: rgba(130, 112, 250, 0.952);
            margin-top: 180px;
            width: 190px;
            height: 170px;
            border-radius: 1rem;
            box-shadow: 0rem 0rem 7rem 1rem #796F79;
            padding: 90px;
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
            display: flow-root;
            padding: 20px;
            
        }

        #but:hover {
            background-color: forestgreen;
            color: white;
        }

        body {
            background-image: url("images/background_template.jpg");
        }
    </style> -->
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
        input[type="email"]{
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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>
    <center>
        <h1>Password Change</h1>
        <form method="post" id='form' enctype="multipart/form-data">
            <p>Give the Valid Email to Change the Password</p>
            <input type="email" name="mail" placeholder="Email"required><br><br>
            <button id='but' name="submit" autocomplete="off">submit</button>

        </form>
    </center>
    <?php

    if (isset($_POST["submit"])) {


        $gmail = $_POST['mail'];
        $con = mysqli_connect("localhost", "root", "", "eservice");
        $sql = "select Email from Employeeinformation where Email='$gmail' ";
        $result = mysqli_query($con, $sql);

        if ($row = $result->fetch_assoc()) {

            if ($gmail == $row['Email']) {
                session_start();
                $_SESSION['gmail'] = $gmail;
                header("Location:updatepassword.php");
            }
        } else {
            echo "<script>alert('Mail does not match!!')";
        }
    }

    ?>


</body>

</html>