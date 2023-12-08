<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>employee Upload</title>
    <style>
        
        body{
            width: 100%;
            margin: 0;
            margin-left: auto;
            margin-right: auto; 
            align-items: center;
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
        input[type=submit]:hover{
        transition: 0.4s;
        background-color: darkblue;
       }
       input[type=file]{
        background-color: white;
        color: black;
        width: 50%;
       }      
      
    </style>
</head>
<body>
 
    <center><form  method="post" enctype="multipart/form-data">
       
       <h1 >Employee form</h1>
       <input type="text" placeholder="Employee name" name="empname"  max="50" required class="reg"><br><br>
       <input type="email" placeholder="Email" name="Email" required class="reg"><br><br>
       <input type="text" placeholder="Phonenumber" name="Phonenumber" required class="reg"><br><br>
       <input type="text" placeholder="State name" name="Statename" required class="reg"><br><br>
       <h4>Upload your Geotag photo below and it should be less than 1MB</h4> 
       <input type="file"placeholder="Upload" name="image" required class="reg" ><br><br>
       <center><input type="submit" value="submit" name="submit" onclick="fun()"></center>
    </form></center> 
<?php
$conn=new mysqli('localhost','root','','eservice');

   if(isset($_POST["submit"]))
   {
      if(getimagesize($_FILES['image']['tmp_name'])==false)
      {
    //    echo"please select image";
      }
      else
      {
        $image=$_FILES['image']['tmp_name'];
        $image=file_get_contents($image);
        $image=base64_encode($image);
        $empname=$_POST['empname'];
        $Email=$_POST['Email'];
        $Phonenumber=$_POST['Phonenumber'];
         $Statename=$_POST['Statename'];
       

        
        $sql="insert into employeedetails(empname,Email,Phonenumber,Statename,fileupload) values('$empname','$Email','$Phonenumber','$Statename','$image')";
        $conn->query($sql);

   }
}
   else
   {
    //    echo"please upload image";
   }
?>

</body>
<script>
    function fun()
    {
        alert("Successfully Uploaded");
    }
</script>
</html>