<?php
	include "navbar.php";
	include "DBConnect.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>edit profile</title>
	<style type="text/css">
		.form-control
		{
			width:250px;
			height: 38px;
		}
		.form1
		{
			margin:0 540px;
		}
		label
		{
			color: white;
		}

	</style>
</head>
<body style="background-color: #004528;">

	<h2 style="text-align: center;color: #fff;">Edit Information</h2>
	<?php
		
		$sql = "SELECT * FROM Volunteer WHERE Volunteer_ID='$_SESSION[login_user]'";
		$result = mysqli_query($db,$sql) or die (mysql_error());

		while ($row = mysqli_fetch_assoc($result)) 
		{
			$Volunteer_ID=$row['Volunteer_ID'];
			$Name=$row['Name'];
			$Date_of_Birth=$row['Date_of_Birth'];
			$password=$row['password'];
			$Interest=$row['Interest'];
			$Location=$row['Location'];
			$Contact=$row['Contact'];
		}

	?>

	<div class="profile_info" style="text-align: center;">
		<span style="color: white;">Welcome,</span>	
		<h4 style="color: white;"><?php echo $_SESSION['login_user']; ?></h4>
	</div><br><br>
	
	<div class="form1">
		<form action="" method="post" enctype="multipart/form-data">

		<!--<input class="form-control" type="file" name="file">-->

		<label><h4><b>Volunteer_ID: </b></h4></label>
		<input class="form-control" type="text" name="Volunteer_ID" value="<?php echo $Volunteer_ID; ?>">

		<label><h4><b>Name</b></h4></label>
		<input class="form-control" type="text" name="Name" value="<?php echo $Name; ?>">

		<label><h4><b>Date_of_Birth</b></h4></label>
		<input class="form-control" type="text" name="Date_of_Birth" value="<?php echo $Date_of_Birth; ?>">

		<label><h4><b>Password</b></h4></label>
		<input class="form-control" type="text" name="password" value="<?php echo $password; ?>">

		<label><h4><b>Interest</b></h4></label>
		<input class="form-control" type="text" name="Interest" value="<?php echo $Interest; ?>">

        <label><h4><b>Location</b></h4></label>
		<input class="form-control" type="text" name="Location" value="<?php echo $Location; ?>">
		<label><h4><b>Contact</b></h4></label>
		<input class="form-control" type="text" name="Contact" value="<?php echo $Contact; ?>">

		<br>
		<div style="padding-left: 100px;">
			<button class="btn btn-default" type="submit" name="submit">save</button></div>
	</form>
</div>
	<?php 

		if(isset($_POST['submit']))
		{
			/*move_uploaded_file($_FILES['file']['tmp_name'],"images/".$_FILES['file']['name']);*/

			$Volunteer_ID=$_POST['Volunteer_ID'];
			$Name=$_POST['Name'];
			$Date_of_Birth=$_POST['Date_of_Birth'];
			$password=$_POST['password'];
			$Interest=$_POST['Interest'];
			$Location=$_POST['Location'];
			$Contact=$_POST['Contact'];
			/*$pic=$_FILES['file']['name'];*/

			$sql1= "UPDATE Volunteer SET  Volunteer_ID='$Volunteer_ID', Name='$Name', Date_of_Birth='$Date_of_Birth', password='$password', Interest='$Interest', Location='$Location', Contact='$Contact' WHERE Volunteer_ID='".$_SESSION['login_user']."';";
            echo $sql1;
			if(mysqli_query($db,$sql1))
			{
				?>
					<script type="text/javascript">
						alert("Saved Successfully.");
						window.location="Volunteer.php";
					</script>
				<?php
			}
		}
 	?>
</body>
</html>