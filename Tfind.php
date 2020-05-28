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
$uid = $_SESSION['username'];
$sql = "SELECT TID FROM teacher_table WHERE UID='$uid'";
$result = $mysqli->query($sql);
$row = $result->fetch_row();

$_SESSION['teachername'] = $row[0];
$tid = $row[0];

$sql = "SELECT * FROM S_case_table";
$result = $mysqli->query($sql);
if ($result = $mysqli -> query($sql)) {
  echo "<div class='text-white'>";
  echo "<div class='container'>";
  echo "<h5>&nbsp<h5>";
  echo "<h5><kbd>Case list</kbd></h5>";
  echo "<table class='table table-striped'>";
  echo "<thead>";
  echo "<tr class='table-light'>";
  echo "<th>Student ID</th>";
  echo "<th>region</th>";
  echo "<th>subject</th>";
  echo "<th>time</th>";
  echo "<th>Check</th>";
  echo "<th>Accept</th>";
  echo "</tr>";
  echo "</thead>";
  echo "<tbody>";
  $count = 0;
  while ($row = $result -> fetch_row()) {
    $count += 1;
    $tmpsid = $row[1];
    $tmpsql = "SELECT UID FROM student_table WHERE SID='$tmpsid'";
    $tmpres = $mysqli -> query($tmpsql);
    $tmpsuid = $tmpres -> fetch_row();
    echo "<tr class='table-light'>";
    echo "<td>$tmpsuid[0]</td>";
    echo "<td>$row[2]</td>";
    echo "<td>$row[3]</td>";
    echo "<td>$row[4]</td>";
    echo "<td><form action='tcheck.php' method='post'><input style='color:white' type='submit' name='chk' value=$row[1]></form></td>";
    echo "<td><form action='Taccept.php' method='post'><input style='color:white' type='submit' name='acp' value=$row[0]></form></td>";
    echo "</tr>";
  }
  echo "</tbody>";
  echo "</table>";
  echo "</div>";
  echo "</div>";
  $result -> free_result();
}


$sql = "SELECT * FROM case_table WHERE TID='$tid'"; // SID, TID, Time, Region, Subject
if ($result = $mysqli -> query($sql)) {
  echo "<div class='text-white'>";
  echo "<div class='container'>";
  echo "<h5>&nbsp<h5>";
  echo "<h5><kbd>Your Case</kbd></h5>";
  echo "<table class='table table-striped'>";
  echo "<thead>";
  echo "<tr class='table-light'>";
  echo "<th>Student account</th>";
  echo "<th>Time</th>";
  echo "<th>Region</th>";
  echo "<th>Subject</th>";
  echo "</tr>";
  echo "</thead>";
  echo "<tbody>";
  $count = 0;
  while ($row = $result -> fetch_row()) {
    $count += 1;
    $tmpsid = $row[0];
    $tmpsql = "SELECT UID FROM student_table WHERE SID='$tmpsid'";
    $tmpres = $mysqli -> query($tmpsql);
    $tmpsuid = $tmpres -> fetch_row();
    echo "<tr class='table-light'>";
    echo "<td>$tmpsuid[0]</td>";
    echo "<td>$row[2]</td>";
    echo "<td>$row[3]</td>";
    echo "<td>$row[4]</td>";
    echo "</tr>";
  }
  echo "</tbody>";
  echo "</table>";
  echo "</div>";
  echo "</div>";
  $result -> free_result();
}

$sql = "SELECT * FROM click_table WHERE TID='$tid'"; // SID, TID, Date, Period
if ($result = $mysqli -> query($sql)) {
  echo "<div class='text-white'>";
  echo "<div class='container'>";
  echo "<h5>&nbsp<h5>";
  echo "<h5><kbd>You have seen</kbd></h5>";
  echo "<table class='table table-striped'>";
  echo "<thead>";
  echo "<tr class='table-light'>";
  echo "<th>Student account</th>";
  echo "<th>Date</th>";
  echo "<th>Time</th>";
  echo "</tr>";
  echo "</thead>";
  echo "<tbody>";
  $count = 0;
  while ($row = $result -> fetch_row()) {
    $count += 1;
    $tmpsid = $row[0];
    $tmpsql = "SELECT UID FROM student_table WHERE SID='$tmpsid'";
    $tmpres = $mysqli -> query($tmpsql);
    $tmpsuid = $tmpres -> fetch_row();
    echo "<tr class='table-light'>";
    echo "<td>$tmpsuid[0]</td>";
    echo "<td>$row[2]</td>";
    echo "<td>$row[3]</td>";
    echo "</tr>";
  }
  echo "</tbody>";
  echo "</table>";
  echo "</div>";
  echo "</div>";
  $result -> free_result();
}

?>

<!-- 
<div class="container">
  <h2>条纹表格</h2>
  <p>通过添加 .table-striped 类，来设置条纹表格:</p>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
    </tbody>
  </table>
</div>
-->
    


	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>

  <footer>
    <div class="container">
    <a href = "afterlogin.php">
    <div class="text-center"  class="font-weight-bold">
      <h5 class="text-white"><kbd>Go Back</kbd></h5>
    </div>
    </a>
  </div>
  </footer>
</html>