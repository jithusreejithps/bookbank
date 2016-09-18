<?php
	include "header.php";
?>
<form action="email.php" method="post">
	<div id="templatemo_menu">
    	<ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about_us.php">About us</a></li>
            <li><a href="contact_us.php">Contact us</a></li>            
            <li><a href="help.php">Help</a></li>             
    	</ul>
	</div> <!-- end of menu -->
	<center>
    <h1>PASSWORD RECOVERY</h1>

		<table>
        	<tr>
				<td>USEER NAME</td>
				<td>:</td>
				<td><input type="text" name="txtUser" id="txtUser" /></td>
                <td></td>
                <td></td>
			</tr>        
			<tr>
				<td>E-Mail</td>
				<td>:</td>
				<td><input type="text" name="txtmail" id="txtmail" /></td>
                <td></td>
                <td></td>
			</tr>
           </table>
           <table>
			<tr>
            	<td><label><h3>Login as </h3> </label></td> 
                <td>:</td>  
                <td><input name="radiobutton" type="radio" id="radiobutton" value="B" />Book Banker</td>
				<td><input name="radiobutton" type="radio" id="radiobutton" value="F" />Faculty </td>    			
				<td><input name="radiobutton" type="radio" id="radiobutton" checked="checked"  value="S" />Student</td>
            </tr>
          </table>
          <table>  
            <tr>
				<td><input type="submit" name="btnSend" id="btnSend" value="Send"/></td>
				<td></td>
				<td><input type="submit" name="btnCancel" id="btnCancel" value="Cancel"/></td>
                <td></td>
                <td></td>
			</tr>
		</table>
	</center>
</form>
<?php
	include "footer.php";
?>

