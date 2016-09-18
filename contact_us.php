<?php 	session_start(); ?>

<?php
if(isset($_SESSION['role']))
	{
		if ($_SESSION['role']=="Book Banker")
		{
		include "BookBankerMenu.php";
		}
		elseif($_SESSION['role']=="Student")
		{
		include "StudMenu.php";
		}
		else
		{
		 include "FacultyMenu.php";
		}
	}
	else
	{
		include "indexmenu.php";
	}
	
?>


<h1 align="center" class="buy_now_button style2"> Contact us...</h1>
<p><a href="http://www.rajagiri.edu/">Rajagiri College of Social Sciences</a>
<p>Rajagiri P.O,&nbsp;<br />
  Kalamassery, Cochin - 683 104<br />
  Kerala, India.

<p><strong>Email:</strong>&nbsp;<a href="mailto:admin@rajagiri.edu">admin@rajagiri.edu&nbsp;</a><strong><br />
  Tel:</strong>&nbsp;+91 484 - 2555564/2911111<br />
  <strong>Fax:</strong>&nbsp;+91 484 - 253286<a href="https://www.google.co.in/maps/place/Rajagiri+College+Of+Social+Science/@10.057006,76.324352,17z/data=!3m1!4b1!4m2!3m1!1s0x3b080c2eb4a3c707:0xe0a49ee46d283935?hl=en">
  <p>Location</p>
 

<?php include "footer.php"?>