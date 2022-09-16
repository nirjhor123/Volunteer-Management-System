<?php
  include "navbar.php";
  include "DBConnect.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Feedback</title>
	
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <style type="text/css">
    	body
    	{
    		background-image: url("images/66.jpg");
    		background-repeat: no-repeat;
    	}
    	.wrapper
    	{
    		padding: 10px;
    		margin: -20px auto;
    		width:900px;
    		height: 600px;
    		background-color: black;
    		opacity: .8;
    		color: white;
    	}
    	.form-control
    	{
    		height: 70px;
    		width: 60%;
    	}
    	.scroll
    	{
    		width: 100%;
    		height: 300px;
    		overflow: auto;
    	}

    </style>
</head>
<body>

	<div class="wrapper">
		<h4>If you have any feedback regarding events please comment below.</h4>
        <form name="Registration" action="" method="post">
        
        <div class="login">
          <!--<input class="form-control" type="text" name="Volunteer_ID" placeholder="Volunteer_ID" required=""> <br>
          <input class="form-control" type="text" name="Name" placeholder="Name" required=""> <br>
          <input class="form-control" type="text" name="Date_of_Birth" placeholder="Date_of_Birth" required=""> <br>
          <input class="form-control" type="password" name="password" placeholder="Password" required=""> <br>
          <input class="form-control" type="text" name="Interest" placeholder="Interest" required=""><br>-->
          <input class="form-control" type="text" name="Event_ID" placeholder="Event_ID" required=""><br>
          <input class="form-control" type="text" name="Comment" placeholder="Comment" required=""><br>

          <input class="btn btn-default" type="submit" name="submit" value="Submit" style="color: black; width: 70px; height: 30px"> </div>
      </form>
	  <br>
	</br>
	  <div class="srch">
		<form class="navbar-form" method="post" name="form1">
			
				<input class="form-control" type="text" name="Event_ID" placeholder="Enter Event ID" required="">
				<button style="background-color: #6db6b9e6;" type="submit" name="submit1" class="btn btn-default">Remove_Feedback
				</button>
		</form>
	
<br><br>
	<div class="scroll">
		
		<?php
			if(isset($_POST['submit']))
			{  
                $q=mysqli_query($db,"SELECT * FROM `feedback` WHERE Event_ID='$_POST[Event_ID]' and Volunteer_ID='$_SESSION[login_user]';");
				$q2=mysqli_query($db,"SELECT * FROM `event_volunteer` WHERE Event_ID='$_POST[Event_ID]' and Volunteer_ID='$_SESSION[login_user]';");
                if($q->num_rows>0){
                    echo "Already exist";
                }
				else if($q2->num_rows<=0){
					echo "Cant review unless you joined";
				}
                else{
				$sql="INSERT INTO `feedback` VALUES('$_POST[Event_ID]', '$_SESSION[login_user]', '$_POST[Comment]');";
                
				if(mysqli_query($db,$sql))
				{
					$q="SELECT * FROM `feedback` WHERE Volunteer_ID='$_SESSION[login_user]' ORDER BY `Event_ID` ASC";
					$res=mysqli_query($db,$q);

				echo "<table class='table table-bordered'>";
					while ($row=mysqli_fetch_assoc($res)) 
					{

						echo "<tr>";
							echo "<td>"; echo $row['Event_ID']; echo "</td>";
							echo "<td>"; echo $row['Comment']; echo "</td>";
						echo "</tr>";
					}
				echo "</table>";
				}
            }
            }

			

			else
			{
				$q="SELECT * FROM `feedback` WHERE Volunteer_ID='$_SESSION[login_user]' ORDER BY `Event_ID` ASC"; 
					$res=mysqli_query($db,$q);

				echo "<table class='table table-bordered'>";
					while ($row=mysqli_fetch_assoc($res)) 
					{
						echo "<tr>";
							echo "<td>"; echo $row['Event_ID']; echo "</td>";
							echo "<td>"; echo $row['Comment']; echo "</td>";
						echo "</tr>";
					}
				echo "</table>";
			}
			if(isset($_POST['submit1'])){
				mysqli_query($db,"DELETE FROM `feedback` WHERE Volunteer_ID='$_SESSION[login_user]' and Event_ID='$_POST[Event_ID]'; ");
				?>
				   <script type="text/javascript">
								  window.location="feedback.php"
							  </script>
				<?php
			  }
		?>
	</div>
	</div>
	
</body>
</html>
