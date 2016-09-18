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
?>

<body>
<form action="#" method="post">
<center>
<h2>COURSE REGISTRATION</h2>
</center>
<table>


<tr>
	<td>	Course Id 	</td>
    <td>    :	</td>
    <td>	<input type=text name="txtCourseId" id="txtCourseId" />		</td>    
</tr>

<tr>
	<td> 	Course Name 	</td>
    <td>	:	</td>
    <td>	<input type=text name="txtName" id="txtName" /> </td>
</tr>

<tr>
	<td>  Program	</td>
    <td> :	</td>
    <td>	<select name="selPgm">
			<?php
			$obj=new cDbase();			
            $res1=$obj->sel("select * from Program");
			$row1=mysql_fetch_row($res1);
			print "<option value=0 selected=true> ---Select Program--- </option>";
			while($row1)
				{
				print "<option value=$row1[0]> $row1[1] </option>";	
				$row1=mysql_fetch_row($res1);
				}
			?>
       		</select>		</td>
</tr>

<tr>
	<td>	</td>
    <td></td>
    <td>	<input type=submit name="btnSave" id="btnSave" value="Save"  />	 &nbsp; &nbsp;&nbsp;
    		<input type=submit name="btnCancel" id="btnCancel" value="Cancel" />	</td>
</tr>

</table>
</form>
</body>

<?php

	if(isset($_REQUEST['btnCancel']))
	{
		header("location:Addnewcourse.php");
	}
	if(isset($_REQUEST['btnSave']))
	{
		$objCourse=new cDbase();			
		$courseid=$_REQUEST['txtCourseId'];
		$courseid=str_replace("'","''",$courseid);
		$res=$objCourse->sel("select * from Course where Cid='$courseid'");
		$row=mysql_fetch_row($res);
		if(!$row)
		{
			$name=$_REQUEST['txtName'];
			$name=str_replace("'","''",$name);
			$pgm=$_REQUEST['selPgm'];
			$sql="insert into Course values('".$courseid."', '".$name."', '".$pgm."')";
			$objCourse->idu($sql);
			print "Record Saved";
		}
		else
		{
			print "<h4>Course Id already exists";
			print "<br>Click <a href=Addnewcourse.php>here</a> to try again</h4>";
		}
	}
}
?>

<?php include "footer.php"?>