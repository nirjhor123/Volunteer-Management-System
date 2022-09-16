<?php
	include "navbaradmin.php";
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
		
		$sql = "SELECT * FROM admin WHERE Admin_ID='$_SESSION[login_user]'";
		$result = mysqli_query($db,$sql) or die (mysql_error());

		while ($row = mysqli_fetch_assoc($result)) 
		{
			$Admin_ID=$row['Admin_ID'];
			$Admin_Name=$row['Admin_Name'];
			$admin_email=$row['admin_email'];
            $Admin_Password=$row['Admin_Password'];
		}

	?>

	<div class="profile_info" style="text-align: center;">
		<span style="color: white;">Welcome,</span>	
		<h4 style="color: white;"><?php echo $_SESSION['login_user']; ?></h4>
	</div><br><br>
	
	<div class="form1">
		<form action="" method="post" enctype="multipart/form-data">

		<!--<input class="form-control" type="file" name="file">-->

		<label><h4><b>Admin_ID: </b></h4></label>
		<input class="form-control" type="text" name="Admin_ID" value="<?php echo $Admin_ID; ?>">

		<label><h4><b>Admin_Name</b></h4></label>
		<input class="form-control" type="text" name="Admin_Name" value="<?php echo $Admin_Name; ?>">

		

		<label><h4><b>Password</b></h4></label>
		<input class="form-control" type="text" name="Admin_Password" value="<?php echo $Admin_Password; ?>">

		<label><h4><b>admin_email</b></h4></label>
		<input class="form-control" type="text" name="admin_email" value="<?php echo $admin_email; ?>">

        

		<br>
		<div style="padding-left: 100px;">
			<button class="btn btn-default" type="submit" name="submit">save</button></div>
	</form>
</div>
	<?php 

		if(isset($_POST['submit']))
		{
			/*move_uploaded_file($_FILES['file']['tmp_name'],"images/".$_FILES['file']['name']);*/

			$Admin_ID=$_POST['Admin_ID'];
			$Admin_Name=$_POST['Admin_Name'];
			$Admin_Password=$_POST['Admin_Password'];
			
			$admin_email=$_POST['admin_email'];
			/*$pic=$_FILES['file']['name'];*/

			$sql1= "UPDATE admin SET  Admin_ID='$Admin_ID', Admin_Name='$Admin_Name',Admin_Password='$Admin_Password',admin_email='$admin_email' WHERE Admin_ID='".$_SESSION['login_user']."';";
            echo $sql1;
			if(mysqli_query($db,$sql1))
			{
				?>
					<script type="text/javascript">
						alert("Saved Successfully.");
						window.location="AdminProfile.php";
					</script>
				<?php
			}
		}
 	?>
</body>
</html>