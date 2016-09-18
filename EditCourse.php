<?php 
	session_start();
	if(!isset($_SESSION['status']))
	{
		header("location:exit.php");
	} 	
	else
	{		
	
	include "bookMongerdb.php";
	include "FacultyMenu.php";
	$cid=$_REQUEST['courseid'];
	$objCourse=new cDbase();
	$sql="select * from Course where Cid like '".$cid."'";
	$res=$objCourse->sel($sql);
	$row=mysql_fetch_array($res);		
	
	if(isset($_REQUEST['btnSave']))
	{
		$cname=$_REQUEST['txtName'];
		$cname=str_replace("'","''",$cname);
		$pgmid=$_REQUEST['selPgm'];
		$qry="update Course set Name='$cname',PgmId='$pgmid' where Cid='$cid'";
		$objCourse->idu($qry);
		header("location:ViewCourseDetails.php");
	}
	if(isset($_REQUEST['btnCancel']))
	{
		header("location:ViewCourseDetails.php");
	}
?>
</head>
<body>
<form action="#" method="post">
<center>
<h2>Edit Course Details</h2>
</center>
<table>

<tr>
	<td>	Course Id 	</td>
    <td>    :	</td>
    <td>	<label><?php echo $row['Cid']; ?></label>		</td>
</tr>

<tr>
	<td>	Course Name	</td>
    <td>	:	</td>
    <td>	<input type=text name="txtName" id="txtName" value="<?php echo $row['Name']; ?>"/>	</td>
</tr>

<tr>
	<td>  Program	</td>
    <td> :	</td>
    <td>	<select name="selPgm">
			<?php
			$obj=new cDbase();			
			$PgmId=$row['PgmId'];
			$res1=$obj->sel("select name from Program where pgmid='$PgmId'");
			$row1=mysql_fetch_row($res1);
            echo "<option value=$PgmId> $row1[0] </option>";
			$res1=$obj->sel("select * from Program where pgmid<>'$PgmId'");
			$row1=mysql_fetch_row($res1);	
			while($row1)
			{
				print "<option value=$row1[0]> $row1[1] </option>";	
				$row1=mysql_fetch_row($res1);
			}	
		}
			?>
       		</select>		</td>
</tr>

<td>	</td>
<td></td>
    <td>	<input type=submit name="btnSave" id="btnSave" value="Save"  />	 &nbsp; &nbsp;&nbsp;
    		<input type=submit name="btnCancel" id="btnCancel" value="Cancel" />	</td>
</tr>

</table>
</form>
<?php include "footer.php"?>