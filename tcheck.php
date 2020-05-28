<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DataBaseTfind</title>
  </head>
  <body id = "top" background="giraffe.jpg">
      	
  <div class="img-thumbnail">
      <div class="text-center">
        <h1>
          DBTutor<h5><kbd>team seven</kbd></h5>
        </h1>
      </div>
    </div>

<?php

session_start();
include("connect.php");

$chk = $_POST['chk'];
if(isset($_SESSION['teachername']))
{
  $uid = $_SESSION['username'];
  $sql = "SELECT TID FROM teacher_table WHERE UID = '$uid'";
  $result = $mysqli->query($sql);
  $row = $result->fetch_row();
  $date = date("Y/m/d");
  $t = date("H:i:s");
  $sql = "INSERT INTO click_table (SID,TID,Date,Period) values ('$chk','$row[0]','$date','$t')";
  if($result = $mysqli->query($sql))
  {
    $sql = "SELECT school,UID FROM student_table WHERE SID = '$chk'";
    $result = $mysqli->query($sql);
    $row = $result->fetch_row();
    $school = $row[0];
    echo $row[1];
    $sql = "SELECT Username,Sex,Age,Mail FROM member_table WHERE UID='$row[1]'";
    $result = $mysqli->query($sql);
    $row = $result->fetch_row();

    echo "<div class='text-white'>";
    echo "<div class='container'>";
    echo "<h5>&nbsp<h5>";
    echo "<h2><kbd>Student Information</kbd></h2>";
    echo "<table class='table table-striped'>";
    echo "<thead>";
    echo "<tr class='table-light'>";
    echo "<th>Student School</th>";
    echo "<th>Name</th>";
    echo "<th>Sex</th>";
    echo "<th>Age</th>";
    echo "<th>Mail</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    echo "<tr class='table-light'>";
    echo "<td>$school</td>";
    echo "<td>$row[0]</td>";
    echo "<td>$row[1]</td>";
    echo "<td>$row[2]</td>";
    echo "<td>$row[3]</td>";
    echo "</tr>";
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
    echo "</div>";
    $result -> free_result();
  }
  else
  {
    echo $mysqli->error;
  }

}
?>
    


	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
  <footer>
    <div class="container">
    <a href = "Tfind.php">
    <div class="text-center"  class="font-weight-bold">
      <h5 class="text-white"><kbd>Go Back</kbd></h5>
    </div>
    </a>
  </div>
  </footer>
</html>