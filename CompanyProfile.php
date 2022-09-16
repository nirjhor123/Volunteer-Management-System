<?php 
	include "DBConnect.php";
	include "navbarcompany.php";
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Profile</title>
 	<style type="text/css">
 		.wrapper
 		{
 			width: 300px;
 			margin: 0 auto;
 			color: white;
 		}
 	</style>
 </head>
 <body style="background-color: #004528; ">
 	<div class="container">
 		<form action="" method="post">
 			<button class="btn btn-default" style="float: right; width: 70px;" name="submit1" type="submit">Edit</button>
 		</form>
 		<div class="wrapper">
 			<?php

 			if(isset($_POST['submit1']))
 			{
 				?>
 				<script type="text/javascript">
 					window.location="editcompany.php"
 				</script>
 				<?php
 			}


 				$q=mysqli_query($db,"SELECT * FROM company where Company_ID='$_SESSION[login_user]' ;");
 			?>
 			<h2 style="text-align: center;">My Profile</h2>
             <br>
        </br>

 			<?php
 				$row=mysqli_fetch_assoc($q);

 	
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
	 						echo "<b>Company_ID: </b>";
	 					echo "</td>";

	 					echo "<td>";
	 						echo $row['Company_ID'];
	 					echo "</td>";
	 				echo "</tr>";


                     echo "<tr>";
	 					echo "<td>";
	 						echo "<b>Company_Name: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['Company_Name'];
	 					echo "</td>";
	 				echo "</tr>";


                     echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Email: </b>";	
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['company_email'];
	 					echo "</td>";
	 				echo "</tr>";


	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b>Company_Password: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['Company_Password'];
	 					echo "</td>";
	 				echo "</tr>";

	 				
 				echo "</table>";
 				echo "</b>";
 			?>
 		</div>
 	</div>
 </body>
 </html>