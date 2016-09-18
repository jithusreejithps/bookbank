<?php
session_start();
include "BookBankerMenu.php";
include "bookMongerdb.php";
if(!isset($_SESSION['status']))
{
	header("location:exit.php");
}
?>
<form action="samplerep.php" method="post">
<center>
	<h1>BOOK BANKER REPORT</h1>
    <br>
    <br>
    <table>
    	<tr> 
        	<td>       Select Semester           </td>
            <td> : </td>
            <td>	
            	<select name="selSem" id="selSem">
            		<?php $sem=$_SESSION['sem'];
						$obj=new cDbase();
						$res=$obj->sel("select SemId from Semester where BatchCode like (select BatchCode from semester where SemId like '".$sem."')");
						if($res)
						{
							while($row=mysql_fetch_row($res))
							{
								print "<option name=".$row[0].">".$row[0]."</option>";						
							}
						}
					?>
    			</select>
    		</td>
          	<td><input type="submit" name="btnView" id="btnView" value="Sample Report" ></td>
    	</tr>
    </table>
  
</center>
</form>
<br><br>



<br><br>

<?php
include "footer.php";
?>