<?php

/*$servername = "localhost:3306";
$username = "vilepflm";
$password = "Vppl?sporko@247";
$dbname = "vilepflm_vppl";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
*/

$conn=mysql_connect("localhost:3306","vilepflm","Vppl?sporko@247");
if(!$conn){
	die("connection failed".mysql_connect_error());
}




$sql1=mysql_select_db("vilepflm_vppl",$conn);
if(!$sql1){
	die("database not selected".mysql_error());
}
?>
<html>
<head>
<style>

table{
    width: 100%;
    word-wrap: break-word;
    border-collapse: collapse;
}

th{
    background:#c8cccd;   
    color: #0C3D64; 
}
.a{
    width: 100px;
}
.b{
    width: 60px;
}
tr:nth-child(odd){background-color: #c8cccd;}

</style>
</head>
<body>

<div class="container">  
                
                <div class="table-responsive">  
                     <div id="live_data"></div>       
<h3 align="center">Player Data</h3>
                     <form method="post" action="excel.php" >  
                          <input type="submit" name="export_excel" class="btn btn-success" value="Export to Excel" />  
                 
                </div>  
           </div> 


<?php
$sql = "SELECT * FROM players order by SN";
$result = mysql_query($sql, $conn);



if (mysql_num_rows($result) > 0) {
     echo "<table border=1><tr><th>Serial</th><th>DOR</th><th>Name</th><th>M.Name</th><th>Surname</th><th>Email</th><th>DOB</th><th>Month</th><th>Year</th><th>Height:Foot</th><th>Inch</th><th>Weight</th><th>Age</th><th>Edu</th><th class=a>Add</th><th>Pincode</th><th>Region</th><th>Cell</th><th>Other No.</th><th>Res No.</th><th>Played Before</th><th>Foot</th><th>Position</th><th>Specific</th><th>School</th><th>Name</th><th>College</th><th>Name</th><th>Tournament</th><th>Name</th><th>Name</th><th>Image Link</th></tr>";
   
 // output data of each row

    while($row = mysql_fetch_assoc($result)) {
    

          
        echo '<tr><td>'.$row["SN"].'</td><td>'.$row["DOR"].'</td><td>'.$row["fname"].'</td><td>'.$row["mname"].'</td><td>'.$row["sname"].'</td><td>'.$row["email"].'</td><td>'.$row["date"].'</td><td>'.$row["month"].'</td><td>'.$row["year"].'</td><td>'.$row["hfoot"].'</td><td>'.$row["hinch"].'</td><td>'.$row["weight"].'</td><td>'.$row["age"].'</td><td>'.$row["educationalq"].'</td><td>'.$row["add1"].'</td><td>'.$row["pincode"].'</td><td>'.$row["region"].'</td><td>'.$row["mno"].'</td><td>'.$row["ono"].'</td><td>'.$row["rno"].'</td><td>'.$row["pf1"].'</td><td>'.$row["pf"].'</td><td>'.$row["pp"].'</td><td>'.$row["pp1"].'</td><td>'.$row["pfs"].'</td><td>'.$row["schoolname"].'</td><td>'.$row["pfc"].'</td><td>'.$row["collegename"].'</td><td>'.$row["pft"].'</td><td>'.$row["pft1"].'</td><td>'.$row["pft2"].'</td><td><a href="'.$row["imagename"].'" download>'.$row["imagename"].'</a></td></tr>';




    
}
    echo "</table>";
} 

else {
    echo "0 results";
}



//echo '<br><img src = "getimage.php?SN=1"';
/*while($row = mysql_fetch_assoc($result)) {

header("content-type:image/jpeg");
$select_image="select * from image_table where imagename='$name'";

$var=mysql_query($select_image);

if($row=mysql_fetch_array($var))
{
 $image_name=$row["imagename"];
 $image_content=$row["imagecontent"];
}
echo $image;

}*/

mysql_close($conn);
?>
</body>
</html>