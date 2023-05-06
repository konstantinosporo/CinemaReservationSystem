<?php
session_start();
if (!isset($_SESSION['username'])) {
  Header("Location:index.php");
}
include("functions\shows.php");


$username = $_SESSION['username'];
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$isadm = $_SESSION['isadm'];
$seats_limit = $_SESSION['seats_limit'];
$what_show = new Shows();



if (isset($_GET['submit'])) {

  $bookdate = $_GET['bookdate'];
  $what_show = $_GET['what_show'];
  $what_seat = $_GET['what_seat'];

  if (!$what_seat) { //Δομή ελέγχου επιλογής θέσης
    echo '<script type = "text/javascript">';
    echo 'alert("Please choose a seat.");';
    echo 'window.location.href = "reservations.php"';
    echo '</script>';
  }

  include("database\connection.php");

  $sql = "SELECT * from reservations where "
    . "res_date = '" . $bookdate . "' "
    . "and seat =  $what_seat "
    . "and prov_id =   $what_show ";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    echo '<script type = "text/javascript">';
    echo 'alert("Seat already taken.");';
    echo 'window.location.href = "menu.php"';
    echo '</script>';
    mysqli_close($conn);
  } else {
    $sql = "INSERT INTO reservations  (username, res_date, prov_id,seat,approved) values ('"
      . $username . "','"
      . $bookdate . "',"
      . $what_show . ","
      . $what_seat . ",1)";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    if ($result) {
      echo '<script type = "text/javascript">';
      echo 'alert("Your seat has been reserved, thank you.");';
      echo 'window.location.href = "menu.php"';
      echo '</script>';

    }
  }
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="icon" href="images\logo.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="CSS/stylesheet.css" rel="stylesheet" />
    <style>
      .vl {

        display: inline;
        padding: 10px;
      }
    </style>
  </head>



  <body>



    <script>
      function show_seats(what_date, what_show) { //Μέθοδος show_seats() με ορίσματα την ημερομηνία και τον κωδικό τανίας 
        const xhttp = new XMLHttpRequest();//Δημιουργία σταθεράς xhttp(Πρωτόκολλο http) (AJAX)
        xhttp.onreadystatechange = function () { //Eκτέλεση xhttp μέσω event onreadystatechange (AJAX)
          if (this.readyState == 4 && this.status == 200) { //Δομή ελέγχου πρωτοκόλλων
            //document.getElementById("test").innerHTML = "test"+this.responseText;
            for (i = 1; i < <?php echo $_SESSION['seats_limit'] ?>; i++) { //Δομή επανάληψης με συνθήκη τερματισμού το όριο θέσεων 
              let sid = "seat" + i;
              document.getElementById(sid).disabled = false;
            }
            //document.getElementById("test").innerHTML = this.responseText;
            json_seats = JSON.parse(this.responseText); //Αποθήκευση  δομή δεδομένων  τύπου JSON σε μεταβλητή json_seats
            for (const key in json_seats) {  //Δομή επανάληψης με συνθήκη τερματισμού την εύρεση του κλειδιου (key) (το νούμερο θέσης)
              let id = "seat" + key; // Αποθήκευση δεσμευμένης θέσης  
              document.getElementById(id).disabled = true; // Το radio button γίνεται disabled έαν η παραπάνω συνθήκη είναι αληθής 
            }
          }
        }
        //Μεταφορά μεταβλητών d και s στην σελίδα available.php για έλεγχο διαθεσιμότητας μέσω μεθόδου open(); (AJAX)
        xhttp.open("GET", "available.php?d=" + what_date + "&s=" + what_show);
        xhttp.send(); //Αποστολή με μέθοδο send(); (AJAX)
      }
    <?php $d = "'" . date('Y-m-d') . "'"; ?>

        my_date = (<?php echo $d; ?>);


      my_show = 1;
    </script>

    <?php
    include("headers\header_logged_in.php");
    ?>

    <div class="container ">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="h4 pb-2 mb-4 text-danger border-bottom border-danger fw-bold">
            Choose a date
          </div>

          <div class="d-flex justify-content-center">
            <form method="GET">
              <div class="input-group">
                <input type="date" id="bookdate" class="w-100" name="bookdate"
                  value="<?php echo $_SESSION['date_now']; ?>" min="<?php echo $_SESSION['date_now']; ?>"
                  max="<?php echo $_SESSION['date_limit']; ?>" onchange="document.getElementById('show1').checked=true;
           my_date=this.value;show_seats(this.value,my_show);">
              </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="h4 pb-2 mb-4 text-danger border-bottom border-danger fw-bold">
            Select a playing show
          </div>

          <div class="d-flex justify-content-between">
            <?php
            $what_show->show_films();
            ?>
            <?php
            $i = 1;
            foreach ($what_show->provoles as $provoli) {
              echo "<div class='card' style='width: 18rem;'>";
              echo "<ul class='list-group list-group-flush text-center'>";
              echo "<li class='list-group-item'>";
              echo "<div class='radio ' style='display:inline'>";

              $id = "'show" . $i . "'";
              echo "<label><input style='color:red;'
               id = $id onclick ='show_seats(my_date,this.value)'";
              if ($i == 1) {
                echo " checked = true ";
              }

              echo " type= 'radio' name='what_show'  value=$provoli[id]
              
              <li class='list-group-item d-inline p-0 justify-content-center'></li>
              <li class='list-group-item  p-0'>$provoli[title]</li>
              <li class='list-group-item'>Starts: $provoli[start]</li>
              <li class='list-group-item'>Ends: $provoli[end]</li>
              
             
             
              </label>"
              ;

              echo "</div>";
              echo "</li>";
              echo "</ul>";
              $i++;
            }
            ?>
          </div>
        </div>
      </div>
    </div>



    <div class="container ">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="h4 pb-2 mb-4 text-danger border-bottom border-danger fw-bold">
            Choose between available seats
          </div>
          <h3 class="text-center"></h3>
          <div class="d-flex justify-content-center pt-1">
            <?php
            for ($i = 1; $i <= $seats_limit; $i++) {
              echo "<tr>";
              echo "<td >";
              echo "<div class='radio ' style='display:inline'>";
              $id = 'seat' . $i;
              echo "<label><input  id=$id  type= 'radio' name='what_seat' value=$i>$i</label>";
              echo "</div>";
              echo "<div class='vl'>";
              echo "</div>";
              echo "</td>";
              echo "</tr>";
            }
            ?>
          </div>
        </div>
      </div>
    </div>



    <div class="container ">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <button class='btn btn-lg w-100 ' style="background-color:#946b2d;color:antiquewhite;" type="submit"
            name="submit" value="submit">
            Reserve seat
          </button>
          </form>
        </div>
      </div>
    </div>

    <?php
    include("headers\_footer.php");
    ?>


    <script>
      show_seats(my_date, my_show);
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
      integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
      crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
      integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
      crossorigin="anonymous"></script>


  </body>

</html>