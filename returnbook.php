<?php
session_start();
include "BookBankerMenu.php";
include "bookMongerdb.php";
if(isset($_REQUEST['status']))
{
	header("location:exit.php");
}
$objbook=new cDbase();
$bno=$_REQUEST['bno'];
$std=$_REQUEST['std'];

$res=$objbook->sel("select * from bookbanking where BookNum like '".$bno."' and RegNo like '".$std."' ");
$row=mysql_fetch_array($res);
$today = date("Y-m-d");
if($today > $row[4] )
{
  $today= strtotime($today);
  $rdate = strtotime($row[4]);
  //print ($row[4]);
  $diff = abs($rdate - $today);
  $n= round($diff / 86400);
  $amt=$n * 3;
  $objbook->idu("insert into fine values('$std','$row[2]','$n','".date("Y-m-d")."','Return-Delay')");
  print "<br>Delayed returning.... Amount $amt is charged....<br>";
}
$objbook->idu("update bookcopies set Status='Available' where BookNum like '".$bno."'");
print "Book returned Successfully";
?>

<a href="return.php">Back</a>

<br><br>
<?php
include "footer.php"
?>