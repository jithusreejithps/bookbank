<?php
include "header.php";
?>
<div id="templatemo_menu">
    	<ul>
            <li><a href="index.php" >Home</a></li>
            <li><a href="about_us.php">About us</a></li>
            <li><a href="contact_us.php">Contact us</a></li>            
            <li><a href="help.php">Help</a></li>             
    	</ul>
	</div> <!-- end of menu -->
<?php
print("<br><br>You are not logged in. Click <a href=index.php>on this link </a> to login.<br><br>");
include "footer.php";
?>