<?php
  include "DBconnect.php";
  include "navbar.php";
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
	
	<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  			<div style="color: white; margin-left: 60px; font-size: 20px;">

                <?php
                if(isset($_SESSION['login_user']))

                { 	echo "<img class='img-circle profile_img' height=120 width=120 src='images/".$_SESSION['pic']."'>";
                    echo "</br></br>";

                    echo "Welcome ".$_SESSION['login_user']; 
                }
                ?>
            </div><br><br>

 
  <div class="h"> <a href="events.php">Events</a></div>
  <div class="h"> <a href="joined_events.php">Joined Events</a></div>
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

	<div class="srch">
		<form class="navbar-form" method="post" name="form1">
			
				<input class="form-control" type="text" name="search" placeholder="search events.." required="">
				<button style="background-color: #6db6b9e6;" type="submit" name="submit" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>
				</button>
		</form>
	</div>
	<!--___________________request book__________________-->
	<div class="srch">
		<form class="navbar-form" method="post" name="form1">
			
				<input class="form-control" type="text" name="Event_ID" placeholder="Enter Event ID" required="">
				<button style="background-color: #6db6b9e6;" type="submit" name="submit1" class="btn btn-default">Join_Event
				</button>
		</form>
	</div>


	<h2>List Of Events</h2>
	<?php

		if(isset($_POST['submit']))
		{
			$q=mysqli_query($db,"SELECT * from event_name where Event_Name like '%$_POST[search]%' ");

			if(mysqli_num_rows($q)==0)
			{
				echo "Sorry! No Event available for this id. Try searching later.";
			}
			else
			{
		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #6db6b9e6;'>";
				//Table header
				echo "<th>"; echo "Event_ID";	echo "</th>";
				echo "<th>"; echo "Event_Name";  echo "</th>";
				echo "<th>"; echo "Location";  echo "</th>";
				echo "<th>"; echo "Event_Date";  echo "</th>";
				echo "<th>"; echo "Description";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($q))
			{
				echo "<tr>";
				echo "<td>"; echo $row['Event_ID']; echo "</td>";
				echo "<td>"; echo $row['Event_Name']; echo "</td>";
				echo "<td>"; echo $row['Location']; echo "</td>";
				echo "<td>"; echo $row['Event_Date']; echo "</td>";
				echo "<td>"; echo $row['Description']; echo "</td>";
				

				echo "</tr>";
			}
		echo "</table>";
			}
		}
			/*if button is not pressed.*/
		else
		{
			$res=mysqli_query($db,"SELECT * FROM `event_name` ORDER BY `event_name`.`Event_ID` ASC;");

		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #6db6b9e6;'>";
				//Table header
				echo "<th>"; echo "Event_ID";	echo "</th>";
				echo "<th>"; echo "Event_Name";  echo "</th>";
				echo "<th>"; echo "Location";  echo "</th>";
				echo "<th>"; echo "Event_Date";  echo "</th>";
				echo "<th>"; echo "Description";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($res))
			{
				echo "<tr>";
				echo "<td>"; echo $row['Event_ID']; echo "</td>";
				echo "<td>"; echo $row['Event_Name']; echo "</td>";
				echo "<td>"; echo $row['Location']; echo "</td>";
				echo "<td>"; echo $row['Event_Date']; echo "</td>";
				echo "<td>"; echo $row['Description']; echo "</td>";

				echo "</tr>";
			}
		echo "</table>";
		}

		if(isset($_POST['submit1']))
		{
			if(isset($_SESSION['login_user'])){
			    $r=mysqli_query($db,"SELECT * FROM `event_volunteer` WHERE Event_ID='$_POST[Event_ID]' and Volunteer_ID='$_SESSION[login_user]';");
				if($r->num_rows > 0 ){
					echo "Already exist";
				}
				else{
				    mysqli_query($db,"INSERT INTO `event_volunteer`(`Event_ID`, `Event_Name`, `Location`, `Event_Date`, `Description`, `Volunteer_ID`) VALUES ('$_POST[Event_ID]',(Select Event_Name from event_name where Event_ID='$_POST[Event_ID]'),(Select Location from event_name where Event_ID='$_POST[Event_ID]'),(Select Event_Date from event_name where Event_ID='$_POST[Event_ID]'),(Select Description from event_name where Event_ID='$_POST[Event_ID]'),'$_SESSION[login_user]') ;");
				
			
			        ?>
					    
				    <?php
				}
			}
			else
			{
				?>
					<script type="text/javascript">
						alert("You must login to Request a book");
					</script>
				<?php
			}
		
	
		}

	?>
</div>
</body>
</html>