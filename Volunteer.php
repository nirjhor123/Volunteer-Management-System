<?php 
	include "DBconnect.php";
	include "navbar.php";
 ?>
 <?php
      $profpic = "images/index2.jpg";
?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Volunteer Profile</title>
 	<style type="text/css">
 		.wrapper
 		{
 			width: 300px;
 			margin: 0 auto;
 			color: white;
 		}
		 
		 
		 .center {
           display: block;
           margin-left: auto;
           margin-right: auto;
           width: 150%;
}
 	</style>
 </head>
 <body style="background-color: #004528; ">
 <body>
 
 
 	<div class="container">
 		<form action="" method="post">
 			<button class="btn btn-default" style="float: right; width: 70px;" name="submit1">Edit</button>
 		</form>
 		<div class="wrapper">
 			<?php

 				if(isset($_POST['submit1']))
 				{
 					?>
 						<script type="text/javascript">
 							window.location="edit.php"
 						</script>
 					<?php
 				}
 				$q=mysqli_query($db,"SELECT * FROM Volunteer where Volunteer_ID='$_SESSION[login_user]' ;");
 			?>
			<div class="logo">
				<img src="images/volunteer.png" class="center">
			</div>
 			<h1 style="text-align: center;Color:Yellow;">Volunteer Profile</h1>

 			<?php
 				$row=mysqli_fetch_assoc($q);

 				echo "<div style='text-align: center'>
 					<img class='img-circle profile-img' height=110 width=120 src='images/login.jpg".$_SESSION['pic']."'>
 				</div>";
 			?>
 			<div style="text-align: center;"> <b>Welcome, </b>
	 			<h4>
	 				<?php echo $_SESSION['login_user']; ?>
	 			</h4>
 			</div>
 			<?php
 				echo "<b>";
 				echo "<table class='table table-bordered'>";
	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Volunteer_ID: </b>";
	 					echo "</td>";

	 					echo "<td>";
	 						echo $row['Volunteer_ID'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Name: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['Name'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Date_Of_Birth: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['Date_of_Birth'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Password: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['password'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Interest: </b>";	
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['Interest'];
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Location: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['Location'];
	 					echo "</td>";
	 				echo "</tr>";
                    
					 echo "<tr>";
					 echo "<td>";
						 echo "<b> Contact: </b>";
					 echo "</td>";
					 echo "<td>";
						 echo $row['Contact'];
					 echo "</td>";
				     echo "</tr>";
	 				
 				echo "</table>";
 				echo "</b>";
 			?>
 		</div>
 	</div>
 </body>
 </html>