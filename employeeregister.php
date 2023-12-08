<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <style>
        
        body{
            width: 1000px;
            margin: 0;
            margin-left: auto;
            margin-right: auto; 
            background-image: url(https://www.mixedinamerica.org/wp-content/uploads/2018/08/image-background-color-5.jpg);
            background-repeat: no-repeat;
            background-size: cover;
          
        }
      
        .reg{
            width: 50%;
            border-left: none;
            border-top: none;
            border-right: none;
            border-bottom: 1px solid black;   
        }
        input{
            padding: 20px;
            border-radius: 24px;
            
        }
        input:hover{
            background-color: rgb(192, 190, 190);
            transition: 0.4s;
        }
        input[type=submit]:hover{
        transition: 0.4s;
        background-color: darkblue;
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
       }
    </style>
</head>
<body>
 
    <center><form method="post">
       
       <h1 >Register Form</h1>
       <input type="text" placeholder="Firstname" name="Firstname"  max="50" required class="reg"><br><br>
       <input type="text" placeholder="Lastname" name="Lastname" required class="reg"><br><br>
       <input type="email" placeholder="Email" name="Email" required class="reg"><br><br>
       <input type="text" placeholder="Phonenumber" name="Phonenumber" required class="reg"><br><br>
       <input type="password" placeholder="New Password" name="Password" required class="reg"><br><br>
       <input type="text" placeholder="Address" name="Address" required class="reg" name=""><br><br>
       <center><input type="submit" value="submit" name="submit" onclick="fun()"></center>
    </form></center>
    <?php
$conn=new mysqli('localhost','root','','eservice');

   if(isset($_POST["submit"]))
   {
       
        $Firstname=$_POST['Firstname'];
        $Lastname=$_POST['Lastname'];
        $Email=$_POST['Email'];
        $Phonenumber=$_POST['Phonenumber'];  
        $Password=$_POST['Password'];  
        $Address=$_POST['Address'];  

        $stmt=$conn->prepare("insert into employeeinformation(Firstname,Lastname,Email,Phonenumber,Password,Address)values(?,?,?,?,?,?)");
    $stmt->bind_param("ssssss",$Firstname,$Lastname,$Email,$Phonenumber,$Password,$Address);
    $stmt->execute();
    header("Location:KvcHome.php");
    $stmt->close();
        // $sql="insert into employeeinformation(Firstname,Lastname,Email,Phonenumber,Password,Address)values('$Firstname','$Lastname',$Email','$Phonenumber','$Password','$Address')";
        // $conn->query($sql);

   }

//    else
//    {
//        echo"Please submit with valid details";
//    }
?> 
</body>
<script>
    function fun()
    {
        alert("Successfully Registered");
    }
</script>
</html>