<?php  

$conn=mysql_connect("localhost:3306","vilepflm","Vppl?sporko@247");
if(!$conn){
	die("connection faild".mysql_connect_error());
}


$sql1=mysql_select_db("vilepflm_vppl",$conn);
if(!$sql1){
	die("database not selected".mysql_error());
	
}



//$connect = mysql_connect("localhost:3306", "vilepflm", "Vppl?sporko@247", "vilepflm_vppl");  

 $output = '';  
 if(isset($_POST["export_excel"]))  
 {  
      $sql = "SELECT * FROM players ORDER BY SN ASC";  
      $result = mysql_query($sql, $conn);  
      if(mysql_num_rows($result) > 0)  
      {  
           $output .= '  
                <table class="table" border="1">  
                    
                    
                     <tr>  
                     
                     
                     <th>Serial</th><th>TS</th><th class=b>Name</th><th>M.Name</th><th>Surname</th><th>Email</th><th>DOB:Date</th><th>Month</th><th>Year</th><th>Height:Foot</th><th>Inch</th><th>Weight</th><th>Age</th><th>Education</th><th class=a>Address</th><th>Pincode</th><th>Region</th><th>Mobile</th><th>Other No.</th><th>Res No.</th><th>Played Before</th><th>Foot</th><th>Position</th><th>Specialization</th><th>School</th><th>Name</th><th>College</th><th>Name</th><th>Tournament</th><th>Name</th><th>Name</th><th>Image Link</th>
                           
                     </tr>  
           ';  
           
           while($row = mysql_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          
                          <td>'.$row["SN"].'</td><td>'.$row["TS"].'</td><td>'.$row["fname"].'</td><td>'.$row["mname"].'</td><td>'.$row["sname"].'</td><td>'.$row["email"].'</td><td>'.$row["date"].'</td><td>'.$row["month"].'</td><td>'.$row["year"].'</td><td>'.$row["hfoot"].'</td><td>'.$row["hinch"].'</td><td>'.$row["weight"].'</td><td>'.$row["age"].'</td><td>'.$row["educationalq"].'</td><td>'.$row["add1"].'</td><td>'.$row["pincode"].'</td><td>'.$row["region"].'</td><td>'.$row["mno"].'</td><td>'.$row["ono"].'</td><td>'.$row["rno"].'</td><td>'.$row["pf1"].'</td><td>'.$row["pf"].'</td><td>'.$row["pp"].'</td><td>'.$row["pp1"].'</td><td>'.$row["pfs"].'</td><td>'.$row["schoolname"].'</td><td>'.$row["pfc"].'</td><td>'.$row["collegename"].'</td><td>'.$row["pft"].'</td><td>'.$row["pft1"].'</td><td>'.$row["pft2"].'</td><td>'.$row["imagename"].'</td>
                          
                          
                          
                          
                     </tr>  
                ';  
           }  
           $output .= '</table>';  
           header("Content-Type: application/xls");
           header("Content-Disposition: attachment; filename=playerdata.xls");  
           echo $output;  
      }  
 }  
 ?>  
