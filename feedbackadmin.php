<?php
  include "DBconnect.php";
  include "navbaradmin.php";
?>


<!DOCTYPE html>
<html>
<head>
	<title>Books</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style type="text/css">
		.srch
		{
			padding-left: 1000px;

		}
		
		body {
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}

.sidenav {
  height: 100%;
  margin-top: 50px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #222;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: white;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.img-circle
{
	margin-left: 20px;
}
.h:hover
{
	color:white;
	width: 300px;
	height: 50px;
	background-color: #00544c;
}

	</style>

</head>
<body>
	<!--_________________sidenav_______________-->
	
	

 
  <!--<div class="h"> <a href="events.php">Events</a></div>
  <div class="h"> <a href="joined_events.php">Joined Events</a></div>-->
  <!--<div class="h"> <a href="issue_info.php">Issue Information</a></div>-->
  <!--<div class="h"><a href="expired.php">Expired List</a></div>-->
</div>

<div id="main">
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>
	<!--___________________search bar________________________-->

	


	<h2>List Of Feedbacks</h2>
	<?php

			

		
			$res=mysqli_query($db,"SELECT * FROM `feedback` ORDER BY `Event_ID` ASC;");

		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #6db6b9e6;'>";
				//Table header
				echo "<th>"; echo "Event_ID";	echo "</th>";
				/*echo "<th>"; echo "Event_Name";  echo "</th>";
				echo "<th>"; echo "Location";  echo "</th>";*/
				echo "<th>"; echo "Volunteer_ID";  echo "</th>";
				echo "<th>"; echo "Comment";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($res))
			{
				echo "<tr>";
				echo "<td>"; echo $row['Event_ID']; echo "</td>";
				echo "<td>"; echo $row['Volunteer_ID']; echo "</td>";
				echo "<td>"; echo $row['Comment']; echo "</td>";
				/*echo "<td>"; echo $row['Event_Date']; echo "</td>";
				echo "<td>"; echo $row['Description']; echo "</td>";*/

				echo "</tr>";
			}
		echo "</table>";
		

		

	?>
</div>
</body>
</html>