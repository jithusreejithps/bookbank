<?php 	session_start();?>

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

   
<h1 align="center">About The Institution </h1>
<p align="left">
<font size="2">
Rajagiri has successfully established and maintained the apt ambience for learning and the highest level of academic performance by providing state-of-the-art infrastructure and facilities in these institutions</font></p>
<div align="center"><br />
</div>
<p align="left">
<font size="2">
The Computer Science Department of Rajagiri College of Social Sciences is offering MCA program for the graduate students. MCA program of Rajagiri College of Social Sciences, Hill Campus, Kalamassery. The MCA Program of the College is a three year masters degree program in computer applications extended over 6 semesters. The course is affiliated to Mahatma Gandhi University, Kottayam, Kerala, India, and approved by the All India Council for Technical Education, New Delhi. The course was introduced by the college in 2001 to meet the growing demand for well qualified and trained computer programmers. The school endeavors to bring out world class professionals in the development and use of software for different applications</font></p>
<div align="center"><br />
</div>
<p align="left">
<font size="2">
Organization provides a facility called book bank, which is an organized collection of sources of information and similar resources, made accessible to a defined community for reference or borrowing. It provides physical or digital access to material. Book bank provides books to all the students of MCA department by demanding a small deposit from the students. It provides book to students of each semester and at the end of each semester  students need to return these books and acquire the books for the next semester.</font></p>


<div align="center">
  <?php include "footer.php"?>
  </div>
