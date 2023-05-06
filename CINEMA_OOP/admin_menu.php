<?php
session_start();
include("database\connection.php");

if (!isset($_SESSION['username'])) {
      Header('Location:index.php');
}
if (($_SESSION['isadm']) != 1) {
      header('Location: index.php');
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
                  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
                  crossorigin="anonymous">
            <link href="CSS/stylesheet.css" rel="stylesheet" />
      </head>

      <body>
            <?php
            include("headers\header_admin.php");
            include("functions\msg_admin.php");

            ?>


            <div class="container ">
                  <div class="row justify-content-center">
                        <div class="col-md-8 m-0 p-0 pb-0 mb-0">
                              <?php
                              if (isset($_SESSION['status'])) {
                                    echo $_SESSION['status'];
                                    unset($_SESSION['status']);

                              }
                              ?>
                        </div>
                  </div>
            </div>

            <div class="container ">
                  <div class="col-md-12 p-0 m-0">
                        <hr>
                  </div>
            </div>



            <div class="container ">
                  <div class="row d-flex justify-content-center ">
                        <div class="col-md-6 ">
                              <div id="slides" class="carousel slide carousel-fade " data-bs-ride="carousel">
                                    <ul class="carousel-indicators">
                                          <li data-bs-target="#slides" data-bs-slide-to="0" class="active"></li>
                                          <li data-bs-target="#slides" data-bs-slide-to="1"></li>



                                    </ul>

                                    <div class="carousel-inner " style="border-radius: 10px">
                                          <div class="carousel-item active" data-bs-interval="7000">
                                                <img src="images/index_2.jpg" class="d-block w-100" alt="Φωτογραφίες" />
                                                <div class="carousel-caption">
                                                      <h6>
                                                            Welcome back
                                                      </h6>
                                                      <p style="color: red;background-color:rgba(0, 0, 0, 0.1);"
                                                            class="fw-bold display-5 ">
                                                            <?php echo $_SESSION['name'] ?>
                                                      </p>
                                                </div>

                                          </div>
                                          <div class="carousel-item " data-bs-interval="7000">
                                                <img src="images/index_1.jpg" class="d-block w-100" alt="Φωτογραφίες" />
                                          </div>


                                          <button class="carousel-control-prev" type="button" data-bs-target="#slides"
                                                data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                          </button>
                                          <button class="carousel-control-next" type="button" data-bs-target="#slides"
                                                data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                          </button>
                                    </div>
                              </div>
                        </div>
                        <div class="col-md-4  ">
                              <div class="d-flex justify-content-center">

                                    <h4 class="display-6 text-center">Welcome <p style="color: red;">
                                                <?php echo $_SESSION['name']; ?>
                                          </p>
                                    </h4>
                              </div>
                              <div class="container">
                                    <div class="row justify-content-center">
                                          <div class="col-md-12">
                                                <ul class="list-group w-100 ">
                                                      <li class="list-group-item active bg-info  border-info"
                                                            aria-current="true">
                                                            As an admin you can use the
                                                            navbar to:</li>
                                                      <li class="list-group-item">Change the active days of the
                                                            theater. </li>
                                                      <li class="list-group-item">Edit the pending reservation
                                                            requests. </li>
                                                      <li class="list-group-item">View the list of all accepted
                                                            reservations.
                                                      </li>
                                                      <li class="list-group-item">Logout.</li>
                                                </ul>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
            <div class="container">
                  <div class="col-md-12">
                        <hr>
                  </div>
            </div>


            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
                  integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
                  crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
                  integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
                  crossorigin="anonymous"></script>




            <?php
            $username = $_SESSION['username'];
            $name = $_SESSION['name'];
            $email = $_SESSION['email'];
            $isadm = $_SESSION['isadm'];



            ?>

      </body>

</html>