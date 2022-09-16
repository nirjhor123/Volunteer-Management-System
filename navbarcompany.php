<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>
	</title>

	  <link rel="stylesheet" type="text/css" href="style.css">
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
  	
  	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
   
</head>
<body>

	    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand active">Volunteer MANAGEMENT SYSTEM</a>
          </div>
          <ul class="nav navbar-nav">
            <li><a href="index.php">HOME</a></li>
            
          </ul>
          <?php
            if(isset($_SESSION['login_user']))
            {?>
                <ul class="nav navbar-nav">
                  
                  <li><a href="CompanyProfile.php">PROFILE</a></li>
                
                  
                  <!--<li><a href="fine.php">FINES</a></li>-->
                  <li><a href="volunteeraddcompany.php">Add_Volunteer</a></li>
                  <li> <a href="eventsallcompany.php">Events</a></li>
                  <li><a href="addevent3.php">Add_Event</a></li>
                  <li><a href="modifyevent.php">Modify_Event</a></li>
                  <!--<li><a href="deleteevent.php">Delete_Event</a></li>-->
                </ul>

                <ul class="nav navbar-nav navbar-right">
                  <li><a href="CompanyProfile.php">
                    
                  </a></li>
                  <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"> LOGOUT</span></a></li>
                  
                </ul>
              <?php
            }
            else
            {   ?>
              <ul class="nav navbar-nav navbar-right">

                <li><a href="compnayLogin.php"><span class="glyphicon glyphicon-log-in"> LOGIN</span></a></li>
                
                <li><a href="Companyregistration.php"><span class="glyphicon glyphicon-user"> SIGN UP</span></a></li>
              </ul>
                <?php
            }

          ?>

      </div>
    </nav>



</body>
</html>