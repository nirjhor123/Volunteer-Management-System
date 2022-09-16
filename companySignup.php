<?php
  include "DBConnect.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>

  <title>Volunteer Registration</title>
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
        <h1 style="text-align: center; font-size: 25px;">Company Registration Form</h1>

      <form name="Registration" action="" method="post">
        
        <div class="login">
          <input class="form-control" type="text" name="Company_ID" placeholder="Company_ID" required=""> <br>
          <input class="form-control" type="text" name="Company_Name" placeholder="Name" required=""> <br>
         <!-- <input class="form-control" type="date" name="Date_of_Birth" placeholder="Date_of_Birth" required=""> <br>-->
          <input class="form-control" type="password" name="company_email" placeholder="company_email" required=""> <br>
          <!--<input class="form-control" type="text" name="Interest" placeholder="Interest" required=""><br>-->
          <input class="form-control" type="text" name="Company_Password" placeholder="Company_Password" required=""><br>
          <!--<input class="form-control" type="number" name="Contact" placeholder="Contact" required=""><br>-->

          <input class="btn btn-default" type="submit" name="submit" value="Sign Up" style="color: black; width: 70px; height: 30px"> </div>
      </form>
     
    </div>
  </div>
</section>

    <?php

      if(isset($_POST['submit']))
      {
        $count=0;

        $sql="SELECT Company_ID from `company`";
        $res=mysqli_query($db,$sql);

        while($row=mysqli_fetch_assoc($res))
        {
          if($row['Company_ID']==$_POST['Company_ID'])
          {
            $count=$count+1;
          }
        }
        if($count==0)
        {
          mysqli_query($db,"INSERT INTO `company` VALUES('$_POST[Company_ID]', '$_POST[Company_Name]', '$_POST[company_email]', '$_POST[Company_Password]');");
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