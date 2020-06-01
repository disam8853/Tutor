<?php

session_start();
include("connect.php");
$uid = $_SESSION['username'];
$sql = "SELECT SID FROM student_table WHERE UID='$uid'";
$result = $mysqli->query($sql);
$row = $result->fetch_row();

$_SESSION['studentname'] = $row[0];
$sid = $row[0];

$table1_text = "";
$table2_text = "";
$table3_text = "";

$sql = "SELECT * FROM T_case_table";
$result = $mysqli->query($sql);
if ($result = $mysqli -> query($sql)) {
  $count = 0;
  while ($row = $result -> fetch_row()) {
    $count += 1;
    $tmptid = $row[1];
    $tmpsql = "SELECT UID FROM teacher_table WHERE TID='$tmptid'";
    $tmpres = $mysqli -> query($tmpsql);
    $tmptuid = $tmpres -> fetch_row();
    $table3_text .= "<tr>";
    $table3_text .= "<td>$tmptuid[0]</td>"; // TID, region, subject, time
    $table3_text .= "<td>$row[2]</td>";
    $table3_text .= "<td>$row[3]</td>";
    $table3_text .= "<td>$row[4]</td>";
    // $table3_text .= "<td><form action='Scheck.php' method='post'><input style='color:white' type='submit' name='chk' value=$row[1]></form></td>";
    $table3_text .= "<td><input class='checkbox chk' type='checkbox' name='chk' value=$row[1]><form action='Scheck.php' method='post'><input class='d-none' type='text' name='chk' value=$row[1]></form></td>";
    // $table3_text .= "<td><form action='Saccept.php' method='post'><input style='color:white' type='submit' name='acp' value=$row[0]></form></td>";
    $table3_text .= "<td><input class='checkbox acp' type='checkbox' name='acp' value=$row[0]><form action='Saccept.php' method='post'><input class='d-none' type='text' name='acp' value=$row[0]></form></td>";
    $table3_text .= "</tr>";
  }
  $result -> free_result();
}

$sql = "SELECT * FROM case_table WHERE SID='$sid'"; // SID, TID, Time, Region, Subject
if ($result = $mysqli -> query($sql)) {
  $count = 0;
  while ($row = $result -> fetch_row()) {
    $count += 1;
    $tmptid = $row[1];
    $tmpsql = "SELECT UID FROM teacher_table WHERE TID='$tmptid'";
    $tmpres = $mysqli -> query($tmpsql);
    $tmptuid = $tmpres -> fetch_row();
    $table1_text .= "<tr>";
    $table1_text .= "<td>$tmptuid[0]</td>";
    $table1_text .= "<td>$row[2]</td>";
    $table1_text .= "<td>$row[3]</td>";
    $table1_text .= "<td>$row[4]</td>";
    $table1_text .= "</tr>";
  }
  $result -> free_result();
}

$sql = "SELECT * FROM click_table WHERE SID='$sid'"; // SID, TID, Date, Period
if ($result = $mysqli -> query($sql)){
  $count = 0;
  while ($row = $result -> fetch_row()) {
    $count += 1;
    $tmptid = $row[1];
    $tmpsql = "SELECT UID FROM teacher_table WHERE TID='$tmptid'";
    $tmpres = $mysqli -> query($tmpsql);
    $tmptuid = $tmpres -> fetch_row();
    $table2_text .= "<tr>";
    $table2_text .= "<td>$tmptuid[0]</td>";
    $table2_text .= "<td>$row[2]</td>";
    $table2_text .= "<td>$row[3]</td>";
    $table2_text .= "</tr>";
  }
  $result -> free_result();
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Sfind</title>
    <link rel="stylesheet" href="./style.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-sm navbar-dark px-5">
      <a class="navbar-brand text-color" href="#">Tutor</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon text-color"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link text-color" href="./index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active text-color" href="afterlogin.php">Dashboard <span class="sr-only">(current)</span></a>
          </li>
        </ul>

        <a href="logout_db.php" type="button" class="btn btn-outline-light mt-2 m-sm-3 btn-lg">logout</a>
      </div>
    </nav>

    <div class="jumbotron jumbotron-fluid">
      <div class="container text-center">
        <div class="title">
          <h1 class="heading">Tutor</h1>
        </div>
        <h5><kbd>team seven</kbd></h5>

        <div class="row justify-content-center">
          <div class="col-md-6">
            <p class="lead font-weight-bold">Your Teacher</p>

            <table class='table table-striped bgc-transparent text-color'>
              <thead>
                <tr>
                  <th>Teacher ID</th>
                  <th>Time</th>
                  <th>Region</th>
                  <th>Subject</th>
                </tr>
              </thead>
              <tbody>
                <?=$table1_text?>
              </tbody>
            </table>

          </div>
          <div class="col-md-6">
            <p class="lead font-weight-bold">You have seen</p>

            <table class='table table-striped bgc-transparent text-color'>
              <thead>
                <tr>
                  <th>Teacher ID</th>
                  <th>Date</th>
                  <th>Time</th>
                </tr>
              </thead>
              <tbody>
                <?=$table2_text?>
              </tbody>
            </table>

          </div>
        </div>


        <div class="row justify-content-center">
          <p class="lead font-weight-bold">Case list</p>

          <table class='table table-striped bgc-transparent text-color'>
            <thead>
              <tr>
                <th>Teacher ID</th>
                <th>Region</th>
                <th>Subject</th>
                <th>Time</th>
                <th>Check</th>
                <th>Accept</th>
              </tr>
            </thead>
            <tbody>
              <?=$table3_text?>
            </tbody>
          </table>

        </div>

        <div class="row justify-content-center">
          <a href="afterlogin.php" type="button" class="btn btn-outline-light m-1">Go Back</a>
        </div>

      </div>
    </div>



	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <script>
    $(".chk").click(function(){
      $(this).next().submit();
    });
    $(".acp").click(function(){
      $(this).next().submit();
    });
  </script>
  </body>
</html>


