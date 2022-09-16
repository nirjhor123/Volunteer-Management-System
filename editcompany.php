<?php
	include "navbarcompany.php";
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
		
		$sql = "SELECT * FROM company WHERE Company_ID='$_SESSION[login_user]'";
		$result = mysqli_query($db,$sql) or die (mysql_error());

		while ($row = mysqli_fetch_assoc($result)) 
		{
			$Company_ID=$row['Company_ID'];
			$Company_Name=$row['Company_Name'];
			$company_email=$row['company_email'];
            $Company_Password=$row['Company_Password'];
		}

	?>

	<div class="profile_info" style="text-align: center;">
		<span style="color: white;">Welcome,</span>	
		<h4 style="color: white;"><?php echo $_SESSION['login_user']; ?></h4>
	</div><br><br>
	
	<div class="form1">
		<form action="" method="post" enctype="multipart/form-data">

		<!--<input class="form-control" type="file" name="file">-->

		<label><h4><b>Company_ID: </b></h4></label>
		<input class="form-control" type="text" name="Company_ID" value="<?php echo $Company_ID; ?>">

		<label><h4><b>Company_Name</b></h4></label>
		<input class="form-control" type="text" name="Company_Name" value="<?php echo $Company_Name; ?>">

		

		<label><h4><b>Password</b></h4></label>
		<input class="form-control" type="text" name="Company_Password" value="<?php echo $Company_Password; ?>">

		<label><h4><b>company_email</b></h4></label>
		<input class="form-control" type="text" name="company_email" value="<?php echo $company_email; ?>">

        

		<br>
		<div style="padding-left: 100px;">
			<button class="btn btn-default" type="submit" name="submit">save</button></div>
	</form>
</div>
	<?php 

		if(isset($_POST['submit']))
		{
			/*move_uploaded_file($_FILES['file']['tmp_name'],"images/".$_FILES['file']['name']);*/

			$Company_ID=$_POST['Company_ID'];
			$Company_Name=$_POST['Company_Name'];
			$Company_Password=$_POST['Company_Password'];
			
			$company_email=$_POST['company_email'];
			/*$pic=$_FILES['file']['name'];*/

			$sql1= "UPDATE company SET  Company_ID='$Company_ID', Company_Name='$Company_Name',Company_Password='$Company_Password',company_email='$company_email' WHERE Company_ID='".$_SESSION['login_user']."';";
            echo $sql1;
			if(mysqli_query($db,$sql1))
			{
				?>
					<script type="text/javascript">
						alert("Saved Successfully.");
						window.location="CompanyProfile.php";
					</script>
				<?php
			}
		}
 	?>
</body>
</html>