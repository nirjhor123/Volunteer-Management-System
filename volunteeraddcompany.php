<?php
  include "DBConnect.php";
  include "navbarcompany.php";
?>

<!DOCTYPE html>
<html>
<head>

  <title>Student Registration</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

  <style type="text/css">
    section
    {
      margin-top: -20px;
    }
  </style>   
</head>
<body>

<section>
  <div class="reg_img">

    <div class="box2">
        <h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;"> &nbsp &nbsp &nbsp  Volunteer Management System</h1>
        <h1 style="text-align: center; font-size: 25px;">Adding Volunteer</h1>

      <form name="Registration" action="" method="post">
        
        <div class="login">
          <input class="form-control" type="text" name="Event_ID" placeholder="Event_ID" required=""> <br>
          <input class="form-control" type="text" name="Event_Name" placeholder="Event_Name" required=""> <br>
          <input class="form-control" type="text" name="Location" placeholder="Location" required=""> <br>
          <!--<input class="form-control" type="date" name="Event_Date" placeholder="Event_Date" required=""> <br>
          <input class="form-control" type="text" name="Description" placeholder="Description" required=""><br>-->
          <input class="form-control" type="text" name="Volunteer_ID" placeholder="Volunteer_ID" required=""><br>
          <!--<input class="form-control" type="text" name="Contact" placeholder="Contact" required=""><br>-->

          <input class="btn btn-default" type="submit" name="submit" value="Add" style="color: black; width: 70px; height: 30px"> </div>
      </form>
     
    </div>
  </div>
</section>

    <?php

      if(isset($_POST['submit']))
      {
        $count=0;

        $sql="SELECT Event_ID from `event_volunteer` where volunteer_id='$_POST[Volunteer_ID]'";
        $res=mysqli_query($db,$sql);

        while($row=mysqli_fetch_assoc($res))
        {
          if($row['Event_ID']==$_POST['Event_ID'])
          {
            $count=$count+1;
          }
        }
        if($count==0)
        {
          mysqli_query($db,"INSERT INTO `event_volunteer` (`Event_ID`, `Event_Name`, `Location`, `Event_Date`, `Description`, `Volunteer_ID`) VALUES('$_POST[Event_ID]', '$_POST[Event_Name]', '$_POST[Location]',( Select Event_Date from event_name where Event_ID='$_POST[Event_ID]'),(Select Description from event_name where Event_ID='$_POST[Event_ID]'),'$_POST[Volunteer_ID]');");
        ?>
          <script type="text/javascript">
           alert("Registration successful");
          </script>
        <?php
        }
        else
        {

          ?>
            <script type="text/javascript">
              alert("The username already exist.");
            </script>
          <?php

        }

      }

    ?>

</body>
</html>