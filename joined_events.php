<?php
  include "DBConnect.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title>Book Request</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <style type="text/css">

    .srch
    {
      padding-left: 850px;

    }
    .form-control
    {
      width: 300px;
      height: 40px;
      background-color: black;
      color: white;
    }
    
    body {
      background-image: url("images/aa.jpg");
      background-repeat: no-repeat;
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
.container
{
  height: 600px;
  background-color: black;
  opacity: .8;
  color: white;
}
.scroll
{
  width: 100%;
  height: 500px;
  overflow: auto;
}
th,td
{
  width: 10%;
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

                {   echo "<img class='img-circle profile_img' height=120 width=120 src='images/".$_SESSION['pic']."'>";
                    echo "</br></br>";

                    echo "Welcome ".$_SESSION['login_user']; 
                }
                ?>
            </div><br><br>

 
  <div class="h"> <a href="events.php">Events</a></div>
  <div class="h"> <a href="joined_events.php">Joined_Events</a></div>
  
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
  <div class="srch">
		<form class="navbar-form" method="post" name="form1">
			
				<input class="form-control" type="text" name="Event_ID" placeholder="Enter Event ID" required="">
				<button style="background-color: #6db6b9e6;" type="submit" name="submit1" class="btn btn-default">Remove_Participation
				</button>
		</form>
	</div>
  <div class="container">
    <h3 style="text-align: center;">Information of Events Joined</h3><br>
    <?php
    $c=0;
    
      if(isset($_SESSION['login_user']))
      {
        /*$sql="SELECT volunteer.Volunteer_ID,Name,event_volunteer.Event_ID,event_name.Event_Name,event_name.Location,event_name.Event_Date,event_name.Description FROM volunteer inner join event_volunteer ON volunteer.Volunteer_ID=event_volunteer.Volunteer_ID inner join event_name ON event_name.Event_ID=event_volunteer.Event_ID WHERE event_volunteer.Volunteer_ID ='$_SESSION[login_user]'";*/
        $sql="SELECT Volunteer_ID,Event_ID,Event_Name,Location,Event_Date,Description FROM event_volunteer WHERE event_volunteer.Volunteer_ID ='$_SESSION[login_user]'";
        $res=mysqli_query($db,$sql);
        
        
        echo "<table class='table table-bordered' style='width:100%;' >";
        //Table header
        
        echo "<tr style='background-color: #6db6b9e6;'>";
        echo "<th>"; echo "Volunteer_ID";  echo "</th>";
        //echo "<th>"; echo "Name";  echo "</th>";
        echo "<th>"; echo "Event_ID";  echo "</th>";
        echo "<th>"; echo "Event_Name";  echo "</th>";
        echo "<th>"; echo "Location";  echo "</th>";
        echo "<th>"; echo "Event_Date";  echo "</th>";
        echo "<th>"; echo "Description";  echo "</th>";
        //echo "<th>"; echo  "Review";   echo "<th>";

      echo "</tr>"; 
      echo "</table>";

       echo "<div class='scroll'>";
        echo "<table class='table table-bordered' >";
      while($row=mysqli_fetch_assoc($res))
      {
       
        echo "<tr>";
          echo "<td>"; echo $row['Volunteer_ID']; echo "</td>";
          //echo "<td>"; echo $row['Name']; echo "</td>";
          echo "<td>"; echo $row['Event_ID']; echo "</td>";
          echo "<td>"; echo $row['Event_Name']; echo "</td>";
          echo "<td>"; echo $row['Location']; echo "</td>";
          echo "<td>"; echo $row['Event_Date']; echo "</td>";
          echo "<td>"; echo $row['Description']; echo "</td>";
          //echo "<td>"; echo "Good Event"; echo "</td>";
          
        echo "</tr>";
      }
    echo "</table>";
    
        echo "</div>";
       
      }
      
      else
      {
        ?>
          <h3 style="text-align: center;">Login to see information of Joined Events</h3>
        <?php
      }

    if(isset($_POST['submit1'])){
      mysqli_query($db,"DELETE FROM `event_volunteer` WHERE Volunteer_ID='$_SESSION[login_user]' and Event_ID='$_POST[Event_ID]'; ");
      ?>
         <script type="text/javascript">
						window.location="joined_events.php"
					</script>
      <?php
    }
    
    ?>
  </div>
</div>
</body>
</html>