<?php
session_start();
    if(!isset($_SESSION['status']))
    {
        header('Location:index.php');
        exit;
    }
?>
<!DOCTYPE html>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>

.logout {
    text-align: right;
    font-family: "Lucida Console", "Courier New", monospace;
    
}

table

{
border: 1px solid black;

border-collapse: collapse;

width:100%;

border-color:black;

}

td {
  text-align: center;
}
a{
    text-decoration:none;
    color:#464f41
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
  font-family: "Lucida Console", "Courier New", monospace;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #464f41;
  color: white;
  font-family: "Lucida Console", "Courier New", monospace;
}
h2{
  color: #464f41;
  font-family: "Lucida Console", "Courier New", monospace;
}
</style>

</head>

<body bgcolor="#bfcba8">

 <div class ="logout">
  <a href="student_dashboard.php">HOME |</a>
 <a href="logout.php"> LOGOUT</a>
 </div>
<h2>Here's your timetable...</h2>
<?php
include('connection.php'); 
     $branch = $_SESSION['branch1'];
        //to prevent from mysqli injection  
        $branch= stripcslashes($branch);   
        $branch = mysqli_real_escape_string($conn,$branch);  
if ($branch == 'coe' or $branch == 'ced') {
    $result = mysqli_query($conn,"SELECT * FROM cse_table");
}
else if ($branch=='esd'or $branch=='evd' or $branch=='edm') {
    $result = mysqli_query($conn,"SELECT * FROM ece_table");
}
else if($branch=='msm') {
    $result = mysqli_query($conn,"SELECT * FROM msm_table");
}
else if($branch=='mdm'or $branch='mfd' or $branch='mpd') {
    $result = mysqli_query($conn,"SELECT * FROM mec_table");
}



echo "<table id = 'customers'>

<tr>

<th>DAY</th>

<th>9:00-9:50</th>

<th>10:00-10:50</th>

<th>11:00-11:50</th>

<th>12:00-12:50</th>

<th>13:00-13:50</th>

<th>14:00-14:50</th>

<th>15:00-15:50</th>

<th>16:00-16:50</th>

<th>17:00-17:50</th>


</tr>";

 

while($row = mysqli_fetch_array($result))

  {

  echo "<tr>";
  

  echo "<td>" . $row['Day'] . "</td>";

  echo "<td>" . $row['_9AM'] . "</td>";

  echo "<td>" . $row['_10AM'] . "</td>";

  echo "<td>" . $row['_11AM'] . "</td>";
  
    echo "<td>" . $row['_12PM'] . "</td>";

  echo "<td>" . $row['_1PM'] . "</td>";

  echo "<td>" . $row['_2PM'] . "</td>";
  
    echo "<td>" . $row['_3PM'] . "</td>";

  echo "<td>" . $row['_4PM'] . "</td>";

  echo "<td>" . $row['_5PM'] . "</td>";



  echo "</tr>";

  }

echo "</table>";

 

mysqli_close($con);

?>


</body>

</html>

</table>