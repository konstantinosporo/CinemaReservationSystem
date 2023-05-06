<?php
session_start();
if (!isset($_SESSION['username'])) {
  Header("Location:index.php");
  exit();
}
?>


<!-- HTML -->
<!DOCTYPE html>
<html lang="en">

  <head>
    <title>
      <?php echo $_SESSION['cinema_name'] ?>
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images\logo.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="CSS/stylesheet.css" rel="stylesheet" />
  </head>

  <body>
    <?php
    include("headers\header_logged_in.php");
    ?>

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">

          <?php
          include("functions\Film.php");
          $fil = new Film();
          $fil->show_films();

          ?>
          </table>
        </div>
      </div>
    </div>
    </div>


    <div class="container ">
      <div class="row justify-content-center ">
        <div class="col-md-6 ">
          <a href="reservations.php"><button type="button" style="background-color:#946b2d;color:antiquewhite;"
              class="btn btn-lg w-100   h-100">Reserve your seat
              now</button></a>
        </div>
      </div>
    </div>


    <?php
    include("headers\_footer.php");
    ?>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
      integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
      crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
      integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
      crossorigin="anonymous"></script>
  </body>


</html>