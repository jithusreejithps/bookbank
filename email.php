<?php
	require_once('class.phpmailer.php');
	include "header.php";
	include "bookMongerdb.php";
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
	if(isset($_REQUEST['btnCancel']))
	{
		header("location:Forgotpsw.php");
	}
	else
	{
		$mail=$_REQUEST['txtmail'];	
		$role=$_POST['radiobutton'];
		$usr=$_REQUEST['txtUser'];
		$obj=new cDbase();
		if($role=='F')
		{
			$sql="select password from Faculty where email like '".$mail."' and Fid like '".$usr."'";
		}
		else
		{
			$sql="select password from Student where email like '".$mail."' and RegNo like '".$usr."'";
		}
		$res=$obj->sel($sql);
		if(!$res)
		{
			print "<font color=#FF0000>Invalid User name or Email id<br>Click on <a href=ForgotPsw.php>this link </a> to try again</font>";
		}
		else
		{
			$content=mysql_fetch_array($res);
			if(!$content)
			{
				print "<font color=#FF0000>Invalid User name or Email id</font>";
			}
			else
			{
				$mail=new PHPMailer();
				$mail->IsSMTP(); // enable SMTP
				$mail->SMTPDebug=0;  // debugging: 1 = errors and messages, 2 = messages only
				$mail->SMTPAuth=true;  // authentication enabled
				$mail->SMTPSecure='ssl'; // secure transfer enabled REQUIRED for GMail
				$mail->Host='smtp.gmail.com';
				$mail->Port=465; 
				$mail->Username="nimisha.govindh91@gmail.com";  // GMAIL username
				$mail->Password="Kanav/2015";            // GMAIL password
				$mail->SetFrom('nimisha.govindh91@gmail.com', 'BookMongerLoginHelp');
				$mail->AddReplyTo('nimisha.govindh91@gmail.com', 'BookMongerLoginHelp');
				$sub="BookMonger Password";
				$body="Book Monder User Name is ".$usr." password is ".$content[0];
				$mail->Subject=$sub;
				$mail->MsgHTML($body);
				$user=$_REQUEST['txtmail'];
				//print ""+$user;
				$mail->AddAddress($user,'User');
				//$mail->AddAddress('toaddress','Firstname lastname');//multiple recipients
				//$mail->AddAddress('toaddress','Firstname lastname');
				if(!$mail->Send())
				{
					echo "Email was not able to send.<br>";
					echo "Click on <a href=ForgotPsw.php>this link </a> to try again";
					$flag=false;
				}
				else
				{
					echo "Email sent succesfully. <br>";
					echo "Click on <a href=index.php>this link </a> to login";
				}
			}
		}
	}
	include "footer.php";
?>