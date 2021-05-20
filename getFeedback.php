<?php
  session_start();
  if($_SESSION['role']!='seller')
    header("Location: ../index.html");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Feedback</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="icon" href="image/kamu-logo-icon.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="background-image: url('image/kamu-bg.png'); background-repeat:repeat; background-attachment: fixed;">
 
<nav class="navbar navbar-inverse ">
  <div class="container-fluid">
    <div class="navbar-header">
      <img src="../image/kamu-logo-icon.png" style="width: 70px;height: 50px" class="navbar-brand">
      <p class="navbar-text" style="color: #00cc33"> <strong>Welcome <?php echo $_SESSION['name']?></strong></p>
    </div>
    <ul class="nav navbar-nav"><li><a href="seller.php">View Orders</a></li>
    </ul>
    <ul class="nav navbar-nav"><li><a href="manageFoods.php">Manage foods</a></li>
    </ul>
   <ul class="nav navbar-nav"><li><a href="chr/chart.php">Get Analyze Report</a></li>
    </ul>
   <ul class="nav navbar-nav"><li  class="active"><a href=#>View Feedback</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>


<div class="container" style="margin-top: 100px">

  <div class="panel-group">
    
    <?php 
      include('../conn.php');

      $sql = "SELECT * FROM feedback";
      $result = mysqli_query($con,$sql);

      while($row=mysqli_fetch_assoc($result)){
        $id=$row['fId'];
        $name=$row['name'];

        echo "<div class='panel panel-primary'>";
          echo "<div class='panel-heading'>";
            echo "<strong>".$row['name']."</strong> | <small>".$row['date']."</small>";
          echo "</div>";
          echo "<div class='panel-body'>";
            echo $row['comment'];
            if($row['reply']!=null){
              //New Panel for Reply
              echo "<div class='panel panel-warning' style='margin-top: 15px'>";
                  echo "<div class='panel-heading'>";
                    echo "<strong>Reply :</strong>";
                  echo "</div>";
                  echo "<div class='panel-body'>";
                    echo $row['reply'];
                  echo "</div>";
                  echo "<div class='panel-footer'>";
                    echo "<form action='feedback_response.php' method='POST'><input type='submit' name='btn_edit' value='Edit' class='btn btn-danger'>
                    <input type='hidden' name='id' value='{$id}'>
                    <input type='hidden' name='name' value='{$name}'>
                    </form>";
                  echo "</div>";
              echo "</div>";
            }
          echo "</div>";
          echo "<div class='panel-footer'>";
            if($row['reply']==null){
              echo "<form action='feedback_response.php' method='POST'><input type='submit' name='btn_reply' value='Reply' class='btn btn-success'>
              <input type='hidden' name='id' value='{$id}'>
              <input type='hidden' name='name' value='{$name}'>
              </form>";
          }
          echo "</div>";
        echo "</div>";
      }
     ?>
  </div>
</div>

</body>
</html>
