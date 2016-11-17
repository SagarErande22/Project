<?php

// define variables and set to empty values


$fname = $mname = $sname = $email = $date = $month = $year = $hfoot = $hinch = $weight = $age = $educationalq = $add1 = $pincode = $region = $mno = $ono = $rno = $pf1 = $pf = $pp = $pp1 = $pfs = $schoolname = $pfc = $collegename = $pft = $pft1 = $pft2 = $file = ""; 
$error =' ';
if (isset($_POST['submit']))
 {
//if (empty($_POST['fname']) || empty($_POST['mname']) || empty($_POST['sname']) || empty($_POST['email']) || empty($_POST['date']) || empty($_POST['month']) || empty($_POST['year']) || empty($_POST['hfoot']) ||empty($_POST['hinch']) || empty($_POST['weight']) || empty($_POST['age']) || empty($_POST['educationalq']) || empty($_POST['add1']) || empty($_POST['pincode']) || empty($_POST['region']) ||empty($_POST['mno']) || empty($_POST['ono']) || empty($_POST['rno']) || empty($_POST['pf1']) || empty($_POST['pf']) || empty($_POST['pp']) || empty($_POST['pp1']) || empty($_POST['pfs']) || empty($_POST['pfc']) || empty($_POST['pft']) || empty($_POST['file'])) 
//{
//$error= "Fill in all the details";
//}
//else
//{
 
  
  function test_input($data)
  {
	  $data = trim($data);
	  $data = stripslashes($data);
	 // $data = mysql_real_escape_string($data);
	  $data = htmlspecialchars($data);
	  return $data;
  }
  $fname = test_input($_POST['fname']);
  $mname = test_input($_POST['mname']);
  $sname =test_input($_POST['sname']);
  $email = test_input($_POST['email']);
  $date = test_input($_POST['date']);
  $month =test_input($_POST['month']);
  $year = test_input($_POST['year']);
  $hfoot =test_input($_POST['hfoot']);
  $hinch =test_input($_POST['hinch']);
  $weight = test_input($_POST['weight']);
  $age = test_input($_POST['age']);
  $educationalq = test_input($_POST['educationalq']);
  $add1 = test_input($_POST['add1']);
  $pincode = $_POST['pincode'];
  $region = test_input($_POST['region']);
  $mno = $_POST['mno'];
  $ono = $_POST['ono'];
  $rno = $_POST['rno'];
  $pf1 = test_input($_POST['pf1']);
  $pf = test_input($_POST['pf']);
  $pp = test_input($_POST['pp']);
  $pp1 =test_input($_POST['pp1']);
  $pfs =test_input($_POST['pfs']);
  $schoolname = test_input($_POST['schoolname']);
  $pfc = test_input($_POST['pfc']);
  $collegename =test_input($_POST['collegename']);
  $pft = test_input($_POST['pft']);
  $pft1 =test_input($_POST['pft1']);
  $pft2 =test_input($_POST['pft2']);
  $imagename =$_FILES['file']['name'];         //doubt, since image 
  
  $imagetmp = addslashes(file_get_contents($_FILES['file']['tmp_name']));

$conn=mysql_connect("localhost:3306","vilepflm","Vppl?sporko@247");
if(!$conn){
	die("connection faild".mysql_connect_error());
}




$sql=mysql_select_db("vilepflm_vppl",$conn);
if(!$sql){
	die("database not selected".mysql_error());
}

if($pp=='GK')
{ $c=GK;
 $f=substr($fname,0,1);
 $s=substr($sname,0,1);
 }
 
 
else if($pp=='D')
{$c=DEF;
$f=substr($fname,0,1);
 $s=substr($sname,0,1);
 }

else if($pp=='F')
{$c=FW;
$f=substr($fname,0,1);
 $s=substr($sname,0,1);
 }

else
{$c=MF;
$f=substr($fname,0,1);
 $s=substr($sname,0,1);
 }


$query1 = mysql_query("select * from players where pp='$pp'", $conn);
$rows1 = mysql_num_rows($query1);
$count=$rows1+1;
if ($count < 10)
    $count="00".$count;
elseif ($count >= 10 && $count < 100 )
    $count="0".$count;


$code=$f.$s.$c.$count;


 
 
$query = mysql_query("select * from players where mno='$mno'", $conn);
$rows = mysql_num_rows($query);
if ($rows == 1) 
{
	$error= "Player with this mobile no. is registered already..!. Enter other number.";

}



else
{


$sql1 = mysql_query("insert into players (fname,mname,sname,email,date,month,year,hfoot,hinch,weight,age,educationalq,add1,pincode,region,mno,ono,rno,pf1,pf,pp,pp1,pfs,schoolname,pfc,collegename,pft,pft1,pft2,imagetmp,imagename,code) values ('$fname','$mname','$sname','$email','$date','$month','$year','$hfoot','$hinch','$weight','$age','$educationalq','$add1','$pincode','$region','$mno','$ono','$rno','$pf1','$pf','$pp','$pp1','$pfs','$schoolname','$pfc','$collegename','$pft','$pft1','$pft2','$imagetmp','$imagename','$code')",$conn);

error_reporting (E_ALL ^ E_NOTICE);

$username="meghan55";

$password ="9594857055";

$number=$mno;

$sender="VPPLID";

$message=.$name "you have successfully registered for the trails VPPL Season 7!!Your VPPL Trails code is ".$code. " Please write down the code or memorize it as you'll be needing it for the trials.";
 

$url="login.bulksmsgateway.in/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."&mobile=".urlencode($number)."&sender=".urlencode($sender)."&message=".urlencode($message)."&type=".urlencode('3'); 

$ch = curl_init($url);


curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);




$curl_scraped_page = curl_exec($ch);



curl_close($ch); 



header("Location:playerregister.php");
}mysql_close($conn);
//}
}
?>


