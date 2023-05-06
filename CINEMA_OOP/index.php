<?php
session_start();
include("functions\User.php");
include("functions\admin_settings.php");
$settings = new Settings();
$settings->read_settings();


if (isset($_SESSION['username']) && $_SESSION['isadm'] == 1) {
  Header("Location:admin_menu.php");
} elseif (isset($_SESSION['username'])) { // Δομή ελέγχου boolean με χρήση μεθόδου της php 
  Header("Location:menu.php");
}
?>


<?php
if (isset($_REQUEST['username'])) {
  $u1 = new User(); //Δημιουργία instance (στιγμιοτύπου) της κλάσης User
  $u1->username = $_REQUEST['username']; /*Δίνεται η τιμή που αποθηκεύται στον πίνακα _REQUESΤ['username'] 
     στην μεταβλητή username του αντικειμένου/στιγμιοτύπου u1*/
  $u1->password = $_REQUEST['password']; /*Δίνεται η τιμή που αποθηκεύται στον πίνακα _
     REQUESΤ['password'] στην μεταβλητή password του αντικειμένου/στιγμιοτύπου u1*/
  $u1->login(); /*Το στιγμιότυπο u1 καλεί την μέθοδο login() 
   έχοντας στις μεταβλήτες του τα δεδομένα του χρήστη που συνδέεται */
  if (!($u1->login())) { //Δομή ελέγχου αποτυχημένης σύνδεσης τύπου boolean 
    echo '<script type = "text/javascript">';
    echo 'alert("Login failed, incorrect username or password, please try again.");';
    echo 'window.location.href = "index.php"';
    echo '</script>'; /*Εκτύπωση  μηνύματος στην οθόνη του client 
      σε περίπτωση που η δομή ελέγχου είναι αληθής */
    exit; // Τερματισμός παρόντος script
  }
}
?>

<!DOCTYPE html> <!-- Έναρξη εγγράφου HTML5-->
<html lang="en"> <!-- Αγγλική γλώσσα περιεχομένου -->

  <head>
    <title>
      <?php echo $_SESSION['cinema_name'] /*Χρήση της μεταβλητής "cinema_name" που έχει αποθηκευτεί 
         στον πίνακα SESSION,που σεταρεται στο αρχείο "admin_settings.php" */
        ?>
    </title>
    <meta charset="utf-8"> <!-- Αποκωδικοποίηση (encoding) τύπου utf-8 -->

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Αναγνώριση και χρήση ορίων πλαισίου οθόνης της συσκευής που χρησιμοποιείται-->
    <link rel="icon" href="images\logo.jpg">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Ένωση αρχείου (link) με την Bootsrap 5.0.2 μέσω CDN -->

    <link href="CSS/stylesheet.css" rel="stylesheet" />
    <!-- Ένωση αρχείου (link) με την τοπική (custom) css stylesheet -->
    <style>
      #userlogin {

        background: -webkit-linear-gradient(#946b2d, #222f5b);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
      }
    </style>
  </head>

  <?php
  include("headers\header_logged_out.php");
  ?>

  <script>  //Έναρξη JavaScript//
    function checkForm() { //Ονομασία μεθόδου//
      let e = document.forms["signin"]["username"].value; /*Δίνεται στην μεταβλητή e το πεδίο username 
      που πληκτρολόγησε ο χρήστης*/
      let p = document.forms["signin"]["password"].value; /*Δίνεται στην μεταβλητή p 
      το πεδίο password που πληκτρολόγησε ο χρήστης*/
      if (e == "" || p == "") { //Δομή ελέγχου κενού πεδίου//
        alert("Credentials must be filled!") //Μήνυμα στην όθόνη έαν η δομή ελέγχου είναι αληθής
        return false; //Επιστροφή ψευδής 
      }
    }
  </script> <!--Τέλος JavaScript-->

  <body> <!-- Έναρξη σώματος σελίδας-->
    <div class="container"> <!-- Tag div με κλάση container της Bootsrap -->
      <div class="col-md-12"> <!-- Tag div με κλάση col-md-12 της Bootsrap -->
        <hr> <!-- Tag hr (οριζόντια διαχωριστική γραμμή στην οθόνη) -->
      </div><!-- Τέλος tag div με κλάση col-md-12  -->
    </div><!-- Tag div με κλάση container -->
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div id="slides_index" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <ul class="carousel-indicators">
              <li data-bs-target="#slides" data-bs-slide-to="0" class="active"></li>
              <li data-bs-target="#slides" data-bs-slide-to="1"></li>



            </ul>

            <div class="carousel-inner" style="border-radius: 10px"> <!-- Carousel φωτογραφιών της Bootsrap-->
              <div class="carousel-item active" data-bs-interval="4000">
                <img src="images/index(1).jpg" class="d-block w-100" alt="Φωτογραφίες" />
                <!-- Είσοδος φωτογραφίας σε περιβάλλον του carousel-->
                <div class="carousel-caption"><!-- Carption φωτογραφίας -->
                  <h6>
                    Welcome to MovieTime Cinemas
                  </h6>
                  <p>Book your tickets now!</p>
                </div>
              </div><!-- Tέλος div-->
              <div class="carousel-item " data-bs-interval="4000">
                <img src="images/index(2).jpg" class="d-block w-100" alt="Φωτογραφίες" />
                <div class="carousel-caption">
                  <h6>
                    Can't book a ticket?
                  </h6>
                  <a href="signup.php"><button class='btn ' style="background-color:#222f5b;
                  color:antiquewhite;" type="submit">
                      <p class="pb-1 mb-0">Signup now</p>
                    </button>
                  </a>
                </div>
              </div>

              <button class="carousel-control-prev" type="button" data-bs-target="#slides_index" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#slides_index" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
        </div>


        <div class="col-md-4">
          <header>
            <p id="userlogin" class="display-5 text-center fw-bold"> User login </p>
          </header>
          <div class="container"> <!-- Responsive κλάση Container Bootstrap 5.0.2-->
            <div class="row justify-content-center">
              <!-- Responsive κλάση row και justify-content-center Bootstrap 5.0.2-->
              <div class="col-md-8"> <!-- Responsive κλάση col-md-8  Bootstrap 5.0.2-->
                <form name="signin" method="POST" style="padding-top:15px ;" onsubmit="return checkForm()">
                  <!-- Φόρμα HTML-->
                  <!-- Username input -->
                  <div class="form-outline mb-4">
                    <!-- Responsive κλάση form-outline mb-4 (margin bottom) Bootstrap 5.0.2-->
                    <input id="username" type="text" class="form-control" name="username" placeholder="Username" />
                    <!-- Responsive κλάση form-control Bootstrap 5.0.2-->

                  </div>

                  <!-- Password input -->

                  <div class="form-outline mb-4">
                    <span class="input-group-text border-left-0 rounded-right bg-white ps-1" id="basic-addon1"><input
                        id="password" type="password" class="form-control ps-2" name="password"
                        placeholder="Password"><i class="bi  bi-eye-slash ps-2" id="togglePassword"></i></span>


                  </div>
                  <!-- Submit button -->
                  <button type="submit" class="btn text-light btn-block mb-4 w-100"
                    style="background-color: #946b2d; ">Sign
                    in</button>
                  <!-- Register button -->
                  <div class="text-center" style="margin-top: 9vh;">
                    <p>Not a member? <a href="signup.php">Register</a></p>

                    </button>
                  </div>
                </form>
              </div>
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



    <div style="margin-top: 5vh;">


      <?php
      include("headers\_footer.php");
      ?>
    </div>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
      integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
      crossorigin="anonymous"></script>


  </body>

</html>