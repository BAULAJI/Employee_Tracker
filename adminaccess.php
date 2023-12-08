<?php
$conn = new mysqli('localhost', 'root', '', 'eservice');
$query = "select * from employeedetails";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <style>
        body{
            size: 1000px;
        }
          table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 20px;
            text-align: left;
            background-color:skyblue;
            font-weight: bold;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
        </style>
</head>
<body>
    <table border=1 cellspacing=0 cellpadding=10>
        <tr>
            <th>S.no</th>
            <th>Employee name</th>
            <th>Employee email</th>
            <th>Employee phonenumber</th>
            <th>State</th>
            <th>Geotag Picture</th>      
        </tr>
        <?php
        $i = 1;
        while ($row = mysqli_fetch_assoc($result)) :
        ?>
        <tr>
            <td><?php echo $i++;?></td>
            <td><?php echo $row["empname"];?></td>
            <td><?php echo $row["Email"];?></td>
            <td><?php echo $row["Phonenumber"];?></td>
            <td><?php echo $row["Statename"];?></td>
            <td><?php
             if($result->num_rows>0)
           {
            echo"<img width='300px' height='300px' src='data:image;base64,{$row["fileupload"]}' alt='img'>";
            echo"<br><br>";
           }
    else
    {
        echo"No Image stored";
    }?>
    </td>
        </tr>
        <?php endwhile;?>
    </table>
</body>
</html> 