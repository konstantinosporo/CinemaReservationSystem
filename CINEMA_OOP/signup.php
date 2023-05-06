<?php
session_start();
include("functions\User.php");
if (isset($_SESSION['username'])) {
  Header("Location:menu.php");
}
?>


<?php
if (isset($_REQUEST['username'])) {
  $u1 = new User();
  $u1->username = $_REQUEST['username'];
  $u1->password = $_REQUEST['password'];
  $u1->name = $_REQUEST['name'];
  $u1->email = $_REQUEST['email'];
  $u1->isadm = 0;
  $u1->signup();
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="CSS/stylesheet.css" rel="stylesheet" />
  </head>


  <body>
    <?php
    include("headers\header_logged_out.php");
    ?>

    <script>  // Ξεκινάει javascript μέθοδος ελέγχου συμπλήρωσης στοιχείων
      function checkForm() { // Όνομα καλέσματος μεθόδου 
        let e = document.forms["signup"]["username"].value; //Δημιουργία μεταβλητών 
        let p = document.forms["signup"]["password"].value;
        let n = document.forms["signup"]["name"].value;
        let a = document.forms["signup"]["email"].value;
        if (e == "" || p == "" || n == "" || a == "") {
          alert("All information required.")
          return false;
        }
      }
    </script>

    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-md-8">
          <hr>
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-6">
                <div class="h4 pb-2 mb-4 display-6 border-bottom border-dark fw-bold text-center">
                  Create your account
                </div>
                <form name="signup" method="POST" onsubmit="return checkForm()">
                  <!-- Username input -->
                  <div class="form-outline mb-4">
                    <input id="username" type="text" class="form-control" name="username" placeholder="Username" />

                  </div>

                  <!-- Password input -->

                  <div class="form-outline mb-4">
                    <span class="input-group-text border-left-0 rounded-right bg-white ps-1" id="basic-addon1"><input
                        id="password" type="password" class="form-control ps-2" name="password"
                        placeholder="Password"><i class="bi bi-eye-slash ps-2" id="togglePassword"></i></span>


                  </div>


                  <div class="form-outline mb-4">
                    <input id="name" type="text" class="form-control" name="name" placeholder="Full Name" />

                  </div>
                  <div class="form-outline mb-4">
                    <input id="email" type="text" class="form-control" name="email" placeholder="Email Adress" />

                  </div>
                  <hr>
                  <!-- Submit button -->
                  <div class="container">
                    <div class="row justify-content-center">
                      <div class="col-md-8">
                        <button type="submit" class="btn text-light btn-block mb-4 w-100"
                          style="background-color: #946b2d; ">Sign
                          up</button>

                      </div>
                    </div>

                  </div>

                  <!-- Register button -->
                  <div class="text-center">
                    <p>Already have an account? <a href="index.php">Login</a></p>
                  </div>

                </form>
                <hr>

              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

    <?php
    include("headers\_footer.php");
    ?>
    <script>
      const togglePassword = document.querySelector("#togglePassword");
      const password = document.querySelector("#password");

      togglePassword.addEventListener("click", function () {
        // toggle the type attribute
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);

        // toggle the icon
        this.classList.toggle("bi-eye");
      });

      // prevent form submit
      const form = document.querySelector("form");
      form.addEventListener('submit', function (e) {
        e.preventDefault();
      });
    </script>
  </body>

</html>