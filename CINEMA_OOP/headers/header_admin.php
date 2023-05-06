<div class="container">
  <div class="col-md-12">
    <!-- Tag div με κλάση col-md-12 της Bootsrap -->
    <nav class="navbar navbar-expand-md navbar-dark sticky-top p-0" style="background-color:#831e1a;">
      <!-- Tag nav με κλάσεις της Bootsrap και inline CSS -->
      <div class="container-fluid">
        <!-- Κλάση container-fluid της Bootsrap-->

        <!-- Μπάρα πλοήγησης ,με κλάσεις τις Bootsrap, 
        που την μετατρέπουν και την μορφοποιούν ανάλογα με το μέγεθος της 
        οθόνης της συσκεύης που χρησιμοποείται (responsivenss)-->


        <a class="navbar-brand d-inline-block py-0" style="font-family: 'Jura', sans-serif;" href="index.php">
          <!-- Anchor Tag για μετάβαση σε άλλη ιστοσελίδα όταν πατηθεί το συγκεκριμένο αντικείμενο από τον χρήστη-->
          <img src="images/logo.jpg" alt="Logo " width="30" height="30"
            class="d-inline-block align-top rounded-circle p-0" />
          <!-- Συνδυασμό με inline CSS και κλάσεις  Bootsrap  -->
          <!-- Image Tag για εμφάνιση αρχείου τοπικής φωτογραφίας  -->
          <?php echo $_SESSION['name'] ?>
          <!-- Κώδικας php για εμφάνιση μεταβλήτης από τον πίνακα SESSION -->
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive">
          <!-- Button Tag για είσοδο αντικειμένου τύπου κουμπιού-->
          <span class="navbar-toggler-icon"></span> <!-- Εικονίδιο της Bootsrap μέσω tag span  -->
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
          <!-- Κλάσης  της Bootsrap με την οποία η μπάρα μετατρέπεται σε πτυσσόμενη (responsiveness) -->
          <ul class="navbar-nav ms-auto"> <!-- ul Tag αρχή στίχισης της Bootsrap -->
            <li class="nav-item active"> <!-- Πρώτη γραμμή  -->
              <a class="nav-link active py-0" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item"> <!-- Δεύτερη γραμμή  -->
              <a class="nav-link py-0" href="add_day.php">Active Days/Hours</a>
              <!-- Anchor Tag για μετάβαση στην ιστοσελίδα add_day.php 
              όταν πατηθεί το συγκεκριμένο αντικείμενο από τον χρήστη-->
            </li>
            <li class="nav-item"> <!-- Τρίτη γραμμή  -->
              <a class="nav-link py-0" href="reserve_req.php">Reservation Requests</a>
              <!-- Anchor Tag για μετάβαση στην ιστοσελίδα reserve_req.php
               όταν πατηθεί το συγκεκριμένο αντικείμενο από τον χρήστη-->
            </li>

            <li class="nav-item"> <!-- Τέταρτη γραμμή  -->
              <a class="nav-link py-0" href="reserved_seats.php">Reserved Seats</a>
              <!-- Anchor Tag για μετάβαση στην ιστοσελίδα reserved_seats.php 
              όταν πατηθεί το συγκεκριμένο αντικείμενο από τον χρήστη-->
            </li>

            <li class="nav-item"> <!-- Πέμπτη γραμμή  -->
              <a class="nav-link py-0" href="functions\logout.php">Logout</a>
              <!-- Anchor Tag για μετάβαση στην ιστοσελίδα functions\logout.php 
              όταν πατηθεί το συγκεκριμένο αντικείμενο από τον χρήστη-->
            </li>

            <!-- Τέλος tag-->
        </div>
        </li>
        </ul>
      </div>
    </nav>
  </div>
</div>