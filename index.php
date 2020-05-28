<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<style>
  .jumbotron {
    background: 
    linear-gradient(
      rgba(0, 0, 250, 0.25), 
      rgba(125, 250, 250, 0.45)
    ),
    url("./giraffe.jpg");
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center;
    background-size: cover;
    min-height: 100vh;
    color: whitesmoke !important;
  }

  .push-down {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
  }

  .heading {
    font-size: 10vmax;
    text-shadow: 0.5vmax 0.5vmax 5px #4B0082;
    mix-blend-mode: screen;
    animation: fadeIn 2.4s linear forwards;
  }

  @keyframes fadeIn {
      0% {
          opacity: 0
      }

      100% {
          opacity: 1;
      }
  }
</style>

  </head>
  <body>

    <div class="jumbotron jumbotron-fluid">
      <div class="container text-center push-down">
        <div class="title">
          <h1 class="heading">Tutor</h1>
        </div>
        <h5><kbd>team seven</kbd></h5>
        <p class="lead my-5">台大學生設計的家教媒合網站</p>

        <div class="row justify-content-center">
          <a href="regU.php" type="button" class="btn btn-outline-light m-1">Register User</a>
          <a href="regS.php" type="button" class="btn btn-outline-light m-1">Register Student</a>
          <a href="regT.php" type="button" class="btn btn-outline-light m-1">Register Teacher</a>
          <a href="login.php" type="button" class="btn btn-outline-light m-1">Login</a>
        </div>
      </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>